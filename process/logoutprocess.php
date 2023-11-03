<?php
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie("user", "", time() - 3600,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    // echo "Cookie " . $_COOKIE['user'] . " is deleted.";
    header('location: ../Pages/index.php');
?>