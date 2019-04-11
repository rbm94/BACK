-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 21 mars 2019 à 11:55
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `haribo`
--

-- --------------------------------------------------------

--
-- Structure de la table `bonbons`
--

CREATE TABLE `bonbons` (
  `id_bonbon` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `saveur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bonbons`
--

INSERT INTO `bonbons` (`id_bonbon`, `nom`, `saveur`) VALUES
(1, 'dragibus', 'cola'),
(2, 'Tagada', 'fraise'),
(3, 'nounours', 'citron'),
(4, 'chamallow', 'framboise'),
(5, 'schtroumpf', 'acidulé'),
(6, 'chamallow', 'vanille');

-- --------------------------------------------------------

--
-- Structure de la table `manger`
--

CREATE TABLE `manger` (
  `id_manger` int(11) NOT NULL,
  `id_bonbon` int(11) DEFAULT NULL,
  `id_stagiaire` int(11) DEFAULT NULL,
  `date_manger` date NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `manger`
--

INSERT INTO `manger` (`id_manger`, `id_bonbon`, `id_stagiaire`, `date_manger`, `quantite`) VALUES
(1, 4, 7, '2018-09-20', 5),
(2, 2, 4, '2018-09-10', 10),
(3, 3, 1, '2018-09-18', 5),
(4, 2, 2, '2018-09-05', 18),
(5, 4, 3, '2018-09-01', 18),
(6, 5, 6, '2018-08-25', 24),
(7, 4, 1, '2018-06-10', 12),
(8, 4, 5, '2018-07-24', 5);

-- --------------------------------------------------------

--
-- Structure de la table `stagiaires`
--

CREATE TABLE `stagiaires` (
  `id_stagiaire` int(11) NOT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `yeux` varchar(30) NOT NULL,
  `genre` enum('h','f') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stagiaires`
--

INSERT INTO `stagiaires` (`id_stagiaire`, `prenom`, `yeux`, `genre`) VALUES
(1, 'jhordan', 'marron', 'h'),
(2, 'Layla', 'marron', 'f'),
(3, 'Luc', 'marron', 'h'),
(4, 'Sabuj', 'marron', 'h'),
(5, 'Mohamed', 'marron', 'h'),
(6, 'Johnathan', 'bleu', 'h'),
(7, 'Arnaud', 'marron', 'h'),
(11, 'Mila', 'vert', 'f');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bonbons`
--
ALTER TABLE `bonbons`
  ADD PRIMARY KEY (`id_bonbon`);

--
-- Index pour la table `manger`
--
ALTER TABLE `manger`
  ADD PRIMARY KEY (`id_manger`),
  ADD KEY `manger_ibfk_1` (`id_stagiaire`),
  ADD KEY `manger_ibfk_2` (`id_bonbon`);

--
-- Index pour la table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD PRIMARY KEY (`id_stagiaire`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bonbons`
--
ALTER TABLE `bonbons`
  MODIFY `id_bonbon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `manger`
--
ALTER TABLE `manger`
  MODIFY `id_manger` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `stagiaires`
--
ALTER TABLE `stagiaires`
  MODIFY `id_stagiaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `manger`
--
ALTER TABLE `manger`
  ADD CONSTRAINT `manger_ibfk_1` FOREIGN KEY (`id_stagiaire`) REFERENCES `stagiaires` (`id_stagiaire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manger_ibfk_2` FOREIGN KEY (`id_bonbon`) REFERENCES `bonbons` (`id_bonbon`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
__________________________________________________________

--6-- Lister les tables de la BDD *haribo*

 SHOW TABLES;

--7-- voir les paramètres de la table *bonbon*

 DESCRIBE bonbons;

--8-- Sélectionner tous les champs de tous les enregistrements de la table *stagiaire*

 SELECT * FROM stagiaires;

--9-- Rajouter un nouveau stagiaire *Patriiiick* en forçant la numérotation de l'id

INSERT INTO `stagiaires` (`id_stagiaire`, `prenom`, `yeux`, `genre`) VALUES ('8', 'Patriiiick', 'bleu', 'f');

--10-- Rajouter un nouveau stagiaire *Mila* SANS forcer la numérotation de l'id

INSERT INTO `stagiaires` (`id_stagiaire`, `prenom`, `yeux`, `genre`) VALUES ('9', 'Mila', 'gris', 'f');

--11-- Changer le prénom du stagiaire qui a l'id 100 de *Patriiiick* à *Patrick*

 UPDATE stagiaires SET prenom = 'Patrick' WHERE prenom 'Patriiiick';

--12-- Rajouter dans la table manger que Patrick a mangé 5 Tagada purpule le 15 septembre

INSERT INTO `manger` (`id_manger`, `id_bonbon`, `id_stagiaire`, `date_manger`, `quantite`) VALUES ('9', '2', '8', '2019-09-15', '5');

--13-- Sélectionner tous les noms des bonbons

 SELECT * FROM bonbons;

--14-- Sélectionner tous les noms des bonbons en enlevant les doublons

 SELECT DISTINCT nom FROM bonbons;

--15-- Récupérer les couleurs des yeux des stagiaires (Sélectionner plusieurs champs dans une table)

SELECT yeux FROM stagiaires;--un seul champs--
SELECT prenom, yeux FROM stagiaires;--deux champs--

--16-- Dédoublonner un résultat sur plusieurs champs

--17-- Sélectionner le stagiaire qui a l'id 5

SELECT * FROM stagiaires WHERE id_stagiaire LIKE '5';

--18-- Sélectionner tous les stagiaires qui ont les yeux marrons
SELECT * FROM stagiaires WHERE yeux ='marron';

--19-- Sélectionner tous les stagiaires dont l'id est plus grand que 9

SELECT * FROM stagiaires WHERE id_stagiaire >='9';

--20-- Sélectionner tous les stagiaires SAUF celui dont l'id est 13 (soyons supersticieux !) :!\ il y a 2 façons de faire

 SELECT * FROM stagiaires WHERE id_stagiaire != '5'; 
 /--'!'--/ \sauf le 5

--21-- Sélectionner tous les stagiaires qui ont un id inférieur ou égal à 10

SELECT * FROM stagiaires WHERE id_stagiaire <='10';

--22-- Sélectionner tous les stagiaires dont l'id est compris entre 7 et 11

SELECT * FROM stagiaires WHERE id_stagiaire > '7';

--23-- Sélectionner les stagiaires dont le prénom commence par un *S*

SELECT * FROM stagiaires WHERE prenom LIKE 'S%'; 

--24-- Trier les stagiaires femmes par id décroissant

SELECT * FROM stagiaires WHERE genre LIKE 'f' ORDER BY id_stagiaire DESC;

--25-- Trier les stagiaires hommes par prénom dans l'ordre alphabétique

SELECT * FROM stagiaires WHERE genre LIKE 'h' ORDER BY prenom;

--26-- Trier les stagiaires en affichant les femmes en premier et en classant les couleurs des yeux dans l'ordre alphabétique

SELECT * FROM stagiaires ORDER BY genre DESC, yeux ;

--27-- Limiter l'affichage d'une requête de sélection de tous les stagiaires aux 3 premires résultats

SELECT * FROM stagiaires WHERE id_stagiaire NOT BETWEEN 4 AND 11;

--28-- Limiter l'affichage d'une requête de sélection de tous les stagiaires à partir du 3ème résultat et des 5 suivants

SELECT * FROM stagiaires WHERE id_stagiaire BETWEEN 3 AND 9;

--29-- Afficher les 4 premiers stagiaires qui ont les yeux marron

SELECT * FROM stagiaires WHERE yeux ='marron' LIMIT 4;

--30-- Pareil mais en triant les prénoms dans l'ordre alphabétique

SELECT * FROM stagiaires WHERE yeux ='marron' ORDER BY prenom LIMIT 4;

--31-- Compter le nombre de stagiaires

SELECT COUNT(prenom) FROM stagiairesS;

--32-- Compter le nombre de stagiaires hommes mais en changeant le nom de la colonne de résultat par *nb_stagiaires_H*

 SELECT COUNT(prenom) AS nb_stagiaires_H, FROM stagiaires WHERE genre = 'h';

--33-- Compter le nombre de couleurs d'yeux différentes

 SELECT COUNT(yeux), yeux FROM stagiaires GROUP BY yeux;

 SELECT COUNT(DISTINCT yeux) FROM stagiaires ORDER BY yeux;

--34-- Afficher le prénom et les yeux du stagiaire qui a l'id le plus petit

 SELECT * FROM stagiaires WHERE id_stagiaire < '2';

 SELECT MIN(id_stagiaire), prenom FROM stagiaires;

--36-- Afficher le prénom et les yeux du stagiaire qui a l'id le plus grand /!\ c'est une requête imbriquée qu'il faut faire (requête sur le résultat d'une autre requête)

 SELECT * FROM stagiaires WHERE id_stagiaire > '10';

SELECT prenom, yeux FROM stagiaires WHERE id_stagiaire = (SELECT MAX(id_stagiaire) FROM stagiaires);
--37-- Afficher les stagiaires qui ont les yeux bleu et vert
SELECT * FROM stagiaires WHERE yeux In ('bleu', 'vert');
-- ou
SELECT prenom FROM stagiaires WHERE yeux = 'bleu' OR yeux = 'vert';

--38-- A l'inverse maintenant, afficher les stagiaires qui n'ont pas les yeux bleu ni vert

> SELECT * FROM stagiaires WHERE yeux !='bleu' and  yeux !='vert';

--40-- récupérer que les stagiaires qui ont mangé des bonbons, avec le détail de leurs consommations

 SELECT nom, prenom, quantite FROM manger INNER JOIN stagiaires ON stagiaires.idstagiaire = manger.id_stagiaire INNER JOIN bonbons ON manger.id_bonbon = bonbon.id_bonbon;

--41-- prénom du stagiaire, le nom du bonbon, la date de consommation pour tous les stagiaires qui ont mangé au moins une fois

 SELECT prenom, nom, date_manger FROM stagiaires AS s, manger AS m, bonbons AS b WHERE s.id_stagiaire = m.id_stagiaire AND b.id_bonbon = m.id_bonbon;

--42-- Afficher les quantités consommées par les stagiaires (uniquement ceux qui ont mangé !)

SELECT prenom,quantiter FROM stagiaires AS s, manger AS m, bonbons AS b WHERE s.id_stagiaire = m.id_stagiaire AND b.id_bonbon = m.id_bonbon AND quantite > 0;



--43-- Calculer combien de bonbons ont été mangés au total par chaque stagiaire et afficher le nombre de fois où ils ont mangé

SELECT mQUANTITE, COUNT(*) AS nb_conso, s.prenom FROM manger m INNER JOIN stagiaires s ON m.id_stagiaire = s.id_stagiaire GROUP BY s.prenom;


--44-- Afficher combien de bonbons ont été consommés au total

SELECT SUM(quantite) FROM manger;

--45-- Afficher le total de *Tagada* consommées

SELECT SUM(quantite) FROM stagiaires INNER JOIN bonbons INNER JOIN manger WHERE manger.id_bonbon = bonbons.id_bonbon AND manger.id_stagiaire = stagiaires.id_stagiaire ANd nom = 'tagada';

--46-- Afficher les prénoms des stagiaires qui n'ont rien mangé

SELECT prenom FROM stagiaires s, bonbons b, manger m WHERE m.id_bonbon = b.id_bonbon ANd m.id_stagiaire = s.id_stagiaire AND quantite < 1;


--47-- Afficher les saveurs des bonbons (sans doublons)

SELECT DISTINCT saveur FROM bonbons;

--48-- Afficher le prénom du stagiaire qui a mangé le plus de bonbons

 SELECT s.prenom FROM stagiaires s LEFT JOIN manger m ON s.id_stagiaire = m.id_stagiaire WHERE m.quantite = (SELECT MAX(quantite) FROM manger);

--49-- Aller chercher 1 référence dans 2 tables distinctes

SELECT prenom, quantite FROM stagiaires INNER JOIN manger WHERE manger.id_stagiaire = stagiaires.id_stagiaire;
