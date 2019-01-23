DROP DATABASE IF EXISTS MLR12;

CREATE DATABASE IF NOT EXISTS MLR12;
USE MLR12;
# -----------------------------------------------------------------------------
#       TABLE : TAILLE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TAILLE
 (
   NUMEROTAILLE BIGINT(4) NOT NULL  AUTO_INCREMENT,
   LIBELLETAILLE CHAR(255) NULL  ,
   MODIFICATEURPRIX DECIMAL(10,2) NULL  
   , PRIMARY KEY (NUMEROTAILLE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CLIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLIENT
 (
   NUMEROCLIENT BIGINT(4) NOT NULL  AUTO_INCREMENT,
   NOM CHAR(255) NULL  ,
   PRENOM CHAR(255) NULL  ,
   PSEUDO CHAR(255) NULL  ,
   ADRESSE CHAR(255) NULL  ,
   TELEPHONE CHAR(32) NULL  ,
   POINTSFIDELITE BIGINT(4) NULL  ,
   MOTDEPASSE CHAR(255) NULL  
   , PRIMARY KEY (NUMEROCLIENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : REDUCTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS REDUCTION
 (
   NUMEROREDUCTION BIGINT(4) NOT NULL  AUTO_INCREMENT,
   NOMBREPOINTSNECESSAIRE BIGINT(4) NULL  ,
   LIBELLEREDUCTION CHAR(255) NULL  ,
   REDUCTION DECIMAL(10,2) NULL  
   , PRIMARY KEY (NUMEROREDUCTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PIZZA
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PIZZA
 (
   NUMEROPIZZA BIGINT(4) NOT NULL  AUTO_INCREMENT,
   NUMEROTAILLE BIGINT(4) NOT NULL  ,
   NOM CHAR(255) NULL  ,
   PRIXBASE DECIMAL(10,2) NULL  
   , PRIMARY KEY (NUMEROPIZZA) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PIZZA
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PIZZA_TAILLE
     ON PIZZA (NUMEROTAILLE ASC);

# -----------------------------------------------------------------------------
#       TABLE : INGREDIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INGREDIENT
 (
   NUMEROINGREDIENT BIGINT(4) NOT NULL AUTO_INCREMENT ,
   NOM CHAR(255) NULL  ,
   DUREE INTEGER NULL  
   , PRIMARY KEY (NUMEROINGREDIENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMMANDE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMANDE
 (
   NUMEROREDUCTION BIGINT(4) NOT NULL AUTO_INCREMENT ,
   NUMEROCLIENT BIGINT(4) NOT NULL  ,
   NUMEROPIZZA BIGINT(4) NOT NULL  ,
   NUMEROCOMMANDE BIGINT(4) NOT NULL  ,
   NOMBREPIZZA INTEGER NULL  ,
   DATECOMMANDE DATE NULL  ,
   HEURECOMMANDE TIME NULL  ,
   COMMENTAIRE CHAR(255) NULL  
   , PRIMARY KEY (NUMEROREDUCTION,NUMEROCOMMANDE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMMANDE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMMANDE_CLIENT
     ON COMMANDE (NUMEROCLIENT ASC);

CREATE  INDEX I_FK_COMMANDE_PIZZA
     ON COMMANDE (NUMEROPIZZA ASC);

CREATE  INDEX I_FK_COMMANDE_REDUCTION
     ON COMMANDE (NUMEROREDUCTION ASC);

# -----------------------------------------------------------------------------
#       TABLE : COMPOSE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPOSE
 (
   NUMEROPIZZA BIGINT(4) NOT NULL  ,
   NUMEROINGREDIENT BIGINT(4) NOT NULL  
   , PRIMARY KEY (NUMEROPIZZA,NUMEROINGREDIENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMPOSE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMPOSE_PIZZA
     ON COMPOSE (NUMEROPIZZA ASC);

CREATE  INDEX I_FK_COMPOSE_INGREDIENT
     ON COMPOSE (NUMEROINGREDIENT ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE PIZZA 
  ADD FOREIGN KEY FK_PIZZA_TAILLE (NUMEROTAILLE)
      REFERENCES TAILLE (NUMEROTAILLE) ;


ALTER TABLE COMMANDE 
  ADD FOREIGN KEY FK_COMMANDE_CLIENT (NUMEROCLIENT)
      REFERENCES CLIENT (NUMEROCLIENT) ;


ALTER TABLE COMMANDE 
  ADD FOREIGN KEY FK_COMMANDE_PIZZA (NUMEROPIZZA)
      REFERENCES PIZZA (NUMEROPIZZA) ;


ALTER TABLE COMMANDE 
  ADD FOREIGN KEY FK_COMMANDE_REDUCTION (NUMEROREDUCTION)
      REFERENCES REDUCTION (NUMEROREDUCTION) ;


ALTER TABLE COMPOSE 
  ADD FOREIGN KEY FK_COMPOSE_PIZZA (NUMEROPIZZA)
      REFERENCES PIZZA (NUMEROPIZZA) ;


ALTER TABLE COMPOSE 
  ADD FOREIGN KEY FK_COMPOSE_INGREDIENT (NUMEROINGREDIENT)
      REFERENCES INGREDIENT (NUMEROINGREDIENT) ;

