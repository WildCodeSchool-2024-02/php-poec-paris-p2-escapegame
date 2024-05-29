-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE room (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  next INT 
);

INSERT INTO room (name, next)
VALUES 
  ('lobby','2'),
  ('gallery','3'),
  ('exhibition', null);

CREATE TABLE challenge (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255),
  description TEXT,
  type VARCHAR(255) NOT NULL,
  instructions TEXT,
  answer VARCHAR(255) NOT NULL,
  clue VARCHAR(255),
  room_id INT,
  FOREIGN KEY (room_id) REFERENCES room(room_id)
);

CREATE TABLE user (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE save (
  user_id INT,
  challenge_id INT,
  created_at DATETIME,
  PRIMARY KEY (user_id, challenge_id),
  FOREIGN KEY (user_id) REFERENCES user(user_id),
  FOREIGN KEY (challenge_id) REFERENCES challenge(challenge_id)
);


INSERT INTO challenge ( type, description, instructions, answer, clue, room_id)
VALUES 
  ('anagramme', "Attends... quelque chose attire mon attention. Peut-être qu'une visite au bureau pourrait révéler plus que prévu.", "Attendez une minute... quelque chose me semble étrange. Dans ce  contexte, un rébus semble être la clé pour percer ce mystère.  Déchiffrez-le avec soin pour découvrir quel trésor il cache parmi les  œuvres d'art du Louvre. Votre succès dans cette épreuve pourrait bien  nous guider vers la prochaine étape de notre aventure. Bonne chance !",'coucou','Le Radeau de la Meduse', 1),
  ('puzzle', "En examinant de près le bureau, mes yeux ont capté quelque chose  d'étrange. Des lambeaux de papier déchiré, cachés à gauche de la pièce. Quel mystère se dissimule-t-il dans ces fragments  oubliés ? ", "Votre mission est de replacer dans le bon ordre les  différentes parties de la carte du  Musée pour pouvoir vous repérer parmi les différents salles. 
  Saurez-vous  relever le défi et reconstituer cette œuvre cartographique ? ", '651342','coucou', 1),
  ('colors', "La carte suggère fortement de suivre vers la droite, en direction d'une porte que je croyais fermée. Cette révélation éveille une nouvelle curiosité. Peut-être que derrière cette porte se cache un autre mystère fascinant qui n'attend que d'être découvert", "Votre mission, si vous l'acceptez, est de percer les mystères des  cariatides du musée du Louvre et de découvrir le code couleur associé à  ces quatre statues.
  Êtes-vous prêt à explorer les détails et à révéler les secrets cachés dans ces majestueuses statues ?", "RougeJauneBleuVert",'coucou', 1),
  ('code', "Je pénètre dans la pièce tant attendue, et là, au milieu de l'atmosphère chargée d'histoire, je la découvre. Son regard énigmatique semble me capturer instantanément, m'invitant à m'approcher.", "Votre mission est de trouver les quatre chiffres cache à l'intérieur du tableau de la Joconde.
  Êtes-vous prêt à défier  votre esprit et à démontrer votre maîtrise du sfumato ?", '7753','coucou', 2),
  ('anagramme', "Au terme de mon observation de la Joconde, mes yeux se tournent vers un chandelier projettant une lumière éthérée sur une énigmatique inscription murale. Il est clair que cette piste pourrait mener à l’objet perdu.", "Votre mission est de résoudre l’anagramme en lien avec le texte sur la plus célèbres oeuvres du Musée du Louvre. 
  Êtes-vous prêt à défier  votre esprit et à démontrer votre maîtrise des lettres ?", "Leonardo Da Vinci",'coucou', 2),
  ('puzzle', "Même après avoir triomphé du challenge précédent, je me trouve à nouveau confronté à l'incertitude. Malgré mes efforts, aucun chemin clair ne semble se dessiner vers la prochaine étape. Je réalise qu'il est peut-être temps de ralentir et d'observer attentivement les œuvres environnantes. Qui sait quel indice pourrait éclairer la voie vers la suite de cette aventure ?", "Votre mission est de replacer dans le bon ordre les différentes parties de la scène de La Liberté guidant le peuple afin de reconstituer cette œuvre emblématique. Saurez-vous relever ce défi artistique et ordonner les éléments pour redonner vie à cette fresque historique ?", '962514837','coucou', 2),
  ('anagramme', "Mon périple à travers le passage secret me mène dans une pièce mystérieuse, baignée dans une ambiance glaciale qui fait frissonner mon échine. À première vue, des objets antiques éparpillés semblent conter des histoires oubliées depuis des siècles. Malgré cette atmosphère oppressante, je suis déterminé à poursuivre ma quête.", "Votre mission est de résoudre l’anagramme en lien avec le texte. 
  Êtes-vous prêt à défier  votre esprit et à démontrer votre maîtrise des lettres ?", "Scribe Accroupi",'coucou', 3),
  ('code', "Après avoir minutieusement analysé le Scribe Accroupi, une impression étrange m'envahit lorsque la statue semble soudain s'animer. Elle se tourne lentement vers un coin obscur de la pièce, son doigt gracile pointant vers un petit objet dissimulé dans l'ombre.", "Votre mission est de trouver les quatre chiffres cache à l'intérieur du code de Hammourabi.
  Êtes-vous prêt à défier  votre esprit et à démontrer votre maîtrise des langages anciens ?", "1730",'coucou', 3),
  ('puzzle', "À peine ai-je prononcé les derniers chiffres du code que le silence pesant de la pièce est interrompu par un cri strident. Un frisson d'appréhension me parcourt alors que je me prépare à affronter l'impensable. D'un geste rapide, j'ouvre la pochette que le conservateur m'avait confiée au début de mon enquête.", "Votre mission est de replacer dans le bon ordre les différentes parties  de la représentation de Belfegor afin de le vaincre et de remporter le  combat.
 Serez-vous capable de relever ce défi stratégique et de  reconstruire cette image pour triompher sur le plan artistique et  tactique ?", "827513946",'coucou', 3);
