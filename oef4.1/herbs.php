<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection and get necessary functions
require_once "lib/connection.php";
require_once "lib/get_data.php";
require_once 'lib/get_html.php';

//Print header, jumbotron and navbar
printHead("Medicinal Plants");
printJumbo("Medicinal Plants", "The natural pharmacy"); 
printNavbar();
?>

<div class="container" style="margin-bottom: 50px;">
    <div class="row">
        <?php

        //Get data
        $rows = getData("SELECT * from images");

        //Get template
        $html = file_get_contents("templates/column.html");

        //Merge function
        $output = buildHTML($html, $rows);
        print $output;
        ?>
    </div>
</div>
</body>
</html>