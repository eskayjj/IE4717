<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('location: ../Pages/index.php');
    }
    $registerUser = $_POST['regUser'];
    $registerEmail = $_POST['regEmail'];
    $registerPassword = $_POST['regPassword'];
    $hashPassword = hash('sha256', $registerPassword);

    // set username and password
    @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

    if (mysqli_connect_errno()) {
           exit;  
    }

    $query = "INSERT into user (username, email, password) values ('".$registerUser."', '".$registerEmail."', '".$hashPassword."')";
    $result = $db->query($query);

    // $check = mysqli_affected_rows($result);

    Session_start();

    if($result){
        header('location: ../Pages/canteenlist.php');
    }

    else {  
        $_SESSION['registerFail']= true;
        header('location: ../Pages/register.php');
    } 

    $db->close();
?>