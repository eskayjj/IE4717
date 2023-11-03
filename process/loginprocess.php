<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('location: ../Pages/index.php');
    }

    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];
    $hashPassword = hash('sha256', $loginPassword);

    // set username and password
    @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

    if (mysqli_connect_errno()) {
           exit;  
    }
    
    $query = 'SELECT * from user where email = "' . $loginEmail . '" and password = "' . $hashPassword . '"';
    $result = $db->query($query);

    //checking for valid login entry
    $check = mysqli_num_rows($result);

    Session_start();

    if ($check == 1) { 
        $data = mysqli_fetch_assoc($result);
        if($data['role'] == 'admin'){
            echo 'test';
            $cookie_name = "user";
            $cookie_value = $data['user_id'];
            setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
            header('location: ../Pages/admin.php'); 
        } else {
            $_SESSION['loginFail']= false;
            $_SESSION['loginEmail']= $loginEmail;
            $_SESSION['username']= $data['username'];
            $_SESSION['name']= $data['name'];
            $_SESSION['contactNumber']= $data['contact_number'];
            $_SESSION['deliveryAddress']= $data['delivery_address'];
            $cookie_name = "user";
            $cookie_value = $data['user_id'];
            setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
            echo "Cookie '" . $cookie_name . "' is set!";
            if(isset($_COOKIE['loginRedirect'])){
                header('location:' . $_COOKIE['loginRedirect']);
            }
            else{
                header('location: ../Pages/canteenlist.php');
            }
            
        }
        
        // echo ($_SESSION['loginEmail'] . $_SESSION['username'] . $_SESSION['name'] . $_SESSION['contactNumber'] . $_SESSION['deliveryAddress']);
    } 
    
    else {  
        // echo($_SESSION['loginEmail'] . $_SESSION['loginPassword']);
        $_SESSION['loginFail']= true;
        header('location: ../Pages/login.php');
    } 

    $db->close();
?>