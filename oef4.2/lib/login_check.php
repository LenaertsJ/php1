<?php

require_once "autoload.php";
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

if(loginCheck()){
    print "Yesss, login succesful";
} else {
    print "Oh man, something went wrong! Please, check you login and password";
}

function loginCheck()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //controle CSRF token
        if (!key_exists("csrf", $_POST)) die("Missing CSRF");
        if (!hash_equals($_POST['csrf'], $_SESSION['last_csrf'])) die("Problem with CSRF");

        $_SESSION['last_csrf'] = "";

        //sanitization
        $_POST = StripSpaces($_POST);
        $_POST = ConvertSpecialChars($_POST);

        //validation
        $sending_form_uri = $_SERVER['HTTP_REFERER'];
        CompareWithDatabase($table, $pkey);

        //make key-value string part of SQL statement
        $keys_values = [];

        foreach ($_POST as $field => $value) {
            //skip non-data fields
            if (in_array($field, ['csrf', 'usr_passwordCheck'])) continue;

            //handle primary key field
            if ($field == $pkey) {
                if ($update) $where = " WHERE $pkey = $value ";
                continue;
            }

            //hash password and create succes message
            if ($field == 'usr_password'){
                $value = password_hash($value, PASSWORD_DEFAULT);
                $_SESSION['msgs'][] = "Registration succesful, welcome!";
            }

            //all other data-fields
            $keys_values[] = " $field = '$value' ";
        }

        $str_keys_values = implode(" , ", $keys_values);

        //extend SQL with key-values
        $sql .= $str_keys_values;

        //extend SQL with WHERE
        $sql .= $where;

        //run SQL
        $result = ExecuteSQL($sql);

        //output if not redirected
        print $sql;
        print "<br>";
        print $result->rowCount() . " records affected";

        //redirect after insert or update
        if ($insert and $_POST["afterinsert"] > "") header("Location: ../" . $_POST["afterinsert"]);
        if ($update and $_POST["afterupdate"] > "") header("Location: ../" . $_POST["afterupdate"]);
    }
}