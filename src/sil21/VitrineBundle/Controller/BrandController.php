<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Brand;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	
	/**
	 * Brand controller.
	 *
	 */
	class BrandController extends Controller {
				
		public function listAction() {
			$brands = $this->getDoctrine()->getRepository( 'sil21VitrineBundle:Brand' )->findAll();
			
			return $this->render(
				'sil21VitrineBundle:Brand:listBrand.html.twig', [ 'brands' => $brands ]
			);
		}
		
		/**
		 * @param \sil21\VitrineBundle\Entity\Brand $brand
		 *
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function articlesByBrandAction( Brand $brand ) {
			return $this->render(
				'sil21VitrineBundle:Catalogue:listProducts.html.twig',
				[
					'name'     => $brand->getName(),
					'products' => $brand->getProducts()
				]
			);
		}
	}
