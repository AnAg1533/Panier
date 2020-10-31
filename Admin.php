<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'/>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>

        <form method="POST" enctype="multipart/form-data" action='traitment.php'>
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