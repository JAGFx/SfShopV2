<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use FOS\UserBundle\Controller\RegistrationController as BaseController;
	
	class ClientController extends BaseController {
		public function indexAction( $name ) {
			return $this->render( '', [ 'name' => $name ] );
		}
	}
