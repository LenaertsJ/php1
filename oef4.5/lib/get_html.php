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
    if(isset($_SESSION['user'])){
        $html_navbar = str_replace("@username@", $_SESSION['user']['usr_voornaam'] ,$html_navbar);
    }
    $html_navbar = str_replace('<ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @username@
                </a>
                <div class="dropdown-menu nav-item" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./profile.php">Profile</a>
                    <a class="dropdown-item" href="./usr_settings.php">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./logout.php">Logout</a>
                </div>
            </li>
        </ul>', "" ,$html_navbar);
    print $html_navbar;
}

// FUNCTIONS TO BUILD HTML COMPONENTS

function mergeViewWithData($template, $data){
    $returnValue = "";
    foreach ($data as $row) {
        $output = $template;
        foreach (array_keys($row) as $field) {
            $output = str_replace("@$field@", $row["$field"], $output);
        }
        $returnValue .= $output;
    }
    return $returnValue;
}

function mergeViewWithExtraElements($template, $elements) {
    foreach ($elements as $key => $element) {
        $template = str_replace("@$key@", $element, $template);
    }
    return $template;
}

function mergeViewWithOldElements($template, $elements){
    foreach ($elements as $key => $element){
        $template = str_replace("@$key@", $element, $template);
    }
    return $template;
}

function mergeViewWithErrors( $template, $errors )
{
    foreach ( $errors as $key => $error )
    {
        $template = str_replace( "@$key@", "<p style='color:red'>$error</p>", $template );
    }
    return $template;
}

function removeEmptyErrorTags( $template, $data )
{
    foreach ( $data as $row )
    {
        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $template = str_replace( "@$field" . "_error@", "", $template );
        }
    }

    return $template;
}
