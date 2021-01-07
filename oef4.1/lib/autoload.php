<?php
session_start();

require_once "connection.php";
require_once "get_data.php";
require_once "get_html.php";


$errors = [];

if (key_exists( 'errors', $_SESSION) AND is_array( $_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
}
