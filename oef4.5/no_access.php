<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_acces = true;
require_once "lib/get_html.php";


printHead("Medicinal Plants");
printJumbo("Geen toegang", "");

print '<div style="margin: 30px auto 0px auto; width: 80%" class="alert alert-success mb-5 text-center" role="alert">Your access has been denied, please <a href="./login.php">try again</a></div>';
