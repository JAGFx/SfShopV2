<?php
	/**
	 * Created by PhpStorm.
	 *
	 * @author: SMITH Emmanuel
	 *        Date: 04/01/2017
	 *        Time: 20:20
	 */
	
	namespace sil21\AdminBundle\DataFixtures\ORM;
	
	use Doctrine\Common\DataFixtures\FixtureInterface;
	use Doctrine\Common\Persistence\ObjectManager;
	use sil21\VitrineBundle\Entity\Marque;
	
	class LoadMarque implements FixtureInterface {
		public function load( ObjectManager $manager ) {
			$marques = [
				[ 'id' => '1', 'Name' => 'Apple' ],
				[ 'id' => '2', 'Name' => 'Asus' ],
				[ 'id' => '3', 'Name' => 'Gigabyte' ],
				[ 'id' => '4', 'Name' => 'LG' ],
				[ 'id' => '5', 'Name' => 'Microsoft' ],
				[ 'id' => '6', 'Name' => 'MSI' ],
				[ 'id' => '7', 'Name' => 'Nitendo' ],
				[ 'id' => '8', 'Name' => 'Philips' ],
				[ 'id' => '9', 'Name' => 'Samsung' ],
				[ 'id' => '10', 'Name' => 'Sony' ],
				[ 'id' => '12', 'Name' => 'Sans marque' ]
			];
			
			
			foreach ( $marques as $marqueBDD ) {
				$marque = new Marque( $marqueBDD[ 'Name' ] );
				$manager->persist( $marque );
			}
			
			$manager->flush();
		}
	}