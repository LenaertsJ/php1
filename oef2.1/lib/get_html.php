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
        print "<h3>" . $image[2] ."</h3>";
        print "<p>" . $image[3] . " x " . $image[4] . "pixels</p>";
        print "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>";
        print "<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>";
        print "<img style='width: 100%; border-radius: 5px' src='./img/". $image[1] . "' 'alt='". $image[2] ."'>";
        print "<a href=dog_detail.php?img_id=" . $image[0] . ">Closer look</a>";
        print "</div>";
    }
}