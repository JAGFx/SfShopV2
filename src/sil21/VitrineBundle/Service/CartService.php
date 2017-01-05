<?php
	/**
	 * Created by PhpStorm.
	 *
	 * @author: SMITH Emmanuel
	 *        Date: 03/01/2017
	 *        Time: 22:27
	 */
	
	namespace sil21\VitrineBundle\Service;
	
	use sil21\VitrineBundle\Entity\Cart;
	use Symfony\Component\HttpFoundation\Session\Session as Session;
	
	class CartService {
		private $session;
		
		public function __construct( Session $session ) {
			$this->session = $session;
		}
		
		/**
		 * @return Cart
		 */
		public function getCartSession() {
			return $this->session->get( 'cart', new Cart() );
		}
		
		/**
		 * @param $cart
		 */
		public function setCartSession( $cart ) {
			$this->session->set( 'cart', $cart );
		}
	}