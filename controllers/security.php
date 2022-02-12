<?php
    require_once "../functions.php";
    extract($_POST);
    session_start();

    $file = "/opt/lampp/htdocs/Application_PHP1/registration.json";
    $tabAllUsers = get_all_users($file);


    if(isset($seConnecter)){
        $_SESSION["email"] = $email;
        if(are_mail_and_password_correct($email, $password, $tabAllUsers)){
            $rol = are_u_user_or_admin($email, $tabAllUsers);
            if($rol=="admin")
                header("Location:../views/accueil.admin.html.php");
            else
                header("Location:../views/accueil.visiteur.html.php");
        }
        else{
            $_SESSION["error"] = "Mail address or password not valid !";
            header("Location:../views/login.html.php");
        }
    }

    if(isset($inscription)){
        $_SESSION["email"] = $email;
        if(isset($email) && isset($password) && isset($confirmPassword) && !empty($email) && !empty($password) && !empty($confirmPassword)){
            if(is_mail_valid($email) && $password == $confirmPassword && strlen($password)>=8) 
            {
                if(!is_mail_already_used($tabAllUsers,$email)){
                    $newRegistration = array(
                        "email" => $email,
                        "password" => $password,
                        "role" => $role
                    );
                    if(add_user($newRegistration, $file))
                        $_SESSION["success_registration"] = "You are registered";
                    else
                        $_SESSION["error_registration"] = "Error ! try again.";
                }
                else
                    $_SESSION["error_mail"] = "Mail address already used !";          
            }
            else{
                if(!is_mail_valid($email))
                    $_SESSION["error_mail"] = "Please enter a valid mail adress !";      
                if($password != $confirmPassword)
                    $_SESSION["error_confirmPassword"] = "Passwords don't match !";  
                if(strlen($password)<8)    
                    $_SESSION["error_password"] = "The password should contain at least 8 characters!";  
            }
            header("Location:../views/register.html.php");
        }
        else{
            $_SESSION["error"] = "Please fill all the inputs !";
            header("Location:../views/register.html.php");
        }
    }

    if(isset($deconnexion)){
        session_destroy();
        unset($_SESSION["email"]);
        header("Location:../views/index.php");
    }

?>