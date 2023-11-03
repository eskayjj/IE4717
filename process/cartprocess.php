<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('location: ../Pages/index.php');
    }
    
    // set username and password
    @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

    if (mysqli_connect_errno()) {
        exit;  
    }

    $selectedFoods = $_POST['cartItem'];
    $foodId = array();

    foreach ($selectedFoods as $food){ 
        $selectedFoodId = explode (",",$food)[0];
        array_push($foodId, $selectedFoodId);
    }
    $stringFoodId = implode(", ",$foodId);

    //Time Check
    date_default_timezone_set('Asia/Singapore');
    $currentTime = date('H:i:s');
    $newTime = date('H:i:s', strtotime($currentTime. '+1 hour'));


    if($_POST['clearBtn']){
        // echo 'DELETE FROM cart WHERE name_id =' . $_COOKIE['user'] . ' and food_id in ( ' . $stringFoodId . ')';
        $query = 'DELETE FROM cart WHERE name_id = ' . $_COOKIE['user'] . ' and food_id in (' . $stringFoodId . ')';

        $result = $db->query($query);

        if ($result) { 

            header('location: ../Pages/cart.php');
        } 
    } else {
        $queryUpdate = 'UPDATE food SET rank = rank + 1 WHERE food_id in (' . $stringFoodId . ')';
        $queryDelete = 'DELETE FROM cart WHERE name_id = ' . $_COOKIE['user'] . ' and food_id in (' . $stringFoodId . ')';

        $resultUpdate = $db->query($queryUpdate);

        if ($resultUpdate) { 
            $resultDelete = $db->query($queryDelete);

            Session_start();
            $_SESSION['redirectFromCartProcess'] = true;

            // Mail Server
            $to = 'f31ee@localhost';
            $subject = 'Information on Meal Delivery';
            $message = 'Dear '. $_SESSION['username']. ',' . "\n\n" . 'Your order will be arriving approximately at '. $newTime . '.' 
            . "\n\n" . 'Well wishes,' . "\n" . 'StudyFuel';
            $headers = 'From: f32ee@localhost'. "\r\n" . 'Reply-To: f32ee@localhost' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers, '-ff32ee@localhost');

            header('location: ../Pages/final.php');

        } 
    }

    $db->close();
?>