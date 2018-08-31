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
-- Structure de la table `roche_comments`
--

CREATE TABLE `roche_comments` (
  `id` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` text NOT NULL,
  `creationDate` datetime NOT NULL,
  `reporting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roche_comments`
--

INSERT INTO `roche_comments` (`id`, `articleId`, `userId`, `content`, `creationDate`, `reporting`) VALUES
(1, 8, 2, 'Cogitanti inopiam et et benevolentiam et utilitates proprium minus a considerandum vicissimque minus coluntur ipse et igitur saepe coluntur percipiuntur.', '2018-08-15 15:51:04', 0),
(2, 8, 2, 'Enim transiturus sine ne progrediar quidam subversasque silices praetermitto ne sine ut ne quod cuncta spatia enim discurrunt calceis quidem.', '2018-08-15 15:51:20', 1),
(3, 5, 2, 'Usque incitans autem crebris heiulans ad crebris vivus sunt expediendum Luscus Luscus praecentor crebris praecentor vivus visus: quae audaces ad.', '2018-08-15 15:51:37', 0),
(4, 1, 2, 'Turpitudine esse sine cui ista enim volo possit non eorum qui aetati dicere quod ista verborum aetati turpitudine tamen quantum.', '2018-08-15 15:52:07', 0),
(5, 3, 2, 'Id inciperemus potius inimicitiarum tollendam putabat tollendam Scipio felices id id in ut ut felices comparandis cogitandum in tempus tempus.', '2018-08-15 15:52:29', 0),
(6, 1, 3, 'Etiam inclitis penetrali vatibus in soli praesente nullo Amphiarao Marcio soli disceret uxori in siquid Amphiarao referente quondam aut secreto.', '2018-08-15 15:53:06', 1),
(7, 2, 3, 'Divaricaturn resticulis corpore resticulis morati sine ad senem senem traxere haec corpore qui traxere traxere proximo Montium cruribus senem avidi.', '2018-08-15 15:53:20', 1),
(8, 3, 3, 'Intellegi caritas societate infinita angustum quam ita inter duos amicitiae humani inter amicitiae quam est hoc ita ex sit paucos.', '2018-08-15 15:53:36', 0),
(9, 4, 3, 'Tunc ad restitisset perissent uno sub inpenderet inpenderet ni intempestivam ei uno occidi tunc Antiochensis constantia responderunt perissent constantia Honoratus.', '2018-08-15 15:54:04', 0),
(10, 7, 3, 'Cedentem protenta honorem quam Caesaream et principis nulli itidemque perpendiculum Octaviani terris protenta velut principis aevo superiore egregias et et.', '2018-08-15 15:54:32', 0),
(11, 1, 1, 'Dissimilem infudisset hoc cautela in ut et et et peiores auribus narrabimus titulo hoc hoc peiores huius infudisset infudisset eius.', '2018-08-15 15:55:16', 0),
(12, 3, 1, 'Fratre nono pertaesus quadriennio aetatis Galla fratre in sui fratre fratre trabeae Massa nobilitarunt Tuscos quadriennio nobilitarunt atque aetatis patre.', '2018-08-15 15:55:33', 0),
(13, 3, 1, 'Memoriae coram diebus cum ipsos haberi libro et post nobis induxi \'inquit\' disputationis Fannio filio diebus ab Fannio arbitratu ut.', '2018-08-15 15:55:42', 0),
(14, 4, 1, 'Omnia quisque auxit enim quamquam maxime ego munitus non ac admiratione habebat de posita in maxime et colendisque ac virtute.', '2018-08-15 15:56:13', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `roche_comments`
--
ALTER TABLE `roche_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `roche_comments`
--
ALTER TABLE `roche_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
