DROP DATABASE IF EXISTS `gestion_horaire`;
CREATE DATABASE IF NOT EXISTS `gestion_horaire`;

use `gestion_horaire`;

DROP TABLE IF EXISTS `Enseignants`;
CREATE TABLE IF NOT EXISTS `Enseignants`(
    `id_enseignant` INT(5) AUTO_INCREMENT PRIMARY KEY,
    `enseignant_nom` VARCHAR(30),
    `enseignant_prenoms` VARCHAR(50),
    `enseignant_email` VARCHAR(50),
    `enseignant_telephone` VARCHAR(16),
    `enseignant_grade` VARCHAR(50)
);

DROP TABLE IF EXISTS `Matieres`;
CREATE TABLE IF NOT EXISTS `Matieres`(
    `code_ue` VARCHAR(10) PRIMARY KEY,
    `nom_ue` VARCHAR(50),
    `nombre_credit` INT(2),
    CHECK (`nombre_credit` > 0 AND `nombre_credit` <= 10) 
);

DROP TABLE IF EXISTS `Classes`;
CREATE TABLE IF NOT EXISTS `Classes`(
    `code_classe` VARCHAR(10) PRIMARY KEY,
    `nom_classe` VARCHAR(100),
    `niveau` VARCHAR(50),
    `effectif_classe` INT(3),
    `semestre` INT(1),
    CHECK (`semestre` >= 1)
);

DROP TABLE IF EXISTS `Enseignements`;
CREATE TABLE IF NOT EXISTS `Enseignements`(
    `id_enseignement` INT AUTO_INCREMENT PRIMARY KEY,
    `date_enseignement` DATE,
    `heure_debut` TIME,
    `heure_fin` TIME,
    `id_enseignant` INT(5),
    `code_ue` VARCHAR(10),
    `code_classe` VARCHAR(10),
    FOREIGN KEY (`id_enseignant`) REFERENCES `Enseignants`(`id_enseignant`),
    FOREIGN KEY (`code_ue`) REFERENCES `Matieres`(`code_ue`),
    FOREIGN KEY (`code_classe`) REFERENCES `Classes`(`code_classe`) ON DELETE CASCADE
);