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
	}
