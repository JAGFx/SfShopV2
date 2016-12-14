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
		 * @var integer
		 */
		private $price;
		
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
			$this->qte      = $qte;
			$this->product  = $product;
			$this->commande = $commande;
			$this->price    = $product->getPrice() * $qte;
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
		 * Set price
		 *
		 * @param integer $price
		 *
		 * @return LigneCommande
		 */
		public function setPrice( $price ) {
			$this->price = $price;
			
			return $this;
		}
		
		/**
		 * Get price
		 *
		 * @return integer
		 */
		public function getPrice() {
			return $this->price;
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
