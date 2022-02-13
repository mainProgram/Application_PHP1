<?php
    include_once "../header.html.php";
    include_once "../functions.php";
    
    if(isset($_SESSION["email"])){
        $file = "/opt/lampp/htdocs/Application_PHP1/registration.json";
        $tabAllUsers = get_all_users($file);
        echo '
        <section class="showUser">
            <img src="../img/User Group_Flatline.svg">
            <h1>LIST OF THE USERS</h1> ';
      echo "<table>
                <tr><th>Email</th><th>Role</th></tr>";
                foreach($tabAllUsers as $t){
                    echo "<tr>";
                    echo "<td>".$t["email"]."</td>";
                    echo "<td>".$t["role"]."</td>";   
                    echo "</tr>";
                }
            echo "</table>";
        echo '</section>';
    }
    else
        header("location:index.php");
    include_once "../footer.html.php";
?>