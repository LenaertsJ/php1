<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection
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

        global $conn;

        $sql = "SELECT * from images";
        $result = $conn->query($sql);

        //Print results
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                print "<div class='col-sm-4'";
                print $row["img_id"];
                print "<h3>" . $row["img_title"] ."</h3><br>";
                print $row["img_width"] . "x" . $row["img_height"] . "pixels";
                print "<p>Lorem ipsum dolor sit amet, consectetur adipisiciping elit...</p>";
                print "<img style='width: 100%; border-radius: 5px' src='img/" .$row["img_filename"] . "'><br>";
                print "</div>";
            }
        }
        else {
            print "No records found";
        }
        ?>

    </div>
</div>

</body>
