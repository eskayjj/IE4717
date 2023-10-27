<?php
    setcookie("user", "", time() - 3600 ,"/");
    // echo "Cookie " . $_COOKIE['user'] . " is deleted.";
    header('location: ../Pages/index.php');
?>