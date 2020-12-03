<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection and get necessary functions
require_once "lib/connection.php";
require_once "lib/get_data.php";
require_once 'lib/get_html.php';

//Print header and jumbotron
printHead("A dog named Zumi");
printJumbo("A dog named Zumi", "Cute, funny, but weird"); ?>

<div class="container" style="margin-bottom: 50px;">
    <div class="row">
        <?php

        //Get data
        $rows = getData("SELECT * from images");

        //Get template
        $html = file_get_contents("templates/column.html");

        //Merge function
        buildHTML($html, $rows);
        ?>
    </div>
</div>
</body>
</html>