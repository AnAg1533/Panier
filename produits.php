<?php 
      session_start();
      //session_destroy();
      //$_SESSION[] = array();


?>


<?php

  $server="localhost";
  $database="clothing";
  $password="password";
  $username="username";

  $conn = mysqli_connect($server,$username,$password,$database);

  if(!$conn)
  {
    die("Connection failed");
  }
 
  $sql = "SELECT * FROM produits";

  $result  = mysqli_query($conn,$sql);

 
 


?>
<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel='stylesheet' href='./css/style1.css'>
    
    <title>GIT WORKS! LOOK ANAS !!!</title>
  </head>
  <body>
    
    <div class='Header'>

            <h1>STORE.COM</h1>


            <form method='POST' action='pages/sort.php'>


            <input class='input'type='search' name='Search' class='Search' placeholder='Search For Item HERE'/>



            <select class='input' name='choix'>
                <option>T-Shirts</option>
                <option>Hoodies</option>
                <option>Manteaux</option>
                <option>Jeans</option>
                <option>Sweatpants</option>
                <option>Watches</option>
                <option>Accesories</option>
                <option>Sacs</option>
                <option>Bottes </option>
                <option>Espadries</option>
            
            </select>


            <input type='submit' class='sub' style='display:none'/>
            </form>

            
            <a href='/pages/Cart.php'><i title='View CART'class="fa fa-shopping-cart" style='font-size:2.8em'></i></a>



    </div>


    <div class='Products'>

    <?php


        if(mysqli_num_rows($result)>0)
          while($row = mysqli_fetch_assoc($result)) 
          {
            ?>
            
            <div class='ProductCard' style='background:#E9EAEB'>

            <div class='red' style='background:#E71E27'></div>
  
            <img src='./uploads/<?php echo $row['photo']?>' class='item'>
  
            <img class='logo' src='./images/H&M.png'/>
            <h1 class='description'><?php echo $row['titre'];?></h1>
            <form class='achat'>
                
                <label class='priceTag'>
                  Prix : <?php echo $row['prix']?> $
                  </label>
               
                
                <div>
                  
                  <label for='size'> 
                  taille :
                  </label> 
                    <select name='size'>
                      <option><?php echo $row['taille']?></option>
                      <option>32</option>
                      <option>34</option>
                      <option>36</option>
                    </select>
                </div>
                <div class='colors'>
                  Color : <?php echo $row['couleur'];?>
                </div>
  
                  
  
                <div><a href='fiche_produit.php?id_produit=<?php echo $row['id_produit']?>' class='confirmer'>LEARN MORE</a></div>
               
                
            </form>
        </div>
        <?php
          }
    ?>
     
     

      


      
    
    </div>


    <script src='./javascripts/script1.js'>
    </script>

  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>