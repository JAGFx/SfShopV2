<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Client;
	use sil21\VitrineBundle\Entity\Commande;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	
	/**
	 * Commande controller.
	 *
	 */
	class CommandeController extends Controller {
		
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
			
			$commandes = $user->getCommandes();
			
			return $this->render(
				'sil21VitrineBundle:Commande:index.html.twig',
				[
					'commandes' => $commandes,
				]
			);
			
		}
		
		/**
		 * Finds and displays a Commande entity.
		 *
		 */
		public function showAction( Commande $commande ) {
			
			$deleteForm = ( $this->get( 'security.authorization_checker' )->isGranted( 'ROLE_ADMIN' ) )
				? $this->createDeleteForm( $commande )->createView()
				: null;
			
			return $this->render(
				'sil21VitrineBundle:Commande:show.html.twig',
				[
					'commande'    => $commande,
					'delete_form' => $deleteForm,
				]
			);
		}
		
		/**
		 * Creates a form to delete a Commande entity.
		 *
		 * @param Commande $commande The Commande entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createDeleteForm( Commande $commande ) {
			return $this->createFormBuilder()
				    ->setAction(
					    $this->generateUrl( 'commande_delete', [ 'id' => $commande->getId() ] )
				    )
				    ->setMethod( 'DELETE' )
				    ->getForm();
		}
	}
