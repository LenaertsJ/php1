<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection and get necessary functions
require_once "lib/autoload.php";


//Print header, jumbotron and navbar
printHead("Medicinal Plants");
printJumbo("Medicinal Plants", "The natural pharmacy"); 
printNavbar();
?>

<div class="container" style="margin-bottom: 50px;">
    <?php
    //Print succes message if any
    if($_SESSION['msgs'] > ""){
        print '<div class="alert alert-success mb-5 text-center" role="alert">' . $_SESSION['msgs'] . '</div>';
        $_SESSION['msgs'] = null;
    }

    ?>
    <div class="row">
        <?php

        //Get data
        $sql = 'select * from images';
        $data = getData($sql);

        //Get template
        $template = file_get_contents("templates/column.html");

        //Merge function
        $output = mergeViewWithData($template, $data);
        print $output;
        ?>
    </div>
</div>
</body>
</html>