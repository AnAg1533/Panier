<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>


    <style>

            body
            {
                background:url('./images/webback.jpg');
                background-size:cover;
                background-repeat:no-repeat;
            }
            .main
            {
                height:500px;
                width:800px;
                display:flex;
                width:500px;
                background:linear-gradient(to left,white,gray);
                padding:50px;
                margin:auto;
                margin-top:100px;
                border-radius:10px;
                width:40%;
            }
            img
            {
                height:300px;
                width:300px;
                width:60%;
            }
            h1
            {
                color:black;
                font-size:1.2em;
                
            }

    </style>
  </head>
  <body>
    <?php 
    
        if(isset($_GET['id']))
        {
            echo $_GET['id'];
        }

        
        $server="localhost";
        $database="clothing";
        $password="password";
        $username="username";

        $conn = mysqli_connect($server,$username,$password,$database);

        if(!$conn)
        {
            die("Connection failed");
        }
        $id = $_GET['id'];

        $sql = "SELECT * FROM produits where id_produit='" . $id . "'";

        $result  = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0)
       
            while($row = mysqli_fetch_assoc($result))
            {
                ?>
            <div class='main'>
                <img src='./uploads/<?php echo $row['photo'];?>'/>
                <div class='side'>
                <h1><?php echo $row['titre'];?></h1>
                <h1>PRICE : <?php echo $row['prix'];?></h1>
                <h1><?php echo $row['description'];?></h1>
                <h1>Categorie : <?php echo $row['categorie'];?></h1>
                <!-- <a href='Ajouter.php?id=?php echo $row['id_produit']; ?>'>ADD TO CART</a> -->

                <form method="POST" action="panier.php">
                    <select name='qte'>
                        <?php
                            for($i=1; $i<$row['stock'] && $i <= 10; $i++)
                            {
                                echo "<option value=".$i.">".$i."</option>";
                            }
                        ?>
                    </select>

                    <input type='hidden' name='id' value="<?php echo $produit['id_produit']?>"/>
                    <input type='submit' name='ajout' value="Ajouter_Panier"/>

                </form>

                <a href='produits.php'>Retour vers la selection de t-shirt</a>
                </div>
            </div>
                <?php
            }
       
    
    ?>


        



    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>