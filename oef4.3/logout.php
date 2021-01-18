<?php

unset($_SESSION['user']);

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();


echo "You are logged out...<br><a href='./login.php'>Login here</a>";
