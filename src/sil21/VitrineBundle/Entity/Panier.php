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
		private $products = [];
		
		
		/**
		 * @param Product $product
		 * @param         $qte
		 *
		 * @return bool
		 */
		public function addArticle( \sil21\VitrineBundle\Entity\Product $product, $qte ) {
			
			if ( key_exists( $product->getId(), $this->products )
			     && $this->products[ $product->getId() ][ 'qte' ] < $product->getStock()
			) {
				$this->products[ $product->getId() ][ 'qte' ] += $qte;
				$this->products[ $product->getId() ][ 'product' ] = $product;
				
			} elseif ( !key_exists( $product->getId(), $this->products ) && $qte <= $product->getStock() ) {
				$this->products[ $product->getId() ] = [
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
				if ( key_exists( $product->getId(), $this->products ) ) {
					$this->products[ $product->getId() ][ 'qte' ] = $qte;
					
				} else {
					$this->products[ $product->getId() ] = [
						'id'      => (int) $product->getId(),
						'product' => $product,
						'qte'     => (int) $qte
					];
				}
			}
			
			return $this->products[ $product->getId() ][ 'qte' ] ;
		}
		
		/**
		 * remove article
		 *
		 * @param string $productID
		 */
		public function removeOneArticle( $productID, $qte ) {
			if ( key_exists( $productID, $this->products ) && $this->products[ $productID ][ 'qte' ] > 1 ) {
				$this->products[ $productID ][ 'qte' ] -= $qte;
				
			} else {
				unset( $this->products[ $productID ] );
			}
		}
		
		/**
		 * remove article
		 *
		 * @param string $productID
		 */
		public function removeArticles( $productID ) {
			if ( key_exists( $productID, $this->products ) ) {
				unset( $this->products[ $productID ] );
			}
		}
		
		/**
		 *
		 */
		public function clearPanier() {
			unset( $this->products );
		}
		
		/**
		 * Get articles
		 *
		 * @return array
		 */
		public function getProducts() {
			return $this->products;
		}
		
		/**
		 * @return int
		 */
		public function getNbProduct() {
			$nb = 0;
			
			foreach ( $this->products as $product ) {
				$nb += $product[ 'qte' ];
			}
			
			return $nb;
		}
		
		public function getTotalPanier() {
			$total = 0;
			
			foreach ( $this->getProducts() as $item ) {
				$total += $item[ 'product' ]->getPrice() * $item[ 'qte' ];
			}
			
			return $total;
		}
		
	}
