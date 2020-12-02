<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Make connection and get necessary functions
require_once "lib/connection.php";
require_once 'lib/get_html.php';

//Print header and jumbotron
printHTML("templates/head.html");
printHTML("templates/jumbotron.html"); ?>

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
</html>