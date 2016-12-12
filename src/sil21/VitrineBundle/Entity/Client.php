<?php
	
	namespace sil21\VitrineBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	use FOS\UserBundle\Model\User as BaseUser;
	
	/**
	 * Client
	 */
	class Client extends BaseUser {
		/**
		 * @var integer
		 */
		protected $id;
		
		/**
		 * @var string
		 */
		private $name;
		
		/**
		 * @var string
		 */
		protected $password;
		
		/**
		 * @var string
		 */
		private $mail;
		
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
		private $commandes;
		
		/**
		 * Constructor
		 */
		public function __construct() {
			parent::__construct();
			$this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
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
		 * Set password
		 *
		 * @param string $password
		 *
		 * @return Client
		 */
		public function setPassword( $password ) {
			$this->password = $password;
			
			return $this;
		}
		
		/**
		 * Get password
		 *
		 * @return string
		 */
		public function getPassword() {
			return $this->password;
		}
		
		/**
		 * Set mail
		 *
		 * @param string $mail
		 *
		 * @return Client
		 */
		public function setMail( $mail ) {
			$this->mail = $mail;
			
			return $this;
		}
		
		/**
		 * Get mail
		 *
		 * @return string
		 */
		public function getMail() {
			return $this->mail;
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
		 * @param \sil21\VitrineBundle\Entity\Commande $commandes
		 *
		 * @return Client
		 */
		public function addCommande( \sil21\VitrineBundle\Entity\Commande $commandes ) {
			$this->commandes[] = $commandes;
			
			return $this;
		}
		
		/**
		 * Remove commandes
		 *
		 * @param \sil21\VitrineBundle\Entity\Commande $commandes
		 */
		public function removeCommande( \sil21\VitrineBundle\Entity\Commande $commandes ) {
			$this->commandes->removeElement( $commandes );
		}
		
		/**
		 * Get commandes
		 *
		 * @return \Doctrine\Common\Collections\Collection
		 */
		public function getCommandes() {
			return $this->commandes;
		}
	}
