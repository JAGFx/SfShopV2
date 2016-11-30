<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	
	class CategoryController extends Controller {
		public function indexAction( $name ) {
			return $this->render( '', [ 'name' => $name ] );
		}
	}
