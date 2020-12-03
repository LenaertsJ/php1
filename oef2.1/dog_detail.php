<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection and get necessary functions
require_once "lib/connection.php";
require_once "lib/get_data.php";
require_once 'lib/get_html.php';

//Print header and jumbotron
printHead("A closer look");
printJumbo("Zumi", "a closer look");
?>

<div class="container">
    <div class="row">

        <?php

        $sql = "select * from images where img_id=" . $_GET['img_id'];
        $images = GetData( $sql );

        //loop over de afbeeldingen
        foreach ( $images as $image )
        {
            print '<div class="col-sm-12">';
            print '<h3>' . $image["img_title"] . '</h3>';
            print '<p>filename: ' .  $image["img_filename"] . '</p>';
            print '<p>' .  $image["img_width"] . ' x ' . $image["img_height"] . ' pixels</p>';
            print '<img class="img-fluid" style="width: 75%;" src=" img/' . $image["img_filename"] . '">';

            //Link terug naar hoofdpagina
            print '<br>';
            print '<p><a href=dog2.php>Home</a></p>';
            print '</div>';
        }
         ?>

    </div>
</div>

</body>
</html>
