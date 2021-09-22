-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 27 mai 2021 à 22:33
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `ycommercedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `CategoryDescription` varchar(500) NOT NULL,
  `CategoryCreationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`CategoryId`, `CategoryName`, `CategoryDescription`, `CategoryCreationDate`) VALUES
(1, 'IT', 'Computers, Electric Objects, everything you want', '2021-05-07 19:28:00'),
(2, 'video games', 'ps4, xbox, ps5, wii', '2021-05-27 21:29:28'),
(3, 'Phones', 'all phones', '2021-05-27 23:05:55'),
(4, 'Chaises gamer', 'Ch', '2021-05-27 23:06:16');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `ProductImg` varchar(500) DEFAULT NULL,
  `PublisherId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `ProductRating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`ProductId`, `ProductName`, `Description`, `ProductImg`, `PublisherId`, `CategoryId`, `ProductPrice`, `ProductRating`) VALUES
(1, 'MSI', 'Computer for Gamers', 'https://www.tonpc.ma/media/catalog/product/cache/1/small_image/516x490/9df78eab33525d08d6e5fb8d27136e95/m/s/msi-gaming-gl65-1.jpg', 11, 1, 10000, 1),
(2, 'ROG', 'Another PC for Gamers', 'https://www.notebookcheck.biz/uploads/tx_nbc2/g513.jpg', 11, 1, 10000, 3),
(3, 'Gta V Ps4', 'grand theft Auto 5', 'https://static.fnac-static.com/multimedia/Images/FR/NR/c9/d0/ac/11325641/1505-1/tsp20190827110057/Grand-Theft-Auto-V-Edition-Premium-Online-PS4.jpg', 12, 2, 200, 2),
(4, 'Iphone x', '64 gb black/White ', 'https://support.apple.com/library/APPLE/APPLECARE_ALLGEOS/SP770/iphonex.png', 12, 3, 700, 4),
(5, 'Samsung A30', '64 gb black/White ', 'https://images.samsung.com/is/image/samsung/levant-galaxy-a30-a305-sm-a305fzkfmid-frontblack-151867641?$LazyLoad_Home_IMG$', 12, 3, 400, 4),
(6, 'chaise gamer', 'sefwef', 'https://www.myway.ma/8522-thickbox_default/chaise-de-bureau-marvo-ch-106-inclinable-180.jpg', 13, 4, 220, 3),
(7, 'Watch dogs', 'Watch dogs xbox one', 'https://images-na.ssl-images-amazon.com/images/I/91yezl-6EOL._SX342_.jpg', 12, 2, 50, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  `ProfileImg` varchar(500) NOT NULL,
  `Phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`UserId`, `Name`, `Mail`, `Pass`, `ProfileImg`, `Phone`) VALUES
(6, 'Spufix', 'spufix@ynov.com', '123', 'https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-with-glasses.jpg', '+212649005540'),
(11, 'Mourad EL MRABET', 'mourad.elmrabet97@gmail.com', '123', 'https://qph.fs.quoracdn.net/main-qimg-7c0755957020bf62febdd165ae5d0dc9', '+212649005540'),
(12, 'yazid', 'aa.aa@aa.aa', 'aa', 'wet', '34532'),
(13, 'tabit', 'test@a.a', '123', 'images/large-removebg-preview.png', '34346'),
(14, 'yyy', 'jegif62696@itwbuy.com', '1234', 'tf ', '4567'),
(15, 'efef', 'manyani.yazid@gmail.com', '123', 'weudi', '3456'),
(16, '3fw', 'yadet75862@rphinfo.com', '123', 'wef', '24'),
(17, 'wefwf', 'wfwef@22.22', '123', 'images/.jpg', '23'),
(18, 'sdf', 'test@a.a22', '123', 'images/large.png.jpg', '243'),
(19, 'wer', 'admin@admin.com33', '123', 'images/large-removebg-preview.png', '23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `FK_UserId` (`PublisherId`),
  ADD KEY `FK_CategoryId` (`CategoryId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_CategoryId` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`CategoryId`),
  ADD CONSTRAINT `FK_UserId` FOREIGN KEY (`PublisherId`) REFERENCES `users` (`UserId`);
