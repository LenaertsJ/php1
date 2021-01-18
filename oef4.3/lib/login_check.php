<?php

require_once "autoload.php";
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

if(loginCheck()){
    $data = getData("SELECT * FROM user WHERE usr_email = '" . $_POST['usr_email'] . "'");
    $row = $data[0];

    //Gegevens opslaan in session
    $_SESSION['user'] = $row;
    $_SESSION['msgs'][] = "Welcome to the natural pharmacy, <span style='color: steelblue'>" . $row['usr_voornaam'] . "</span>";

    header("Location: ../herbs.php");

} else {
    unset($_SESSION['user']);
    header("Location: ../no_access.php");
}

function loginCheck()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //controle CSRF token
//        if (!key_exists("csrf", $_POST)) die("Missing CSRF");
//        if (!hash_equals($_POST['csrf'], $_SESSION['last_csrf'])) die("Problem with CSRF");

//        $_SESSION['last_csrf'] = "";

        //sanitization

        $_POST = StripSpaces($_POST);
        $_POST = ConvertSpecialChars($_POST);

        //validation

        $sending_form_uri = $_SERVER['HTTP_REFERER'];
        $email = $_POST['usr_email'];
        $password = $_POST['usr_password'];

        //Protect MySQL injection

        $email = stripslashes($email);
        $password = stripslashes($password);

        //Check if user exists

        $data = getData("SELECT usr_email, usr_password FROM user WHERE usr_email = '".$email."'");
        if($data != null ){
            if(password_verify($password, $data[0]['usr_password'])){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}