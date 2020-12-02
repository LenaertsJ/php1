<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection and get necessary functions
require_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="jumbotron text-center">
    <h1>A dog named Zumi</h1>
    <p>Weird, funny and cute...</p>
</div>
<div class="container">
    <div class="row">

        <?php

        $sql = "select * from images where img_id=" . $_GET['img_id'];
        $images = GetData( $sql );

        //loop over de afbeeldingen
        foreach ( $images as $image )
        {
            print '<div class="col-sm-12">';
            print '<h3>' . $image[2] . '</h3>';
            print '<p>filename: ' .  $image[1] . '</p>';
            print '<p>' .  $image[3] . ' x ' . $image[4] . ' pixels</p>';
            print '<img class="img-fluid" style="width: 75%;" src=" img/' . $image[1] . '">';

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
