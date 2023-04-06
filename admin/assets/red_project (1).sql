-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 06 avr. 2023 à 14:23
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `red_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident_order` int(11) NOT NULL,
  `ident_customer` int(11) NOT NULL,
  `ident_product` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `row_total` int(11) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `img_path`) VALUES
(1, 'Smartphone', 'Ici seront répertorié toutes les meilleurs marques de téléphone.', '../admin/assets/uploads/smartphone.png'),
(2, 'Ordinateur', 'Les meilleures marques de laptop', '../admin/assets/uploads/laptop.png'),
(3, 'Tablettes', 'Ici seront répertorié tout les meilleures tablettes du marché.', '../admin/assets/uploads/tablettes.png');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(150) NOT NULL,
  `comment` mediumtext NOT NULL,
  `comment_date` date NOT NULL,
  `id_products` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_products` (`id_products`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `ident_order` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `street` varchar(250) NOT NULL,
  `home_number` int(11) NOT NULL,
  `country_code` int(11) NOT NULL,
  `apartment_number` int(11) NOT NULL,
  `city` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `path` varchar(250) NOT NULL,
  `id_products` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_products` (`id_products`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`id`, `name`, `path`, `id_products`) VALUES
(6, 'image1', '../assets/uploads/iphone12 - 1.avif', 5),
(7, 'image2', '../assets/uploads/iPhone12 - 2.avif', 5),
(8, 'image3', '../assets/uploads/iPhone12 - 3.avif', 5),
(9, 'image4', '../assets/uploads/iPhone12 - 4.avif', 5),
(10, 'image1', '../assets/uploads/iPhone14Pro - 1.avif', 6),
(11, 'image2', '../assets/uploads/iPhone14Pro - 2.avif', 6),
(12, 'image3', '../assets/uploads/iPhone14Pro - 3.avif', 6),
(13, 'image4', '../assets/uploads/iPhone14Pro-4.avif', 6);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident_product` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `id_subcategory` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_subCat` (`id_subcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `ident_product`, `name`, `description`, `price`, `id_subcategory`) VALUES
(5, 1680785450, 'iPhone 12 ', 'Smartphone iPhone 12 - Noir', '599.00', 1),
(6, 1680785905, 'iPhone 14 Pro', 'Smartphone iPhone 14 Pro - Violet Intense', '1200.00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `products_storage`
--

DROP TABLE IF EXISTS `products_storage`;
CREATE TABLE IF NOT EXISTS `products_storage` (
  `id_storage` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  PRIMARY KEY (`id_storage`,`id_products`),
  KEY `id_products` (`id_products`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score` int(11) DEFAULT NULL,
  `id_products` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_products` (`id_products`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `storage`
--

DROP TABLE IF EXISTS `storage`;
CREATE TABLE IF NOT EXISTS `storage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `id_categories` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `description`, `id_categories`) VALUES
(1, 'iPhone', 'Tout les iPhone dernier cri', 1),
(2, 'Samsung', 'Les derniers modeles samsung.', 1),
(3, 'iPad Pro', 'iPad Pro', 3),
(4, 'Macbook Pro', 'Pro', 2),
(5, 'Surface', 'Microsoft', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `billing_address` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_comments`
--

DROP TABLE IF EXISTS `users_comments`;
CREATE TABLE IF NOT EXISTS `users_comments` (
  `id_users` int(11) NOT NULL,
  `id_comments` int(11) NOT NULL,
  PRIMARY KEY (`id_users`,`id_comments`),
  KEY `id_comments` (`id_comments`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_ratings`
--

DROP TABLE IF EXISTS `users_ratings`;
CREATE TABLE IF NOT EXISTS `users_ratings` (
  `id_users` int(11) NOT NULL,
  `id_ratings` int(11) NOT NULL,
  PRIMARY KEY (`id_users`,`id_ratings`),
  KEY `id_ratings` (`id_ratings`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
