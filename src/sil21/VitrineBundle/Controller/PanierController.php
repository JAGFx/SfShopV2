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
	
	/**
	 * Class PanierController
	 *
	 * @package sil21\VitrineBundle\Controller
	 */
	class PanierController extends Controller {
		
		/**
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function contenuPanierAction() {
			$panier = $this->getSessionPanier();
			$articles = [];
			
			if ( !empty( $panier->getArticles() ) ) {
				foreach ( $panier->getArticles() as $item ) {
					$article = $this->getArticleObj( $item[ 'id' ] );
					
					$articles[] = [
						'article' => $article,
						'qte'     => $item[ 'qte' ]
					];
				}
			}
			
			return $this->render(
				'sil21VitrineBundle:Panier:panier.html.twig',
				[
					'articles' => $articles,
					'panier'   => $panier,
					'total'    => $this->getTotalPanier()
				]
			);
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
		
		/**
		 * @param $id
		 *
		 * @return Product
		 */
		private function getArticleObj( $id ) {
			return $this->getDoctrine()->getManager()
				->getRepository( 'sil21VitrineBundle:Product' )
				->findOneBy( [ 'id' => $id ] );
		}
		
		
		/**
		 * @return int
		 */
		private function getTotalPanier() {
			$total = 0;
			$panier = $this->getSessionPanier();
			
			foreach ( $panier->getArticles() as $item ) {
				$article = $this->getDoctrine()->getManager()
					->getRepository( 'sil21VitrineBundle:Product' )
					->findOneById( $item[ 'id' ] );
				
				$total += $article->getPrice() * $item[ 'qte' ];
			}
			
			return $total;
		}
	}
