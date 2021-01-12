<?php
require_once "autoload.php";

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