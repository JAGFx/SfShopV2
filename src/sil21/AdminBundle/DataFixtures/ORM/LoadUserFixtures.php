<?php
	/**
	 * Created by PhpStorm.
	 *
	 * @author: SMITH Emmanuel
	 *        Date: 04/01/2017
	 *        Time: 20:30
	 */
	
	namespace sil21\AdminBundle\DataFixtures\ORM;
	
	use Doctrine\Common\DataFixtures\AbstractFixture;
	use Doctrine\Common\Persistence\ObjectManager;
	use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
	use sil21\VitrineBundle\Entity\Client;
	use Symfony\Component\DependencyInjection\ContainerAwareInterface;
	use Symfony\Component\DependencyInjection\ContainerInterface;
	
	class LoadUser extends AbstractFixture
		implements OrderedFixtureInterface, ContainerAwareInterface {
		/**
		 * @var ContainerInterface $container
		 */
		private $container;
		
		/**
		 * {@inheritDoc}
		 */
		public function setContainer( ContainerInterface $container = null ) {
			$this->container = $container;
		}
		
		/**
		 * Get the order of this fixture
		 *
		 * @return integer
		 */
		public function getOrder() {
			return 4;
		}
		
		public function load( ObjectManager $manager ) {
			$users = [
				[
					'username'      => 'smithe',
					'name'          => 'SMITH',
					'firstname'     => 'Emmanuel',
					'password'      => 'pswd',
					'address'       => '11b rue jean pain',
					'tel'           => '0620133854',
					'date_birthday' => '1995-08-14 00:00:00',
					'email'         => 'azertyuiop35@gmail.com',
					'enabled'       => '1',
					'roles'         => 'ROLE_ADMIN'
				],
				[
					'username'      => 'esmith',
					'name'          => 'MARMI',
					'firstname'     => 'Plop',
					'password'      => 'pswd',
					'address'       => '77 avenue du plond',
					'tel'           => '0123654789',
					'date_birthday' => '1978-03-20 00:00:00',
					'email'         => 'aq@ss.ss',
					'enabled'       => '1',
					'roles'         => ''
				]
			];
			
			$userManager = $this->container->get( 'fos_user.user_manager' );
			
			foreach ( $users as $userBDD ) {
				
				/**
				 * @var  Client $user
				 */
				$user = $userManager->createUser();
				$user->setUsername( $userBDD[ 'username' ] )
				     ->setName( $userBDD[ 'name' ] )
				     ->setFirstname( $userBDD[ 'firstname' ] )
				     ->setAddress( $userBDD[ 'address' ] )
				     ->setTel( $userBDD[ 'tel' ] )
				     ->setDateBirthday( new \DateTime( $userBDD[ 'date_birthday' ] ) )
				     ->setPlainPassword( $userBDD[ 'password' ] )
				     ->setEnabled( $userBDD[ 'enabled' ] )
				     ->setEmail( $userBDD[ 'email' ] );
				
				if ( !empty( $userBDD[ 'roles' ] ) )
					$user->addRole( $userBDD[ 'roles' ] );
				
				$userManager->updateUser( $user );
			}
		}
	}