<?php
session_start();

    if(isset($_GET["logout"])){
        if($_GET["logout"] == "true"){
            $_SESSION["email"] = null;
            header("Location: index.php");
        }

    }



    if(isset( $_SESSION["email"])){
        ?>

        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Dashboard</title>
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        </head>
        <?php
        include_once "includes/menu.php";
        ?>
        <body>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        </body>
        </html>

        <?php

    }
    else{
        header("Location: index.php");
    }



?>
