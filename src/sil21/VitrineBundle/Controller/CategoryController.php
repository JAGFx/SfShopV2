<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Category;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	
	class CategoryController extends Controller {
		public function indexAction() {
			$categories = $this->getDoctrine()->getRepository( 'sil21VitrineBundle:Category' )->findAll();
			
			return $this->render(
				'listCategories.html.twig', [ 'categories' => $categories ]
			);
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
		
		public function listAction() {
			$categories = $this->getDoctrine()->getRepository( 'sil21VitrineBundle:Category' )->findAll();
			
			return $this->render(
				'sil21VitrineBundle:Category:listCategories.html.twig', [ 'categories' => $categories ]
			);
		}
	}
