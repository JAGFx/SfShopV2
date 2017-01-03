<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Product;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	
	/**
	 * Product controller.
	 *
	 */
	class ProductController extends Controller {
		
		public function listAllAction() {
			$products = $this->getDoctrine()->getRepository( 'sil21VitrineBundle:Product' )->findAll();
			
			return $this->render(
				'sil21VitrineBundle:Catalogue:listProducts.html.twig',
				[
					'name'     => 'Produits',
					'products' => $products
				]
			);
		}
	}
