CREATE DATABASE gestionDesRapports;

USE gestionDesRapports;

CREATE TABLE Utilisateurs (
    ID_utilisateur INT PRIMARY KEY,
    Nom VARCHAR(255),
    Prenom VARCHAR(255),
    Email VARCHAR(255),
    Mot_de_passe VARCHAR(255),
    ID_role INT,
    FOREIGN KEY (ID_role) REFERENCES Roles(ID_role)
);

CREATE TABLE Roles (
    ID_role INT PRIMARY KEY,
    Nom_role VARCHAR(255)
);

CREATE TABLE Filieres (
    ID_filiere INT PRIMARY KEY,
    Nom_filiere VARCHAR(255)
);

CREATE TABLE Niveaux (
    ID_niveau INT PRIMARY KEY,
    Nom_niveau VARCHAR(255)
);

CREATE TABLE Etudiants (
    ID_etudiant INT PRIMARY KEY,
    ID_utilisateur INT,
    ID_filiere INT,
    ID_niveau INT,
    FOREIGN KEY (ID_utilisateur) REFERENCES Utilisateurs(ID_utilisateur),
    FOREIGN KEY (ID_filiere) REFERENCES Filieres(ID_filiere),
    FOREIGN KEY (ID_niveau) REFERENCES Niveaux(ID_niveau)
);

CREATE TABLE Chefs_Departement (
    ID_chef_departement INT PRIMARY KEY,
    ID_utilisateur INT,
    ID_filiere INT,
    FOREIGN KEY (ID_utilisateur) REFERENCES Utilisateurs(ID_utilisateur),
    FOREIGN KEY (ID_filiere) REFERENCES Filieres(ID_filiere)
);

CREATE TABLE Secretaires_Departement (
    ID_secretaire_departement INT PRIMARY KEY,
    ID_utilisateur INT,
    ID_filiere INT,
    FOREIGN KEY (ID_utilisateur) REFERENCES Utilisateurs(ID_utilisateur),
    FOREIGN KEY (ID_filiere) REFERENCES Filieres(ID_filiere)
);

CREATE TABLE Rapports_Stage (
    ID_rapport INT PRIMARY KEY,
    Titre_rapport VARCHAR(255),
    Description_rapport TEXT,
    Date_depot DATE,
    Chemin_fichier VARCHAR(255)
);

CREATE TABLE Rapports_Etudiants (
    ID_rapport_etudiant INT PRIMARY KEY,
    ID_rapport INT,
    ID_etudiant INT,
    FOREIGN KEY (ID_rapport) REFERENCES Rapports_Stage(ID_rapport),
    FOREIGN KEY (ID_etudiant) REFERENCES Etudiants(ID_etudiant)
);
