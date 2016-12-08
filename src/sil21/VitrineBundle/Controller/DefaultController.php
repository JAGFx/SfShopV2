<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	
	class DefaultController extends Controller {
		public function indexAction() {
			$listProductPop = $this->getDoctrine()->getManager()
					       ->getRepository( 'sil21VitrineBundle:Product' )
					       ->findAllBetterSales();
			
			return $this->render(
				'sil21VitrineBundle:Default:index.html.twig', [
				'listProductPop' => $listProductPop
			]
			);
		}
		
		public function mentionsAction() {
			return $this->render( '@sil21Vitrine/Default/mentions.html.twig' );
		}
	}
