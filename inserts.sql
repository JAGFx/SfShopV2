-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2017 at 07:34 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sil21`
--

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Informatique'),
(2, 'Jeux & Console'),
(3, 'Téléphonie'),
(4, 'Images & Son');

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `client_id`, `date`, `etat`) VALUES
(4, 2, '2017-01-03 20:33:08', 0),
(5, 2, '2017-01-03 21:08:27', 0);

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `name`, `firstname`, `password`, `address`, `tel`, `date_birthday`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'smithe', 'SMITH', 'Emmanuel', '$2y$13$84046cbl8isk44gooko8cOXtqTaG6mFPn3ZnErK0/.bbslk84h72K', '11b rue jean pain', '620133854', '1995-08-14 00:00:00', 'smithe', 'azertyuiop35@gmail.com', 'azertyuiop35@gmail.com', 1, '84046cbl8isk44gooko8cckw8c88g8o', '2017-01-03 21:08:51', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL),
(2, 'esmith', 'Plop', 'MARMI', '$2y$13$5dcvz2wjwj8cs0cw0o0w4uNsRjpfpR0.dM.ew/kSPdtpiWP1S049y', '77 avenue du plond', '123654789', '1978-03-20 00:00:00', 'esmith', 'aq@ss.ss', 'aq@ss.ss', 1, '5dcvz2wjwj8cs0cw0o0w408sgck0wsk', '2017-01-03 21:08:18', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

--
-- Dumping data for table `lignecommande`
--

INSERT INTO `lignecommande` (`product_id`, `commande_id`, `qte`, `price`) VALUES
(1, 4, 1, '2450'),
(1, 5, 1, '2450');

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`id`, `Name`) VALUES
(1, 'Apple'),
(2, 'Asus'),
(3, 'Gigabyte'),
(4, 'LG'),
(5, 'Microsoft'),
(6, 'MSI'),
(7, 'Nitendo'),
(8, 'Philips'),
(9, 'Samsung'),
(10, 'Sony'),
(12, 'Sans marque');

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `marque_id`, `name`, `image`, `price`, `stock`, `description`) VALUES
(1, 1, 3, 'Gigabyte P35X v5 C4KW10-FR', '1.jpeg', '2449.95', 3, 'Profitez de hautes performances avec le PC portable Gigabyte P35X v5 ! Grâce à son écran IPS de 15.6" avec résolution Ultra HD et ses composants ultra-performants, cet ordinateur portable Gigabyte offre une haute qualité audio/vidéo. Un achat idéal pour le jeu et le multimédia !'),
(2, 1, 6, 'MSI GS60 2QC-002XFR Ghost Gold', '2.jpeg', '1149.95', 3, 'Profitez de hautes performances mobiles avec le PC portable MSI GS60 2QC-002XFR Ghost Gold. Malgré son incroyable finesse, inférieure à 20 mm, cet ordinateur portable MSI est ultra puissant et offre une haute qualité audio/vidéo ! Un achat idéal pour le divertissement numérique mobile !'),
(3, 1, 2, 'ASUS G501JW-CN466T', '3.jpeg', '1499.95', 0, 'Le PC portable ASUS G501 est conçu pour les joueurs nomades. Mince et léger, il assure un divertissement de qualité partout où vous allez. Grâce à ses composants performants, son écran Full HD et son système audio de qualité, il offre une excellente expérience de divertissement mobile.'),
(4, 1, 2, 'ASUS G552VX-DM088T', '4.jpeg', '999.95', 1, 'Profitez de bonnes performances de jeu avec le PC portable Gamer ASUS G552VX ! Boostez vos performances grâce à ses composants de qualité et améliorez votre confort de jeu grâce à son superbe écran Full HD et son clavier chiclet rétroéclairé.'),
(5, 1, 6, 'MSI GE62 6QF-095FR Apache Pro', '5.jpeg', '1849.95', 1, 'Profitez d\'excellentes performances en faisant l\'achat du PC portable MSI GE62 6QF Apache Pro ! Conçu pour les gamers, cet ordinateur portable MSI offre un parfait confort de jeu grâce à son écran de 15.6" Full HD, son système audio Dynaudio et son clavier Gamer rétro-éclairé multicolore.'),
(6, 2, 5, 'Microsoft Xbox One', '6.jpeg', '399.95', 0, 'Xbox One a été conçue par des gamers, pour les gamers et vous propose une expérience de jeux et de divertissements comme jamais vous n\'en avez vécue. Grace à l\'équilibre parfait entre la puissance et la performance, cette nouvelle Xbox amène le jeu à un tout autre niveau.'),
(7, 2, 10, 'Sony PlayStation 4 (1 To)', '7.jpeg', '399.95', 0, 'La PlayStation 4 est une console de choix pour profiter d\'expériences vidéoludiques dynamiques, connectées, rapides et aux graphismes incroyables. Ses contenus sont d\'une richesse inouïe et ses expériences de jeu plus prenantes que jamais.'),
(8, 2, 10, 'Sony Playstation 3 Ultra Slim', '8.jpeg', '199.95', 0, 'Incarnant le meilleur du jeu vidéo et du divertissement à domicile, la PlayStation 3 procure des expériences résolument inédites pour toute la famille. Lancez-vous dans des aventures incroyables, regardez des films en Haute Définition, plongez au coeur d\'un univers de divertissement complet !'),
(9, 2, 7, 'Nintendo New 3DS XL (bleue)', '9.jpeg', '199.95', 2, 'Proposant de nouvelles possibilités de personnalisation, une nouvelle rapidité, de nouvelles commandes et un nouvel affichage en 3D, la Nintendo New 3DS XL vous offre une toute nouvelle expérience de jeu !'),
(10, 2, 7, 'Nintendo New 3DS (noire)', '10.jpeg', '169.95', 3, 'Proposant de nouvelles possibilités de personnalisation, une nouvelle rapidité, de nouvelles commandes et un nouvel affichage en 3D, la Nintendo New 3DS vous offre une toute nouvelle expérience de jeu !'),
(11, 3, 1, 'Apple iPhone 6 Plus 64 Go Argent', '11.jpeg', '854.95', 5, 'Plus grand, plus large, plus fin et plus puissant, voilà comment définir l\'Apple iPhone 6 Plus. Chaque détail, chaque aspect matériel a été méticuleusement pensé et optimisé pour vous offrir le smartphone parfait.'),
(12, 3, 5, 'Microsoft Lumia 640 XL Dual SIM Noir', '12.jpeg', '239.95', 0, 'Le Microsoft Lumia 640 XL est un smartphone doté d\'un écran 5.7", d\'un processeur Snapdragon 400 Quad-Core cadencé à 1.2 GHz, d\'un appareil photo 13 MP et évoluant sous Windows Phone 8.1.'),
(13, 3, 5, 'Microsoft Lumia 950 XL Dual SIM Blanc', '13.jpeg', '699.95', 0, 'Le Lumia 950 XL de Microsoft est un smartphone 4G qui vous offre une expérience personnelle et productive. Avec Windows 10, et, équipé d\'un écran 5.7 pouces Quad HD et d\'une épaisseur de seulement 8.1 mm, le Lumia 950 XL est conçu pour vous faire vivre la meilleure expérience Windows.'),
(14, 3, 9, 'Samsung Galaxy A5 2016 Blanc', '14.jpeg', '419.95', 0, 'Accessible au plus grand nombre, le Samsung Galaxy A5 2016 adopte un design sobre et élégant fait de verre et de métal. Grâce à ses finitions travaillées, sa finesse et son verre Gorilla Glass 4, le Galaxy A5 est un smartphone moderne et soigné.'),
(15, 3, 9, 'Samsung Galaxy S7 SM-G930F Or 32 Go', '15.jpeg', '699.00', 0, 'Le Samsung Galaxy S7 vous plonge dans une toute nouvelle dimension et réunit puissance, connectivité, élégance et confort d\'utilisation au sein d\'un même smartphone.'),
(16, 4, 4, 'LG 65UF778V', '16.jpeg', '1799.95', 1, 'Plongez sans plus attendre dans une réalité sublimée grâce au téléviseur 65UF778V de LG ! Avec lui, profitez d\'incroyables images 4K associées à un son surprenant ainsi qu\'à un design exceptionnel. Derrière son design slim, ce téléviseur 4K LG ouvre les portes d\'un grand divertissement !'),
(17, 4, 8, 'Philips 49PUH4900', '17.jpeg', '569.95', 1, 'Avec le téléviseur 49PUH4900 de Philips, laissez-vous transporter dans une nouvelle dimension visuelle ! Derrière un design fin avec pieds minimalistes du plus bel effet, tout est fait pour que vous profitiez de l\'incroyable qualité d\'image UHD 4K.'),
(18, 4, 9, 'Samsung UE40JU6000', '18.jpeg', '549.90', 0, 'Avec la Samsung UE40JU6000, entrez dans le monde de la Ultra Haute Définition selon Samsung avec une image 4x plus détaillée qu\'en Full HD grâce à la fonction d\'upscaling avancée de votre téléviseur.'),
(19, 4, 9, 'Samsung UE55JU6800', '19.jpeg', '1099.95', 0, 'Immergez-vous pleinement au coeur de vos programmes favoris avec le téléviseur LED 4K UE55JU6800 de Samsung. Derrière son design haut de gamme, vous serez séduit par les images nettes et précises délivrées par la fonction d\'Upscaling avancée de ce téléviseur.'),
(25, 2, 12, 'Project Cars (PC)', '25.jpeg', '34.90', 8, 'Financé grâce au système de Crowdfounding par une communauté de passionnés qui a été intégrée au processus de développement du jeu afin de créer une expérience de course ultime.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
