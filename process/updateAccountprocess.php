<?php

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('location: ../Pages/index.php');
    }

    // set username and password
    @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

    if (mysqli_connect_errno()) {
        exit;  
    }

    $accountName = $_POST['accountName'];
    $contactNumber = $_POST['contactNumber'];
    $accountAddress = $_POST['accountAddress'];

    $query = 'UPDATE user SET name = "'. $accountName .'", contact_number = "'. $contactNumber .'", delivery_address = "'. $accountAddress .'"  WHERE user_id = ' . $_COOKIE['user'] . '';

    $queryGetUser = 'SELECT * FROM user WHERE user_id = ' . $_COOKIE['user'];

    $result = $db->query($query);
    
    Session_start();
    
    if($result){
        $resultUser = $db->query($queryGetUser);
        $data = mysqli_fetch_assoc($resultUser);
        $_SESSION['name']= $data['name'];
        $_SESSION['contactNumber']= $data['contact_number'];
        $_SESSION['deliveryAddress']= $data['delivery_address'];
        header('location: ../Pages/account.php');
    }

    $db->close();
    
?>