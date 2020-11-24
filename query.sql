CREATE DATABASE Clothing;


CREATE TABLE produit(id INT AUTO_INCREMENT,
nomProduit VARCHAR(255),prixProduit VARCHAR(255),
logoProduit VARCHAR(255),imageProduit VARCHAR(255),
PRIMARY KEY(id));



create table membres (idmembre VARCHAR(20) NOT NULL,nom VARCHAR(100) NOT NULL,prenom VARCHAR(100) NOT NULL,adresse VARCHAR(100) NOT NULL, telephone VARCHAR(100) NOT NULL,email VARCHAR(100) NOT NULL
                      ,login VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL, PRIMARY KEY(idmembre));