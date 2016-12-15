<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Marque;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	
	/**
	 * Marque controller.
	 *
	 */
	class MarqueController extends Controller {
		/**
		 * Lists all Marque entities.
		 *
		 */
		public function indexAction() {
			$em = $this->getDoctrine()->getManager();
			
			$marques = $em->getRepository( 'sil21VitrineBundle:Marque' )->findAll();
			
			return $this->render(
				'sil21VitrineBundle:Marque:index.html.twig', [
					'marques' => $marques,
				]
			);
		}
		
		public function listAction() {
			$marques = $this->getDoctrine()->getRepository( 'sil21VitrineBundle:Marque' )->findAll();
			
			return $this->render(
				'sil21VitrineBundle:Marque:listMarque.html.twig', [ 'marques' => $marques ]
			);
		}
		
		/**
		 * @param \sil21\VitrineBundle\Entity\Marque $marque
		 *
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function articlesByMarqueAction( Marque $marque ) {
			return $this->render(
				'sil21VitrineBundle:Catalogue:listProducts.html.twig',
				[
					'name'     => $marque->getName(),
					'products' => $marque->getProducts()
				]
			);
		}
		
		/**
		 * Creates a new Marque entity.
		 *
		 */
		public function newAction( Request $request ) {
			$marque = new Marque();
			$form = $this->createForm( 'sil21\VitrineBundle\Form\MarqueType', $marque );
			$form->handleRequest( $request );
			
			if ( $form->isSubmitted() && $form->isValid() ) {
				$em = $this->getDoctrine()->getManager();
				$em->persist( $marque );
				$em->flush( $marque );
				
				return $this->redirectToRoute( 'marque_show', [ 'id' => $marque->getId() ] );
			}
			
			return $this->render(
				'sil21VitrineBundle:Marque:new.html.twig', [
					'Marque' => $marque,
					'form'   => $form->createView(),
				]
			);
		}
		
		/**
		 * Finds and displays a Marque entity.
		 *
		 */
		public function showAction( Marque $marque ) {
			$deleteForm = $this->createDeleteForm( $marque );
			
			return $this->render(
				'sil21VitrineBundle:Marque:show.html.twig', [
					'marque'      => $marque,
					'delete_form' => $deleteForm->createView(),
				]
			);
		}
		
		/**
		 * Displays a form to edit an existing Marque entity.
		 *
		 */
		public function editAction( Request $request, Marque $marque ) {
			$deleteForm = $this->createDeleteForm( $marque );
			$editForm = $this->createForm( 'sil21\VitrineBundle\Form\MarqueType', $marque );
			$editForm->handleRequest( $request );
			
			if ( $editForm->isSubmitted() && $editForm->isValid() ) {
				$this->getDoctrine()->getManager()->flush();
				
				return $this->redirectToRoute( 'marque_edit', [ 'id' => $marque->getId() ] );
			}
			
			return $this->render(
				'sil21VitrineBundle:Marque:edit.html.twig', [
					'marque'      => $marque,
					'edit_form'   => $editForm->createView(),
					'delete_form' => $deleteForm->createView(),
				]
			);
		}
		
		/**
		 * Deletes a Marque entity.
		 *
		 */
		public function deleteAction( Request $request, Marque $marque ) {
			$form = $this->createDeleteForm( $marque );
			$form->handleRequest( $request );
			
			if ( $form->isSubmitted() && $form->isValid() ) {
				$em = $this->getDoctrine()->getManager();
				$em->remove( $marque );
				$em->flush( $marque );
			}
			
			return $this->redirectToRoute( 'marque_index' );
		}
		
		/**
		 * Creates a form to delete a Marque entity.
		 *
		 * @param Marque $marque The Marque entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createDeleteForm( Marque $marque ) {
			return $this->createFormBuilder()
				->setAction( $this->generateUrl( 'marque_delete', [ 'id' => $marque->getId() ] ) )
				->setMethod( 'DELETE' )
				->getForm();
		}
	}
