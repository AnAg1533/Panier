<?php

    session_start();

    echo $_SESSION['username'];
    echo $_SESSION['password'];


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'/>
        <link rel='stylesheet' href='style.css'>
        <style>
            form
            {
                display:flex;
                width:500px;
                margin:auto;
                margin-top:100px;
                flex-direction:column;
                border:solid black;
                padding:30px;
            }
            input
            {
                margin:5px;
                width:200px;
                height:40px;

            }
        </style>
    </head>
    <body>

        <form method="POST" enctype="multipart/form-data" action='Admin.php'>
            <h1>ADD A NEW PRODUCT</h1>
            <input type='text' placeholder='Nom De Produit' name='Nom'/>
            <input type='text' placeholder='reference' name='Reference'/>
            <input type='text' placeholder='categorie' name='Categorie'/>
            <input type='text' placeholder='Code Hex Couleur' name='Couleur'/>
            <input type='text' placeholder='description' name='Description'/>
            <input type='text' placeholder='public' name='Public'/>
            <input type='number' placeholder='taille' name='Taille'/>
            <input type='number' placeholder='Prix De Produit' name='Prix'/>
            <input type='number' placeholder='en Stock' name='enStock'/>
            <p>Png du produit</p>
            <input type="file" name="productImage">
            <input type='submit'>
        </form>
    
    </body>
</html>

<?php

    $server = 'localhost';
    $username = 'username';
    $database = 'Clothing';
    $password ='password';

    try
    {
        $conn = new PDO("mysql:host=$server;dbname=$database",$username,$password);
        $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        echo "Connected";
    }
    catch(PDOException $e)
    {
        echo "Could not Connect due to some issues" .$e;
    }

    if(isset($_POST['Nom']) && isset($_POST['Reference']) && isset($_POST['Categorie']) && isset($_POST['Prix']) && isset($_POST['enStock']))
    {
        echo $_POST['Nom'];
        echo '<br/>';
        echo $_POST['Reference'];
        echo '<br/>';
        echo $_POST['Categorie'];
        echo '<br/>';
        echo $_POST['Prix'];
        echo '<br/>';
        echo $_POST['enStock'];
        echo '<br/>';


        $image = $_FILES['productImage']['name'];

        echo $image ;
        echo '<br/>';

        $target = "uploads/".basename($image);

        $sql = $conn ->prepare("INSERT INTO produits (reference,categorie,titre,description,couleur,taille,public,photo,prix,stock)
        VALUES (?,?,?,?,?,?,?,?,?,?)") ;
        
        if(move_uploaded_file($_FILES['productImage']['tmp_name'],$target))
        {
            echo "File moved to uploads";
            $sql -> execute(array($_POST['Reference'],$_POST['Categorie'],$_POST['Nom'],$_POST['Description'],$_POST['Couleur'],$_POST['Taille'],$_POST['Public'],$_FILES['productImage']['name'],$_POST['Prix'],$_POST['enStock']));
            if($sql)
            {
                echo "Query executed";
            }
            else
            {
                echo "Query failure try again";
            }
        }
        
        
        
       
    }
?>

