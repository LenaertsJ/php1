<?php
$images = array("zumicute.jpg" => "Zumi cute", "zumiweird.jpg" => "Zumi weird", "zumi.jpg" => "Zumi contemplative");
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
        foreach ($images as $name => $title) {
            echo "<div class='col-sm-4'>
                    <h3>Column" . $title ."</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                    <img style='width: 100%; border-radius: 5px' src='./img/". $name . "' alt='". $title ."'>
                  </div>";
        }
        ?>
    </div>
</div>
</body>
</html> 
