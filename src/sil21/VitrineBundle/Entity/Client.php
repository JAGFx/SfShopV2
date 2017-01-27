<?php
	
	namespace sil21\VitrineBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	use FOS\UserBundle\Entity\User as BaseUser;
	
	/**
	 * Client
	 */
	class Client extends BaseUser {
		
		
		/**
		 * @var string
		 */
		private $name;
		
		/**
		 * @var string
		 */
		private $firstname;
		
		/**
		 * @var string
		 */
		private $address;
		
		/**
		 * @var string
		 */
		private $tel;
		
		/**
		 * @var \DateTime
		 */
		private $dateBirthday;
		
		/**
		 * @var \Doctrine\Common\Collections\Collection
		 */
		private $orders;
		
		/**
		 * Constructor
		 */
		public function __construct() {
			parent::__construct();
			$this->orders = new \Doctrine\Common\Collections\ArrayCollection();
		}
		
		/**
		 * Set name
		 *
		 * @param string $name
		 *
		 * @return Client
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
		 * Set address
		 *
		 * @param string $address
		 *
		 * @return Client
		 */
		public function setAddress( $address ) {
			$this->address = $address;
			
			return $this;
		}
		
		/**
		 * Get address
		 *
		 * @return string
		 */
		public function getAddress() {
			return $this->address;
		}
		
		/**
		 * Set tel
		 *
		 * @param string $tel
		 *
		 * @return Client
		 */
		public function setTel( $tel ) {
			$this->tel = $tel;
			
			return $this;
		}
		
		/**
		 * Get tel
		 *
		 * @return string
		 */
		public function getTel() {
			return $this->tel;
		}
		
		/**
		 * Set dateBirthday
		 *
		 * @param \DateTime $dateBirthday
		 *
		 * @return Client
		 */
		public function setDateBirthday( $dateBirthday ) {
			$this->dateBirthday = $dateBirthday;
			
			return $this;
		}
		
		/**
		 * Get dateBirthday
		 *
		 * @return \DateTime
		 */
		public function getDateBirthday() {
			return $this->dateBirthday;
		}
		
		/**
		 * Add commandes
		 *
		 * @param \sil21\VitrineBundle\Entity\Order $orders
		 *
		 * @return Client
		 */
		public function addOrder( \sil21\VitrineBundle\Entity\Order $orders ) {
			$this->orders[] = $orders;
			
			return $this;
		}
		
		/**
		 * Remove commandes
		 *
		 * @param \sil21\VitrineBundle\Entity\Order $orders
		 */
		public function removeOrder( \sil21\VitrineBundle\Entity\Order $orders ) {
			$this->orders->removeElement( $orders );
		}
		
		/**
		 * Get commandes
		 *
		 * @return \Doctrine\Common\Collections\Collection
		 */
		public function getOrders() {
			return $this->orders;
		}
		
		/**
		 * Set firstname
		 *
		 * @param string $firstname
		 *
		 * @return Client
		 */
		public function setFirstname( $firstname ) {
			$this->firstname = $firstname;
			
			return $this;
		}
		
		/**
		 * Get firstname
		 *
		 * @return string
		 */
		public function getFirstname() {
			return $this->firstname;
		}
		
		/**
		 * @return string
		 */
		public function __toString() {
			return $this->firstname . ' ' . $this->name . ' <' . $this->email . '>';
		}
	}
