<?php
	
	namespace VitrineBundle\Controller;
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	
	class DefaultController extends Controller {
		public function indexAction() {
			return $this->render( 'VitrineBundle:Default:index.html.twig' );
		}
	}
