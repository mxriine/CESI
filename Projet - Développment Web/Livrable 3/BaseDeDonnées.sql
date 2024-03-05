CREATE TABLE Personne(
   ID_Pers INT,
   Nom_Pers VARCHAR(50),
   Prenom_Pers VARCHAR(50),
   Mdp_Pers VARCHAR(50),
   Mail_Pers VARCHAR(50),
   PRIMARY KEY(ID_Pers)
);

CREATE TABLE Pays(
   ID_Pays INT,
   Nom_Pays VARCHAR(50),
   PRIMARY KEY(ID_Pays)
);

CREATE TABLE Administrateur(
   ID_Admin INT,
   ID_Pers INT NOT NULL,
   PRIMARY KEY(ID_Admin),
   UNIQUE(ID_Pers),
   FOREIGN KEY(ID_Pers) REFERENCES Personne(ID_Pers)
);

CREATE TABLE Pilote(
   ID_Pilote INT,
   ID_Admin INT NOT NULL,
   ID_Pers INT NOT NULL,
   PRIMARY KEY(ID_Pilote),
   UNIQUE(ID_Pers),
   FOREIGN KEY(ID_Admin) REFERENCES Administrateur(ID_Admin),
   FOREIGN KEY(ID_Pers) REFERENCES Personne(ID_Pers)
);

CREATE TABLE Region(
   ID_Region INT,
   Nom_Region VARCHAR(50),
   ID_Pays INT NOT NULL,
   PRIMARY KEY(ID_Region),
   FOREIGN KEY(ID_Pays) REFERENCES Pays(ID_Pays)
);

CREATE TABLE Entreprise(
   ID_Ent INT,
   Nom_Ent VARCHAR(50),
   Stagiaire_Ent INT,
   Moyenne_Ent VARCHAR(50),
   Secteur_Ent VARCHAR(50),
   ID_Pilote INT NOT NULL,
   ID_Admin INT NOT NULL,
   PRIMARY KEY(ID_Ent),
   FOREIGN KEY(ID_Pilote) REFERENCES Pilote(ID_Pilote),
   FOREIGN KEY(ID_Admin) REFERENCES Administrateur(ID_Admin)
);

CREATE TABLE Site(
   ID_Site INT,
   Nom_Site VARCHAR(50),
   ID_Ent INT NOT NULL,
   PRIMARY KEY(ID_Site),
   FOREIGN KEY(ID_Ent) REFERENCES Entreprise(ID_Ent)
);

CREATE TABLE Offre(
   ID_Offre INT,
   Titre_Offre VARCHAR(50),
   Niveau_Offre VARCHAR(50),
   Nb_Postulation INT,
   Nb_Place INT,
   Duree_Offre INT,
   Date_Offre DATE,
   Remuneration_Offre INT,
   ID_Pilote INT NOT NULL,
   ID_Admin INT NOT NULL,
   ID_Ent INT NOT NULL,
   PRIMARY KEY(ID_Offre),
   FOREIGN KEY(ID_Pilote) REFERENCES Pilote(ID_Pilote),
   FOREIGN KEY(ID_Admin) REFERENCES Administrateur(ID_Admin),
   FOREIGN KEY(ID_Ent) REFERENCES Entreprise(ID_Ent)
);

CREATE TABLE Ville(
   ID_Ville INT,
   Nom_Ville VARCHAR(50),
   ID_Region INT NOT NULL,
   ID_Site INT,
   PRIMARY KEY(ID_Ville),
   FOREIGN KEY(ID_Region) REFERENCES Region(ID_Region),
   FOREIGN KEY(ID_Site) REFERENCES Site(ID_Site)
);

CREATE TABLE Campus(
   ID_Campus INT,
   Nom_Campus VARCHAR(50),
   Type_Campus VARCHAR(50),
   ID_Ville INT NOT NULL,
   PRIMARY KEY(ID_Campus),
   FOREIGN KEY(ID_Ville) REFERENCES Ville(ID_Ville)
);

CREATE TABLE Promo(
   ID_Promo INT,
   Type_Promo VARCHAR(50),
   Nom_Promo VARCHAR(50),
   Annee_Promo INT,
   ID_Campus INT NOT NULL,
   PRIMARY KEY(ID_Promo),
   FOREIGN KEY(ID_Campus) REFERENCES Campus(ID_Campus)
);

CREATE TABLE Etudiant(
   ID_Etudiant INT,
   ID_Admin INT NOT NULL,
   ID_Pilote INT NOT NULL,
   ID_Promo INT NOT NULL,
   ID_Pers INT NOT NULL,
   PRIMARY KEY(ID_Etudiant),
   UNIQUE(ID_Pers),
   FOREIGN KEY(ID_Admin) REFERENCES Administrateur(ID_Admin),
   FOREIGN KEY(ID_Pilote) REFERENCES Pilote(ID_Pilote),
   FOREIGN KEY(ID_Promo) REFERENCES Promo(ID_Promo),
   FOREIGN KEY(ID_Pers) REFERENCES Personne(ID_Pers)
);

CREATE TABLE Postuler(
   ID_Offre INT,
   ID_Etudiant INT,
   CV VARCHAR(50),
   Lettre_Motivation VARCHAR(50),
   PRIMARY KEY(ID_Offre, ID_Etudiant),
   FOREIGN KEY(ID_Offre) REFERENCES Offre(ID_Offre),
   FOREIGN KEY(ID_Etudiant) REFERENCES Etudiant(ID_Etudiant)
);

CREATE TABLE Noter(
   ID_Offre INT,
   ID_Etudiant INT,
   Notes DECIMAL(15,2),
   PRIMARY KEY(ID_Offre, ID_Etudiant),
   FOREIGN KEY(ID_Offre) REFERENCES Offre(ID_Offre),
   FOREIGN KEY(ID_Etudiant) REFERENCES Etudiant(ID_Etudiant)
);

CREATE TABLE Evaluer(
   ID_Ent INT,
   ID_Pers INT,
   Evaluation INT,
   PRIMARY KEY(ID_Ent, ID_Pers),
   FOREIGN KEY(ID_Ent) REFERENCES Entreprise(ID_Ent),
   FOREIGN KEY(ID_Pers) REFERENCES Personne(ID_Pers)
);
