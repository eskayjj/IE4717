<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('location: ../Pages/index.php');
    }

    Session_start();

    $registerUser = $_POST['regUser'];
    $registerEmail = $_POST['regEmail'];
    $registerPassword = $_POST['regPassword'];
    $hashPassword = hash('sha256', $registerPassword);

    // set username and password
    @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

    if (mysqli_connect_errno()) {
           exit;  
    }

    try{
        $query = "INSERT into user (username, email, password) values ('".$registerUser."', '".$registerEmail."', '".$hashPassword."')";
        $result = $db->query($query);
        
        // $check = mysqli_affected_rows($result);
        
        if($result){
            
                $query2 = 'SELECT * from user where email = "' . $registerEmail . '" and password = "' . $hashPassword . '"';
                $result2 = $db->query($query2);

                $data = mysqli_fetch_assoc($result2);
                $_SESSION['loginEmail']= $registerEmail;
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

        else {  
            $_SESSION['registerFail']= true;
            header('location: ../Pages/register.php');
        } 
    }
    catch(Exception $e){
        $_SESSION['registerFail']= true;
        header('location: ../Pages/register.php');
    }
    
    $db->close();
?>