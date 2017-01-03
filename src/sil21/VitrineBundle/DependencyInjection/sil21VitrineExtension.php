<?php
	/**
	 * Created by PhpStorm.
	 *
	 * @author: SMITH Emmanuel
	 *        Date: 03/01/2017
	 *        Time: 22:44
	 */
	
	namespace sil21\VitrineBundle\DependencyInjection;
	
	use Symfony\Component\DependencyInjection\ContainerBuilder;
	use Symfony\Component\Config\FileLocator;
	use Symfony\Component\HttpKernel\DependencyInjection\Extension;
	use Symfony\Component\DependencyInjection\Loader;
	
	class sil21VitrineExtension extends Extension {
		public function load( array $configs, ContainerBuilder $container ) {
			$loader = new Loader\YamlFileLoader(
				$container, new FileLocator( __DIR__ . '/../Resources/config' )
			);
			$loader->load( 'services.yml' );
		}
	}