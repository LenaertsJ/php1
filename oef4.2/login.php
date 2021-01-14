<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection and get necessary functions
require_once "lib/autoload.php";

//Print header and jumbotron
printHead("Register");
printJumbo("Medicinal Plants", "Welcome, please login here...");
printNavbar();

?>

<div class="container">
    <div class="row">

        <?php

        // GET DATA

        $data = [0 => ["usr_voornaam" => "", "usr_naam" => "", "usr_email" => "", "usr_password" => ""]];


        // ADD EXTRA ELEMENTS
        $extra_elements['csrf_token'] = GenerateCSRF( "register.php"  );

        // GET FORM TEMPLATE
        $output = file_get_contents("templates/login.html");

        // MERGE DATA WITH TEMPLATE
        $output = mergeViewWithData($output, $data);
        $output = mergeViewWithExtraElements($output, $extra_elements);
        $output = mergeViewWithErrors($output, $errors);
        $output = removeEmptyErrorTags($output, $data);

        print $output;
        ?>

    </div>
</div>

</body>
</html>

