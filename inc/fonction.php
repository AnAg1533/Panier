<?php
session_start();


function executerequete($req)
{


    $mysqli = new mysqli("localhost", "root", "", "clothing");

    if($mysqli->connect_error) die ("Un probleme est survenu lors de la tentative de connexion à la base de données: " .$mysqli->connect_error);
    
   
    
    $resultat=$mysqli->query($req);
    
    if (!$resultat)
        {
    die("Erreur sur la requete SQL:".$mysqli->error);
        }
    


return $resultat;
}

function creationPanier()
{
    if(!isset($_SESSION['panier']))
    {
        $_SESSION['panier']=array();
        $_SESSION['panier']['id_produit']=array();
        $_SESSION['panier']['titre']=array();
        $_SESSION['panier']['qte']=array();
        $_SESSION['panier']['prix']=array();
        $_SESSION['panier']['verrou']=false;
    }
    return true;
}



function ajoutPanier($id_produit,$titre,$qte_produit,$prix)
{
    $position=-1;
    foreach($_SESSION['panier']['id_produit'] as $key => $value)
    {
        if($value==$id_produit)
        {
            $position = $key;
        }
    }

    if($position==-1)
    {
        array_push($_SESSION['panier']['id_produit'],$id_produit);
        array_push($_SESSION['panier']['titre'],$titre);
        array_push($_SESSION['panier']['qte'],$qte_produit);
        array_push($_SESSION['panier']['prix'],$prix);
    }
    else {
        $_SESSION['panier']['qte'][$position] += $qte_produit;
    }

}




/* function affiche_panier()
{
    $count=count($_SESSION['panier']['id_produit']);
    for($i=0; $i <$count; $i++)
    {
        echo "ID: ".$_SESSION['panier']['id_produit'][$i].", Titre: ".$_SESSION['panier']['titre'][$i].", Quantite: "
        .$_SESSION['panier']['qte'][$i].", Prix unitaire: ".$_SESSION['panier']['prix'][$i]." <br>";
    }
} */

function affiche_panier2()
{
    $count = count($_SESSION['panier']['id_produit']);
    echo ("<table border>");
    echo ("<tr><td colspan=5> Panier d'achat</td></tr>");
    echo ("<tr><td>Titre</td><td>Id produit</td><td>Quantite</td><td>Prix unitaire $</td><td>Action</td></tr>");

    for($i=0; $i<$count; $i++)
    {
        echo "<tr><td>".$_SESSION['panier']['titre'][$i]."</td>
        <td>".$_SESSION['panier']['id_produit'][$i]."</td>
        <td>".$_SESSION['panier']['qte'][$i]."</td>
        <td>".$_SESSION['panier']['prix'][$i]."</td>
        <td><a href=traitement.php?indice=".$i."><input type=submit name=supprimer value=supprimer /></a></td></tr>";
    }
    echo("<tr><td colspan=3> Total</td><td colspan=2>".montant_global()."$ </td></tr>");
    echo("<tr><td colspan=5> <a href=traitement.php?param2=valider><input type=submit name=valider value=valider></a></td></tr>");
    echo("<tr><td colspan=5> <a href=traitement.php?param=delete> Vider mon panier</a></td></tr>");
    echo("<tr><td colspan=5> <a href=index.php> Boutique</a></td></tr>");
    echo("</table>");
}









function montant_global()
{
    $total=0;
    $count=count($_SESSION['panier']['id_produit']);
    for($i=0; $i <$count; $i++)
    {
        $total+=(int)$_SESSION['panier']['qte'][$i]*(int)$_SESSION['panier']['prix'][$i];
    }
    return $total;
}

function supprimerItem($idproduit)
{

    //Si le panier existe
    creationPanier() ;

       //Nous allons passer par un panier temporaire
       $tmp=array();
       $tmp['id_produit'] = array();
       $tmp['titre'] = array();
       $tmp['qte'] = array();
       $tmp['prix'] = array();
       $tmp['verrou'] = $_SESSION['panier']['verrou'];
 
       for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
       {
          if ($_SESSION['panier']['id_produit'][$i] !== $idproduit)
          {
             array_push( $tmp['id_produit'],$_SESSION['panier']['id_produit'][$i]);
             array_push( $tmp['titre'],$_SESSION['panier']['titre'][$i]);
             array_push( $tmp['qte'],$_SESSION['panier']['qte'][$i]);
             array_push( $tmp['prix'],$_SESSION['panier']['prix'][$i]);
          }
 
       }
       //On remplace le panier en session par notre panier temporaire à jour
       $_SESSION['panier'] =  $tmp;
       //On efface notre panier temporaire
       unset($tmp);
    }
 
 
 
    function execute_conn()
    {
        $mysqli=new mysqli("localhost", "root", "", "clothing");
        
        if($mysqli->connect_error)die("ERROR FROM CONNECTION!!");
        return $mysqli;
    }



?>