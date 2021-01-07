<?php

require_once "connection.php";

//Function to get data from database

function getData($sql) {
    global $conn;

    //Define and execute query
    $result = $conn->query($sql);

    //Show result
    if ($result -> num_rows > 0){
        $data = $result->fetch_all(MYSQLI_BOTH);
        return $data;
    }
    else {
        return [];
    }
}

// FUNCTION TO GET DATA FOR OPTION LIST

function makeSelect($fkey, $value, $sql) {
    $options = "<select id=$fkey name=$fkey value=$value>";
    $options .= "<option value='0'></option>";

    $data = getData($sql);

    foreach ($data as $row) {
        if ( $row[0] == $value) $selected = " selected ";
        else $selected = "";

        $options .= "<option $selected value=" . $row[0] . ">" . $row[1] . "</option>";
    }

    $options .= "</select>";

    return $options;
}