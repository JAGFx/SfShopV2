<?php
	/**
	 * Created by PhpStorm.
	 *
	 * @author: SMITH Emmanuel
	 *        Date: 03/01/2017
	 *        Time: 22:27
	 */
	
	namespace sil21\VitrineBundle\Service;
	
	
	use sil21\VitrineBundle\Entity\Panier;
	use Symfony\Component\HttpFoundation\Session\Session as Session;
	
	class CartService {
		private $session;
		
		public function __construct( Session $session ) {
			$this->session = $session;
		}
		
		/**
		 * @return Panier
		 */
		public function getSessionPanier() {
			return $this->session->get( 'panier', new Panier() );
		}
		
		/**
		 * @param $panier
		 */
		public function setSessionPanier( $panier ) {
			$this->session->set( 'panier', $panier );
		}
	}