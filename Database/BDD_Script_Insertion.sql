-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 31 mars 2022 à 21:15
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



INSERT INTO `company` (`ID_COMPANY`, `DESCRIPTION`, `COMPANY_NAME`, `SECTOR`, `INTERN_NUMBER`) VALUES
(1, 'Une société jeune et dynamique vendant des composants.', 'Tech & Co', 'Technologie', 444285673),
(3, 'Vente de téléphone dans le monde entier', 'Poire', 'Technologie', 772305937),
(4, 'Vente d energie pour la France', 'EFD', 'Industrie', 886565592);

INSERT INTO `locality` (`ID_LOCALITY`, `CITY`, `POSTAL_CODE`, `STREET`, `NUMBER`, `ID_COMPANY`) VALUES
(4, 'Rouen', 76000, 'Avenue des nouveaux', 4, 3),
(5, 'Rouen', 76000, 'Boulevard Industriel', 356, 4),
(13, 'Rouen', 76000, 'Avenue des fleuristes', 34, 1),
(14, 'Paris', 75000, 'Boulevard Capucine', 25, 1),
(15, 'Paris', 75000, 'Boulevard Malherbe', 4, 3);

INSERT INTO `internship` (`ID_OFFERS`, `TITLE`, `DESCRIPTION`, `SKILLS`, `DURATION`, `REMUNERATION`, `OFFER_DATE`, `PLACES_NUMBER`, `ID_LOCALITY`) VALUES
(1, 'Offre de développeur', 'Une offre de développement de C ++', 'C++, Développement Logiciel, Esprit d équipe', 5, 1200, '2022-05-15', 1, 4),
(4, 'Linux Master', 'Linux Master', 'Linux', 12, 400, '2022-09-01', 1, 5),
(13, 'Offre de développeur', 'Une offre de développement de C ++', 'C++, Développement Logiciel, Esprit d équipe', 5, 1200, '2022-05-15', 1, 13),
(14, 'Dev Réseau', 'Préparation d une mise à jour réseau', 'Réseau et Cisco', 3, 600, '2022-06-23', 2, 4),
(15, 'Technicien Env Sys', 'Une offre de technicien environnement Windows', 'Windows et Esprit d équipe', 4, 1000, '2022-08-31', 3, 5),
(16, 'Linux Master', 'Linux Master', 'Linux', 12, 400, '2022-09-01', 1, 13);

INSERT INTO `promotions` (`ID_PROMOTIONS`, `PROMOTION_NAME`) VALUES
(1, 'CPI A1 Généraliste - 2022'),
(2, 'CPI A2 BTP - 2021'),
(3, 'CPI A3 - 2024');

INSERT INTO `user` (`ID_PERSON`, `LAST_NAME`, `FIRST_NAME`, `CENTER`, `LOGIN`, `PASSWORD`, `ID_PROMOTIONS`) VALUES
(1, 'DUDEBOUT', 'Julien', 'Paris', 'JD@cesi.fr', '78ycC', 1),
(2, 'PICHON', 'Lucie', 'Rouen', 'LuciePichon@cesi.fr', '6w7nD', 2),
(3, 'BONY', 'Malo', 'Rouen', 'MBony@cesi.fr', '5kdH5', 3),
(4, 'BASTIDE', 'Lilou', 'Bordeaux', 'Bastide.lilou@cesi.fr', '4D9vi', 2),
(6, 'PEPIN', 'Lyna', 'Paris', 'Lyna@cesi.fr', '4rt8R', 3),
(7, 'RAYNAL', 'Tristan', 'Bordeaux', 'Triray@cesi.fr', 'bn5S8', 2);


INSERT INTO `apply` (`ID_OFFERS`, `ID_PERSON`, `STATUS`, `RESUME`, `ML`, `VALIDATION_SHEET`, `CONVENTION`) VALUES
(1, 2, 'Apply', 'aled', 'ma mo', 'valid', 'conve'),
(1, 3, 'Apply', 'Il a', 'lm.pd', 'sheet', 'conv.');
--
INSERT INTO `permission` (`ID_PERMISSION`, `SEARCH_COMPANY`, `CREATE_COMPANY`, `UPDATE_COMPANY`, `EVALUATE_COMPANY`, `DELETE_COMPANY`, `STATS_COMPANY`, `SEARCH_OFFERS`, `CREATE_OFFERS`, `UPDATE_OFFERS`, `DELETE_OFFERS`, `STATS_OFFERS`, `SEARCH_PILOT_ACCOUNT`, `CREATE_PILOT_ACCOUNT`, `UPDATE_PILOT_ACCOUNT`, `DELETE_PILOT_ACCOUNT`, `SEARCH_DELEGUATE_ACCOUNT`, `CREATE_DELEGUATE_ACCOUNT`, `UPDATE_DELEGUATE_ACCOUNT`, `DELETE_DELEGUATE_ACCOUNT`, `ASSIGN_RIGHTS_DELEGUATE`, `SEARCH_STUDENT_ACCOUNT`, `CREATE_STUDENT_ACCOUNT`, `UPDATE_STUDENT_ACCOUNT`, `DELETE_STUDENT_ACCOUNT`, `STATS_STUDENT`, `ADD_OFFER_WISHLIST`, `DELETE_OFFER_WISHLIST`, `APPLY_OFFER`, `STATUS_STEP1_FEEDBACK`, `STATUS_STEP2_FEEDBACK`, `STATUS_STEP3_FEEDBACK`, `STATUS_STEP4_FEEDBACK`, `STATUS_STEP5_FEEDBACK`, `STATUS_STEP6_FEEDBACK`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);


INSERT INTO `correspond_to` (`ID_PROMOTIONS`, `ID_OFFERS`) VALUES
(1, 1),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(2, 4);


INSERT INTO `wish` (`ID_OFFERS`, `ID_PERSON`) VALUES
(14, 1),
(15, 2),
(16, 3);
COMMIT;



INSERT INTO `role` (`ID_ROLE`, `Name_ROLE`) VALUES
(1, 'Administrateur'),
(2, 'Pilote'),
(3, 'Délégué'),
(4, 'Etudiant');

INSERT INTO `be` (`ID_ROLE`, `ID_PERSON`) VALUES
(2, 1),
(2, 2),
(2, 4),
(3, 6),
(4, 3),
(4, 7);


INSERT INTO `has` (`ID_ROLE`, `ID_PERMISSION`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

