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
    idCompteGeneral INTEGER not null,
    sous_compte text  null,
    intitule_Sous_compte text NOT NULL,
    compteTier text NULL ,
    position text not null,
    
    CONSTRAINT ck_position CHECK (position IN ('actif', 'passif', 'charge', 'vente')),
    FOREIGN KEY (idCompteGeneral) REFERENCES CompteGeneral(id)
);

create view v_Compte as
    select
    intitule as NomComptegeneral, 
    concat(numero,sous_compte) as numeroCompte ,
    intitule_Sous_compte as intitule,
    position,
    compteTier
    from CompteGeneral 
    join Compte 
    on CompteGeneral.id = Compte.idCompteGeneral;
    
create table Solde
(
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    idCompte INTEGER,
    Solde DECIMAL(65,2) not null,
    dates date NOT NULL,
    FOREIGN KEY (idCompte) REFERENCES Compte(id)
);



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
    CONSTRAINT ck_position_transaction CHECK (position IN ('actif', 'passif', 'charge', 'vente')),
    FOREIGN KEY (idCompte1) REFERENCES Compte(id),
    FOREIGN KEY (idCompte2) REFERENCES Compte(id)
);

CREATE TABLE Produit (
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    nomProduit VARCHAR(255),
    PrixUnitaire DECIMAL(10,2),
    nombre INTEGER,
    dates date NOT NULL
);
CREATE TABLE Stock(
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    nomProduit VARCHAR(255),
    PrixUnitaire DECIMAL(10,2),
    nombre INTEGER,
    dates date NOT NULL
);
create view Stocks_view as
    select id as idProduit,nomProduit,PrixUnitaire,nombre,(PrixUnitaire * nombre) as valeurTotal,dates 
    from Produit;


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
    JOIN Devise d2 ON d2.id = de.idDevise;
    -- WHERE d.nomDevise = 'ariary';


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
    FOREIGN KEY (idproduit) REFERENCES Produit(id),
    FOREIGN KEY (idCompte) REFERENCES Compte(id)

);

-- CREATE TABLE PieceJournale (
--     id INTEGER AUTO_INCREMENT PRIMARY KEY ,
--     idJournale INTEGER,
--     dates DATE,
--     intitule VARCHAR(255),
--     idFacture INTEGER,
--     FOREIGN KEY (idJournale) REFERENCES Journal(id),
--     FOREIGN KEY (idFacture) REFERENCES Facture(id)
-- );

create table stock_analytique
(
    id INTEGER AUTO_INCREMENT PRIMARY KEY ,
    idProduit INTEGER, 
    prix_vente_par_unite DECIMAL(65,2) not null,
    
    FOREIGN KEY (idProduit) REFERENCES Produit(id)
);



INSERT INTO CompteGeneral (intitule, numero) VALUES
('capitaux', '1'),
('Immobilisations', '2'),
('stocks', '3'),
('Tiers', '4'),
('finances', '5'),
('Achats', '6'),
('Ventes', '7');

INSERT INTO Compte (idCompteGeneral,intitule_Sous_compte,sous_compte,compteTier,position) VALUES
(1,'capital','0100', NULL,'passif'),
(1,'Reservere legal','0610',Null,'passif'),
(1,'Report a nouveau','1000',Null,'passif'),
(1,'report a nouveau solde crediteur','1010',Null,'passif'),
(1,'autre produit et charge','1200',Null,'passif'),
(1,'report a nouveau solde debiteur','1900',Null,'passif'),
(1,'resultat en instance','2800',Null,'passif'),
(1,'impots differes actif','3300',Null,'passif'),
(1,'emprunt a LT','6110',Null,'passif'),
(1,'emprunt a moyen terme','6510',Null,'passif');

INSERT INTO Compte (idCompteGeneral,intitule_Sous_compte,sous_compte,compteTier,position) VALUES
(2,'frais de rehabilitation','0124',NULL,'actif'),
(2,'autre immob incorporelles','0800',NULL,'actif'),
(2,'terrains','1100',NULL,'actif'),
(2,'construction','1200',NULL,'actif'),
(2,'Materiel et outillage','1300',NULL,'actif'),
(2,'matriel automobile','1510',NULL,'actif'),
(2,'materiel moto','1520',NULL,'actif'),
(2,'agencement. AM. INST','1600',NULL,'actif'),
(2,'materiels et mobilier de bureau','1810',NULL,'actif'),
(2,'materiels informatiques et autres','1819',NULL,'actif'),
(2,'MAT. MOB de logement','1820',NULL,'actif'),
(2,'autres immobilisation corp','1880',NULL,'actif'),
(2,'immobilisation en cours','3000',NULL,'actif'),
(2,'amort immob incorp','8000',NULL,'actif'),
(2,'amortissement des constructions','8120',NULL,'actif'),
(2,'amort mach-mater-outil','8130',NULL,'actif'),
(2,'amort mat de transport','8150',NULL,'actif'),
(2,'amort A.A.I','8160',NULL,'actif'),
(2,'amort materile & mob','8181',NULL,'actif'),
(2,'ammortissement materiels informatique','8182',NULL,'actif'),
(2,'amort mater & mob logt','8183',NULL,'actif');

INSERT INTO Compte (idCompteGeneral,intitule_Sous_compte,sous_compte,compteTier,position) VALUES
(3,'stocks','0', NULL,'actif'),
(3,'stock matieres premiers','2110',NULL,'actif'),
(3,'stock produit finis','5500',NULL,'actif'),
(3,'stock marchandises','7000',NULL,'actif');

INSERT INTO Compte (idCompteGeneral,intitule_Sous_compte,sous_compte,compteTier,position) VALUES
(3,'provisions/depreciations stocks','9700',NULL,'actif');

INSERT INTO Compte (idCompteGeneral,intitule_Sous_compte,sous_compte, compteTier,position) VALUES
(4,'fournisseur','0', NULL,'actif');

INSERT INTO Compte (idCompteGeneral,intitule_Sous_compte,sous_compte, compteTier,position) VALUES
(4,'fournisseurs d exploitations locaux','0110',NULL,'actif');

INSERT INTO Compte (idCompteGeneral,intitule_Sous_compte,sous_compte, compteTier,position) VALUES
(4,'fournisseurs d exploitation etrangers','0120',NULL,'actif'),
(4,'fournisseurs d imoilisation','0310',NULL,'actif'),
(4,'frns: facture a recevoir','0810',NULL,'actif'),
(4,'frns: avance & acomptes verser','0910',NULL,'actif'),
(4,'frns: rabais a obtenir','0980',NULL,'actif'),
(4,'client locaux','1110',NULL,'actif'),
(4,'client etrangers','1120',NULL,'actif'),
(4,'client douteux','1400',NULL,'actif'),
(4,'cient facture a retablir','1800',NULL,'actif'),
(4,'personnel: salaire a payer','2100',NULL,'actif'),
(4,'personnel: avance quinzaines','2510',NULL,'actif'),
(4,'personnel: avance speciales','2520',NULL,'actif'),
(4,'personnel: charges a payer','2860',NULL,'actif'),
(4,'CNAPS','3100',NULL,'actif'),
(4,'OSTIE','3120',NULL,'actif'),
(4,'etat IBS','4200',NULL,'actif'),
(4,'acompte IBS','4210',NULL,'actif'),
(4,'TVA...imputer: dec ulterieur','4321',NULL,'actif'),
(4,'etat: IRSA verser','4500',NULL,'actif'),
(4,'etat: TVA deductile','4560',NULL,'actif'),
(4,'etat: TVA collecte','4570',NULL,'actif'),
(4,'TVA a verser','4571',NULL,'actif');

INSERT INTO Compte (idCompteGeneral,intitule_Sous_compte,sous_compte, compteTier,position) VALUES
(5,'tresorerie','0', NULL,'actif'),
(5,'banque','1', NULL,'actif');

INSERT INTO Compte (idCompteGeneral,intitule_Sous_compte,sous_compte, compteTier,position) VALUES
(6,'consommable','0', NULL,'charge');

INSERT INTO Compte (idCompteGeneral,intitule_Sous_compte,sous_compte, compteTier,position) VALUES
(7,'vente produit','0', NULL,'vente'),
(7,'vente Local','0110',NULL,'vente'),
(7,'ventes a l exportation','0120',NULL,'vente'),
(7,'autres prod des act annex&acs','0800',NULL,'vente'),
(7,'variation de stock P.F','1300',NULL,'vente'),
(7,'autres produits d exploitation','5800',NULL,'vente'),
(7,'ecart/encaissement','5810',NULL,'vente'),
(7,'interet crediteur banques BNI','6200',NULL,'vente'),
(7,'interet crediteur Banques BOA','6300',NULL,'vente'),
(7,'Difference de change: Profit','6600',NULL,'vente');


insert into Solde (idCompte,Solde,dates) values 
(1,1000,'20220101'),
(2,1000,'20220101'),
(3,1000,'20220101'),
(4,1000,'20220101'),
(5,1000,'20220101'),
(6,1000,'20220101'),
(7,1000,'20220101');

INSERT into transactions (idCompte1, idCompte2, operation, valeur, natureTransaction, position, dates) VALUES
(5,3,'compte1 vers compte2',100,'credit','actif','20220101'),
(1,5,'compte1 vers compte2',200,'debit','passif','20220101'),
(5,5,'compte1 vers compte2',200,'debit','passif','20220101'),
(3,7,'compte1 vers compte2',100,'credit','actif','20220101'),
(7,1,'compte1 vers compte2',100,'credit','vente','20220101');

INSERT into transactions (idCompte1, idCompte2, operation, valeur, natureTransaction, position, dates) VALUES
(1,5,'compte1 vers compte2',200,'credit','passif','20220101');

INSERT into transactions (idCompte1, idCompte2, operation, valeur, natureTransaction, position, dates) VALUES
(5,3,'compte1 vers compte2',100,'debit','actif','20220201'),
(1,5,'compte1 vers compte2',200,'credit','passif','20220201'),
(5,5,'compte1 vers compte2',200,'credit','passif','20220201'),
(3,7,'compte1 vers compte2',100,'debit','actif','20220201'),
(7,1,'compte1 vers compte2',100,'debit','vente','20220201');





INSERT INTO identite_Entreprise (logo, nomSociete, objetSociete, dateCreation, LieuExercice)
VALUES
('logo1.png', 'Mirentech & co', 'Objet de l Mirentech & co', '20220101', 'Lieu A'),
('logo2.png', 'Entreprise B', 'Objet de l entreprise B', '20210715', 'Lieu B'),
('logo3.png', 'Entreprise C', 'Objet de l entreprise C', '20200331', 'Lieu C'),
('null','fournisseur X', 'fournisseur de legume', null, 'null'),
('null','Client A', 'null', null, 'null'),
('logo4.png','BOA', 'banque', '19990908', 'Tana');


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
('Dollar américain', 'ÉtatsUnis'),
('Yen', 'Japon');


INSERT INTO Taux_Equivalence (idReference, idDevise, valeur, dates, taux)
VALUES
(2, 1, 2, '20230524', 4500),
(3, 1, 1, '20230524', 4000),
(4, 1, 300, '20230524', 500);

INSERT INTO Departement (Descriptions) VALUES ('Ventes');
INSERT INTO Departement (Descriptions) VALUES ('Marketing');
INSERT INTO Departement (Descriptions) VALUES ('Développement');


INSERT INTO InfoComptabilite (idSociete, capitale, NIF, NSTAT, NRCS, idDevise)
VALUES
(1, 50.00, '1234567890', '12345', '12345B01', 1),
(2, 75.00, '0987654321', '67890', '67890B01', 1),
(6, 100.00, '1357902468', '13579', '13579B01', 1);

insert into Employe(nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete) 
    values ('Jean','Rakotobe','21223',1,'comptable',1500,1,1);
insert into Employe(nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete) 
    values ('Jeanne','Rakotokely','21223',1,'secretaire',256,1,1);
insert into Employe(nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete) 
    values ('Jeannot','Raketaka','21223',2,'comptable',1500,1,2);
insert into Employe(nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete)
    values ('Jeannine','Ramangabe','21223',2,'secretaire',256,1,2);


INSERT INTO Employe (nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete)
VALUES ('Dupont', 'Jean', '19850325', 1, 'Ingénieur', 5.00, 1, 1);

INSERT INTO Employe (nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete)
VALUES ('Durand', 'Marie', '19900711', 2, 'Marketing', 3.00, 1, 1 );

INSERT INTO Employe (nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete)
VALUES ('Martin', 'Pierre', '19800516', 3, 'Développeur', 4500.00, 1 , 1);

INSERT INTO ExoComptable (DateDebut, DateFin, idInfoComptabilite)
VALUES ('20220101', '20221231', 1);

INSERT INTO ExoComptable (DateDebut, DateFin, idInfoComptabilite)
VALUES ('20220101', '20221231', 2);

INSERT INTO ExoComptable (DateDebut, DateFin, idInfoComptabilite)
VALUES ('20220101', '20221231', 3);

-- INSERT INTO Journal (nom)
-- VALUES ('Journal des ventes');

-- INSERT INTO Journal (nom)
-- VALUES ('Journal des achats');

-- INSERT INTO Journal (nom)
-- VALUES ('Journal Banque');

INSERT INTO Produit (nomProduit, PrixUnitaire, nombre,dates)
VALUES ('Produit 1', 25.00, 100,'121212');
-- INSERT INTO Stock (nomProduit, PrixUnitaire, nombre,dates)
-- VALUES ('Produit 1', 25.00, 100,'121212');

-- INSERT INTO Produit (nomProduit, PrixUnitaire, nombre,dates)
-- VALUES ('Produit 2', 35.00, 75,'121212');

-- INSERT INTO Produit (nomProduit, PrixUnitaire, nombre,dates)
-- VALUES ('Produit 3', 45.00, 50,'121212');

-- INSERT INTO Produit (nomproduit, PrixUnitaire, nombre,dates)
-- VALUES ('Produit A', 20, 500,'121212');

-- INSERT INTO Produit (nomproduit, PrixUnitaire, nombre,dates)
-- VALUES ('Produit B', 30.00, 750,'121212');

-- INSERT INTO Produit (nomproduit, PrixUnitaire, nombre,dates)
-- VALUES ('Produit C', 40.00, 300,'121212');

--  insert into tva values (1,20);

--  insert into facture values (1,'13798513325','vendeur1','acheteur1',1,'espece',456.56,12);

--  insert into PieceJournale values (1,1,2,1,'20100405',1205,1205,'intitule no1',1);


-- ------------------- New base a partir de 12 janvier 2023 ----------------
-- Table client_compte
CREATE TABLE client_compte (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email varchar(255) NOT NULL,
    mdp VARCHAR(255) NOT NULL
);

-- Table admin_compte
CREATE TABLE admin_compte (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email varchar(255) NOT NULL,
    mdp VARCHAR(255) NOT NULL
);
INSERT INTO client_compte (nom, email, mdp) VALUES
('dipex', 'dipex@gmail.com', '1234'),
('MHM', 'mhm@gmail.com', '4321');

-- Insertions dans la table admin_compte
INSERT INTO admin_compte (nom, email, mdp) VALUES
('mirenty', 'mirentybg4@gmail.com', '0000'),
('mickael', 'mickael.gaiden@gmail.com', '000'),
('hasina', 'handrianasinoro@gmail.com', '00');


