<?php



session_start();
require_once("inc/fonction.php");

if(isset($_POST["confirmer"])) //confirmer is the button ORDER on the card in the produit.php
{

    $req="SELECT * FROM produit WHERE id_produit=".$_POST["id"]."";
    $resultat=executerequete($req);
    $produit=$resultat->fetch_assoc();   

    creationPanier();
    ajoutPanier($_POST["id"],$produit['titre'],$_POST["qte"],$produit['prix']);
    affiche_panier2();
    echo("<br>");
    //echo ("Montant global du panier : ".montant_global()." $");

    

}
else
{
    creationPanier();
    affiche_panier2();
}





?>