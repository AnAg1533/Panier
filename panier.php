<html>
    <head>
        <meta charset='utf-8'/>
        <title></title>
        <link rel='stylesheet' href='./css/stylefiche.css'/>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

<?php


require_once("inc/fonction.php");

if(isset($_POST["ajout"])) //confirmer is the button ORDER on the card in the produit.php
{

    $req="SELECT * FROM produits WHERE id_produit=".$_POST["id"]."";
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



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>