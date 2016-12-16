<?php
	
	namespace sil21\VitrineBundle\Controller;
	
	use FOS\UserBundle\Controller\ProfileController as BaseController;
	
	class ClientController extends BaseController {
		public function indexAction() {
			$userManager = $this->container->get( 'fos_user.user_manager' );
			$listClients = $userManager->findUsers();
			
			return $this->container->get( 'templating' )->renderResponse(
				'sil21VitrineBundle:Client:list.html.twig',
				[ 'listClients' => $listClients ]
			);
		}
	}
