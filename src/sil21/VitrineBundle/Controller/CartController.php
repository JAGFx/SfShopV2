<?php
	/*
	 * Fichier : CartController.php
	 * Auteur: SMITH Emmanuel
	 * Création: 03/03/2016
	 * Modification: 03/04/2016
	 *
	 * Controôleur pour la gestion du Cart
	 */
	
	
	namespace sil21\VitrineBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Order;
	use sil21\VitrineBundle\Entity\LigneCommande;
	use sil21\VitrineBundle\Entity\Cart;
	use sil21\VitrineBundle\Entity\Product;
	use sil21\VitrineBundle\Service\CartService;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\BrowserKit\Response;
	use Symfony\Component\HttpFoundation\JsonResponse;
	use Symfony\Component\HttpFoundation\Session\Session;
	
	/**
	 * Class CartController
	 *
	 * @package sil21\VitrineBundle\Controller
	 */
	class CartController extends Controller {
		
		/**
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function cartContentAction() {
			/** @var CartService $session * */
			$session = $this->container->get( 'sil21.cart.session' );
			
			$cart = $session->getCartSession();
			
			return $this->render(
				'sil21VitrineBundle:Cart:cart.html.twig', [ 'cart' => $cart ]
			);
		}
		
		/**
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse
		 */
		public function emptyCartAction() {
			/** @var CartService $session * */
			$session = $this->container->get( 'sil21.cart.session' );
			
			$cart = $session->getCartSession();
			$cart->clearCart();
			
			return $this->redirectToRoute( 'sil21_cartContent' );
		}
		
		/**
		 * @param Product $product
		 * @param         $qte
		 *
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse
		 */
		public function addArticleAction( Product $product, $qte ) {
			/** @var CartService $session * */
			$session = $this->container->get( 'sil21.cart.session' );
			
			/** @var  Cart() $cart
			 ** */
			$cart = $session->getCartSession();
			
			$added = $cart->addArticle( $product, $qte );
			if ( !$added ) {
				$this->get( 'session' )->getFlashBag()->add(
					'message', [
							 'type'    => 'warning',
							 'title'   => "Modification impossible",
							 'message' => 'Le stock de l\'article est insuffisant'
						 ]
				);
			}
			
			$session->setCartSession( $cart );
			
			return $this->redirectToRoute( 'sil21_cartContent' );
		}
		
		/**
		 * @param Product $product
		 * @param         $qte
		 *
		 * @return JsonResponse
		 */
		public function changeQutantityAction( Product $product, $qte ) {
			/** @var CartService $session * */
			$session = $this->container->get( 'sil21.cart.session' );
			
			$cart            = $session->getCartSession();
			$finalQteProduct = $cart->changeQuantity( $product, $qte );
			
			if ( $finalQteProduct == $qte ) {
				$this->get( 'session' )->getFlashBag()->add(
					'message', [
							 'type'    => 'warning',
							 'title'   => "Modification impossible",
							 'message' => 'Le stock de l\'article est insuffisant'
						 ]
				);
			}
			
			$session->setCartSession( $cart );
			
			return new JsonResponse( [ 'lastQte' => $finalQteProduct ] );
		}
		
		/**
		 * @param $articleId
		 * @param $qte
		 *
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse
		 */
		public function removeQteProductAction( $articleId, $qte ) {
			/** @var CartService $session * */
			$session = $this->container->get( 'sil21.cart.session' );
			
			$cart = $session->getCartSession();
			$cart->removeOneArticle( $articleId, $qte );
			
			$session->setCartSession( $cart );
			
			return $this->redirectToRoute( 'sil21_cartContent' );
		}
		
		/**
		 * @param $articleId
		 *
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse
		 */
		public function removeProductAction( $articleId ) {
			/** @var CartService $session * */
			$session = $this->container->get( 'sil21.cart.session' );
			
			$cart = $session->getCartSession();
			$cart->removeArticles( $articleId );
			
			$session->setCartSession( $cart );
			
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
				
				$order = new Order( $user );
				$em->persist( $order );
				$em->flush();
				
				/** @var CartService $session * */
				$session = $this->container->get( 'sil21.cart.session' );
				
				$cart = $session->getCartSession();
				foreach ( $cart->getCartItems() as $item ) {
					
					// Récupération du produit et retrait stock
					$product = $em->getRepository( 'sil21VitrineBundle:Product' )->find(
						$item[ 'product' ]->getId()
					);
					$product->setStock( $product->getStock() - $item[ 'qte' ] );
					
					// Création d'une ligne de Order
					$ligneCommande = new LigneCommande( $product, $order, $item[ 'qte' ] );
					$order->addLignecommande( $ligneCommande );
					
					$em->persist( $product );
				}
				
				$em->persist( $order );
				$em->flush();
				
				$session->setCartSession( new Cart() );
				$this->get( 'session' )->getFlashBag()->add(
					'message', [
							 'type'    => 'success',
							 'title'   => "Order effectué avec succès",
							 'message' => 'Accèdez à votre Order depuis votre espace'
						 ]
				);
				
				return $this->render(
					'sil21VitrineBundle:Cart:successValidation.html.twig',
					[
						'idCommande' => $order->getId()
					]
				);
				
			} else
				$this->redirectToRoute( 'fos_user_security_login' );
		}
	}
