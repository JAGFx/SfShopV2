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
		private $articles = [];
		
		
		/**
		 * @param Product $article
		 * @param         $qte
		 *
		 * @return bool
		 */
		public function addArticle( \sil21\VitrineBundle\Entity\Product $article, $qte ) {
			
			if ( key_exists( $article->getId(), $this->articles )
				&& $this->articles[ $article->getId() ][ 'qte' ] < $article->getStock()
			) {
				$this->articles[ $article->getId() ][ 'qte' ] += $qte;
				
			} elseif ( !key_exists( $article->getId(), $this->articles ) && $qte <= $article->getStock() ) {
				$this->articles[ $article->getId() ] = [
					'id'  => (int) $article->getId(),
					'qte' => (int) $qte
				];
				
			} else {
				return false;
			}
			
			return true;
		}
		
		/**
		 * @param Product $article
		 * @param         $qte
		 *
		 * @return bool
		 */
		public function changeQuantity( \sil21\VitrineBundle\Entity\Product $article, $qte ) {
			
			if ( $qte <= $article->getStock() ) {
				if ( key_exists( $article->getId(), $this->articles ) ) {
					$this->articles[ $article->getId() ][ 'qte' ] = $qte;
					
				} else {
					$this->articles[ $article->getId() ] = [
						'id'  => (int) $article->getId(),
						'qte' => (int) $qte
					];
				}
			} else {
				return false;
			}
			
			
			return true;
		}
		
		/**
		 * remove article
		 *
		 * @param string $articleID
		 */
		public function removeOneArticle( $articleID, $qte ) {
			if ( key_exists( $articleID, $this->articles ) && $this->articles[ $articleID ][ 'qte' ] > 1 ) {
				$this->articles[ $articleID ][ 'qte' ] -= $qte;
				
			} else {
				unset( $this->articles[ $articleID ] );
			}
		}
		
		/**
		 * remove article
		 *
		 * @param string $articleID
		 */
		public function removeArticles( $articleID ) {
			if ( key_exists( $articleID, $this->articles ) ) {
				unset( $this->articles[ $articleID ] );
			}
		}
		
		/**
		 *
		 */
		public function clearPanier() {
			unset( $this->articles );
		}
		
		/**
		 * Get articles
		 *
		 * @return array
		 */
		public function getArticles() {
			return $this->articles;
		}
		
		/**
		 * @return int
		 */
		public function getNbArticle() {
			$nb = 0;
			
			foreach ( $this->articles as $article ) {
				$nb += $article[ 'qte' ];
			}
			
			return $nb;
		}
		
	}
