<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection and get necessary functions
require_once "lib/connection.php";
require_once "lib/get_data.php";
require_once 'lib/get_html.php';

//Print header and jumbotron
printHead("Edit photo");
printJumbo("Zumi", "Edit photo");
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

<form style="width: 75%; padding-left: 100px;" id="edit_form" name="edit_form" method="POST" action="save.php">
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="img_id" name="img_id" value= "1">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Titel</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="img_title" name="img_title" placeholder="Give new title..">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Filename</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="img_filename" name="img_filename" placeholder="Adjust filename...">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Width</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="img_width" name="img_width" placeholder="Adjust width...">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Height</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="img_height" name="img_height" placeholder="Adjust height...">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Save</button>
</form>
<br>
<br>
<p style="text-align: center; margin-bottom: 50px;"><a href=dog2.php>Back to portfolio</a></p>




</body>
</html>

