<?php 

session_start();

    echo $_POST['username'];
    echo $_POST['password'];

    if(isset($_POST['username']) && isset($_POST['password']))
    {
        if($_POST['username'] == 'admin' && $_POST['password'] == 'admin')
        {   

            $_SESSION['username'] = 'admin';
            $_SESSION['password'] = 'password';
            header('location:./Admin.php');
        }
    }
    else
    {
        echo "The shit was not found or incorrect";
        header('location:./cpanelLogin.php');
    }




?>