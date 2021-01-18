<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection and get necessary functions
$public_access = true;
require_once "lib/autoload.php";

//Print header and jumbotron
printHead("Register");
printJumbo("Medicinal Plants", "Welcome, please register here...");
printNavbar();

?>

<div class="container">
    <div class="row">

        <?php

        // GET DATA
        if(count($old_post) > 0){
            $data = [0 => [
                    'usr_voornaam' => $old_post['usr_voornaam'],
                    'usr_naam' => $old_post['usr_naam'],
                    'usr_email' => $old_post['usr_email']
            ]];
        } else {
            $data = [0 => ["usr_voornaam" => "", "usr_naam" => "", "usr_email" => "", "usr_password" => ""]];
        }

        // ADD EXTRA ELEMENTS
        $extra_elements['csrf_token'] = GenerateCSRF( "register.php"  );

        // GET FORM TEMPLATE
        $output = file_get_contents("templates/register.html");

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

