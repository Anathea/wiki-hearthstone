-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2016 at 10:14 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carte`
--

-- --------------------------------------------------------

--
-- Table structure for table `kerazancards`
--

CREATE TABLE IF NOT EXISTS `kerazancards` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mana` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rarete` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kerazancards`
--

INSERT INTO `kerazancards` (`id`, `nom`, `classe`, `mana`, `description`, `rarete`, `img`) VALUES
(1, 'Barnes', 'neutre', 4, 'Cris de guerre: invoque une copie 1/1 d''un serviteur aleatoire dand votre deck', 'legendaire', 'barnes'),
(3, 'Le conservateur', 'neutre', 7, 'Provocation. Cri de guerre : vous piochez une Bête, un Dragon et un murloc dans votre deck.', 'legendaire', 'leconservateur'),
(4, 'Medivh, le Gardien', 'neutre', 8, 'Cri de guerre: vous équipe d''Atiesh, grand baton du Gardien.', 'legendaire', 'medivhlegardien'),
(5, 'Moroes', 'neutre', 3, 'Camouflage. A la fin de votre tour, invoque un serviteur 1/1.', 'legendaire', 'moroes'),
(6, 'Prince Malchezaar', 'neutre', 5, 'Quand la partie commence ajoute 5 serviteur légendaire aléatoires dans votre deck.', 'legendaire', 'princemalchezaar'),
(7, 'Géant arcanique', 'neutre', 12, 'Côute (1) cristal de mana de mois pour chaque sort que vous lancez pendant cette partie', 'epique', 'geantarcanique'),
(8, 'Cavalier en ivoire', 'paladin', 6, 'Cri de guerre : découvre une sort. Rend un montant de PV équivalent à son coût à votre héros.', 'rare', 'cavalierenivoire'),
(9, 'Corbeau enchanté', 'druide', 1, '', 'commune', 'corbeauenchante'),
(10, 'Gardienne de la ménagerie', 'druide', 6, 'Cri de guerre : choisit une bête alliée et en invoque une copie', 'commune', 'gardiennedelamenagerie'),
(11, 'Gentille Grand-mère', 'chasseur', 2, 'Râle d''agonie : invoque un grand méchant loup 3/2', 'commune', 'gentillegrandmere'),
(12, 'Surprise du chef', 'chasseur', 2, 'Secret: après que votre adversaire a lancé un sort invoque une panthère 4/2 avec camouflage.', 'rare', 'surpriseduchef'),
(13, 'Chasseresse capuchonnée', 'chasseur', 3, 'Vos Secret coûtent (0) cristal.', 'commune', 'chasseressecapuchonnee'),
(14, 'Grimoire bavard', 'mage', 1, 'Cri de guerre: ajoute un sort de mage aléatoire de mage dans votre main', 'rare', 'grimoirebavard'),
(15, 'Valet de Medivh', 'mage', 2, 'Cri de guerre : Si vous contrôlez un secret inflige 3 points de dégâts.', 'commune\r\n', 'valetdemedivh'),
(16, 'Portail des terres de feu', 'Mage', 7, 'Inflige 5 points de dégâts. Invoque un serviteur aléatoire coûtant 5 cristaux', 'commune', 'portaildesterresdefeu'),
(17, 'Templier Plaie-de-nuit', 'paladin', 3, 'Cri de guerre: si vous avez un dragon en main, invoque deux dragonnets 1/1', 'commune', 'templierplaiedenuit'),
(18, 'Portail de Lune -d''Argents', 'paladin', 4, 'Donne +2/+2 à un serviteur aléatoire coûtant 2 cristaux.', 'commune\r\n', 'portaildelunedargents'),
(19, 'Purification', 'prêtre', 2, 'Réduit au Silence un serviteur allié. Vous piochez une carte.', 'commune', 'purification'),
(20, 'Prêtre du festin', 'prêtre', 4, 'Chaque foie que vous lancez un sort, rend 3PV a votre héros', 'commune', 'pretredufestin'),
(21, 'Fou en onyx', 'prêtre', 5, 'Cri de guerre: invoque un serviteur allié aléatoire mort pendant cette partie', 'rare', 'fouenonyx'),
(22, 'Fieffé forban', 'voleur', 1, 'Cri de guerre: ajoute une carte de classe aléatoire dans votre main(de la classe de votre adversaire).', 'commune', 'fieffeforban'),
(23, 'Fourchette mortelle', 'voleur', 3, 'Râle d''agonie: ajoute une arme 3/2 dans votre main.', 'commune', 'fourchettemortelle'),
(24, 'Colporteur éthérien', 'voleur', 5, 'Cri de guerre: réduit de (2) cristaux le coût des cartes de votre main qui ne sont pas de la classe voleur', 'rare', 'colporteuretherien'),
(25, 'Griffe spectrales', 'chaman', 1, 'A +2 ATQ tant que vous avez Dégât des sorts', 'commune', 'griffespectrales'),
(26, 'Portail du Maelström', 'chaman', 2, 'Inflige 1 point de dégâts à tout les serviteurs adverses. Invoque un serviteur aléatoire coûtant 1 cristal', 'rare', 'portaildumaelstrom'),
(27, 'Méchante sorcière', 'chaman', 4, 'Chaque fois que vous lancez un sort, invoque un totem basique aléatoire.', 'commune', 'mechantesorciere'),
(28, 'Diablotin de Malchezaar', 'demoniste', 1, 'Chaque fois que vous vous défaussez d''une carte vous en piochez une.', 'commune', 'diablotindemalchezaar'),
(29, 'Golem d''argenterie', 'demoniste', 3, 'Si vous vous défaussez de ce serviteur, l''invoque', 'rare', 'golemdargenterie'),
(30, 'Kara Kazham', 'demoniste', 5, 'Invoque une bougie 1/1, un balai 2/2 et une théière 3/3', 'commune', 'karakazham'),
(31, 'Protégez le roi !', 'guerrier', 3, 'Invoque un pion 1/1 avec Provocation pour chaque serviteur adverse.', 'rare', 'protegezleroi'),
(32, 'Ecrase-patate', 'guerrier', 5, 'Pas de limite d''attaques par tour. Ne peut pas attaquer les héros', 'commune', 'ecrasepatate'),
(33, 'Portail de Forgefer', 'guerrier', 5, 'Gagne 4 point d''Armure. Invoque un serviteur aléatoire coûtant 4 cristaux de mana.', 'commune', 'portaildeforgefer'),
(34, 'Anomalie arcanique', 'neutre', 1, 'Chaque fois que vous lancez un sort, donne +1 PV a ce serviteur', 'commune', 'anomaliearcanique'),
(35, 'Oeuf runique', 'neutre', 1, 'Râle d''agonie: vous piochez une carte.', 'commune', 'oeufrunique'),
(36, 'Biographe de Dédain-du-Néant', 'neutre', 2, 'Cri de guerre : découvre un Dragon si vous en avez déjà un en main', 'commune', 'biographedededainduneant'),
(37, 'Comédien popeux', 'neutre', 2, 'Provocation', 'commune', 'comedienpopeux'),
(38, 'Araignée du garde-manger', 'neutre', 3, 'Cri de guerre : invoque un araignée 1/3', 'commune', 'araigneedugardemanger'),
(39, 'Illusionniste pourpre', 'neutre', 3, 'Pendant votre tour, votre héros est insensible', 'commune', 'illusionistepourpre'),
(40, 'Zoobot', 'neutre', 3, 'Cri de guerre : donne +1/+1 à une Bête, un Dragon et un Murloc alliés aléatoires.', 'commune', 'zoobot'),
(41, 'Forge-Arcanes', 'neutre', 4, 'Cri de guerre : invoque un serviteur 0/5 avec provocation', 'commune', 'forgearcanes'),
(42, 'Gardien aviaire', 'neutre', 5, 'Cri de guerre: si vous contrôlez un secret, gagne +1/+1 et provocation', 'rare', 'gardienaviaire'),
(43, 'Magicien de la Ménagerie', 'neutre', 5, 'Cri de guerre: donne +2/+2 à une Bete, un Dragon et un murloc allié aléatoire', 'commune', 'magiciendelamenagerie'),
(44, 'Rôdeur des douves', 'neutre', 6, 'Cri de guerre: détruit un serviteur. Râle d''agonie réinvoque ce srviteur', 'rare', 'rodeurdesdouves'),
(45, 'Wyrm de bibliothèque', 'neutre', 6, 'Cri de guerre: détruit un serviteur adverse avec 3 ATQ ou moins si vous avez un dragon en main', 'rare', 'wyrmdebibliotheque');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kerazancards`
--
ALTER TABLE `kerazancards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kerazancards`
--
ALTER TABLE `kerazancards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
