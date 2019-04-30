-- Connexion à la BDD --
mysql -u root -p

-- Afficher les BDD --
SHOW DATABASES;

-- Créer une BDD -- 
CREATE DATABASE nom_de_la_BDD;

-- Sélectionner une BDD --
USE nom_de_la_BDD;

-- Création d'une TABLE dans la BDD --
-- Type de donnée(INT, VARCHAR, TEXT, FLOAT...) --
CREATE TABLE fruits (id_fruit INT(3), nom VACHAR(60), origine VARCHAR(50), calibre INT(1), prix FLOAT, caregorie VARCHAR(20));

-- Afficher toutes les tables --
SHOW TABLES;

-- Insertion dans la BDD --
INSERT INTO nom_de_la_TABLE (id_fruit, nom, origine, calibre, prix, caregorie) VALUES ('1', 'pomme', 'France', '5', '12.50', 'Golden');

-- Sélectionné toutes les données d'une table --
SELECT * FROM nom_de_la_table;

-- Sélectionner les données d'une ou plusieurs colonnes spécifique d'une table --
SELECT nom_de__lacolonne, nom_de__lacolonne FROM nom_de_la_table; 

-- Supprimer une ligne de la table avec une condition --
DELETE FROM nom_de_la_table WHERE condition;

-- Supprimer tout le contenu d'une table --
DELETE FROM nom_de_la_table; /!\ si vous faite cela vous effacerez tout le contenu de la table /!\

-- Mettre à jour une colonne d'une table --
UPDATE nom_de_la_table SET nom_colonne WHERE condition;
UPDATE fruits SET calibre = '7' WHERE id_fruit = '2';
-- Mettre à jour plusieurs colonnes d'une table --
UPDATE nom_de_la_table SET nom_colonne, nom_de__la colonne WHERE condition;
UPDATE fruits SET calibre = '4', origine= 'Espagne'  WHERE id_fruit = '3';

-- Ajouter une colonne à une table -- 
ALTER TABLE nom_de_la_table ADD nom_de__la colonne;

-- Opérateur de comparaison --

= Egale
<> Pas égale
!= Pas égale
> Supérieur
< Inférieur
>= Supérieur ou égale à
<= Inférieur ou égale à 
IN liste de plusieur valeurs possible
BETWEEN  recherche des valeurs comprise dans un interval donnée (utile pour les nombres ou dates)
LIKE recherche en spécifiant le début, le milieu ou la fin d'un mot
'IS NULL' valeur est nulle
'IS NOT NULL' valeur n'est pas nulle

-- Selectionner des données entre (BETWEEN) un interval (fonctionne dans une requête utilisant WHERE) --
SELECT * FROM nom_de_la_table WHERE nom_de__la colonne BETWEEN valeur AND valeur;
SELECT * FROM bonbons WHERE id_bonbon BETWEEN 2 AND 6;
-- Selectionner des données qui ne sont pas comprise entre (NOT BETWEEN) un interval --
SELECT * FROM nom_de_la_table WHERE nom_de__la colonne NOT BETWEEN valeur AND valeur;
SELECT * FROM bonbons WHERE id_bonbon NOT BETWEEN 3 AND 6;

-- Afficher les données par rapport à une valeur --
SELECT nom_colonne FROM nom_de_la_table WHERE nom_colonne = 'valeur';
SELECT prenom FROM stagiaires WHERE yeux = 'marron';
SELECT *  FROM nom_de_la_table WHERE nom_colonne = 'valeur';
SELECT * FROM stagiaires WHERE yeux = 'marron';

-- Afficher les données dans un ordre défini --
SELECT*FROM stagiaires WHERE yeux = 'marron' ORDER BY prenom;

-- Afficher les données dans l'ordre décroissant --
SELECT*FROM stagiaires WHERE yeux = 'marron' ORDER BY id_stagiaire DESC;

-- Afficher tous les stagiaires donc le prénom qui commence par L --
SELECT * FROM stagiaires WHERE prenom LIKE 'l%'; 

-- Afficher tous les stagiaires donc le prénom qui se termine par n --
SELECT * FROM stagiaires WHERE prenom LIKE '%n';

-- Afficher tous les stagiaires donc le prénom contenant un a -- 
SELECT * FROM stagiaires WHERE prenom LIKE '%a%'; 

-- Afficher tous les stagiaires donc le prénom commençant par j et contenant a et qui se termine par n
SELECT * FROM stagiaires WHERE prenom LIKE 'j%a%n'; 

-- Afficher un nombre limité de données --
SELECT*FROM stagiaires LIMIT 2;

-- Afficher un nombre limité de données en sautant des lignes --
SELECT*FROM stagiaires LIMIT 1,2;
(le premier chiffre après LIMIT représent l'offset donc le nombre de ligne ignoré. Le second chiffre correspond aux nombres de données à afficher)

-- Modifier le nom d'une colonne --
ALTER TABLE nom_de_la_table CHANGE ancien_nom_colonne nouveau_nom_colonne VARCHAR(valeur)