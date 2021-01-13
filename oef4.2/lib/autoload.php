<?php
session_start();

require_once "credentials.php";
require_once "pdo.php";
require_once "form_elements.php";
require_once "get_html.php";
require_once "sanitize.php";
require_once "validate.php";
require_once "security.php";

// errors bewaren
$errors = [];

if (key_exists( 'errors', $_SESSION) AND is_array( $_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
}

// messages bewaren
$msgs = [];

if (key_exists( 'msgs', $_SESSION) AND is_array( $_SESSION['msgs'])) {
    $msgs = $_SESSION['msgs'];
    $_SESSION['msgs'] = null;
}

// ingevoerde gegevens bewaren
$old_post = [];

if (key_exists('OLD_POST', $_SESSION) AND is_array( $_SESSION['OLD_POST'])) {
    $old_post = $_SESSION['OLD_POST'];
    $_SESSION['OLD_POST'] = null;
}