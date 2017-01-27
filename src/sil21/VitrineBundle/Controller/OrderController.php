<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Client;
	use sil21\VitrineBundle\Entity\Order;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	
	/**
	 * Order controller.
	 *
	 */
	class OrderController extends Controller {
		
		/**
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function listAllUserAction() {
			/**
			 * @var Client $user
			 */
			$user = $user = $this->container
				->get( 'security.token_storage' )
				->getToken()->getUser();
			
			$orders = $user->getOrders();
			
			return $this->render(
				'sil21VitrineBundle:Order:index.html.twig', [ 'orders' => $orders ]
			);
			
		}
		
		/**
		 * Finds and displays a Order entity.
		 *
		 */
		public function showAction( Order $order ) {
			
			$deleteForm = ( $this->get( 'security.authorization_checker' )->isGranted( 'ROLE_ADMIN' ) )
				? $this->createDeleteForm( $order )->createView()
				: null;
			
			return $this->render(
				'sil21VitrineBundle:Order:show.html.twig',
				[
					'order'       => $order,
					'delete_form' => $deleteForm,
				]
			);
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
