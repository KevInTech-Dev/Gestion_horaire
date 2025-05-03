/*
--------------------------------------------------------------------------------------------------------------------------------------------------------------
---FICHIER SQL POUR LA CREATION DE LA BASE DE DONNEES POUR LE PROJET DE GESTION HORAIRE------
---------------------------------------------------------------------------------------------
---Création de la base de données------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------
*/
DROP DATABASE IF EXISTS `gestion_horaire`;
CREATE DATABASE IF NOT EXISTS `gestion_horaire`;
USE `gestion_horaire`;

/*
--------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------
---Création des utilisateurs-----------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------
*/
CREATE USER 'SupUsrGestHoraire'@'localhost' IDENTIFIED BY '';

GRANT ALL PRIVILEGES
ON `gestion_horaire`.* 
TO 'SupUsrGestHoraire'@'localhost';

/*
--------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------
---Création des tables-----------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------
*/
DROP TABLE IF EXISTS `type_utilisateurs`;
CREATE TABLE IF NOT EXISTS `type_utilisateurs`
(
    `code_type_utilisateur` VARCHAR(10) PRIMARY KEY,
    `libelle_type_utilisateur` VARCHAR(30) NOT NULL
);

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs`
(
    `id_utilisateur` INT AUTO_INCREMENT PRIMARY KEY,
    `nom_utilisateur` VARCHAR(30) NOT NULL,
    `prenoms_utilisateur` VARCHAR(50),
    `email_utilisateur` VARCHAR(50) UNIQUE,
    `telephone_utilisateur` VARCHAR(16),
    `mot_de_passe_utilisateur` VARCHAR(255) NOT NULL,
    `code_type_utilisateur` VARCHAR(10) DEFAULT 'del',
    FOREIGN KEY (`code_type_utilisateur`) REFERENCES `type_utilisateurs`(`code_type_utilisateur`) ON DELETE CASCADE
);

DROP TABLE IF EXISTS `matieres`;
CREATE TABLE IF NOT EXISTS `matieres`
(
    `code_ue` VARCHAR(10) PRIMARY KEY,
    `nom_ue` VARCHAR(50) NOT NULL,
    `nombre_total_heure` INT(2) NOT NULL,
    `nombre_credit` INT(2),
    CHECK (`nombre_credit` > 0 AND `nombre_credit` <= 10) 
);

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes`(
    `code_classe` VARCHAR(10) PRIMARY KEY,
    `nom_classe` VARCHAR(100) NOT NULL,
    `niveau` VARCHAR(50),
    `semestre` INT(1),
    `effectif_classe` INT(2),
    CHECK (`semestre` >= 1)
);

DROP TABLE IF EXISTS `enseignements`;
CREATE TABLE IF NOT EXISTS `enseignements`(
    `id_enseignement` INT AUTO_INCREMENT PRIMARY KEY,
    `date_enseignement` DATE NOT NULL,
    `heure_debut` TIME NOT NULL,
    `heure_fin` TIME NOT NULL,
    `id_utilisateur` INT,
    `code_ue` VARCHAR(10),
    `code_classe` VARCHAR(10),
    FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs`(`id_utilisateur`),
    FOREIGN KEY (`code_ue`) REFERENCES `matieres`(`code_ue`),
    FOREIGN KEY (`code_classe`) REFERENCES `classes`(`code_classe`) ON DELETE CASCADE
);

/*
--------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------
---Insertion des données dans la table type_utilisateurs-------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------
*/
INSERT INTO `type_utilisateurs` (`code_type_utilisateur`, `libelle_type_utilisateur`)
VALUES 
('admin', 'Administrateur'),
('ens','Enseignant chargé du cours'),
('del', 'Délégué de classe');