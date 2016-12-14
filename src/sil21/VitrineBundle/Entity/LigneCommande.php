<?php
	
	namespace sil21\VitrineBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * LigneCommande
	 */
	class LigneCommande {
		/**
		 * @var integer
		 */
		private $qte;
		
		/**
		 * @var \sil21\VitrineBundle\Entity\Product
		 */
		private $product;
		
		/**
		 * @var \sil21\VitrineBundle\Entity\Commande
		 */
		private $commande;
		
		/**
		 * LigneCommande constructor.
		 *
		 * @param Product  $product
		 * @param Commande $commande
		 * @param integer  $qte
		 */
		public function __construct( Product $product, Commande $commande, $qte = 1 ) {
			$this->qte = $qte;
			$this->product = $product;
			$this->commande = $commande;
		}
		
		
		/**
		 * Set qte
		 *
		 * @param integer $qte
		 *
		 * @return LigneCommande
		 */
		public function setQte( $qte ) {
			$this->qte = $qte;
			
			return $this;
		}
		
		/**
		 * Get qte
		 *
		 * @return integer
		 */
		public function getQte() {
			return $this->qte;
		}
		
		/**
		 * Get prix
		 *
		 * @return float
		 */
		public function getPrix() {
			return $this->qte * $this->product->getPrice();
		}
		
		/**
		 * Set product
		 *
		 * @param \sil21\VitrineBundle\Entity\Product $product
		 *
		 * @return LigneCommande
		 */
		public function setProduct( \sil21\VitrineBundle\Entity\Product $product ) {
			$this->product = $product;
			
			return $this;
		}
		
		/**
		 * Get product
		 *
		 * @return \sil21\VitrineBundle\Entity\Product
		 */
		public function getProduct() {
			return $this->product;
		}
		
		/**
		 * Set Commande
		 *
		 * @param \sil21\VitrineBundle\Entity\Commande $commande
		 *
		 * @return LigneCommande
		 */
		public function setCommande( \sil21\VitrineBundle\Entity\Commande $commande ) {
			$this->commande = $commande;
			
			return $this;
		}
		
		/**
		 * Get Commande
		 *
		 * @return \sil21\VitrineBundle\Entity\Commande
		 */
		public function getCommande() {
			return $this->commande;
		}
	}
