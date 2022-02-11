<?php
    include_once "../header.html.php";
    echo '
        <form class="login">
            <img src="../img/undraw_authentication_re_svpt.svg">
            <section>
                <label for="email">Enter Your Email</label>
                <input type="text" name="email" id="email">
            </section>
            <section>
                <label for="password">Enter Your Password</label>
                <input type="text" name="password" id="password">
            </section>
            <input type="submit" value="Sign In" name="seConnecter">
        </form>
        ';
?>