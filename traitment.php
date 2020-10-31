<?php

    $Nom = $_POST['Nom'];
    $Prix = $_POST['Prix'];

    echo $Nom;
    echo "<br/>";
    echo $Prix;
    echo "<br/>";

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


    $image = $_FILES['productImage']['name'];
    $logo = $_FILES['productLogo']['name'];
    $target = './uploads/'.basename($image);
    $target2 = './uploads/'.basename($logo);

    echo $image;
    echo "<br/>".$logo;

    //if(move_uploaded_file($_FILES['productImage']['tmp_name'],$target) &&
    //move_uploaded_file($_FILES['productLogo']['tmp_name'],$target2))
    //{
      //  echo "Images uploaded succesfully";
    //}
    //else
    //{
      //  echo "images not uploaded"; 
    //}



?>