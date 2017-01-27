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
	
	/**
	 * Class CartService
	 *
	 * @package sil21\VitrineBundle\Service
	 */
	class CartService {
		/**
		 * Name of cart in Session
		 */
		const NAME_IN_SESSION = 'cart';
		
		/**
		 * @var Session Current session
		 */
		private $session;
		
		/**
		 * CartService constructor.
		 *
		 * @param Session $session
		 */
		public function __construct( Session $session ) {
			$this->session = $session;
		}
		
		/**
		 * @return Cart The current cart store in session
		 */
		public function getCartSession() {
			return $this->session->get( self::NAME_IN_SESSION, new Cart() );
		}
		
		/**
		 * @param $cart Cart Cart to save in session
		 */
		public function setCartSession( $cart ) {
			$this->session->set( self::NAME_IN_SESSION, $cart );
		}
	}