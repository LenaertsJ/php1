<?php

require_once "/Applications/mampstack-7.4.12-0/apache2/htdocs/php1_oefeningen/credentials.php";

//Create connection

global $servername, $username, $password, $dbname;
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection

if($conn->connect_error){
    die("Connection failed:" .$conn->connect_error);
}