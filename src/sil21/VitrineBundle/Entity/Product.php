<?php
	
	namespace sil21\VitrineBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * Product
	 */
	class Product {
		/**
		 * @var integer
		 */
		private $id;
		
		/**
		 * @var string
		 */
		private $name;
		
		/**
		 * @var string
		 */
		private $image;
		
		/**
		 * @var string
		 */
		private $price;
		
		/**
		 * @var integer
		 */
		private $stock = 0;
		
		/**
		 * @var string
		 */
		private $description;
		
		/**
		 * @var \sil21\VitrineBundle\Entity\Category
		 */
		private $category;
		
		/**
		 * @var \sil21\VitrineBundle\Entity\Brand
		 */
		private $brand;
		
		
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
		 * @return Product
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
		 * Set image
		 *
		 * @param string $image
		 *
		 * @return Product
		 */
		public function setImage( $image = null ) {
			$this->image = $image;
			
			return $this;
		}
		
		/**
		 * Get image
		 *
		 * @return string
		 */
		public function getImage() {
			return $this->image;
		}
		
		/**
		 * Set price
		 *
		 * @param string $price
		 *
		 * @return Product
		 */
		public function setPrice( $price ) {
			$this->price = $price;
			
			return $this;
		}
		
		/**
		 * Get price
		 *
		 * @return string
		 */
		public function getPrice() {
			return $this->price;
		}
		
		/**
		 * Set stock
		 *
		 * @param integer $stock
		 *
		 * @return Product
		 */
		public function setStock( $stock ) {
			$this->stock = $stock;
			
			return $this;
		}
		
		/**
		 * Get stock
		 *
		 * @return integer
		 */
		public function getStock() {
			return $this->stock;
		}
		
		/**
		 * @return bool
		 */
		public function onStock() {
			return ( $this->getStock() > 0 ) ? true : false;
		}
		
		/**
		 * Set description
		 *
		 * @param string $description
		 *
		 * @return Product
		 */
		public function setDescription( $description ) {
			$this->description = $description;
			
			return $this;
		}
		
		/**
		 * Get description
		 *
		 * @return string
		 */
		public function getDescription() {
			return $this->description;
		}
		
		/**
		 * Set category
		 *
		 * @param \sil21\VitrineBundle\Entity\Category $category
		 *
		 * @return Product
		 */
		public function setCategory( \sil21\VitrineBundle\Entity\Category $category = null ) {
			$this->category = $category;
			
			return $this;
		}
		
		/**
		 * Get category
		 *
		 * @return \sil21\VitrineBundle\Entity\Category
		 */
		public function getCategory() {
			return $this->category;
		}
		
		/**
		 * Set Brand
		 *
		 * @param \sil21\VitrineBundle\Entity\Brand $brand
		 *
		 * @return Product
		 */
		public function setBrand( \sil21\VitrineBundle\Entity\Brand $brand = null ) {
			$this->brand = $brand;
			
			return $this;
		}
		
		/**
		 * Get Brand
		 *
		 * @return \sil21\VitrineBundle\Entity\Brand
		 */
		public function getBrand() {
			return $this->brand;
		}
	}
