<?php
	
	namespace sil21\VitrineBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * LigneCommande
	 */
	class OrderLine {
		/**
		 * @var integer
		 */
		private $qte;
		
		/**
		 * @var float
		 */
		private $price;
		
		/**
		 * @var \sil21\VitrineBundle\Entity\Product
		 */
		private $product;
		
		/**
		 * @var \sil21\VitrineBundle\Entity\Order
		 */
		private $order;
		
		/**
		 * LigneCommande constructor.
		 *
		 * @param Product $product
		 * @param Order   $order
		 * @param integer $qte
		 */
		public function __construct( Product $product, Order $order, $qte = 1 ) {
			$this->qte      = $qte;
			$this->product  = $product;
			$this->order = $order;
			$this->price    = $product->getPriceSavedAmout() * $qte;
		}
		
		
		/**
		 * Set qte
		 *
		 * @param integer $qte
		 *
		 * @return OrderLine
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
		 * @param float $price
		 *
		 * @return OrderLine
		 */
		public function setPrice( $price ) {
			$this->price = $price;
			
			return $this;
		}
		
		/**
		 * Get price
		 *
		 * @return float
		 */
		public function getPrice() {
			return $this->price;
		}
		
		
		/**
		 * Set product
		 *
		 * @param \sil21\VitrineBundle\Entity\Product $product
		 *
		 * @return OrderLine
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
		 * Set Order
		 *
		 * @param \sil21\VitrineBundle\Entity\Order $order
		 *
		 * @return OrderLine
		 */
		public function setOrder( \sil21\VitrineBundle\Entity\Order $order ) {
			$this->order = $order;
			
			return $this;
		}
		
		/**
		 * Get Order
		 *
		 * @return \sil21\VitrineBundle\Entity\Order
		 */
		public function getOrder() {
			return $this->order;
		}
		
		
	}
