<?php
	
	namespace sil21\VitrineBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	use Symfony\Component\HttpFoundation\File\File;
	
	/**
	 * Product
	 */
	class Product implements \Serializable {
		
		/**
		 * @var integer
		 */
		private $id;
		
		/**
		 * @var string
		 */
		private $name;
		
		/**
		 * @var float
		 */
		private $price;
		
		/**
		 * @var float
		 */
		private $savedAmount = 0.0;
		
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
		 * @var File
		 */
		private $image;
		
		/**
		 * @var string
		 */
		private $imageName;
		
		
		/**
		 * Get id
		 *
		 * @return integer
		 */
		public function getId() {
			return $this->id;
		}
		
		/**
		 * @param $id
		 *
		 * @return $this
		 */
		public function setId( $id ) {
			$this->id = $id;
			
			return $this;
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
		 * Set price
		 *
		 * @param float $price
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
		 * @return float
		 */
		public function getPrice() {
			return $this->price;
		}
		
		public function getPriceSavedAmount() {
			return ( $this->savedAmount > 0 )
				? $this->getPrice() - ( $this->getPrice() * $this->savedAmount )
				: $this->getPrice();
		}
		
		/**
		 * @return float
		 */
		public function getSavedAmount() {
			return $this->savedAmount;
		}
		
		/**
		 * @param float $savedAmount
		 *
		 * @return $this
		 */
		public function setSavedAmount( $savedAmount ) {
			$this->savedAmount = $savedAmount;
			
			return $this;
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
		
		/**
		 * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
		 * of 'UploadedFile' is injected into this setter to trigger the  update. If this
		 * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
		 * must be able to accept an instance of 'File' as the bundle will inject one here
		 * during Doctrine hydration.
		 *
		 * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
		 *
		 * @return Product
		 */
		public function setImage( File $image = null ) {
			$this->image = $image;
			
			return $this;
		}
		
		/**
		 * @return File|null
		 */
		public function getImage() {
			return $this->image;
		}
		
		/**
		 * Set imageName
		 *
		 * @param string $imageName
		 *
		 * @return Product
		 */
		public function setImageName( $imageName ) {
			$this->imageName = $imageName;
			
			return $this;
		}
		
		/**
		 * Get imageName
		 *
		 * @return string
		 */
		public function getImageName() {
			return $this->imageName;
		}
		
		public function serialize() {
			return serialize(
				[
					$this->id,
					$this->name,
					$this->imageName,
					$this->price,
					$this->savedAmount,
					$this->stock,
					$this->description
				]
			);
		}
		
		public function unserialize( $serialized ) {
			list(
				$this->id,
				$this->name,
				$this->imageName,
				$this->price,
				$this->savedAmount,
				$this->stock,
				$this->description
				) = unserialize( $serialized );
		}
		
		
	}
