<?php
session_start();

require_once "credentials.php";
require_once "pdo.php";
require_once "form_elements.php";
require_once "get_html.php";
require_once "sanitize.php";
require_once "validate.php";
require_once "security.php";

require_once "access_control.php";

// errors bewaren
$errors = [];

if (key_exists( 'errors', $_SESSION) AND is_array( $_SESSION['errors'])) {
    $errors = $_SESSION['errors'];

}

// messages bewaren
$msgs = [];

if (key_exists( 'msgs', $_SESSION) AND is_array( $_SESSION['msgs'])) {
    $msgs = $_SESSION['msgs'];
}


// ingevoerde gegevens bewaren
$old_post = [];

if (key_exists('OLD_POST', $_SESSION) AND is_array( $_SESSION['OLD_POST'])) {
    $old_post = $_SESSION['OLD_POST'];

}

$_SESSION['msgs'] = null;
$_SESSION['OLD_POST'] = null;
$_SESSION['errors'] = null;