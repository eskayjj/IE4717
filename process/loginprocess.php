<?php
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];

    // set username and password
    @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

    if (mysqli_connect_errno()) {
           exit;  
    }
    
    $query = 'SELECT * from user where email = "' . $loginEmail . '" and password = "' . $loginPassword . '"';
    $result = $db->query($query);

    Session_start();

    if ($check == 1) { 
        $data = mysqli_fetch_assoc($result);
        $_SESSION['loginFail']= false;
        $_SESSION['loginEmail']= $loginEmail;
        $_SESSION['username']= $data['username'];
        $_SESSION['name']= $data['name'];
        $_SESSION['contactNumber']= $data['contact_number'];
        $_SESSION['deliveryAddress']= $data['delivery_address'];
        header('location: ../Pages/canteen.php');
        // echo ($_SESSION['loginEmail'] . $_SESSION['username'] . $_SESSION['name'] . $_SESSION['contactNumber'] . $_SESSION['deliveryAddress']);
    } 
    
    else {  
        $_SESSION['loginFail']= true;
        header('location: ../Pages/login.php');
    } 
?>