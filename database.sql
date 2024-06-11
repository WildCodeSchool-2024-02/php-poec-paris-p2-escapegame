-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 29 mai 2024 à 09:23
-- Version du serveur : 8.0.36
-- Version de PHP : 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `escape_game`
--

-- --------------------------------------------------------

--
-- Structure de la table `challenge`
--

CREATE TABLE `challenge` (
  `id` int NOT NULL,
  `name` varchar(255),
  `description` text,
  `level` ENUM('easy', 'average', 'hard'),
  `type` varchar(255) NOT NULL,
  `instructions` text,
  `answer` varchar(255) NOT NULL,
  `clue` varchar(255) DEFAULT NULL,
  `next_challenge` int,
  `room_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `challenge`
--
INSERT INTO `challenge` (`id`, `name`, `description`, `level`, `type`, `instructions`, `answer`, `clue`, `room_id`) VALUES
(1, 'Rébus au Bureau du Louvre', "Attends... quelque chose attire mon attention. Peut-être qu'une visite au bureau pourrait révéler plus que prévu.", 'easy', 'anagramme', "Attendez une minute... quelque chose me semble étrange. Dans ce  contexte, un rébus semble être la clé pour percer ce mystère.  Déchiffrez-le avec soin pour découvrir quel trésor il cache parmi les  œuvres d'art du Louvre. Votre succès dans cette épreuve pourrait bien  nous guider vers la prochaine étape de notre aventure. Bonne chance !", 'le radeau de la meduse', 'savoir compter sur ses pairs', 1),
(2, 'Louvre en Pieces', "En examinant de près le bureau, mes yeux ont capté quelque chose  d'étrange. Des lambeaux de papier déchiré, cachés à gauche de la pièce. Quel mystère se dissimule-t-il dans ces fragments  oubliés ? ", 'easy', 'puzzle', 'Votre mission est de replacer dans le bon ordre les  différentes parties de la carte du  Musée pour pouvoir vous repérer parmi les différents salles. \r\n  Saurez-vous  relever le défi et reconstituer cette œuvre cartographique ? ', '126435', "les pieds dans l'eau", 1),
(3, 'Palette des Cariatides', "La carte suggère fortement de suivre vers la droite, en direction d'une porte que je croyais fermée. Cette révélation éveille une nouvelle curiosité. Peut-être que derrière cette porte se cache un autre mystère fascinant qui n'attend que d'être découvert", 'easy', 'colors', "Votre mission, si vous l'acceptez, est de percer les mystères des  cariatides du musée du Louvre et de découvrir le code couleur associé à  ces quatre statues.\r\n  Êtes-vous prêt à explorer les détails et à révéler les secrets cachés dans ces majestueuses statues ?", 'rouge jaune bleu vert', 'fier allure sur mon piedestal', 1),
(4, 'MonaDecrypte', "Je pénètre dans la pièce tant attendue, et là, au milieu de l'atmosphère chargée d\'histoire, je la découvre. Son regard énigmatique semble me capturer instantanément, m\'invitant à m\'approcher.", 'easy', 'code', "Votre mission est de trouver les quatre chiffres cache à l'intérieur du tableau de la Joconde.\r\n  Êtes-vous prêt à défier  votre esprit et à démontrer votre maîtrise du sfumato ?", '7753', 'regarde plus haut s il te plait', 2),
(5, 'Anagramme de Lona Misa', 'Au terme de mon observation de la Joconde, mes yeux se tournent vers un chandelier projettant une lumière éthérée sur une énigmatique inscription murale. Il est clair que cette piste pourrait mener à l’objet perdu.', 'easy', 'anagramme', 'Votre mission est de résoudre l’anagramme en lien avec le texte sur la plus célèbres oeuvres du Musée du Louvre. \r\n  Êtes-vous prêt à défier  votre esprit et à démontrer votre maîtrise des lettres ?', 'leonardo da vinci', 'il predestinato', 2),
(6, 'Fragments de Liberté', "Même après avoir triomphé du challenge précédent, je me trouve à nouveau confronté à l'incertitude. Malgré mes efforts, aucun chemin clair ne semble se dessiner vers la prochaine étape. Je réalise qu'il est peut-être temps de ralentir et d'observer attentivement les œuvres environnantes. Qui sait quel indice pourrait éclairer la voie vers la suite de cette aventure ?", 'average', 'puzzle', 'Votre mission est de replacer dans le bon ordre les différentes parties de la scène de La Liberté guidant le peuple afin de reconstituer cette œuvre emblématique. Saurez-vous relever ce défi artistique et ordonner les éléments pour redonner vie à cette fresque historique ?', '123456789', 'la france ou la terre du milieu', 2),
(7, 'Mots en Tailleurs', 'Mon périple à travers le passage secret me mène dans une pièce mystérieuse, baignée dans une ambiance glaciale qui fait frissonner mon échine. À première vue, des objets antiques éparpillés semblent conter des histoires oubliées depuis des siècles. Malgré cette atmosphère oppressante, je suis déterminé à poursuivre ma quête.', 'easy', 'anagramme', 'Votre mission est de résoudre l’anagramme en lien avec le texte. \r\n  Êtes-vous prêt à défier  votre esprit et à démontrer votre maîtrise des lettres ?', 'scribe accroupi', 'ma prose et ma pose', 3),
(8, 'Digicode Antique', "Après avoir minutieusement analysé le Scribe Accroupi, une impression étrange m'envahit lorsque la statue semble soudain s'animer. Elle se tourne lentement vers un coin obscur de la pièce, son doigt gracile pointant vers un petit objet dissimulé dans l'ombre.", 'easy', 'code', "Votre mission est de trouver les quatre chiffres cache à l'intérieur du code de Hammourabi.\r\n  Êtes-vous prêt à défier  votre esprit et à démontrer votre maîtrise des langages anciens ?", '1730', 'ombres, cameleon, peroquet', 3),
(9, 'Belphegor arrête de chiper', "À peine ai-je prononcé les derniers chiffres du code que le silence pesant de la pièce est interrompu par un cri strident. Un frisson d'appréhension me parcourt alors que je me prépare à affronter l'impensable. D'un geste rapide, j'ouvre la pochette que le conservateur m'avait confiée au début de mon enquête.",'average', 'puzzle', 'Votre mission est de replacer dans le bon ordre les différentes parties  de la représentation de Belfegor afin de le vaincre et de remporter le  combat.\r\n Serez-vous capable de relever ce défi stratégique et de  reconstruire cette image pour triompher sur le plan artistique et  tactique ?', '123456789', 'bon courage', 3);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `next_room` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id`, `name`, `next_room`) VALUES
(1, 'lobby', 2),
(2, 'gallery', 3),
(3, 'exhibition', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `save`
--

CREATE TABLE `save` (
  `user_id` int NOT NULL,
  `challenge_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `save`
--
ALTER TABLE `save`
  ADD PRIMARY KEY (`user_id`,`challenge_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;