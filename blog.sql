-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 nov. 2024 à 21:45
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `Id` int(11) NOT NULL,
  `Titre` varchar(58) NOT NULL,
  `IdAuteur` int(11) NOT NULL,
  `DateCreation` timestamp NOT NULL DEFAULT current_timestamp(),
  `Contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`Id`, `Titre`, `IdAuteur`, `DateCreation`, `Contenu`) VALUES
(9, 'Rap de l&#39;alternance', 48, '2024-11-12 21:21:40', 'J&#39;ai sans cesse envie de créer&#13;&#10;Des poèmes ou des projets&#13;&#10;Dans les deux domaines voir des progrès&#13;&#10;Parce que ça finira par marcher&#13;&#10;L&#39;apprentissage m&#39;a dit :&#13;&#10;&#34;À minuit, t&#39;as le contrat à signer&#34;&#13;&#10;Sauf que depuis cette déclaration,&#13;&#10;Les aiguilles sont comme figées&#13;&#10;J&#39;ai pas peur, le Créateur me dit que ça va aller&#13;&#10;D&#39;ici Décembre tu seras épanoui,&#13;&#10;Avec de nouveaux collègues,&#13;&#10;À t&#39;amuser à programmer&#13;&#10;D&#39;ici-là faut pas baisser les bras, &#13;&#10;La pause n&#39;est pas éternelle&#13;&#10;Le temps reprendras son cours&#13;&#10;La crainte d&#39;être virée, à la poubelle');

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `Id` int(11) NOT NULL,
  `Login` varchar(20) NOT NULL,
  `MotDePasse` varchar(32) NOT NULL,
  `DateCreation` timestamp NOT NULL DEFAULT current_timestamp(),
  `Résumé` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`Id`, `Login`, `MotDePasse`, `DateCreation`, `Résumé`) VALUES
(48, 'EmpereurWaza', '6189914d04d68c922404c87754db93f0', '2024-11-11 22:13:47', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ArticleOwnership` (`IdAuteur`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Login` (`Login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `ArticleOwnership` FOREIGN KEY (`IdAuteur`) REFERENCES `comptes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
