<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection and get necessary functions
require_once "lib/connection.php";
require_once "lib/get_data.php";
require_once 'lib/get_html.php';

//Print header and jumbotron
printHead("Edit photo");
printJumbo("Medicinal herbs", "Edit information");
?>

<div class="container" style="padding-left: 100px;">
    <div class="row">

        <?php

        $sql = "select * from images where img_id=" . $_GET['img_id'];
        $images = GetData( $sql );

        //loop over de afbeeldingen
        foreach ( $images as $image )
        {
            print '<img class="img-fluid" style="width: 40%;" src=" img/' . $image["img_filename"] . '">';
            print '<br>';
            print '<br>';
            print '<br>';
        }

        ?>
    </div>
</div>

    <?php
    // GET FORM TEMPLATE
    $html = file_get_contents("templates/form.html");
    // GET DATA
    $rows = getData($sql);
    // MERGE DATA WITH TEMPLATE
    buildHTML($html, $rows);
    ?>

<br>
<br>
<p style="text-align: center; margin-bottom: 50px;"><a href=herbs.php>Back to portfolio</a></p>

</body>
</html>

