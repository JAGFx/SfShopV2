<?php
	/**
	 * Created by PhpStorm.
	 *
	 * @author: SMITH Emmanuel
	 *        Date: 17/01/2017
	 *        Time: 20:45
	 */
	
	namespace sil21\VitrineBundle\Controller;
	
	use FOS\UserBundle\Controller\RegistrationController as BaseController;
	use Symfony\Component\HttpFoundation\RedirectResponse;
	
	class RegistrationController extends BaseController {
		public function registerAction() {
			$security = $this->container->get( 'security.authorization_checker' );
			
			return ( $security->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
				? new RedirectResponse(
					$this->container->get( 'router' )->generate( 'fos_user_profile_show' )
				)
				: parent::registerAction();
		}
		
	}