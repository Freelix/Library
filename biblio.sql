
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `biblio`
--
CREATE DATABASE IF NOT EXISTS `biblio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `biblio`;

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

CREATE TABLE IF NOT EXISTS `emplacement` (
  `id_emplacement` int(10) NOT NULL AUTO_INCREMENT,
  `nom_emplacement` varchar(50) NOT NULL,
  PRIMARY KEY (`id_emplacement`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `emplacement`
--

INSERT INTO `emplacement` (`id_emplacement`, `nom_emplacement`) VALUES
(9, 'Bibliothèque du salon #2'),
(8, 'Bibliothèque du salon #1'),
(10, 'Bibliothèque du salon #3'),
(11, 'Bibliothèque de la chambre');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(10) NOT NULL AUTO_INCREMENT,
  `nom_film` varchar(75) NOT NULL,
  `realisateur_film` varchar(75) NOT NULL,
  `id_emplacement` int(10) NOT NULL,
  `sommaire_film` varchar(500) NOT NULL,
  `note_film` varchar(500) NOT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `film`
--

INSERT INTO `film` (`id_film`, `nom_film`, `realisateur_film`, `id_emplacement`, `sommaire_film`, `note_film`) VALUES
(3, 'Gran Torino', 'Clint Eastwood', 11, 'Walt Kowalski est un ancien de la guerre de Corée, un homme inflexible, amer et pétri de préjugés surannés. Hormis sa chienne Daisy, il ne fait confiance qu''à son M-1, toujours propre, toujours prêt à l''usage... ', ''),
(4, 'La Liste de Schindler', 'Steven Spielberg', 11, 'Evocation des années de guerre d''Oskar Schindler, industriel autrichien rentré à Cracovie en 1939 avec les troupes allemandes. Il va, tout au long de la guerre, protéger des juifs en les faisant travailler dans sa fabrique.', ''),
(5, 'The Dark Knight, Le Chevalier Noir ', 'Christopher Nolan', 11, 'Batman entreprend de démanteler les dernières organisations criminelles de Gotham. Mais il se heurte bientôt à un nouveau génie du crime qui répand la terreur et le chaos dans la ville : le Joker... ', ''),
(6, 'Le Parrain ', 'Francis Ford Coppola', 11, 'En 1945, à New York, les Corleone sont une des cinq familles de la mafia. Don Vito Corleone marie sa fille à un bookmaker. Sollozzo, "parrain" de la famille Tattaglia, propose à Don Vito une association dans le trafic de drogue...', ''),
(7, 'Les Evadés ', 'Frank Darabont', 11, 'L''amitié d''un jeune banquier condamné à la prison à vie pour le meurtre de sa femme et d''un vétéran de la prison de Shawshank, le pénitencier le plus sévère de l''Etat du Maine. ', 'Très bon film'),
(8, 'Inception ', 'Christopher Nolan', 11, 'Au lieu de subtiliser un rêve, un voleur expérimenté et son équipe doivent faire l''inverse : implanter une idée dans l''esprit d''un individu. S''ils y parviennent, il pourrait s''agir du crime parfait... ', 'Excellent'),
(9, 'Le Roi Lion', 'Roger Allers, Rob Minkoff', 11, 'Le long combat de Simba le lionceau pour accéder à son rang de roi des animaux, après que le fourbe Scar, son oncle, ait tué son père et pris sa place.', ''),
(10, 'Gladiator', 'Ridley Scott', 9, 'Le général romain Maximus est le plus fidèle soutien de l''empereur Marc Aurèle, qu''il a conduit de victoire en victoire avec une bravoure et un dévouement exemplaires. Jaloux du prestige de Maximus, et plus encore de l''amour que lui voue l''empereur, le fils de MarcAurèle, Commode, s''arroge brutalement le pouvoir, puis ordonne l''arrestation du général et son exécution. Maximus échappe à ses assassins mais ne peut empêcher le massacre de sa famille.', '');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `id_livre` int(10) NOT NULL AUTO_INCREMENT,
  `nom_livre` varchar(75) NOT NULL,
  `auteur_livre` varchar(75) NOT NULL,
  `id_emplacement` int(10) NOT NULL,
  `editeur_livre` varchar(75) NOT NULL,
  `sommaire_livre` varchar(500) NOT NULL,
  `note_livre` varchar(500) NOT NULL,
  PRIMARY KEY (`id_livre`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `nom_livre`, `auteur_livre`, `id_emplacement`, `editeur_livre`, `sommaire_livre`, `note_livre`) VALUES
(6, 'Le monde s''effondre', 'Chinua Achebe', 8, '', '', ''),
(7, 'Le Père Goriot', 'Honoré de Balzac', 8, '', '', ''),
(8, 'L''Étranger', 'Albert Camus', 9, '', '', ''),
(9, 'Les Âmes mortes', 'Nicolas Gogol', 10, '', '', ''),
(10, 'Odyssée', 'Homère', 10, '', '', ''),
(11, 'Le Grondement de la montagne', 'Yasunari Kawabata', 9, '', '', ''),
(12, 'Le Dit du Genji', 'Murasaki Shikibu', 9, '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
