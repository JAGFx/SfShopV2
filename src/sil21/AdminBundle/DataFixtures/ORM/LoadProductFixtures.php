<?php
	/**
	 * Created by PhpStorm.
	 *
	 * @author: SMITH Emmanuel
	 *        Date: 04/01/2017
	 *        Time: 20:23
	 */
	
	namespace sil21\AdminBundle\DataFixtures\ORM;
	
	use Doctrine\Common\DataFixtures\FixtureInterface;
	use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
	use Doctrine\Common\Persistence\ObjectManager;
	use sil21\VitrineBundle\Entity\Product;
	
	class LoadProduct implements FixtureInterface, OrderedFixtureInterface {
		public function getOrder() {
			return 3;
		}
		
		
		public function load( ObjectManager $manager ) {
			$products = [
				[
					'id'          => '1',
					'category_id' => '1',
					'marque_id'   => '3',
					'name'        => 'Gigabyte P35X v5 C4KW10-FR',
					'image'       => '1.jpeg',
					'price'       => '2449.95',
					'stock'       => '3',
					'saved_amout' => "0.1",
					'description' => 'Profitez de hautes performances avec le PC portable Gigabyte P35X v5 ! Grâce à son écran IPS de 15.6" avec résolution Ultra HD et ses composants ultra-performants, cet ordinateur portable Gigabyte offre une haute qualité audio/vidéo. Un achat idéal pour le jeu et le multimédia !'
				],
				[
					'id'          => '2',
					'category_id' => '1',
					'marque_id'   => '6',
					'name'        => 'MSI GS60 2QC-002XFR Ghost Gold',
					'image'       => '2.jpeg',
					'price'       => '1149.95',
					'stock'       => '3',
					'saved_amout' => "0",
					'description' => 'Profitez de hautes performances mobiles avec le PC portable MSI GS60 2QC-002XFR Ghost Gold. Malgré son incroyable finesse, inférieure à 20 mm, cet ordinateur portable MSI est ultra puissant et offre une haute qualité audio/vidéo ! Un achat idéal pour le divertissement numérique mobile !'
				],
				[
					'id'          => '3',
					'category_id' => '1',
					'marque_id'   => '2',
					'name'        => 'ASUS G501JW-CN466T',
					'image'       => '3.jpeg',
					'price'       => '1499.95',
					'stock'       => '0',
					'saved_amout' => "0",
					'description' => 'Le PC portable ASUS G501 est conçu pour les joueurs nomades. Mince et léger, il assure un divertissement de qualité partout où vous allez. Grâce à ses composants performants, son écran Full HD et son système audio de qualité, il offre une excellente expérience de divertissement mobile.'
				],
				[
					'id'          => '4',
					'category_id' => '1',
					'marque_id'   => '2',
					'name'        => 'ASUS G552VX-DM088T',
					'image'       => '4.jpeg',
					'price'       => '999.95',
					'stock'       => '1',
					'saved_amout' => "0",
					'description' => 'Profitez de bonnes performances de jeu avec le PC portable Gamer ASUS G552VX ! Boostez vos performances grâce à ses composants de qualité et améliorez votre confort de jeu grâce à son superbe écran Full HD et son clavier chiclet rétroéclairé.'
				],
				[
					'id'          => '5',
					'category_id' => '1',
					'marque_id'   => '6',
					'name'        => 'MSI GE62 6QF-095FR Apache Pro',
					'image'       => '5.jpeg',
					'price'       => '1849.95',
					'stock'       => '1',
					'saved_amout' => "0.05",
					'description' => 'Profitez d\'excellentes performances en faisant l\'achat du PC portable MSI GE62 6QF Apache Pro ! Conçu pour les gamers, cet ordinateur portable MSI offre un parfait confort de jeu grâce à son écran de 15.6" Full HD, son système audio Dynaudio et son clavier Gamer rétro-éclairé multicolore.'
				],
				[
					'id'          => '6',
					'category_id' => '2',
					'marque_id'   => '5',
					'name'        => 'Microsoft Xbox One',
					'image'       => '6.jpeg',
					'price'       => '399.95',
					'stock'       => '0',
					'saved_amout' => "0",
					'description' => 'Xbox One a été conçue par des gamers, pour les gamers et vous propose une expérience de jeux et de divertissements comme jamais vous n\'en avez vécue. Grace à l\'équilibre parfait entre la puissance et la performance, cette nouvelle Xbox amène le jeu à un tout autre niveau.'
				],
				[
					'id'          => '7',
					'category_id' => '2',
					'marque_id'   => '10',
					'name'        => 'Sony PlayStation 4 (1 To)',
					'image'       => '7.jpeg',
					'price'       => '399.95',
					'stock'       => '0',
					'saved_amout' => "0",
					'description' => 'La PlayStation 4 est une console de choix pour profiter d\'expériences vidéoludiques dynamiques, connectées, rapides et aux graphismes incroyables. Ses contenus sont d\'une richesse inouïe et ses expériences de jeu plus prenantes que jamais.'
				],
				[
					'id'          => '8',
					'category_id' => '2',
					'marque_id'   => '10',
					'name'        => 'Sony Playstation 3 Ultra Slim',
					'image'       => '8.jpeg',
					'price'       => '199.95',
					'stock'       => '0',
					'saved_amout' => "0",
					'description' => 'Incarnant le meilleur du jeu vidéo et du divertissement à domicile, la PlayStation 3 procure des expériences résolument inédites pour toute la famille. Lancez-vous dans des aventures incroyables, regardez des films en Haute Définition, plongez au coeur d\'un univers de divertissement complet !'
				],
				[
					'id'          => '9',
					'category_id' => '2',
					'marque_id'   => '7',
					'name'        => 'Nintendo New 3DS XL (bleue)',
					'image'       => '9.jpeg',
					'price'       => '199.95',
					'stock'       => '2',
					'saved_amout' => "0",
					'description' => 'Proposant de nouvelles possibilités de personnalisation, une nouvelle rapidité, de nouvelles commandes et un nouvel affichage en 3D, la Nintendo New 3DS XL vous offre une toute nouvelle expérience de jeu !'
				],
				[
					'id'          => '10',
					'category_id' => '2',
					'marque_id'   => '7',
					'name'        => 'Nintendo New 3DS (noire)',
					'image'       => '10.jpeg',
					'price'       => '169.95',
					'stock'       => '3',
					'saved_amout' => "0",
					'description' => 'Proposant de nouvelles possibilités de personnalisation, une nouvelle rapidité, de nouvelles commandes et un nouvel affichage en 3D, la Nintendo New 3DS vous offre une toute nouvelle expérience de jeu !'
				],
				[
					'id'          => '11',
					'category_id' => '3',
					'marque_id'   => '1',
					'name'        => 'Apple iPhone 6 Plus 64 Go Argent',
					'image'       => '11.jpeg',
					'price'       => '854.95',
					'stock'       => '5',
					'saved_amout' => "0",
					'description' => 'Plus grand, plus large, plus fin et plus puissant, voilà comment définir l\'Apple iPhone 6 Plus. Chaque détail, chaque aspect matériel a été méticuleusement pensé et optimisé pour vous offrir le smartphone parfait.'
				],
				[
					'id'          => '12',
					'category_id' => '3',
					'marque_id'   => '5',
					'name'        => 'Microsoft Lumia 640 XL Dual SIM Noir',
					'image'       => '12.jpeg',
					'price'       => '239.95',
					'stock'       => '0',
					'saved_amout' => "0",
					'description' => 'Le Microsoft Lumia 640 XL est un smartphone doté d\'un écran 5.7", d\'un processeur Snapdragon 400 Quad-Core cadencé à 1.2 GHz, d\'un appareil photo 13 MP et évoluant sous Windows Phone 8.1.'
				],
				[
					'id'          => '13',
					'category_id' => '3',
					'marque_id'   => '5',
					'name'        => 'Microsoft Lumia 950 XL Dual SIM Blanc',
					'image'       => '13.jpeg',
					'price'       => '699.95',
					'stock'       => '0',
					'saved_amout' => "0",
					'description' => 'Le Lumia 950 XL de Microsoft est un smartphone 4G qui vous offre une expérience personnelle et productive. Avec Windows 10, et, équipé d\'un écran 5.7 pouces Quad HD et d\'une épaisseur de seulement 8.1 mm, le Lumia 950 XL est conçu pour vous faire vivre la meilleure expérience Windows.'
				],
				[
					'id'          => '14',
					'category_id' => '3',
					'marque_id'   => '9',
					'name'        => 'Samsung Galaxy A5 2016 Blanc',
					'image'       => '14.jpeg',
					'price'       => '419.95',
					'stock'       => '0',
					'saved_amout' => "0",
					'description' => 'Accessible au plus grand nombre, le Samsung Galaxy A5 2016 adopte un design sobre et élégant fait de verre et de métal. Grâce à ses finitions travaillées, sa finesse et son verre Gorilla Glass 4, le Galaxy A5 est un smartphone moderne et soigné.'
				],
				[
					'id'          => '15',
					'category_id' => '3',
					'marque_id'   => '9',
					'name'        => 'Samsung Galaxy S7 SM-G930F Or 32 Go',
					'image'       => '15.jpeg',
					'price'       => '699.00',
					'stock'       => '0',
					'saved_amout' => "0",
					'description' => 'Le Samsung Galaxy S7 vous plonge dans une toute nouvelle dimension et réunit puissance, connectivité, élégance et confort d\'utilisation au sein d\'un même smartphone.'
				],
				[
					'id'          => '16',
					'category_id' => '4',
					'marque_id'   => '4',
					'name'        => 'LG 65UF778V',
					'image'       => '16.jpeg',
					'price'       => '1799.95',
					'stock'       => '1',
					'saved_amout' => "0",
					'description' => 'Plongez sans plus attendre dans une réalité sublimée grâce au téléviseur 65UF778V de LG ! Avec lui, profitez d\'incroyables images 4K associées à un son surprenant ainsi qu\'à un design exceptionnel. Derrière son design slim, ce téléviseur 4K LG ouvre les portes d\'un grand divertissement !'
				],
				[
					'id'          => '17',
					'category_id' => '4',
					'marque_id'   => '8',
					'name'        => 'Philips 49PUH4900',
					'image'       => '17.jpeg',
					'price'       => '569.95',
					'stock'       => '1',
					'saved_amout' => "0",
					'description' => 'Avec le téléviseur 49PUH4900 de Philips, laissez-vous transporter dans une nouvelle dimension visuelle ! Derrière un design fin avec pieds minimalistes du plus bel effet, tout est fait pour que vous profitiez de l\'incroyable qualité d\'image UHD 4K.'
				],
				[
					'id'          => '18',
					'category_id' => '4',
					'marque_id'   => '9',
					'name'        => 'Samsung UE40JU6000',
					'image'       => '18.jpeg',
					'price'       => '549.90',
					'stock'       => '0',
					'saved_amout' => "0",
					'description' => 'Avec la Samsung UE40JU6000, entrez dans le monde de la Ultra Haute Définition selon Samsung avec une image 4x plus détaillée qu\'en Full HD grâce à la fonction d\'upscaling avancée de votre téléviseur.'
				],
				[
					'id'          => '19',
					'category_id' => '4',
					'marque_id'   => '9',
					'name'        => 'Samsung UE55JU6800',
					'image'       => '19.jpeg',
					'price'       => '1099.95',
					'stock'       => '0',
					'saved_amout' => "0",
					'description' => 'Immergez-vous pleinement au coeur de vos programmes favoris avec le téléviseur LED 4K UE55JU6800 de Samsung. Derrière son design haut de gamme, vous serez séduit par les images nettes et précises délivrées par la fonction d\'Upscaling avancée de ce téléviseur.'
				],
				[
					'id'          => '25',
					'category_id' => '2',
					'marque_id'   => '11',
					'name'        => 'Project Cars (PC)',
					'image'       => '25.jpeg',
					'price'       => '34.90',
					'stock'       => '8',
					'saved_amout' => "0",
					'description' => 'Financé grâce au système de Crowdfounding par une communauté de passionnés qui a été intégrée au processus de développement du jeu afin de créer une expérience de course ultime.'
				]
			];
			
			
			foreach ( $products as $productBDD ) {
				$marque = $manager->getRepository( 'sil21VitrineBundle:Brand' )->find(
					$productBDD[ 'marque_id' ]
				);
				
				$category = $manager->getRepository( 'sil21VitrineBundle:Category' )->find(
					$productBDD[ 'category_id' ]
				);
				
				$product = new Product();
				$product
					->setCategory( $category )
					->setBrand( $marque )
					->setName( $productBDD[ 'name' ] )
					->setImage( $productBDD[ 'image' ] )
					->setPrice( $productBDD[ 'price' ] )
					->setSavedAmout( $productBDD[ 'saved_amout' ] )
					->setStock( $productBDD[ 'stock' ] )
					->setDescription( $productBDD[ 'description' ] );
				
				$manager->persist( $product );
			}
			
			$manager->flush();
		}
	}