<?php
	
	namespace sil21\AdminBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Brand;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	
	/**
	 * Brand controller.
	 *
	 */
	class BrandController extends Controller {
		/**
		 * Lists all Brand entities.
		 *
		 */
		public function indexAction() {
			$em = $this->getDoctrine()->getManager();
			
			$brands = $em->getRepository( 'sil21VitrineBundle:Brand' )->findAll();
			
			return $this->render(
				'sil21AdminBundle:Brand:index.html.twig', [
					'brands' => $brands,
				]
			);
		}
		
		/**
		 * Creates a new Brand entity.
		 *
		 */
		public function newAction( Request $request ) {
			$brand = new Brand();
			$form = $this->createForm( 'sil21\VitrineBundle\Form\BrandType', $brand );
			$form->handleRequest( $request );
			
			if ( $form->isSubmitted() && $form->isValid() ) {
				$em = $this->getDoctrine()->getManager();
				$em->persist( $brand );
				$em->flush( $brand );
				
				return $this->redirectToRoute( 'brand_show', [ 'id' => $brand->getId() ] );
			}
			
			return $this->render(
				'sil21AdminBundle:Brand:new.html.twig', [
					'Brand' => $brand,
					'form'  => $form->createView(),
				]
			);
		}
		
		/**
		 * Finds and displays a Brand entity.
		 *
		 */
		public function showAction( Brand $brand ) {
			$deleteForm = $this->createDeleteForm( $brand );
			
			return $this->render(
				'sil21AdminBundle:Brand:show.html.twig', [
					'brand'       => $brand,
					'delete_form' => $deleteForm->createView(),
				]
			);
		}
		
		/**
		 * Displays a form to edit an existing Brand entity.
		 *
		 */
		public function editAction( Request $request, Brand $brand ) {
			$deleteForm = $this->createDeleteForm( $brand );
			$editForm = $this->createForm( 'sil21\VitrineBundle\Form\BrandType', $brand );
			$editForm->handleRequest( $request );
			
			if ( $editForm->isSubmitted() && $editForm->isValid() ) {
				$this->getDoctrine()->getManager()->flush();
				
				return $this->redirectToRoute( 'brand_edit', [ 'id' => $brand->getId() ] );
			}
			
			return $this->render(
				'sil21AdminBundle:Brand:edit.html.twig', [
					'brand'       => $brand,
					'edit_form'   => $editForm->createView(),
					'delete_form' => $deleteForm->createView(),
				]
			);
		}
		
		/**
		 * Deletes a Brand entity.
		 *
		 */
		public function deleteAction( Request $request, Brand $brand ) {
			$form = $this->createDeleteForm( $brand );
			$form->handleRequest( $request );
			
			if ( $form->isSubmitted() && $form->isValid() ) {
				$em = $this->getDoctrine()->getManager();
				$em->remove( $brand );
				$em->flush( $brand );
			}
			
			return $this->redirectToRoute( 'brand_index' );
		}
		
		/**
		 * Creates a form to delete a Brand entity.
		 *
		 * @param Brand $brand The Brand entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createDeleteForm( Brand $brand ) {
			return $this->createFormBuilder()
				->setAction( $this->generateUrl( 'brand_delete', [ 'id' => $brand->getId() ] ) )
				->setMethod( 'DELETE' )
				->getForm();
		}
	}
