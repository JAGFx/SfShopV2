<?php
	
	namespace sil21\AdminBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Product;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\Filesystem\Filesystem;
	use Symfony\Component\HttpFoundation\Request;
	
	/**
	 * Product controller.
	 *
	 */
	class ProductController extends Controller {
		const PATH_UPLOAD = '/../web/uploads/products';
		
		/**
		 * Lists all product entities.
		 *
		 */
		public function indexAction() {
			$em = $this->getDoctrine()->getManager();
			
			$products = $em->getRepository( 'sil21VitrineBundle:Product' )->findAll();
			
			return $this->render(
				'sil21AdminBundle:Product:index.html.twig', [
										  'products' => $products,
									  ]
			);
		}
		
		/**
		 * Creates a new product entity.
		 *
		 */
		public function newAction( Request $request ) {
			$product = new Product();
			$form    = $this->createForm( 'sil21\VitrineBundle\Form\ProductType', $product );
			$form->handleRequest( $request );
			
			if ( $form->isSubmitted() && $form->isValid() ) {
				// Upload de l'image
				$this->uploadImage( $product );
				
				$em = $this->getDoctrine()->getManager();
				$em->persist( $product );
				$em->flush( $product );
				
				return $this->redirectToRoute( 'product_show', [ 'id' => $product->getId() ] );
			}
			
			return $this->render(
				'sil21AdminBundle:Product:new.html.twig', [
										'product' => $product,
										'form'    => $form->createView(),
									]
			);
		}
		
		/**
		 * Finds and displays a product entity.
		 *
		 */
		public function showAction( Product $product ) {
			$deleteForm = $this->createDeleteForm( $product );
			
			return $this->render(
				'sil21AdminBundle:Product:show.html.twig', [
										 'product'     => $product,
										 'delete_form' => $deleteForm->createView(
										 ),
									 ]
			);
		}
		
		/**
		 * Displays a form to edit an existing product entity.
		 *
		 */
		public function editAction( Request $request, Product $product ) {
			$deleteForm      = $this->createDeleteForm( $product );
			$deleteImageForm = $this->createDeleteImageForm( $product );
			$editForm        = $this->createForm( 'sil21\VitrineBundle\Form\ProductType', $product );
			$editForm->handleRequest( $request );
			
			if ( $editForm->isSubmitted() && $editForm->isValid() ) {
				// Upload de l'image
				$this->uploadImage( $product );
				
				$this->getDoctrine()->getManager()->flush();
				
				return $this->redirectToRoute( 'product_edit', [ 'id' => $product->getId() ] );
			}
			
			return $this->render(
				'sil21AdminBundle:Product:edit.html.twig',
				[
					'product'           => $product,
					'edit_form'         => $editForm->createView(),
					'delete_form'       => $deleteForm->createView(),
					'delete_image_form' => $deleteImageForm->createView()
				]
			);
		}
		
		/**
		 * Deletes a product entity.
		 *
		 */
		public function deleteAction( Request $request, Product $product ) {
			$form = $this->createDeleteForm( $product );
			$form->handleRequest( $request );
			
			if ( $form->isSubmitted() && $form->isValid() ) {
				// Suppression image
				$this->deleteImage( $product );
				
				$em = $this->getDoctrine()->getManager();
				$em->remove( $product );
				$em->flush();
			}
			
			return $this->redirectToRoute( 'product_index' );
		}
		
		/**
		 * Creates a form to delete a product entity.
		 *
		 * @param Product $product The product entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createDeleteForm( Product $product ) {
			return $this->createFormBuilder()
				    ->setAction( $this->generateUrl( 'product_delete', [ 'id' => $product->getId() ] ) )
				    ->setMethod( 'DELETE' )
				    ->getForm();
		}
		
		/**
		 * @param Request $request
		 * @param Product $product
		 *
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse
		 */
		public function deleteImageAction( Request $request, Product $product ) {
			$form = $this->createDeleteImageForm( $product );
			$form->handleRequest( $request );
			if ( $form->isSubmitted() && $form->isValid() ) {
				if ( !empty( $product->getImage() ) ) {
					// Suppression image
					$this->deleteImage( $product );
					// MAJ DB
					$em = $this->getDoctrine()->getManager();
					$product->setImage();
					$em->flush();
					$message = [
						'type'    => 'success',
						'title'   => "Image supprimé",
						'message' => 'L\'image à bien été supprimié'
					];
					$this->get( 'session' )->getFlashBag()->add( 'message', $message );
				}
			}
			
			return $this->redirectToRoute( 'product_edit', [ 'id' => $product->getId() ] );
		}
		
		/**
		 * @param Product $product
		 *
		 * @return \Symfony\Component\Form\Form
		 */
		private function createDeleteImageForm( Product $product ) {
			return $this->createFormBuilder()
				    ->setAction(
					    $this->generateUrl( 'product_delete_image', [ 'id' => $product->getId() ] )
				    )
				    ->setMethod( 'DELETE' )
				    ->getForm();
		}
		
		/**
		 * @param Product $product
		 */
		private function uploadImage( Product $product ) {
			$file = $product->getFile();
			if ( !empty( $file ) ) {
				$fileName = $product->getId() . '.' . $file->guessExtension();
				$imageDir = $this->container->getParameter(
						'kernel.root_dir'
					) . ProductController::PATH_UPLOAD;
				$file->move( $imageDir, $fileName );
				$product->setImage( $fileName );
			}
		}
		
		/**
		 * @param Product $product
		 */
		private function deleteImage( Product $product ) {
			$fs    = new Filesystem();
			$image = $this->container->getParameter(
					'kernel.root_dir'
				) . ProductController::PATH_UPLOAD . '/' . $product->getImage();
			$fs->remove( [ $image ] );
		}
	}
