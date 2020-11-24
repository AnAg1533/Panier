<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body{
            background-image:url(./images/boardwalk.jpg)  ;
            background-position: relative;
            background-size: cover;
        }
        .signin{
            
            background-color: white;
           
            align-content: center;
        }
        h1{
           color:red;
           position: absolute;
           margin-left: 575px;        
        }

        #logAdmin{
            float: right;
            margin-right: 50px;
            margin-top: 10px;
        }
        
    </style> 
    <title>1Welcome to Joker's Store </title>

  </head>
  <body>
       <!-- allo -->
         <!-- <table border="1" style="color:white;">
                <tr>
                    <td><a href="login.php">login</a></td>
                    <td><a href="inscription.php">register</a></td>
                </tr>
            </table>
 -->
        
       
         <div class="signin">
         <h1 style="background-color: black;">WELCOME TO JOKER'S STORE</h1>
         <a id="logAdmin" href="cpanelLogin.php"><input type="submit" value="Admin Login"></a>
         <table border="1px" width="100%">
	<tr>
		<td>
        <h3>Branchez-vous membre! </h3>
		<form method="post">
			<table>
				<tr><td>Login</td> <td><input type="text" name="loginmembre" value=""></td> </tr>
				<tr><td>Password</td> <td> <input type="password" name="passwordmembre" value=""></td></tr>
				<tr><td><input type="submit" name="membre" value="Entrer"></td>
				
				</tr>
			</table>
		</form>
		</td>
		<!-- Formulaire section inscription membre -->
		<td> 
			<h3> Incription d'un nouveau membre! </h3>
			<form method="post">
				<table>
				<tr><td>Nom</td> <td><input type="text" name="nom" value=""></td></tr>
				<tr><td>Prenom</td> <td><input type="text" name="prenom" value=""></td></tr>
				<tr><td>Telephone</td> <td><input type="text" name="telephone" value=""></td></tr>
				<tr><td>Adresse</td> <td><input type="text" name="adresse" value=""></td></tr>
				<tr><td>Email</td> <td><input type="text" name="email" value=""></td></tr>
				<tr><td>Login</td> <td><input type="text" name="login" value=""></td></tr>
				<tr><td>Password</td> <td><input type="password" name="password" value=""></td></tr>
				<tr><td><input type="submit" name="inscrire" value="Inscrire"></td></tr>
				</table>
			</form>

        </div> 
<?php



if(isset($_POST["inscrire"]))
		{
			$nom=$_POST["nom"];
			$prenom=$_POST["prenom"];
			$telephone=$_POST["telephone"];
			$adresse=$_POST["adresse"];
			$email=$_POST["email"];
			$login=$_POST["login"];
			$password=$_POST["password"];
			$idmembre=substr($nom,0,3).substr($prenom,0,2);
			
			//2)Connexion avec la base de donnees
			include("connexion.php");
			
			//3)Requete SQL d'inscription de membre
			$inscription=mysqli_query($conn,"insert into membres values('$idmembre',
			'$nom','$prenom','$telephone','$adresse','$email','$login','$password')")
			or die("Erreur de requete SQL!");
			
			




			//4) Analyse et affichage des resultats
			$nbre=mysqli_affected_rows($conn);
			if($nbre >0)
			{
				echo"Ajout de nouveau membre!";
			}
			else
			{
				echo"Echec d'ajout de nouveau membre!";
			}
		}


        session_start();

        //1)Recuperation des donnees par $_POST du MEMBRE
				if(isset($_POST["membre"]))
				{
					$loginmembre=$_POST["loginmembre"];
					$passwordmembre=$_POST["passwordmembre"];

				//creation des cookies
				setCookie('loginmembre',$_POST['loginmembre'],time()+10*60);
    			setCookie('passwordmembre',$_POST['passwordmembre'],time()+10*60);

				  //2) Connexion PHP-MYSQL
					//$conn=mysqli_connect('localhost','root','','bonnebouffe') or die("Erreur de connexion avec la BD!");
					include("connexion.php");
				  //3)Requete SQL avec PHP-MYSQL
					$requete=mysqli_query($conn,"select * from membres where login='$loginmembre' and password='$passwordmembre'") 
					or die("Erreur de requete SQL!");
				  
				  //4) Analyse et affichage 
					$nbre=mysqli_num_rows($requete);
					if($nbre > 0)
					{
						//Redirection a la page d'accueil des membres
						//header() en PHP
						$_SESSION['loginmembre']=$_POST['loginmembre'];
   						$_SESSION['passwordmembre']=$_POST['passwordmembre'];
						echo"<script>window.location.href='produits.php' ;</script>";
					}
					else
					{
						echo"Login et/ou password du membre incorrect!";
					}
				}
				







?>

















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>