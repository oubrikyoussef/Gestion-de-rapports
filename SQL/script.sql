SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `etudiants` (
  `ID_etudiant` int(11) NOT NULL,
  `ID_utilisateur` int(11) DEFAULT NULL,
  `ID_niveau` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `etudiants` (`ID_etudiant`, `ID_utilisateur`, `ID_niveau`) VALUES
(1, 1, 1),
(2, 2, 1);

CREATE TABLE `filieres` (
  `ID_filiere` int(11) NOT NULL,
  `Nom_filiere` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `filieres` (`ID_filiere`, `Nom_filiere`) VALUES
(1, 'Génie Informatique'),
(2, 'Génie Mécanique'),
(3, 'Génie Industriel'),
(4, 'Génie Énergétique et Environnement'),
(5, 'Finance et ingénierie décisionnelle'),
(6, 'BTP');

CREATE TABLE `niveaux` (
  `ID_niveau` int(11) NOT NULL,
  `Nom_niveau` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `niveaux` (`ID_niveau`, `Nom_niveau`) VALUES
(1, 'CP1'),
(2, 'CP2'),
(3, 'CI1'),
(4, 'CI2'),
(5, 'CI3');

CREATE TABLE `rapports_stage` (
  `ID_rapport` int(11) NOT NULL,
  `Titre_rapport` varchar(255) DEFAULT NULL,
  `Description_rapport` text DEFAULT NULL,
  `Date_depot` date DEFAULT NULL,
  `Chemin_fichier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `roles` (
  `ID_role` int(11) NOT NULL,
  `Nom_role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `roles` (`ID_role`, `Nom_role`) VALUES
(1, 'Administrateur'),
(2, 'Etudiant');

CREATE TABLE `utilisateurs` (
  `ID_utilisateur` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mot_de_passe` varchar(255) DEFAULT NULL,
  `ID_role` int(11) DEFAULT NULL,
  `ID_filiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `utilisateurs` (`ID_utilisateur`, `Nom`, `Prenom`, `Email`, `Mot_de_passe`, `ID_role`, `ID_filiere`) VALUES
(27, 'Jack', 'Mike', 'jack@edu.uiz.ac.ma', 'jack123', 2, 1),
(28, 'Admin', 'Admin', 'admin@edu.uiz.ac.ma', 'admin123', 1, 1);

ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`ID_etudiant`),
  ADD KEY `ID_utilisateur` (`ID_utilisateur`),
  ADD KEY `ID_niveau` (`ID_niveau`);

ALTER TABLE `filieres`
  ADD PRIMARY KEY (`ID_filiere`);

ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`ID_niveau`);

ALTER TABLE `rapports_stage`
  ADD PRIMARY KEY (`ID_rapport`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_role`);

ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID_utilisateur`),
  ADD KEY `ID_role` (`ID_role`),
  ADD KEY `ID_filiere` (`ID_filiere`);

ALTER TABLE `etudiants`
  MODIFY `ID_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `filieres`
  MODIFY `ID_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `niveaux`
  MODIFY `ID_niveau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `rapports_stage`
  MODIFY `ID_rapport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `roles`
  MODIFY `ID_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `utilisateurs`
  MODIFY `ID_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`ID_utilisateur`) REFERENCES `utilisateurs` (`ID_utilisateur`),
  ADD CONSTRAINT `etudiants_ibfk_2` FOREIGN KEY (`ID_niveau`) REFERENCES `niveaux` (`ID_niveau`);

ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`ID_role`) REFERENCES `roles` (`ID_role`),
  ADD CONSTRAINT `utilisateurs_ibfk_2` FOREIGN KEY (`ID_filiere`) REFERENCES `filieres` (`ID_filiere`);
COMMIT;
