<?php
    include_once "../header.html.php";

    if(isset($_SESSION["email"])){
        echo'<section class="admin">';
            if(isset($_SESSION["success_registration"])){
                echo "<p style = 'font-size:35px;color: green;margin-top:-2%;text-align:center'>".$_SESSION["success_registration"]."</p>";
                unset($_SESSION["success_registration"]);
            }
            echo'
            <img src="../img/undraw_welcome_cats_thqn.svg">
            <h1>HELLO DEAR ADMIN!</h1> 
        </section> ';
    }
    else
        header("location:index.php");
    include_once "../footer.html.php";
?>