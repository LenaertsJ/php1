<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

// FUNCTION TO GET HTML COMPONENTS

function printHead($title){
    $template_head = "templates/head.html";
    $html_head = file_get_contents($template_head);
    $html_head = str_replace("{{TITLE}}", $title, $html_head);
    print $html_head;
}

function printJumbo($title, $subtitle) {
    $template_jumbo = "templates/jumbotron.html";
    $html_jumbo = file_get_contents($template_jumbo);
    $html_jumbo = str_replace("{{TITLE}}", $title, $html_jumbo);
    $html_jumbo = str_replace("{{SUBTITLE}}", $subtitle, $html_jumbo);
    print $html_jumbo;
}

function printNavbar() {
    $template_nav = "templates/navbar.html";
    $html_navbar = file_get_contents($template_nav);
    print $html_navbar;
}

// FUNCTIONS TO BUILD HTML COMPONENTS

function buildHTML($template, $data){
    $returnValue = "";
    foreach ($data as $row) {
        $output = $template;
        foreach (array_keys($row) as $value) {
            $output = str_replace("@$value@", $row["$value"], $output);
        }
        $returnValue .= $output;
    }
    return $returnValue;
}

function buildExtraElements($template, $selects) {
    foreach ($selects as $key => $select) {
        $template = str_replace("@key@", $select, $template);
    }
    return $template;
}

