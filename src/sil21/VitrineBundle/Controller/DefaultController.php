<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	
	class DefaultController extends Controller {
		public function indexAction() {
			return $this->redirectToRoute( 'product_list' );
		}
		
		public function mentionsAction() {
			return $this->render( '@sil21Vitrine/Default/mentions.html.twig' );
		}
	}
