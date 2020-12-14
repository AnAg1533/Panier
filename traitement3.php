<?php
//session_start();
require_once("inc/fonction.php");

if(isset($_GET["indice"]))
{
    $i=$_GET["indice"];
    $idproduit=$_SESSION['panier']['id_produit'][(int)$i];
    supprimerItem($idproduit);
    header("location:panier.php");
}






if(isset($_GET["param"]))
{
    session_destroy();
    
    header("Location: panier.php");
}



if(isset($_GET["param2"]))
{
    $req1 ="SELECT id_commande FROM commande ORDER BY id_commande DESC LIMIT 1";
    $res = executerequete($req1);
    //var_dump($res);
    $produit=$res->fetch_assoc(); //fetch associatif de la req1 dans la variable $res et met sa dans $produit et donc affiche $produit['id_commande']
    //echo $produit['id_commande'];
    
    //recup du id de la commande actuelle
    $id_commande=(int)$produit['id_commande'] +1;
    
    $c=count($_SESSION['panier']['id_produit']);
    echo("<h3>Details of the order</h3></br>");
    echo("Order Number: ".$id_commande." </br>");
    echo("Number of articles: ".$c."</br>");
    echo("<h3>The Order : </h3></br>");
    
    for($i=0; $i <$c; $i++)
    {
        
        echo("Article ".$i.": ".$_SESSION['panier']['titre'][$i]."</br>");
    }
    
    echo("Montant du panier: ".montant_global()." $ </br>");
    echo("Frais de livraison:   ... </br>");
    $taxes = montant_global()*0.15;
    $montantAvecTx= montant_global()+$taxes;
    echo("Taxes: ".$taxes." $ </br>");
    echo("Montant Total a payer: ".$montantAvecTx." $ </br>");
    //echo("<h3>".montant_global()." $ </h3></br>");
    $conn=execute_conn();
    $req="INSERT INTO commande(date_commande,etat,prix) VALUES ('".date('m.d.y')."','en cours',".$montantAvecTx.")";
    
    if(mysqli_query($conn, $req))
    {
        echo ("<br>");
        echo "Effectuer le paiement par Paypal </br>";
    }
    else
        {
        echo "Error!!! : ".$req."<br>".mysqli_error($conn);
        
        }
        
        require_once("paypal.php");
    
}
    
    
    
    
    







?>