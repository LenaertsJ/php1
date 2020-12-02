<?php

"<div class='col-sm-4'>
 <h3>" . $image['img_title'] ."</h3>
 <p>" . $image['img_width'] . " x " . $image['img_height'] . "pixels</p>
 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
 <img style='width: 100%; border-radius: 5px' src='./img/". $image['img_filename'] . "' alt='". $image["img_title"] ."'>
 <a href=dog_detail.php?img_id='" . $image['img_id'] . "'>Meer info</a>';
 </div>";
