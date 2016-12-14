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
	
	use sil21\VitrineBundle\Entity\Commande;
	use sil21\VitrineBundle\Entity\LigneCommande;
	use sil21\VitrineBundle\Entity\Panier;
	use sil21\VitrineBundle\Entity\Product;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\BrowserKit\Response;
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
			$finalQteProduct = $panier->changeQuantity( $product, $qte );
			
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
			
			return new JsonResponse( [ 'lastQte' => $finalQteProduct ] );
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
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function validateCartAction() {
			$securityContext = $this->container->get( 'security.authorization_checker' );
			
			if ( $securityContext->isGranted( 'IS_AUTHENTICATED_REMEMBERED' ) ) {
				$em = $this->getDoctrine()->getManager();
				
				$user = $user = $this->container
					->get( 'security.token_storage' )
					->getToken()->getUser();
				
				$commande = new Commande( $user );
				$em->persist( $commande );
				$em->flush();
				
				$panier = $this->getSessionPanier();
				foreach ( $panier->getCartItems() as $item ) {
					
					// Récupération du produit et retrait stock
					$product = $em->getRepository( 'sil21VitrineBundle:Product' )->find(
						$item[ 'product' ]->getId()
					);
					$product->setStock( $product->getStock() - $item[ 'qte' ] );
					
					// Création d'une ligne de Commande
					$ligneCommande = new LigneCommande( $product, $commande, $item[ 'qte' ] );
					$commande->addLignecommande( $ligneCommande );
					
					$em->persist( $product );
				}
				
				$em->persist( $commande );
				$em->flush();
				
				$this->setSessionPanier( new Panier() );
				$this->get( 'session' )->getFlashBag()->add(
					'message', [
						'type'    => 'success',
						'title'   => "Commande effectué avec succès",
						'message' => 'Accèdez à votre Commande depuis votre espace'
					]
				);
				
				return $this->render( 'sil21VitrineBundle:Panier:successValidation.html.twig',
					[
						'idCommande' => $commande->getId()
					]);
				
			} else
				$this->redirectToRoute('fos_user_security_login');
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
