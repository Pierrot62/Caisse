#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS caisseenregistreuse;
USE caisseenregistreuse;


#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        idUser      Int  Auto_increment PRIMARY KEY NOT NULL ,
        identifiant Varchar (50) NOT NULL ,
        motDePasse  Varchar (50) NOT NULL ,
        role        Int NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: Tva
#------------------------------------------------------------

CREATE TABLE Tva(
        idTva   Int  Auto_increment  PRIMARY KEY  NOT NULL ,
        tauxTva Float NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: Categories
#------------------------------------------------------------

CREATE TABLE Categories(
        idCategorie      Int  Auto_increment  PRIMARY KEY  NOT NULL ,
        libelleCategorie Varchar (50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: Articles
#------------------------------------------------------------

CREATE TABLE Articles(
        idArticle      Int  Auto_increment  PRIMARY KEY  NOT NULL ,
        libelleArticle Varchar (50) NOT NULL ,
        prixHt         Float NOT NULL ,
        codeBarre      Varchar (50) NOT NULL ,
        idTva          Int NOT NULL ,
        idCategorie    Int NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



#------------------------------------------------------------
# Table: Caisses
#------------------------------------------------------------

CREATE TABLE Caisses(
        idCaisse    Int  Auto_increment  PRIMARY KEY  NOT NULL ,
        nomCaisse   Varchar (50) NOT NULL ,
        totalCaisse float NOT NULL ,
        date        Date NOT NULL ,
        idUser      Int NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: ModePaiements
#------------------------------------------------------------

CREATE TABLE ModesPaiements(
        idModePaiement   Int  Auto_increment PRIMARY KEY  NOT NULL ,
        typePaiement Varchar (50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: Tickets
#------------------------------------------------------------

CREATE TABLE Tickets(
        idTicket   Int  Auto_increment PRIMARY KEY  NOT NULL ,
        prixHT     Float NOT NULL ,
        date       Date NOT NULL ,
        montantTVA Float NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: lignesTickets
#------------------------------------------------------------

CREATE TABLE lignesTickets(
        idligneTicket Int  Auto_increment PRIMARY KEY NOT NULL ,
        quantite  Int NOT NULL ,
        prixHt  float NOT NULL ,
        montantTva  float NOT NULL ,
        idTicket  Int NOT NULL ,
        idArticle Int NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: Paiements
#------------------------------------------------------------

CREATE TABLE Paiements(
        idPaiement  Int  Auto_increment  PRIMARY KEY  NOT NULL ,
        idModePaiement Int NOT NULL ,
        idTicket   Int NOT NULL ,
        prixTTC    Float NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_tva` FOREIGN KEY (`idTva`) REFERENCES `Tva` (`idTva`);

ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_categories` FOREIGN KEY (`idCategorie`) REFERENCES `Categories` (`idCategorie`);

ALTER TABLE `caisses`
  ADD CONSTRAINT `fk_caisses_users` FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`);

ALTER TABLE `lignesTicketss`
  ADD CONSTRAINT `fk_lignesTickets_tickets` FOREIGN KEY (`idTicket`) REFERENCES `Tickets` (`idTicket`);

ALTER TABLE `lignesTicketss`
  ADD CONSTRAINT `fk_lignesTickets_articles` FOREIGN KEY (`idArticle`) REFERENCES `Articles` (`idArticle`);

ALTER TABLE `paiements`
  ADD CONSTRAINT `fk_paiements_ModePaiements` FOREIGN KEY (`idModePaiement`) REFERENCES `ModePaiements` (`idModePaiement`);

ALTER TABLE `paiements`
  ADD CONSTRAINT `fk_paiements_Ticket` FOREIGN KEY (`idTicket`) REFERENCES `Tickets` (`idTicket`);


INSERT INTO `tva` (`idTva`, `tauxTva`) VALUES(1, 20);
INSERT INTO `tva` (`idTva`, `tauxTva`) VALUES(2, 10);
INSERT INTO `tva` (`idTva`, `tauxTva`) VALUES(3, 5.5);

INSERT INTO `categories` (`idCategorie`, `libelleCategorie`) VALUES(1, 'papeterie');
INSERT INTO `categories` (`idCategorie`, `libelleCategorie`) VALUES(2, 'alimentaire');

INSERT INTO `users` (`idUser`, `identifiant`, `motDePasse`, `role`) VALUES(2, 'user', 'user', 1);
INSERT INTO `users` (`idUser`, `identifiant`, `motDePasse`, `role`) VALUES(3, 'admin', 'admin', 100);

INSERT INTO `articles` (`idArticle`, `libelleArticle`, `prixHt`, `codeBarre`, `idTva`, `idCategorie`) VALUES(3, 'Crayon', 25.45, '5447746843515', 1, 1);
INSERT INTO `articles` (`idArticle`, `libelleArticle`, `prixHt`, `codeBarre`, `idTva`, `idCategorie`) VALUES(4, 'pate', 1.5, '548475484845', 2, 2);

INSERT INTO `caisses` (`idCaisse`, `nomCaisse`, `totalCaisse`, `date`, `idUser`) VALUES(1, 'caisse1', 1500, '2020-11-24', 2);
INSERT INTO `caisses` (`idCaisse`, `nomCaisse`, `totalCaisse`, `date`, `idUser`) VALUES(2, 'caisse2', 120, '2020-11-24', 3);

INSERT INTO `tickets` (`idTicket`, `prixHT`, `date`, `montantTVA`) VALUES(1, 12.5, '2020-11-24', 1.25);

INSERT INTO `lignesTicketss` (`idlignesTickets`, `quantite`, `prixHt`, `montantTva`, `idTicket`, `idArticle`) VALUES(1, 5, 10, 3, 1, 3);
INSERT INTO `lignesTicketss` (`idlignesTickets`, `quantite`, `prixHt`, `montantTva`, `idTicket`, `idArticle`) VALUES(2, 2, 2.5, 2, 1, 4);

INSERT INTO `modepaiements` (`idModePaiement`, `typePaiement`) VALUES(1, 'Carte bancaire');
INSERT INTO `modepaiements` (`idModePaiement`, `typePaiement`) VALUES(2, 'Cheque');
INSERT INTO `modepaiements` (`idModePaiement`, `typePaiement`) VALUES(3, 'espece');

INSERT INTO `paiements` (`idPaiement`, `idModePaiement`, `idTicket`, `prixTTC`) VALUES(1, 1, 1, 10);
INSERT INTO `paiements` (`idPaiement`, `idModePaiement`, `idTicket`, `prixTTC`) VALUES(2, 3, 1, 3.75);




