<?php
	/*
	 * Fichier : PanierController.php
	 * Auteur: SMITH Emmanuel
	 * Création: 03/03/2016
	 * Modification: 03/04/2016
	 *
	 * Controôleur pour la gestion du Panier
	 */
	
	
	namespace sil21\VitrineBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Panier;
	use sil21\VitrineBundle\Entity\Product;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\JsonResponse;
	use Symfony\Component\HttpFoundation\Session\Session;
	
	/**
	 * Class PanierController
	 *
	 * @package sil21\VitrineBundle\Controller
	 */
	class PanierController extends Controller {
		
		/**
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function cartContentAction() {
			$panier = $this->getSessionPanier();
			
			return $this->render(
				'sil21VitrineBundle:Panier:panier.html.twig', [ 'panier' => $panier ]
			);
		}
		
		/**
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse
		 */
		public function emptyCartAction() {
			$panier = $this->getSessionPanier();
			$panier->clearPanier();
			
			return $this->redirectToRoute( 'sil21_cartContent' );
		}
		
		/**
		 * @param Product $product
		 * @param         $qte
		 *
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse
		 */
		public function addArticleAction( Product $product, $qte ) {
			$panier = $this->getSessionPanier();
			
			$added = $panier->addArticle( $product, $qte );
			if ( !$added ) {
				$this->get( 'session' )->getFlashBag()->add(
					'message', [
							 'type'    => 'warning',
							 'title'   => "Modification impossible",
							 'message' => 'Le stock de l\'article est insuffisant'
						 ]
				);
			}
			
			$this->setSessionPanier( $panier );
			
			return $this->redirectToRoute( 'sil21_cartContent' );
		}
		
		/**
		 * @param Product $product
		 * @param         $qte
		 *
		 * @return JsonResponse
		 */
		public function changeQutantityAction( Product $product, $qte ) {
			$panier = $this->getSessionPanier();
			$finalQteProduct  = $panier->changeQuantity( $product, $qte );
			
			if ( $finalQteProduct == $qte ) {
				$this->get( 'session' )->getFlashBag()->add(
					'message', [
							 'type'    => 'warning',
							 'title'   => "Modification impossible",
							 'message' => 'Le stock de l\'article est insuffisant'
						 ]
				);
			}
			
			$this->setSessionPanier( $panier );
			
			return new JsonResponse( ['lastQte' => $finalQteProduct] );
		}
		
		/**
		 * @param $articleId
		 * @param $qte
		 *
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse
		 */
		public function removeQteProductAction( $articleId, $qte ) {
			$panier = $this->getSessionPanier();
			
			$panier->removeOneArticle( $articleId, $qte );
			
			$this->setSessionPanier( $panier );
			
			return $this->redirectToRoute( 'sil21_cartContent' );
		}
		
		/**
		 * @param $articleId
		 *
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse
		 */
		public function removeProductAction( $articleId ) {
			$panier = $this->getSessionPanier();
			
			$panier->removeArticles( $articleId );
			
			$this->setSessionPanier( $panier );
			
			return $this->redirectToRoute( 'sil21_cartContent' );
		}
		
		/**
		 * @return Panier
		 */
		private function getSessionPanier() {
			$session = $this->getRequest()->getSession();
			
			return $session->get( 'panier', new Panier() );
		}
		
		/**
		 * @param $panier
		 */
		private function setSessionPanier( $panier ) {
			$session = $this->getRequest()->getSession();
			$session->set( 'panier', $panier );
		}
	}
