<?php
    //Vérifier la validité du mail 
    function is_mail_valid($email){
       if(preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD',$email))
        return true;   
    return false;
}

    // VERIFICATION DE L'EXISTENCE DU LOGIN ET DU MOT DE PASSE
    function are_mail_and_password_correct($mail, $password, $tab){
        foreach($tab as $t)
            if(in_array($mail,$t) && in_array($password,$t))
                return true;
        return false;
    }

    //AJOUT D'UTILISATEURS DANS LE FICHIER
    function add_user($newRegistration, $file){
        //VÉRIFIONS SI CEST LE 1ER ENREGISTREMENT DANS NOTRE FICHIER JSON, SI CEST LE PREMIER ON CRÉE UN TABLEAU POUR STOCKER NOS USERS
        if(filesize($file) == 0){
            $firstRegistration[] = $newRegistration;

            $dataToSave = $firstRegistration;
        }
        //SI CE NEST PAS LE PREMIER ENREGISTREMENT ET QUIL YA DEJA DES ENREGISTREMENTS DANS LE FICHIER ALORS ON RECUPERE DABORD LES ANCIENS ENREGISTREMENTS ENSUITE ON CONCATENE LES ANCIENS ENREGISTREMENTS AVEC LE NOUVEAU. 
        else{
            $oldRegistrations = json_decode(file_get_contents($file),true); //true parameter to get an associative array 
            array_push($oldRegistrations, $newRegistration);
            $dataToSave = $oldRegistrations;
        }

        //ECODAGE DES DONNEES
        $encodedData = json_encode($dataToSave);

        //METTONS MAINTENANT LES DONNEES DANS LE FICHIER JSON 
        if(file_put_contents($file, $encodedData))
            return true;
        else
            return false;
    }

    //VERIFICATION DE LA REDONDANCE DU MAIL
    function is_mail_already_used($tab, $mail){
        foreach($tab as $t)
            if(in_array($mail,$t))
                return true;
        return false;
    }

    // FONCTION QUI RETOURNE LES INFOS DE TOUS LES UTILISATEURS DU FICHIER
    function get_all_users($file){
        return json_decode(file_get_contents($file),true);
    }

    //RETOURNE LE PROFIL DE LA PERSONNE CONNECTÉE
    function are_u_user_or_admin($mail, $tab){
        foreach($tab as $t)
            if(in_array($mail,$t))
                return $t["role"];
    }

    // $oldRegistrations = json_decode(file_get_contents("/opt/lampp/htdocs/Application_PHP1/registration.json"),true);
    // echo are_mail_and_password_correct("fazeynafaye@gmail.com", "polipoli", $oldRegistrations);
    // echo add_user(["email"=>"fazeynafaye@gmail.com","password"=>"polipoli","role"=>"admin"],"/opt/lampp/htdocs/Application_PHP1/registration.json");

?>