#Version  1.0
create database SI2;

use SI2;


create table CompteGeneral
(
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    intitule varchar(160) NOT NULL,
    numero varchar(100) NOT NULL
);

create table Compte
(
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    idCompteGeneral INTEGER,
    sous_compte varchar(150) null,
    intitule_Sous_compte varchar(200) NOT NULL,
    compteTier varchar(160) NULL,

    FOREIGN KEY (idCompteGeneral) REFERENCES compteGeneral(id)
);

create table Solde
(
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    idCompte INTEGER,
    Solde DECIMAL(65,2) not null,

    FOREIGN KEY (idCompte) REFERENCES compte(id)
);

-- CREATE TYPE natureTransaction AS ENUM ('debit','credit');
-- CREATE TYPE position AS ENUM ('actif','passif','charge','vente');


CREATE TABLE transactions
(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    idCompte1 INT NOT NULL,
    idCompte2 INT NOT NULL,
    operation VARCHAR(210) DEFAULT 'compte1 vers compte2',
    valeur DECIMAL(65,2) NOT NULL,
    natureTransaction VARCHAR(255) NOT NULL,
    position VARCHAR(255),
    dates DATE NOT NULL,
    CONSTRAINT ck_natureTransaction CHECK (natureTransaction IN ('debit', 'credit')),
    CONSTRAINT ck_position CHECK (position IN ('actif', 'passif', 'charge', 'vente')),
    FOREIGN KEY (idCompte1) REFERENCES compte(id),
    FOREIGN KEY (idCompte2) REFERENCES compte(id)
);

--------------stocks-------------------------------
CREATE TABLE Produit (
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    nomProduit VARCHAR(255),
    PrixUnitaire DECIMAL(10,2),
    nombre INTEGER,
    dates date NOT NULL
);

create view Stocks_view as
    select produit.id as idProduit,nomProduit,PrixUnitaire,nombre,(PrixUnitaire * nombre) as valeurTotal,dates 
    from Produit;

--------------------------entreprise--------------------------------------

CREATE TABLE identite_Entreprise (
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    logo VARCHAR(255) null,
    nomSociete VARCHAR(255) null,
    objetSociete varchar(255) null,
    dateCreation DATE null ,
    LieuExercice VARCHAR(255) null
);


CREATE TABLE Contact (
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    idSociete INTEGER null,
    adresse VARCHAR(255) NULL,
    telephone VARCHAR(255) , 
    mail VARCHAR(255) NULL,
    Siege varchar(15) NUll,
    
    FOREIGN KEY (idSociete) REFERENCES identite_Entreprise(id)

);

CREATE TABLE Departement (
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    Descriptions VARCHAR(255)
);


CREATE TABLE Devise (
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    nomDevise VARCHAR(255),
    Pays VARCHAR(255)
);

CREATE TABLE Taux_Equivalence (
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    idReference INTEGER,
    idDevise INTEGER,
    valeur DECIMAL(10,2),
    dates DATE,
    taux DECIMAL(10,2),

    FOREIGN KEY (idReference) REFERENCES Devise(id),
    FOREIGN KEY (idDevise) REFERENCES Devise(id)
);

CREATE view trade_view AS 
    SELECT d.nomDevise as Devise_nationale, 
        de.valeur as Valeur, 
        d2.nomDevise as Devise_etrangere, 
        de.taux as Taux, 
        (de.valeur * de.taux)  as Monnaie_nationale_convertie, 
        de.dates as Dates
    FROM Devise d
    JOIN Taux_Equivalence de ON d.id = de.idReference
    JOIN Devise d2 ON d2.id = de.idDevise
    WHERE d.nomDevise = 'ariary';


CREATE TABLE InfoComptabilite (
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    idSociete INTEGER,
    capitale DECIMAL(10,2),
    NIF VARCHAR(255),
    NSTAT VARCHAR(255),
    NRCS VARCHAR(255),
    idDevise INTEGER,

    FOREIGN KEY (idSociete) REFERENCES identite_Entreprise(id),
    FOREIGN KEY (idDevise) REFERENCES Devise(id)

);

CREATE TABLE Employe (
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    dateNaissance DATE,
    idDepartement INTEGER,
    metier VARCHAR(255),
    salaire DECIMAL(10,2),
    pouvoirExecutif Integer,
    idSociete INTEGER,
    FOREIGN KEY (idDepartement) REFERENCES Departement(id),
    FOREIGN KEY (idSociete) REFERENCES identite_Entreprise(id)
);

CREATE TABLE ExoComptable (
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    DateDebut DATE,
    DateFin DATE,
    idInfocomptabilite INTEGER,
    FOREIGN KEY (idInfocomptabilite) REFERENCES InfoComptabilite(id)
);



-------------------------------journal--------------------------------

CREATE TABLE journalventes (
    id INTEGER AUTO_INCREMENT PRIMARY KEY  ,
    nom VARCHAR(255),
    Jour INT,
    NoPiece INT,
    ReferencePiece INT,
    NoCompteGenerale INT,
    CompteAuxiliaire INT,
    LibelleEcriture  VARCHAR(255),
    DateEcheance DATE,
    Devise  VARCHAR(255),
    Taux  DECIMAL(10,2),
    Debits  DECIMAL(10,2),
    Credits  DECIMAL(10,2)
);
CREATE TABLE journalanouveau (
    id INTEGER AUTO_INCREMENT PRIMARY KEY  ,
    nom VARCHAR(255),
    Jour INT,
    NoPiece INT,
    ReferencePiece INT,
    NoCompteGenerale INT,
    CompteAuxiliaire INT,
    LibelleEcriture  VARCHAR(255),
    DateEcheance DATE,
    Devise  VARCHAR(255),
    Taux  DECIMAL(10,2),
    Debits  DECIMAL(10,2),
    Credits  DECIMAL(10,2)
);
CREATE TABLE journalbanque (
    id INTEGER AUTO_INCREMENT PRIMARY KEY  ,
    nom VARCHAR(255),
    Jour INT,
    NoPiece INT,
    ReferencePiece INT,
    NoCompteGenerale INT,
    CompteAuxiliaire INT,
    LibelleEcriture  VARCHAR(255),
    DateEcheance DATE,
    Devise  VARCHAR(255),
    Taux  DECIMAL(10,2),
    Debits  DECIMAL(10,2),
    Credits  DECIMAL(10,2)
);
CREATE TABLE journalachats (
    id INTEGER AUTO_INCREMENT PRIMARY KEY  ,
    nom VARCHAR(255),
    Jour INT,
    NoPiece INT,
    ReferencePiece INT,
    NoCompteGenerale INT,
    CompteAuxiliaire INT,
    LibelleEcriture  VARCHAR(255),
    DateEcheance DATE,
    Devise  VARCHAR(255),
    Taux  DECIMAL(10,2),
    Debits  DECIMAL(10,2),
    Credits  DECIMAL(10,2)
);
CREATE TABLE journalcaisse (
    id INTEGER AUTO_INCREMENT PRIMARY KEY  ,
    nom VARCHAR(255),
    Jour INT,
    NoPiece INT,
    ReferencePiece INT,
    NoCompteGenerale INT,
    CompteAuxiliaire INT,
    LibelleEcriture  VARCHAR(255),
    DateEcheance DATE,
    Devise  VARCHAR(255),
    Taux  DECIMAL(10,2),
    Debits  DECIMAL(10,2),
    Credits  DECIMAL(10,2)
);



CREATE TABLE Facture (
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    idCompte INTEGER,
    idproduit INTEGER,
    NumFacture VARCHAR(255),
    vendeur VARCHAR(255),
    acheteur VARCHAR(255),
    idContact INT,
    ModePayement VARCHAR(255),
    prix NUMERIC(10,2),
    nombre INT,
    dates date null,

    FOREIGN KEY (idContact) REFERENCES Contact(id),
    FOREIGN KEY (idproduit) REFERENCES produit(id),
    FOREIGN KEY (idCompte) REFERENCES compte(id)

);

CREATE TABLE PieceJournale (
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    idJournale INTEGER,
    dates DATE,
    intitule VARCHAR(255),
    idFacture INTEGER,
    FOREIGN KEY (idJournale) REFERENCES Journal(id),
    FOREIGN KEY (idFacture) REFERENCES Facture(id)
);



-------------------------------------------insert =======================================

INSERT INTO CompteGeneral (intitule, numero) VALUES
('capitaux', '1'),
('Immobilisations', '2'),
('stocks', '3'),
('Tiers', '4'),
('finances', '5'),
('Achats', '6'),
('Ventes', '7');

INSERT INTO Compte (idCompteGeneral,intitule_Sous_compte,sous_compte, compteTier) VALUES
(1,'capital','0', NULL),
(2,'immo incorporelle','0', NULL),
(3,'stocks','0', NULL),
(4,'fournisseur','0', NULL),
(5,'tresorerie','0', NULL),
(5,'banque','1', NULL),
(6,'consommable','0', NULL),
(7,'vente produit','0', NULL);

insert into solde (idCompte,solde) values 
(1,1000),
(2,1000),
(3,1000),
(4,1000),
(5,1000),
(6,1000),
(7,1000),
(8,1000);

INSERT into transactions (idCompte1, idCompte2, operation, valeur, natureTransaction, position, dates) VALUES
(5,3,'compte1 vers compte2',100,'credit','actif','2022-01-01'),
(1,5,'compte1 vers compte2',200,'debit','passif','2022-01-01'),
(5,5,'compte1 vers compte2',200,'debit','passif','2022-01-01'),
(3,7,'compte1 vers compte2',100,'credit','actif','2022-01-01'),
(7,1,'compte1 vers compte2',100,'credit','vente','2022-01-01');





INSERT INTO identite_Entreprise (logo, nomSociete, objetSociete, dateCreation, LieuExercice)
VALUES
('logo1.png', 'Mirentech & co', 'Objet de l Mirentech & co', '2022-01-01', 'Lieu A'),
('logo2.png', 'Entreprise B', 'Objet de l entreprise B', '2021-07-15', 'Lieu B'),
('logo3.png', 'Entreprise C', 'Objet de l entreprise C', '2020-03-31', 'Lieu C'),
('null','fournisseur X', 'fournisseur de legume', null, 'null'),
('null','Client A', 'null', null, 'null'),
('logo4.png','BOA', 'banque', '1999-09-08', 'Tana');


INSERT INTO Contact (idSociete, adresse, telephone, mail, Siege)
VALUES
(1, 'Adresse 1', '01 23 45 67 89', 'contact@mirentech', 'Tana'),
(1, 'Adresse 2', '01 23 45 67 90', 'commercial@mirentechcom', 'Tana'),
(2, 'Adresse 3', '01 23 45 67 91', 'contact@entrepriseB.com', ''),
(3, 'Adresse 4', '01 23 45 67 92', 'contact@entreprisec.com', ''),
(4, 'Adresse 5', '01 23 45 67 93', 'contact@Fournisseur.com', ''),
(5, 'Adresse 6', '01 23 45 67 94', 'contact@ClientA.com', ''),
(6, '3GQF+XRX, Tananarive', '034 30 875 55 ', 'BOA@gmail.com', '');


INSERT INTO Devise (nomDevise, Pays)
VALUES
('Ariary','Madagascar'),
('Euro', 'France'),
('Dollar américain', 'États-Unis'),
('Yen', 'Japon');


INSERT INTO Taux_Equivalence (idReference, idDevise, valeur, dates, taux)
VALUES
(2, 1, 2, '2022-01-01', 4500),
(3, 1, 1, '2021-07-15', 4000),
(4, 1, 300, '2020-03-31', 500);

INSERT INTO Departement (Descriptions) VALUES ('Ventes');
INSERT INTO Departement (Descriptions) VALUES ('Marketing');
INSERT INTO Departement (Descriptions) VALUES ('Développement');


INSERT INTO InfoComptabilite (idSociete, capitale, NIF, NSTAT, NRCS, idDevise)
VALUES
(1, 50.00, '1234567890', '12345', '12345B01', 1),
(2, 75.00, '0987654321', '67890', '67890B01', 1),
(6, 100.00, '1357902468', '13579', '13579B01', 1);

insert into Employe(nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete) 
    values ('Jean','Rakotobe','2-12-23',1,'comptable',1500,1,1);
insert into Employe(nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete) 
    values ('Jeanne','Rakotokely','2-12-23',1,'secretaire',256,1,1);
insert into Employe(nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete) 
    values ('Jeannot','Raketaka','2-12-23',2,'comptable',1500,1,2);
insert into Employe(nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete)
    values ('Jeannine','Ramangabe','2-12-23',2,'secretaire',256,1,2);


INSERT INTO Employe (nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete)
VALUES ('Dupont', 'Jean', '1985-03-25', 1, 'Ingénieur', 5.00, 1, 1);

INSERT INTO Employe (nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete)
VALUES ('Durand', 'Marie', '1990-07-11', 2, 'Marketing', 3.00, 1, 1 );

INSERT INTO Employe (nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete)
VALUES ('Martin', 'Pierre', '1980-05-16', 3, 'Développeur', 4500.00, 1 , 1);

INSERT INTO ExoComptable (DateDebut, DateFin, idInfoComptabilite)
VALUES ('2022-01-01', '2022-12-31', 1);

INSERT INTO ExoComptable (DateDebut, DateFin, idInfoComptabilite)
VALUES ('2022-01-01', '2022-12-31', 2);

INSERT INTO ExoComptable (DateDebut, DateFin, idInfoComptabilite)
VALUES ('2022-01-01', '2022-12-31', 3);

INSERT INTO Journal (nom)
VALUES ('Journal des ventes');

INSERT INTO Journal (nom)
VALUES ('Journal des achats');

INSERT INTO Journal (nom)
VALUES ('Journal Banque');

INSERT INTO Produit (nomProduit, PrixUnitaire, nombre,dates)
VALUES ('Produit 1', 25.00, 100,'12-12-12');

INSERT INTO Produit (nomProduit, PrixUnitaire, nombre,dates)
VALUES ('Produit 2', 35.00, 75,'12-12-12');

INSERT INTO Produit (nomProduit, PrixUnitaire, nombre,dates)
VALUES ('Produit 3', 45.00, 50,'12-12-12');

INSERT INTO Produit (nomproduit, PrixUnitaire, nombre,dates)
VALUES ('Produit A', 20, 500,'12-12-12');

INSERT INTO Produit (nomproduit, PrixUnitaire, nombre,dates)
VALUES ('Produit B', 30.00, 750,'12-12-12');

INSERT INTO Produit (nomproduit, PrixUnitaire, nombre,dates)
VALUES ('Produit C', 40.00, 300,'12-12-12');

-- insert into tva values (1,20);

-- insert into facture values (1,'13798513325','vendeur1','acheteur1',1,'espece',456.56,12);

-- insert into PieceJournale values (1,1,2,1,'2010-04-05',1205,1205,'intitule no1',1);


