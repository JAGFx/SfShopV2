<?php
	
	namespace sil21\VitrineBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * Order
	 */
	class Order {
		const CMD_STATE_CHECKOUT  = 0;
		const CMD_STATE_VALIDATE  = 1;
		const CMD_STATE_PAYED     = 2;
		const CMD_STATE_DELIVERED = 3;
		
		/**
		 * @var integer
		 */
		private $id;
		
		/**
		 * @var \DateTime
		 */
		private $date;
		
		/**
		 * @var integer
		 */
		private $etat = self::CMD_STATE_CHECKOUT;
		
		/**
		 * @var \Doctrine\Common\Collections\Collection
		 */
		private $orderlines;
		
		/**
		 * @var \sil21\VitrineBundle\Entity\Client
		 */
		private $client;
		
		/**
		 * Constructor
		 */
		public function __construct( Client $client ) {
			$this->setClient( $client );
			$this->date = new \DateTime();
			$this->orderlines = new \Doctrine\Common\Collections\ArrayCollection();
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
		 * Set date
		 *
		 * @param \DateTime $date
		 *
		 * @return Order
		 */
		public function setDate( $date ) {
			$this->date = $date;
			
			return $this;
		}
		
		/**
		 * Get date
		 *
		 * @return \DateTime
		 */
		public function getDate() {
			return $this->date;
		}
		
		/**
		 * Set etat
		 *
		 * @param integer $etat
		 *
		 * @return Order
		 */
		public function setEtat( $etat ) {
			$this->etat = $etat;
			
			return $this;
		}
		
		/**
		 * Get etat
		 *
		 * @param bool $returnString
		 *
		 * @return int|string
		 */
		public function getEtat( $returnString = false ) {
			return ( $returnString )
				? Order::getStatesConstants()[ $this->etat ]
				: $this->etat;
		}
		
		/**
		 * Add lignecommandes
		 *
		 * @param \sil21\VitrineBundle\Entity\OrderLine $orderLines
		 *
		 * @return Order
		 */
		public function addOrderLines( \sil21\VitrineBundle\Entity\OrderLine $orderLines ) {
			$this->orderlines[] = $orderLines;
			
			return $this;
		}
		
		/**
		 * Remove lignecommandes
		 *
		 * @param \sil21\VitrineBundle\Entity\OrderLine $orderLines
		 */
		public function removeOrderLines( \sil21\VitrineBundle\Entity\OrderLine $orderLines ) {
			$this->orderlines->removeElement( $orderLines );
		}
		
		/**
		 * Get OrderLines
		 *
		 * @return \Doctrine\Common\Collections\Collection
		 */
		public function getOrderLines() {
			return $this->orderlines;
		}
		
		/**
		 * Set client
		 *
		 * @param \sil21\VitrineBundle\Entity\Client $client
		 *
		 * @return Order
		 */
		public function setClient( \sil21\VitrineBundle\Entity\Client $client = null ) {
			$this->client = $client;
			
			return $this;
		}
		
		/**
		 * Get client
		 *
		 * @return \sil21\VitrineBundle\Entity\Client
		 */
		public function getClient() {
			return $this->client;
		}
		
		/**
		 * Get total commande
		 *
		 * @return float
		 */
		public function getTotal(){
			$total = 0.0;
			
			foreach ( $this->getOrderLines() as $orderLine ) {
				/**
				 * @var OrderLine $orderLine
				 */
				$total += (float) $orderLine->getPrice() * $orderLine->getQte();
			}
			
			return $total;
		}
		
		public function getOrderItems() {
			$items = [];
			
			foreach ( $this->getOrderLines() as $orderLine ) {
				/**
				 * @var OrderLine $orderLine
				 */
				
				$items[] = [
					'qte'     => $orderLine->getQte(),
					'product' => $orderLine->getProduct(),
					'price'   => $orderLine->getPrice()
				];
			}
			
			return $items;
		}
		
		/**
		 * @return array
		 */
		public static function getStatesConstants() {
			return [
				self::CMD_STATE_CHECKOUT  => 'Enregistré',
				self::CMD_STATE_VALIDATE  => 'Validé',
				self::CMD_STATE_PAYED     => 'Payement reçus',
				self::CMD_STATE_DELIVERED => 'Livré'
			];
		}
	}
