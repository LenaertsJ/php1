<?php

if(!isset($public_access)) {
    if (!isset($_SESSION['user'])) {
        header("Location: ./no_access.php");
    }
}





