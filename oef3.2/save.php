<?php

require_once "lib/connection.php";
global $conn;

$sql = "UPDATE images SET ";
$sql .= "img_title = '" . $_POST['img_title'] . "', ";
$sql .= "img_filename = '" . $_POST['img_filename'] . "', ";
$sql .= "img_width = '" . $_POST['img_width'] . "', ";
$sql .= "img_height = '" . $_POST['img_height'] . "' ";
$sql .= "WHERE img_id = '" . $_POST['img_id'] . "'; ";

$result = $conn->query($sql);

header("Location: herbs.php");

