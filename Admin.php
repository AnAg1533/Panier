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

        <form method="POST" enctype="multipart/form-data" action='traitment.php'>
            <h1>ADD A NEW PRODUCT</h1>
            <input type='text' placeholder='Nom De Produit' name='Nom'>
            <input type='number' placeholder='Prix De Produit' name='Prix'>
            <p>Logo Du Produit</p>
            <input type="file" name="productLogo">
            <p>Png du produit</p>
            <input type="file" name="productImage">
            <input type='submit'>
        </form>
    
    </body>
</html>