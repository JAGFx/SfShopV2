<?php
	
	namespace sil21\VitrineBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * Marque
	 */
	class Marque {
		/**
		 * @var integer
		 */
		private $id;
		
		/**
		 * @var string
		 */
		private $name;
		
		/**
		 * @var \Doctrine\Common\Collections\Collection
		 */
		private $products;
		
		/**
		 * Marque constructor.
		 *
		 * @param string $name
		 */
		public function __construct( $name = null ) {
			$this->name     = $name;
			$this->products = new \Doctrine\Common\Collections\ArrayCollection();
		}
		
		
		/**
		 * Get id
		 *
		 * @return integer
		 */
		public function getId() {
			return $this->id;
		}
		
		/**
		 * Set name
		 *
		 * @param string $name
		 *
		 * @return Marque
		 */
		public function setName( $name ) {
			$this->name = $name;
			
			return $this;
		}
		
		/**
		 * Get name
		 *
		 * @return string
		 */
		public function getName() {
			return $this->name;
		}
		
		/**
		 * Add products
		 *
		 * @param \sil21\VitrineBundle\Entity\Product $products
		 *
		 * @return Marque
		 */
		public function addProduct( \sil21\VitrineBundle\Entity\Product $products ) {
			$this->products[] = $products;
			
			return $this;
		}
		
		/**
		 * Remove products
		 *
		 * @param \sil21\VitrineBundle\Entity\Product $products
		 */
		public function removeProduct( \sil21\VitrineBundle\Entity\Product $products ) {
			$this->products->removeElement( $products );
		}
		
		/**
		 * Get products
		 *
		 * @return \Doctrine\Common\Collections\Collection
		 */
		public function getProducts() {
			return $this->products;
		}
		
		function __toString() {
			return $this->name;
		}
		
		
	}
