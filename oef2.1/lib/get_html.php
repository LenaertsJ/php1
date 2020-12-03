<?php

// FUNCTION TO GET HTML COMPONENTS

function printHTML($template){
    $html = file_get_contents($template);
    print $html;
}

// FUNTION TO BUILD HTML COMPONENT

function buildHTML($sql){
    $images = getData($sql);
    foreach ($images as $image) {
        print "<div class='col-sm-4'>";
        print "<h3>" . $image["img_title"] ."</h3>";
        print "<p>" . $image["img_width"] . " x " . $image["img_height"] . "pixels</p>";
        print "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>";
        print "<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>";
        print "<img style='width: 100%; border-radius: 5px' src='./img/". $image["img_filename"] . "' 'alt='". $image["img_title"] ."'>";
        print "<a href=dog_detail.php?img_id=" . $image["img_id"] . ">Closer look</a>";
        print "</div>";
    }
}