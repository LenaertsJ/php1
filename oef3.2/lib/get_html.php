<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

// FUNCTION TO GET HTML COMPONENTS

function printHead($title){
    $template = "templates/head.html";
    $html = file_get_contents($template);
    $html = str_replace("{{TITLE}}", $title, $html);
    print $html;
}

function printJumbo($title, $subtitle) {
    $template_jumbo = "templates/jumbotron.html";
    $html_jumbo = file_get_contents($template_jumbo);
    $html_jumbo = str_replace("{{TITLE}}", $title, $html_jumbo);
    $html_jumbo = str_replace("{{SUBTITLE}}", $subtitle, $html_jumbo);
    print $html_jumbo;
}

// FUNTION TO BUILD HTML COMPONENT

function buildHTML($template, $data){
    foreach ($data as $row) {
        $output = $template;
        foreach (array_keys($row) as $value){
            $output = str_replace("@$value@", $row["$value"], $output);
        }
        print $output;
    }
}