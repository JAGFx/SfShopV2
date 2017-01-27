<?php
	
	namespace sil21\AdminBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Order;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	
	/**
	 * Order controller.
	 *
	 */
	class OrderController extends Controller {
		
		/**
		 * Displays a form to edit an existing Order entity.
		 *
		 */
		public function editAction( Request $request, Order $order ) {
			$deleteForm = $this->createDeleteForm( $order );
			$editForm = $this->createForm( 'sil21\VitrineBundle\Form\OrderType', $order );
			$editForm->handleRequest( $request );
			
			if ( $editForm->isSubmitted() && $editForm->isValid() ) {
				$this->getDoctrine()->getManager()->flush();
				
				return $this->redirectToRoute( 'order_edit', [ 'id' => $order->getId() ] );
			}
			
			return $this->render(
				'sil21AdminBundle:Order:edit.html.twig',
				[
					'order'       => $order,
					'edit_form'   => $editForm->createView(),
					'delete_form' => $deleteForm->createView(),
				]
			);
		}
		
		/**
		 * Deletes a Order entity.
		 *
		 */
		public function deleteAction( Request $request, Order $order ) {
			$form = $this->createDeleteForm( $order );
			$form->handleRequest( $request );
			
			if ( $form->isSubmitted() && $form->isValid() ) {
				$em = $this->getDoctrine()->getManager();
				$em->remove( $order );
				$em->flush();
			}
			
			return $this->redirectToRoute( 'order_listUser' );
		}
		
		/**
		 * Creates a form to delete a Order entity.
		 *
		 * @param Order $order The Order entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createDeleteForm( Order $order ) {
			return $this->createFormBuilder()
				->setAction(
					$this->generateUrl( 'order_delete', [ 'id' => $order->getId() ] )
				)
				->setMethod( 'DELETE' )
				->getForm();
		}
	}
