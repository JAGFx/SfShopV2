<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	
	class ProductController extends Controller {
		public function indexAction( $name ) {
			return $this->render( '', [ 'name' => $name ] );
		}
		
		public function listAllAction() {
			$products = $this->getDoctrine()->getRepository( 'sil21VitrineBundle:Product' )->findAll();
			
			return $this->render(
				'sil21VitrineBundle:Catalogue:listProducts.html.twig',
				[
					'filter' => [
						'name'     => 'Tous les produits',
						'products' => $products
					]
				]
			);
		}
	}
