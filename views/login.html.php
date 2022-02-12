<?php
    include_once "../header.html.php";
    session_start();

    echo '
        <form class="login" method="post" action="../controllers/security.php">';
        if(isset($_SESSION["error"])){
            echo "<p style = 'font-size:25px;color: red;margin-top:-2%;'>".$_SESSION["error"]."</p>";
            unset($_SESSION["error"]);
        }
    echo' 
        <img src="../img/undraw_authentication_re_svpt.svg">
            <section>
                <label for="email">Enter Your Email</label>
                <input type="text" value="';if(isset($_SESSION["email"]))echo$_SESSION["email"];  echo'" name="email" id="email" >
            </section>
            <section>
                <label for="password">Enter Your Password</label>
                <input type="password" name="password" id="password">
            </section>
            <input type="submit" value="Sign In" name="seConnecter">
            <p><a href="register.html.php" style="color:white;">No account yet? Register here.</a></p>
        </form>
        ';
    session_destroy();
?>