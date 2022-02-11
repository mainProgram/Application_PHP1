<?php
    include_once "../header.html.php";
    echo '
        <form class="register">
            <img src="../img/undraw_sign_in_re_o58h.svg">
            <section>
                <label for="email">Enter Your Email</label>
                <input type="text" name="email" id="email">
            </section>
            <section>
                <label for="password">Enter Your Password</label>
                <input type="text" name="password" id="password">
            </section>
            <section>
                <label for="confirmPassword">Confirm Your Password</label>
                <input type="text" name="confirmPassword" id="confirmPassword">
            </section>
            <section>
                <label for="role">Choose Your Role</label>
                <select name="role">
                    <option value="admin">Admin</option>
                    <option value="visiteur">Visiteur</option>
                </select>
            </section>
            <input type="submit" value="Register" name="inscription">
        </form>
        ';
?>