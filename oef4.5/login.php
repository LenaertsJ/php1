<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection and get necessary functions
$public_access = true;
require_once "lib/autoload.php";


//Print header and jumbotron
printHead("Login");
printJumbo("Medicinal Plants", "Welcome, please login here...");
printNavbar();

?>

<div class="container">

    <?php

    //Print logout message if get variable is set to logout

    if(isset($_GET["logout"])){

        print '<div class="alert alert-success mb-5 mt-3 text-center" role="alert">You are logged out</div>';
    }

    ?>

    <div class="row">

        <?php

        // GET DATA

        $data = [0 => ["usr_email" => "", "usr_password" => ""]];


        // ADD EXTRA ELEMENTS
        $extra_elements['csrf_token'] = GenerateCSRF( "login.php"  );

        // GET FORM TEMPLATE
        $output = file_get_contents("templates/login.html");

        print $output;
        ?>

    </div>
</div>

</body>
</html>

