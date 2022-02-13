<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application PHP</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav>
        <ul>
            <?php 
                // AFFICHAGE DU MENU SELONS LES ROLES VISITEUR ET ADMIN, ET PAS ENCORE CONNECTÉ
                if(isset($_SESSION["role"]) && $_SESSION["role"]=="visiteur")
                    echo '<a href="accueil.visiteur.html.php">Home<img src="../img/undraw_happy_feeling_slmw.svg" alt="" srcset=""></a>';
                else if(isset($_SESSION["role"]) && $_SESSION["role"]=="admin"){
                    echo '<a href="accueil.admin.html.php">Home<img src="../img/undraw_happy_feeling_slmw.svg" alt="" srcset=""></a>';
                    echo ' <a href="show.user.html.php">Users<img src="../img/User Group_Flatline.svg" alt="" srcset=""></a>';
                }
                else
                    echo '<a href="index.php">Home<img src="../img/undraw_happy_feeling_slmw.svg" alt="" srcset=""></a>';
            ?>
            <a href="register.html.php">Sign Up<img src="../img/undraw_sign_in_re_o58h.svg" alt="" srcset=""></a>
        </ul>
        <ul class="ul2">
            <?php
                // SI LUSER EST CONNECTÉ PAS LA PEINE DE LUI MONTRER LE BOUTON SE CONNECTER
                if(!isset($_SESSION["email"]))
                    echo '
                        <a href="login.html.php">Sign In<img src="../img/undraw_authentication_re_svpt.svg" altsrcset=""></a>';
            ?>
            <form action="../controllers/security.php" method="post">
                <button type="submit" name="deconnexion">Sign Out
                    <img src="../img/undraw_travel_mode_re_2lxo.svg" alt="" srcset="">
                </button>
            </form>
        </ul>
    </nav>
    <section class='container'>
        <video muted autoplay loop>
            <source src='../img/pexels-mart-production-7565825.mp4' type='video/mp4'>
        </video>
        
