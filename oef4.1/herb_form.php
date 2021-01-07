<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection and get necessary functions
require_once "lib/autoload.php";

//Print header and jumbotron
printHead("Edit photo");
printJumbo("Medicinal Plants", "Edit information");
printNavbar();
?>

<div class="container" style="padding-left: 100px;">
    <div class="row">

        <?php
//        if (! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . "opgegeven");

        // GET DATA
        $sql = "select * from images where img_id=" . $_GET['img_id'];
        $data = getData($sql);
        $row = $data[0]; //there is only one row in this case

        // ADD EXTRA ELEMENTS

        $extra_elements['select_ailment'] = makeSelect($fkey = 'img_ail_id', $value = $row['img_ail_id'], $sql = "select ail_id, ail_name from ailments");

        // GET FORM TEMPLATE
        $output = file_get_contents("templates/form.html");

        // MERGE DATA WITH TEMPLATE
        $output = buildHTML($output, $data);
        $output = buildExtraElements($output, $extra_elements);

        print $output;
        ?>

    </div>
</div>

<br>
<br>
<p style="text-align: center; margin-bottom: 50px;"><a href=herbs.php>Back to portfolio</a></p>

</body>
</html>

