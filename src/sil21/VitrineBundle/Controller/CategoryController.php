<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Category;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	
	class CategoryController extends Controller {
		public function indexAction( $name ) {
			return $this->render( '', [ 'name' => $name ] );
		}
		
		/**
		 * @param \sil21\VitrineBundle\Entity\Category $category
		 *
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function articlesByCategoryAction( Category $category ) {
			return $this->render(
				'sil21VitrineBundle:Catalogue:listProducts.html.twig',
				[
					'filter' => $category
				]
			);
		}
	}
