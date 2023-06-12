create table reserve(
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    montant DECIMAL(10,2),
    dates date
);

create table resultat(
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    dates date NOT NULL

);

create table Emprunt(
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    dates date NOT NULL
);

-- --------------------immobilisation---------------------    ----
create table immobilisation_incorporelles(
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    dates date NOT NULL
);
create table immobilisation_corporelles(
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    dates date NOT NULL
);
--------------------------stocks-------------------------------
CREATE TABLE Produit (
    id serial PRIMARY KEY,
    nomProduit VARCHAR(255),
    PrixUnitaire DECIMAL(10,2),
    nombre INTEGER
);

CREATE TABLE Stocks (
    id serial PRIMARY KEY,
    idProduit Integer, 
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    dates date NOT NULL,
    FOREIGN KEY (idProduit) REFERENCES Produit(id)
);

create view Stocks_view as
    select stocks.id as idstocks,produit.id as idProduit,nomProduit,PrixUnitaire,nombre,(PrixUnitaire * nombre) as valeurTotal,debit,Credit,dates 
    from Stocks join Produit on Stocks.idProduit = Produit.id;

--------------------------entreprise--------------------------------------
-- CREATE TABLE Compte (
--     id serial PRIMARY KEY,
--     nom VARCHAR(255),
--     Debit DECIMAL(10,2),
--     Credit DECIMAL(10,2)
-- );


CREATE TABLE identite_Entreprise (
    id serial PRIMARY KEY,
    logo VARCHAR(255) null,
    nomSociete VARCHAR(255) null,
    objetSociete TEXT null,
    dateCreation DATE null ,
    LieuExercice VARCHAR(255) null
);


CREATE TABLE Contact (
    id serial PRIMARY KEY,
    idSociete INTEGER null,
    adresse VARCHAR(255) NULL,
    telephone VARCHAR(255) , 
    mail VARCHAR(255) NULL,
    Siege varchar(15) NUll,
    
    FOREIGN KEY (idSociete) REFERENCES identite_Entreprise(id)

);

CREATE TABLE Departement (
    id serial PRIMARY KEY,
    Descriptions VARCHAR(255)
);


CREATE TABLE Devise (
    id serial PRIMARY KEY,
    nomDevise VARCHAR(255),
    Pays VARCHAR(255)
);

CREATE TABLE Taux_Equivalence (
    id serial PRIMARY KEY,
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
    id serial PRIMARY KEY,
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
    id serial PRIMARY KEY,
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
    id serial PRIMARY KEY,
    DateDebut DATE,
    DateFin DATE,
    idInfocomptabilite INTEGER,
    FOREIGN KEY (idInfocomptabilite) REFERENCES InfoComptabilite(id)
);
---------------------------Tiers------------------------------------------

CREATE TABLE compteTier (
    id serial PRIMARY KEY,
    nom VARCHAR(255),
    idContact INTEGER,
    FOREIGN KEY (idContact) REFERENCES contact(id)
);

create table Personnel_entreprise(
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    idpersonnel integer,
    dates date,
    FOREIGN KEY (idpersonnel) REFERENCES Employe(id)
);

create table Organisme_sociaux(
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    idcompteTier integer,
    dates date,

    FOREIGN KEY (idCompteTier) REFERENCES compteTier(id)
);

create table Fournisseur(
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    idCompteTier integer,
    dates date,

    FOREIGN KEY (idCompteTier) REFERENCES compteTier(id)
); 

create table caisse(
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    dates date NOT NULL
    
);
create table client (
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    dates date NOT NULL
);

create table Compte_associe(
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    idCompteTiere integer,
    dates date NOT NULL,

    FOREIGN KEY (idCompteTiere) REFERENCES compteTier(id)
);

create table Debiteur_crediteur_divers(
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    idCompteTiere integer,
    dates date NOT NULL,
    FOREIGN KEY (idCompteTiere) REFERENCES compteTier(id)

);



create table Etat(
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    dates date NOT NULL
);




----------------------------finance--------------------------------------
create table Banque (
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    dates date NOT NULL

);
create table Tresorerie (
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    dates date NOT NULL

);



create table charge (
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    dates date NOT NULL
);

create table vente (
    id serial PRIMARY KEY,
    debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    dates date NOT NULL
);

CREATE TABLE Tva (
    id INT PRIMARY KEY,
    Taux NUMERIC(5,2)
);

-------------------------------journal--------------------------------

-- CREATE TABLE Facture (
--     id serial PRIMARY KEY,
--     idstocks INTEGER,
--     idproduit INTEGER,
--     NumFacture VARCHAR(255),
--     vendeur VARCHAR(255),
--     acheteur VARCHAR(255),
--     idContact INT,
--     ModePayement VARCHAR(255),
--     prix NUMERIC(10,2),
--     nombre INT,
--     dates date null,

--     FOREIGN KEY (idContact) REFERENCES Contact(id),
--     FOREIGN KEY (idproduit) REFERENCES produit(id),
--     FOREIGN KEY (idstocks) REFERENCES Stocks(id)

-- );

CREATE TABLE Journal (
    id serial PRIMARY KEY ,
    nom VARCHAR(255)
);
-- >>>>>>>>>>>>>>>>>>>>>>>>>>>Achat<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    CREATE TABLE FactureAchat (
    id serial PRIMARY KEY,
    idstocks INTEGER,
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
    FOREIGN KEY (idstocks) REFERENCES Stocks(id)

);

CREATE TABLE PieceJournaleAchat (
    id serial PRIMARY KEY,
    idJournale INTEGER,
    idCompteCollectif INTEGER,
    idCompteTiere INTEGER,
    dates DATE,
    Debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    intitule VARCHAR(255),
    idFacture INTEGER,
    FOREIGN KEY (idJournale) REFERENCES Journal(id),
    FOREIGN KEY (idCompteCollectif) REFERENCES charge(id),
    FOREIGN KEY (idCompteTiere) REFERENCES compteTier(id),
    FOREIGN KEY (idFacture) REFERENCES FactureAchat(id)
);
-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>vente<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<.


    CREATE TABLE FactureVente (
    id serial PRIMARY KEY,
    idstocks INTEGER,
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
    FOREIGN KEY (idstocks) REFERENCES Stocks(id)

);

CREATE TABLE PieceJournaleVente (
    id serial PRIMARY KEY,
    idJournale INTEGER,
    idCompteCollectif INTEGER,
    idCompteTiere INTEGER,
    dates DATE,
    Debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    intitule VARCHAR(255),
    idFacture INTEGER,
    FOREIGN KEY (idJournale) REFERENCES Journal(id),
    FOREIGN KEY (idCompteCollectif) REFERENCES vente(id),
    FOREIGN KEY (idCompteTiere) REFERENCES compteTier(id),
    FOREIGN KEY (idFacture) REFERENCES FactureVEnte(id)
);

-- >>>>>>>>>>>>>>>>>>>>>>>>>>banque<<<<<<<<<<<<<<<<<<<<<<<<<<
    CREATE TABLE FactureBanque (
    id serial PRIMARY KEY,
    NumFacture VARCHAR(255),
    vendeur VARCHAR(255),
    acheteur VARCHAR(255),
    idContact INT,
    ModePayement VARCHAR(255),
    valeur NUMERIC(10,2),
    raison varchar (255),
    dates date null,

    FOREIGN KEY (idContact) REFERENCES Contact(id)

);

CREATE TABLE PieceJournaleBanque (
    id serial PRIMARY KEY,
    idJournale INTEGER,
    idCompteCollectif INTEGER,
    idCompteTiere INTEGER,
    dates DATE,
    Debit DECIMAL(10,2),
    Credit DECIMAL(10,2),
    intitule VARCHAR(255),
    idFacture INTEGER,
    FOREIGN KEY (idJournale) REFERENCES Journal(id),
    FOREIGN KEY (idCompteCollectif) REFERENCES Banque(id),
    FOREIGN KEY (idCompteTiere) REFERENCES compteTier(id),
    FOREIGN KEY (idFacture) REFERENCES FactureBanque(id)
);
-- __________il reste les a nouveaux et la specification pour les ventes

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

-- INSERT INTO Compte (nom, Debit, Credit)
-- VALUES
-- ('Compte A', 500.00, 0.00),
-- ('Compte B', 0.00, 200.00),
-- ('Compte C', 1000.00, 0.00);

INSERT INTO Taux_Equivalence (idReference, idDevise, valeur, dates, taux)
VALUES
(2, 1, 2000, '2022-01-01', 4500),
(3, 1, 1000, '2021-07-15', 4000),
(4, 1, 300000, '2020-03-31', 500);

INSERT INTO InfoComptabilite (idSociete, capitale, NIF, NSTAT, NRCS, idDevise)
VALUES
(1, 50000.00, '1234567890', '12345', '12345B01', 1),
(2, 75000.00, '0987654321', '67890', '67890B01', 1),
(6, 100000.00, '1357902468', '13579', '13579B01', 1);

INSERT INTO Departement (Descriptions) VALUES ('Ventes');
INSERT INTO Departement (Descriptions) VALUES ('Marketing');
INSERT INTO Departement (Descriptions) VALUES ('Développement');


INSERT INTO Employe (nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete)
VALUES ('Dupont', 'Jean', '1985-03-25', 1, 'Ingénieur', 5000.00, 1, 1);

INSERT INTO Employe (nom, prenom, dateNaissance, idDepartement, metier, salaire, pouvoirExecutif, idSociete)
VALUES ('Durand', 'Marie', '1990-07-11', 2, 'Marketing', 3000.00, 1, 1 );

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

INSERT INTO compteTier (nom, idContact)
VALUES ('Client A', 5);

INSERT INTO compteTier (nom, idContact)
VALUES ('BOA', 6);

INSERT INTO compteTier (nom, idContact)
VALUES ('Fournisseur X', 4);

INSERT INTO Produit (nomProduit, PrixUnitaire, nombre)
VALUES ('Produit 1', 25.00, 100);

INSERT INTO Produit (nomProduit, PrixUnitaire, nombre)
VALUES ('Produit 2', 35.00, 75);

INSERT INTO Produit (nomProduit, PrixUnitaire, nombre)
VALUES ('Produit 3', 45.00, 50);

INSERT INTO Produit (nomproduit, PrixUnitaire, nombre)
VALUES ('Produit A', 20, 500);

INSERT INTO Produit (nomproduit, PrixUnitaire, nombre)
VALUES ('Produit B', 30.00, 750);

INSERT INTO Produit (nomproduit, PrixUnitaire, nombre)
VALUES ('Produit C', 40.00, 300);

-- INSERT INTO Facture (idproduit, NumFacture, vendeur, acheteur, idContact, ModePayement, prixUnitaire, nombre)
-- VALUES (1, 'FAC0001', 'SARL X', 'Client A', 1, 'Carte bancaire', 500.00, 25);

-- INSERT INTO Facture (idproduit, NumFacture, vendeur, acheteur, idContact, ModePayement, prixUnitaire, nombre)
-- VALUES 
--     (1, 'FAC0002', 'SARL Y', 'Client B', 2, 'Carte bancaire', 5000.00, 25),
--     (2, 'FAC0003', 'SARL Z', 'Client C', 3, 'Carte bancaire', 501.00, 20);

-- INSERT INTO Journal (nom) VALUES ('Journal des ventes', 1);
-- INSERT INTO Journal (nom) VALUES ('Journal des achats', 2);
-- INSERT INTO Journal (nom) VALUES ('Journal des opérations diverses', 3);

-- INSERT INTO PieceJournale (idJournale, idCompteCollectif, idCompteTiere, dates, Debit, Credit, intitule, idFacture)
-- VALUES (1, 4, 5, '2022-12-01', 100.00, 0.00, 'Vente de produit X', 1);

-- INSERT INTO PieceJournale (idJournale, idCompteCollectif, idCompteTiere, dates, Debit, Credit, intitule, idFacture)
-- VALUES (2, 6, 7, '2022-12-05', 0.00, 75.00, 'Achat de fournitures de bureau', 2);

-- INSERT INTO PieceJournale (idJournale, idCompteCollectif, idCompteTiere, dates, Debit, Credit, intitule, idFacture)
-- VALUES (3, 8, 9, '2022-12-10', 250.00, 0.00, 'Paiement du loyer', 3);
