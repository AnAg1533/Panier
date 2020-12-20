<?php 

	session_start();
	session_destroy();
	$_SESSION=array();

		require_once("connexion.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
		body
		{
			background:url('./images/backg.jpg');
			background-repeat:no-repeat;
			background-attachment: fixed;
			background-size:cover;
		}
		.form1
		{
			width:400px;
			height:260px;
			display:flex;
			justify-content:space-evenly;
			flex-direction:column;
			padding:20px;
			background:rgb(0,0,0,0.9);
			border-radius:10px;
		}
		.form2
		{
			width:400px;
			height:500px;
			display:flex;
			justify-content:space-evenly;
			flex-direction:column;
			padding:20px;
			background:rgb(0,0,0,0.9);
			border-radius:10px;

		}
		.formsDiv
		{
			display:flex;
			justify-content: space-evenly;
			align-items:center;
			margin-top:100px;
		}

		h1
		{
			color:#1BC441;
			border-bottom:solid #1BC441;
			width:210px;
		}

		.Admin
		{
			color:#1BC441;
			font-weight:bold;
		}
        
    </style> 
    <title>1Welcome to Joker's Store </title>

  </head>
  <body>
		<a href='cpanelLogin.php' class='Admin'>Vers l'Admin --></a>
		<div class='formsDiv'>
			<form method="post" class='form1'>
					<h1>CONNEXION</h1>
					<input type="text" name="loginmembre"  placeholder="Login" value="">
					<input type="password" name="passwordmembre"  placeholder="Password" value="">
					<input type="submit" name="membre" value="Entrer">
				
			</form>
			<form method="post" class='form2'>		
				<h1>INSCRIPTION</h1>
				<input type="text" name="nom" placeholder="Nom" value="">
				<input type="text" name="prenom" placeholder="Prenom" value="">
				<input type="text" name="telephone"  placeholder="Telephone" value="">
				<input type="text" name="adresse"  placeholder="Adresse" value="">
				<input type="text" name="email"  placeholder="Email" value="">
				<input type="text" name="login"  placeholder="Login" value="">
				<input type="password" name="password" placeholder='password' value="">
				<input type="submit" name="inscrire" value="Inscrire">		
			</form>
		</div>
        
<?php
require_once("inc/fonction.php");

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
			//include("connexion.php");
			
			//3)Requete SQL d'inscription de membre
			//$inscription=mysqli_query($conn,"insert into membres values('$idmembre',
			//'$nom','$prenom','$telephone','$adresse','$email','$login','$password')")
			//or die("Erreur de requete SQL!");
			
			$sql = $conn -> prepare("insert into membres VALUES(?,?,?,?,?,?,?,?)");

			$sql -> execute(array($idmembre,$nom,$prenom,$telephone,$adresse,$email,$login,$password));
			




			
		}


        

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