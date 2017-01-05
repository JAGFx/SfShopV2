<?php
	/**
	 * Created by PhpStorm.
	 *
	 * @author: SMITH Emmanuel
	 *        Date: 04/01/2017
	 *        Time: 20:13
	 */
	
	namespace sil21\AdminBundle\DataFixtures\ORM;
	
	use Doctrine\Common\DataFixtures\FixtureInterface;
	use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
	use Doctrine\Common\Persistence\ObjectManager;
	use sil21\VitrineBundle\Entity\Category;
	
	class LoadCategory implements FixtureInterface, OrderedFixtureInterface {
		/**
		 * @return int
		 */
		public function getOrder() {
			return 1;
		}
		
		
		public function load( ObjectManager $manager ) {
			$catBDD = [
				[ 'id' => '1', 'name' => 'Informatique' ],
				[ 'id' => '2', 'name' => 'Jeux & Console' ],
				[ 'id' => '3', 'name' => 'Téléphonie' ],
				[ 'id' => '4', 'name' => 'Images & Son' ]
			];
			
			foreach ( $catBDD as $categoryBDD ) {
				$category = new Category( $categoryBDD[ 'name' ] );
				$manager->persist( $category );
			}
			
			$manager->flush();
		}
	}