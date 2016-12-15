<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Product;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	
	/**
	 * Product controller.
	 *
	 */
	class ProductController extends Controller {
		/**
		 * Lists all product entities.
		 *
		 */
		public function indexAction() {
			$em = $this->getDoctrine()->getManager();
			
			$products = $em->getRepository( 'sil21VitrineBundle:Product' )->findAll();
			
			return $this->render(
				'sil21VitrineBundle:Product:index.html.twig', [
					'products' => $products,
				]
			);
		}
		
		public function listAllAction() {
			$products = $this->getDoctrine()->getRepository( 'sil21VitrineBundle:Product' )->findAll();
			
			return $this->render(
				'sil21VitrineBundle:Catalogue:listProducts.html.twig',
				[
					'name'     => 'Produits',
					'products' => $products
				]
			);
		}
		
		/**
		 * Creates a new product entity.
		 *
		 */
		public function newAction( Request $request ) {
			$product = new Product();
			$form = $this->createForm( 'sil21\VitrineBundle\Form\ProductType', $product );
			$form->handleRequest( $request );
			
			if ( $form->isSubmitted() && $form->isValid() ) {
				$em = $this->getDoctrine()->getManager();
				$em->persist( $product );
				$em->flush( $product );
				
				return $this->redirectToRoute( 'product_show', [ 'id' => $product->getId() ] );
			}
			
			return $this->render(
				'sil21VitrineBundle:Product:new.html.twig', [
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
				'sil21VitrineBundle:Product:show.html.twig', [
					'product'     => $product,
					'delete_form' => $deleteForm->createView(),
				]
			);
		}
		
		/**
		 * Displays a form to edit an existing product entity.
		 *
		 */
		public function editAction( Request $request, Product $product ) {
			$deleteForm = $this->createDeleteForm( $product );
			$editForm = $this->createForm( 'sil21\VitrineBundle\Form\ProductType', $product );
			$editForm->handleRequest( $request );
			
			if ( $editForm->isSubmitted() && $editForm->isValid() ) {
				$this->getDoctrine()->getManager()->flush();
				
				return $this->redirectToRoute( 'product_edit', [ 'id' => $product->getId() ] );
			}
			
			return $this->render(
				'sil21VitrineBundle:Product:edit.html.twig', [
					'product'     => $product,
					'edit_form'   => $editForm->createView(),
					'delete_form' => $deleteForm->createView(),
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
				$em = $this->getDoctrine()->getManager();
				$em->remove( $product );
				$em->flush( $product );
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
	}
