<?php
	/**
	 * Created by PhpStorm.
	 *
	 * @author: SMITH Emmanuel
	 *        Date: 17/01/2017
	 *        Time: 20:23
	 */
	
	namespace sil21\VitrineBundle\Controller;
	
	use FOS\UserBundle\Controller\SecurityController as BaseSecurityController;
	use Symfony\Component\HttpFoundation\RedirectResponse;
	
	class SecurityController extends BaseSecurityController {
		protected function renderLogin( array $data ) {
			$security = $this->container->get( 'security.authorization_checker' );
			
			return ( $security->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
				? new RedirectResponse(
					$this->container->get( 'router' )->generate( 'fos_user_profile_show' )
				)
				: parent::renderLogin( $data );
			
		}
		
	}