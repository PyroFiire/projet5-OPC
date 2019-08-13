-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mar. 13 août 2019 à 14:50
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet5-opc`
--
CREATE DATABASE IF NOT EXISTS `projet5-opc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `projet5-opc`;

-- --------------------------------------------------------

--
-- Structure de la table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `last_date_change` datetime NOT NULL,
  `standfirst` text COLLATE utf8mb4_bin NOT NULL,
  `contents` text COLLATE utf8mb4_bin NOT NULL,
  `validate` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `ref_id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_id_users` (`ref_id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `last_date_change`, `standfirst`, `contents`, `validate`, `ref_id_users`) VALUES
(1, 'Comment poster un article ?', '2019-08-13 16:17:57', 'Cliquer sur cet article pour découvrir rapidement et simplement comment poster un article sur mon blog !', 'Pour cela il faut tout d\'abord être inscrit sur mon blog, rendez-vous dans le Menu - Inscription pour créer votre compte.\r\nUne fois votre compte créé et validé, allez dans le menu et cliquez sur \"écrire un article\". Il ne vous reste plus qu\'à remplir et valider le formulaire ! Bravo !', 'yes', 1),
(44, 'Utilisation de Include (Source : Php.net)', '2019-08-13 15:55:08', 'Cette documentation s\'applique aussi à l\'instruction de langage require.', 'Les fichiers sont inclus suivant le chemin du fichier fourni ; si aucun n\'est fourni, l\'include_path sera vérifié. Si le fichier n\'est pas trouvé dans l\' include_path, include vérifiera dans le dossier du script appelant et dans le dossier de travail courant avant d\'échouer. L\'instruction include enverra une erreur de type warning si elle ne peut trouver le fichier; ce comportement est différent de require, qui enverra une erreur de niveau fatal.\r\n\r\nSi un chemin est défini, absolu (commençant par une lettre de lecteur suivie de \\ pour Windows, ou / pour Unix/Linux) ou relatif (commençant par . ou ..), l\'include_path sera ignoré. Par exemple, si un nom de fichier commence par ../, PHP cherchera dans le dossier parent pour y trouver le fichier spécifié.\r\n\r\nPour plus d\'informations sur la façon dont PHP gère les fichiers inclus ainsi que le chemin d\'inclusion, reportez-vous à la documentation relative à l\'include_path.\r\n\r\nLorsqu\'un fichier est inclus, le code le composant hérite de la portée des variables de la ligne où l\'inclusion apparaît. Toutes les variables disponibles à cette ligne dans le fichier appelant seront disponibles dans le fichier appelé, à partir de ce point. Cependant, toutes les fonctions et classes définies dans le fichier inclus ont une portée globale.', 'yes', 76),
(45, 'La notation hexadécimale pour les couleurs en CSS (Source : Openclassrooms)', '2019-08-13 16:08:58', 'il existe en CSS plusieurs façons de choisir une couleur parmi toutes celles qui existent. Celle que je vais vous montrer est la notation hexadécimale.', 'Un nom de couleur en hexadécimal, cela ressemble à : #FF5A28. Pour faire simple, c\'est une combinaison de lettres et de chiffres qui indiquent une couleur.\r\nOn doit toujours commencer par écrire un dièse (#), suivi de six lettres ou chiffres allant de 0 à 9 et de A à F.\r\nCes lettres ou chiffres fonctionnent deux par deux. Les deux premiers indiquent une quantité de rouge, les deux suivants une quantité de vert et les deux derniers une quantité de bleu. En mélangeant ces quantités (qui sont les composantes Rouge-Vert-Bleu de la couleur) on peut obtenir la couleur qu\'on veut.\r\n\r\nAinsi, #000000 correspond à la couleur noire et #FFFFFF à la couleur blanche. Mais maintenant, ne me demandez pas quelle est la combinaison qui produit de l\'orange couleur « coucher de soleil », je n\'en sais strictement rien.', 'yes', 1),
(46, 'Les sites statiques et dynamiques (Source : Openclassrooms)', '2019-08-13 16:11:11', 'On considère qu\'il existe deux types de sites web : les sites statiques et les sites dynamiques.', 'Les sites statiques : ce sont des sites réalisés uniquement à l\'aide des langages HTML et CSS. Ils fonctionnent très bien mais leur contenu ne peut pas être mis à jour automatiquement : il faut que le propriétaire du site (le webmaster) modifie le code source pour y ajouter des nouveautés. Ce n\'est pas très pratique quand on doit mettre à jour son site plusieurs fois dans la même journée ! Les sites statiques sont donc bien adaptés pour réaliser des sites « vitrine », pour présenter par exemple son entreprise, mais sans aller plus loin. Ce type de site se fait de plus en plus rare aujourd\'hui, car dès que l\'on rajoute un élément d\'interaction (comme un formulaire de contact), on ne parle plus de site statique mais de site dynamique.\r\n\r\nLes sites dynamiques : plus complexes, ils utilisent d\'autres langages en plus de HTML et CSS, tels que PHP et MySQL. Le contenu de ces sites web est dit « dynamique » parce qu\'il peut changer sans l\'intervention du webmaster ! La plupart des sites web que vous visitez aujourd\'hui, y compris OpenClassrooms, sont des sites dynamiques. Le seul prérequis pour apprendre à créer ce type de sites est de déjà savoir réaliser des sites statiques en HTML et CSS.', 'yes', 76),
(47, 'Comment fonctionne un site web ? (Source : Openclassrooms)', '2019-08-13 16:14:47', 'Lorsque vous voulez visiter un site web, vous tapez son adresse dans votre navigateur web, que ce soit Mozilla Firefox, Internet Explorer, Opera, Safari ou un autre. Mais ne vous êtes-vous jamais demandé comment faisait la page web pour arriver jusqu\'à vous ?', 'Il faut savoir qu\'Internet est un réseau composé d\'ordinateurs. Ceux-ci peuvent être classés en deux catégories.\r\n\r\nLes clients : ce sont les ordinateurs des internautes comme vous. Votre ordinateur fait donc partie de la catégorie des clients. Chaque client représente un visiteur d\'un site web. Dans les schémas qui vont suivre, l\'ordinateur d\'un client sera représenté par l\'image suivante.\r\n\r\nLes serveurs : ce sont des ordinateurs puissants qui stockent et délivrent des sites web aux internautes, c\'est-à-dire aux clients. La plupart des internautes n\'ont jamais vu un serveur de leur vie. Pourtant, les serveurs sont indispensables au bon fonctionnement du Web. Sur les prochains schémas, un serveur sera représenté par l\'image de la figure suivante.', 'yes', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contents` text COLLATE utf8mb4_bin NOT NULL,
  `validate` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `ref_id_blog_posts` int(11) NOT NULL,
  `ref_id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_id_users` (`ref_id_users`),
  KEY `comments_ibfk_1` (`ref_id_blog_posts`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `contents`, `validate`, `ref_id_blog_posts`, `ref_id_users`) VALUES
(45, 'Super ! Merci beaucoup pour cet article :)', 'yes', 46, 1),
(46, 'Je vais en poster quelques-uns alors ... merci', 'yes', 1, 76),
(47, 'Derien ;)', 'yes', 46, 76);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `rank` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `rank`) VALUES
(1, 'admin', 'admin@admin.fr', '$2y$10$7iZ8vq84ivT31PWy3lMsbu69Ilfe6vxKUcp/HqQhFQzhAtr.9KGbW', 'admin'),
(76, 'user', 'user@user.fr', '$2y$10$BkiLCLcBL213GsqkAzLsNuICdAsOJBi/SABSvWkimTjVYFry.7fHS', 'registered');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`ref_id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`ref_id_blog_posts`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`ref_id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
