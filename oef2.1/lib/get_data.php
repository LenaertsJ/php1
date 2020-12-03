<?php

require_once "connection.php";

//Function to get data from database

function getData($sql) {
    global $conn;

    //Define and execute query
    $result = $conn->query($sql);

    //Show result
    if ($result -> num_rows > 0){
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }
    else {
        return [];
    }
}