-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : ingenusprb476.mysql.db
-- Généré le :  ven. 31 août 2018 à 08:48
-- Version du serveur :  5.6.39-log
-- Version de PHP :  5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ingenusprb476`
--

-- --------------------------------------------------------

--
-- Structure de la table `roche_users`
--

CREATE TABLE `roche_users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roche_users`
--

INSERT INTO `roche_users` (`id`, `pseudo`, `mdp`, `admin`) VALUES
(1, 'Jean Forteroche', '$2y$10$e6HgSuhU2MfPrBroqIRnROKOU.d16pM1B4VsFH/cpP7QcfoDB8jCa', 1),
(2, 'FranÃ§ois Dupont', '$2y$10$jKjGEEZ3rrGxHlKE..6atOrWymrfPwkwk8dudhZxFgfXfzmhGbTuu', 0),
(3, 'Elise Duval', '$2y$10$sjclO5g2HaAzsk10qEFzf.JCIXOdQgVKLQXOpzGtMWuhCmABOD0V6', 0),
(5, 'Antoine Libert', '$2y$10$W47yPFMpkSztmuh30sYG/e8ZriRfzgKi9QAlK.HSRulg3T1b.w26S', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `roche_users`
--
ALTER TABLE `roche_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `roche_users`
--
ALTER TABLE `roche_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
