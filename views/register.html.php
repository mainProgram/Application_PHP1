<?php
    include_once "../header.html.php";
    session_start();

    echo '
    <form class="register" method="post" action="../controllers/security.php">';
        if(isset($_SESSION["error"])){
            echo "<p style = 'font-size:25px;color: red;margin-top:-2%;'>".$_SESSION["error"]."</p>";
            unset($_SESSION["error"]);
        }
        elseif(isset($_SESSION["error_registration"])){
            echo "<p style = 'font-size:25px;color: red;margin-top:-2%;'>".$_SESSION["error_registration"]."</p>";
            unset($_SESSION["error_registration"]);
        }
        elseif(isset($_SESSION["success_registration"])){
            echo "<p style = 'font-size:25px;color: green;margin-top:-2%;'>".$_SESSION["success_registration"]."</p>";
            unset($_SESSION["success_registration"]);
        }
        echo '
            <img src="../img/undraw_sign_in_re_o58h.svg">';

            if(isset($_SESSION["error_mail"])){
                echo "<p style = 'font-size:20px;color: red;margin-top:-5%;'>".$_SESSION["error_mail"]."</p>";
                unset($_SESSION["error_mail"]);
            }
        echo'
            <section>
                <label for="email">Enter Your Email</label>
                <input type="text" value="';if(isset($_SESSION["email"]))echo$_SESSION["email"];  echo'" name="email" id="email" >
            </section>';
            if(isset($_SESSION["error_password"])){
                echo "<p style = 'font-size:20px;color: red;margin-top:-5%;'>".$_SESSION["error_password"]."</p>";
                unset($_SESSION["error_password"]);
            }
        echo'
            <section>
                <label for="password">Enter Your Password</label>
                <input type="password" name="password" id="password">
            </section>';
            if(isset($_SESSION["error_confirmPassword"])){
                echo "<p style = 'font-size:20px;color: red;margin-top:-5%;'>".$_SESSION["error_confirmPassword"]."</p>";
                unset($_SESSION["error_confirmPassword"]);
            }
        echo'
            <section>
                <label for="confirmPassword">Confirm Your Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword">
            </section>
            <section>
                <label for="role">Choose Your Role</label>
                <select name="role" id="role">
                    <option value="admin">Admin</option>
                    <option value="visiteur">Visiteur</option>
                </select>
            </section>
            <input type="submit" value="Register" name="inscription">
        </form>
        ';
        session_destroy();
?>