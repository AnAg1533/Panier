CREATE DATABASE Clothing;

CREATE TABLE produits(id_produit INT AUTO_INCREMENT,reference VARCHAR(20),
categorie VARCHAR(20),titre VARCHAR(20),description VARCHAR(20),
couleur VARCHAR(20),taille VARCHAR(20),public VARCHAR(20),photo VARCHAR(50),
prix INT,stock INT,PRIMARY KEY(id_produit));



create table membres (idmembre VARCHAR(20) NOT NULL,nom VARCHAR(100) NOT NULL,prenom VARCHAR(100) NOT NULL,adresse VARCHAR(100) NOT NULL, telephone VARCHAR(100) NOT NULL,email VARCHAR(100) NOT NULL
                      ,login VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL, PRIMARY KEY(idmembre));