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
		public function indexAction() {
			$securityContext = $this->container->get( 'security.authorization_checker' );
			
			if ( $securityContext->isGranted( 'IS_AUTHENTICATED_REMEMBERED' ) ) {
				/**
				 * @var Client $user
				 */
				$user = $user = $this->container
					->get( 'security.token_storage' )
					->getToken()->getUser();
				
				$commandes = $user->getCommandes();
				
				return $this->render(
					'sil21VitrineBundle:Commande:index.html.twig', [
						'commandes' => $commandes,
					]
				);
				
			} else
				$this->redirectToRoute('fos_user_security_login');
			
		}
		
		/**
		 * Finds and displays a Commande entity.
		 *
		 */
		public function showAction( Commande $commande ) {
			$deleteForm = $this->createDeleteForm( $commande );
			
			return $this->render(
				'sil21VitrineBundle:Commande:show.html.twig', [
				'Commande'    => $commande,
				'delete_form' => $deleteForm->createView(),
			]
			);
		}
		
		/**
		 * Displays a form to edit an existing Commande entity.
		 *
		 */
		public function editAction( Request $request, Commande $commande ) {
			$deleteForm = $this->createDeleteForm( $commande );
			$editForm = $this->createForm( 'sil21\VitrineBundle\Form\CommandeType', $commande );
			$editForm->handleRequest( $request );
			
			if ( $editForm->isSubmitted() && $editForm->isValid() ) {
				$this->getDoctrine()->getManager()->flush();
				
				return $this->redirectToRoute( 'commande_edit', [ 'id' => $commande->getId() ] );
			}
			
			return $this->render(
				'sil21VitrineBundle:Commande:edit.html.twig', [
				'Commande'    => $commande,
				'edit_form'   => $editForm->createView(),
				'delete_form' => $deleteForm->createView(),
			]
			);
		}
		
		/**
		 * Deletes a Commande entity.
		 *
		 */
		public function deleteAction( Request $request, Commande $commande ) {
			$form = $this->createDeleteForm( $commande );
			$form->handleRequest( $request );
			
			if ( $form->isSubmitted() && $form->isValid() ) {
				$em = $this->getDoctrine()->getManager();
				$em->remove( $commande );
				$em->flush( $commande );
			}
			
			return $this->redirectToRoute( 'commande_index' );
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
				->setAction( $this->generateUrl( 'commande_delete', [ 'id' => $commande->getId() ] ) )
				->setMethod( 'DELETE' )
				->getForm();
		}
	}
