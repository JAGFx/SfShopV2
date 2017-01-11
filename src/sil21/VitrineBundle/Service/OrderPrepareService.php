<?php
	/**
	 * Created by PhpStorm.
	 * User: SMITHE
	 * Date: 11-Jan-17
	 * Time: 9:10
	 */
	
	namespace sil21\VitrineBundle\Service;
	
	
	use Symfony\Component\HttpFoundation\Session\Session;
	
	class OrderPrepareService {
		const NAME_IN_SESSION = 'op';
		
		const OP_STEP_DELIVERY = 0;
		const OP_STEP_PAYMENT = 1;
		const OP_STEP_VALIDATED = 2;
		
		/**
		 * @var Session
		 */
		private $_session;
		
		/**
		 * @var int
		 */
		private $_step;
		
		/**
		 * @var string
		 */
		private $_deliveryAddress;
		
		/**
		 * @var string
		 */
		private $_paymentAddress;
		
		/**
		 * OrderPrepareService constructor.
		 *
		 * @param Session $_session
		 */
		public function __construct( Session $_session ) {
			$this->_session = $_session;
		}
		
		/**
		 * @return int
		 */
		public function getStep() {
			return $this->_step;
		}
		
		/**
		 * @return string
		 */
		public function getDeliveryAddress() {
			return $this->_deliveryAddress;
		}
		
		/**
		 * @return string
		 */
		public function getPaymentAddress() {
			return $this->_paymentAddress;
		}
		
		public function nextStep() {
			switch ( $this->_step ) {
				case self::OP_STEP_DELIVERY:
					break;
				
				case self::OP_STEP_PAYMENT:
					break;
				
				case self::OP_STEP_VALIDATED:
					break;
			}
		}
		
		public function onStepValidation(){
			return $this->_step === self::OP_STEP_VALIDATED;
		}
		
		
		public function getOrderPrepareSession() {
			return $this->_session->get( self::NAME_IN_SESSION, $this );
		}
		
		
		public function setOrderPrepareSession() {
			$this->_session->set( self::NAME_IN_SESSION, $this );
		}
		
	}