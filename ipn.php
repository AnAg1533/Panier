<?php
    require_once("inc/fonction.php");
    
    var_dump($_POST);
    $req="cmd=_notify-validate"; //creation de la requete
    //traitement du contenu de la variable post
    
    foreach($_POST as $key=> $value)
    {
        $value= urlencode(stripslashes($value));
        $req.="&$key=$value";
    }

    //fin traitement
    echo "<br>";
    //echo $req;


//debut de la requete
$fp=curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
curl_setopt($fp, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($fp, CURLOPT_POST, 1);
curl_setopt($fp, CURLOPT_RETURNTRANSFER,1);
curl_setopt($fp, CURLOPT_POSTFIELDS, $req);
curl_setopt($fp, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($fp, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($fp, CURLOPT_FORBID_REUSE, 1);
curl_setopt($fp, CURLOPT_HTTPHEADER, array('Connection: Close'));

if(!($res=curl_exec($fp)))
{
    curl_close($fp);
    exit;
}

        curl_close($fp);
        echo $res;
        
        //fin de la reqte
        
        //debut du code back end 
        if($res=="VERIFIED")
        {
            if($_POST["payment_status"] == "Completed")
            {
                $id_comm =(int) $_POST["custom"]; //cast en int car lobjet reprend tout en string alors tu dois mettre en int pour matcher la database Id !
                $montant =(int) $_POST["mc_gross"];
                $email = $_POST["payer_email"]; //pour lenvoi du email de confirmation au client!
                $r = "SELECT * FROM commande WHERE id_commande = ".$id_comm."";
                $resultat = executerequete($r);
                
                //cmpter le nombre de lignes du resultat
                
                $nb_rows = mysqli_num_rows($resultat);
                if($nb_rows >0)
                {
                    //echo "la commande existe dans la bd"; //test si sa marche !
                    $produit = $resultat ->fetch_assoc();//retourne les resultats dans un tableau associatif $produit
                    
                    echo $produit["prix"];
                    echo $montant;
                 
                    if((int)$produit["prix"] == $montant )
                    {
                       
                        $req2="UPDATE commande SET etat  = 'valide' WHERE id_commande =  ".$id_comm."";
                        $conn= execute_conn();
                            if(!mysqli_query($conn, $req2))
                            {
                               echo "Error!!! : ".$req2."<br>".mysqli_error($conn);
                            }
                            //fin du code de changement de letat de la commade
                            
                            //levoi du email
                            //mail($to,$subject,$message,$header,$parameters);
                            
                            $to="simteccart@gmail.com";
                            $sujet="test";
                            $message="Bonjour votre commande es confirmée.";
                            $from="commerce_electronique@teccart.com";
                            $headers="De :".$from;
                            mail($to,$sujet,$message,$headers);
                            
                            //fin de lenvoi email
                            
                            //afficher la commande confirmer au client
                            
                            echo"<h3> Commande numero : ".$idcomm."confirmee!</h3><br>";
                            echo"Les details de la livraison seront envoyer dans un autre email! <br>";
                            echo"merci de nous faire confiance! <br>";
                            echo"<a href=index.php> Retour vers l'acceuil du site</a>";
                            
                   
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                          
                    }
                    
                }
                else
                {
                    echo "La commande nexiste pas dans la base de donnee ";
                }
                
                
            }
            else
            {
                echo "payment non complete!";
            }
        }
        else
        {
            echo "les donnees sont incorrecte!";
        }


















?>