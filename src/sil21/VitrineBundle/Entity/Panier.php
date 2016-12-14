<?php
	
	/*
	 * Fichier : Panier.php
	 * Auteur: SMITH Emmanuel
	 *
	 * Entitée Panier
	 */
	
	namespace sil21\VitrineBundle\Entity;
	
	/**
	 * Panier
	 */
	/**
	 * Class Panier
	 *
	 * @package sil21\VitrineBundle\Entity
	 */
	class Panier {
		
		/**
		 * @var array
		 */
		private $cartItems = [];
		
		
		/**
		 * @param Product $product
		 * @param         $qte
		 *
		 * @return bool
		 */
		public function addArticle( \sil21\VitrineBundle\Entity\Product $product, $qte ) {
			
			if ( key_exists( $product->getId(), $this->cartItems )
			     && $this->cartItems[ $product->getId() ][ 'qte' ] < $product->getStock()
			) {
				$this->cartItems[ $product->getId() ][ 'qte' ] += $qte;
				$this->cartItems[ $product->getId() ][ 'product' ] = $product;
				
			} elseif ( !key_exists( $product->getId(), $this->cartItems ) && $qte <= $product->getStock() ) {
				$this->cartItems[ $product->getId() ] = [
					'id'      => (int) $product->getId(),
					'product' => $product,
					'qte'     => (int) $qte
				];
				
			} else {
				return false;
			}
			
			return true;
		}
		
		/**
		 * @param Product $product
		 * @param         $qte
		 *
		 * @return bool
		 */
		public function changeQuantity( \sil21\VitrineBundle\Entity\Product $product, $qte ) {
			if ( $qte <= $product->getStock() ) {
				if ( key_exists( $product->getId(), $this->cartItems ) ) {
					$this->cartItems[ $product->getId() ][ 'qte' ] = $qte;
					
				} else {
					$this->cartItems[ $product->getId() ] = [
						'id'      => (int) $product->getId(),
						'product' => $product,
						'qte'     => (int) $qte
					];
				}
			}
			
			return $this->cartItems[ $product->getId() ][ 'qte' ] ;
		}
		
		/**
		 * remove article
		 *
		 * @param string $productID
		 */
		public function removeOneArticle( $productID, $qte ) {
			if ( key_exists( $productID, $this->cartItems ) && $this->cartItems[ $productID ][ 'qte' ] > 1 ) {
				$this->cartItems[ $productID ][ 'qte' ] -= $qte;
				
			} else {
				unset( $this->cartItems[ $productID ] );
			}
		}
		
		/**
		 * remove article
		 *
		 * @param string $productID
		 */
		public function removeArticles( $productID ) {
			if ( key_exists( $productID, $this->cartItems ) ) {
				unset( $this->cartItems[ $productID ] );
			}
		}
		
		/**
		 *
		 */
		public function clearPanier() {
			unset( $this->cartItems );
		}
		
		/**
		 * Get articles
		 *
		 * @return array
		 */
		public function getCartItems() {
			return $this->cartItems;
		}
		
		/**
		 * @return int
		 */
		public function getNbProduct() {
			$nb = 0;
			
			foreach ( $this->cartItems as $product ) {
				$nb += $product[ 'qte' ];
			}
			
			return $nb;
		}
		
		public function getTotalPanier() {
			$total = 0;
			
			foreach ( $this->getCartItems() as $item ) {
				$total += $item[ 'product' ]->getPrice() * $item[ 'qte' ];
			}
			
			return $total;
		}
		
	}
