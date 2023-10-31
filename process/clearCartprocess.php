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
    // $selectedFoodId = explode (",",$selectedFoods);
    $foodId = array();

    foreach ($selectedFoods as $food){ 
        $selectedFoodId = explode (",",$food)[0];
        array_push($foodId, $selectedFoodId);
    }

    $stringFoodId = implode(", ",$foodId);
    // echo 'DELETE FROM cart WHERE name_id =' . $_COOKIE['user'] . ' and food_id in ( ' . $stringFoodId . ')';
    $query = 'DELETE FROM cart WHERE name_id = ' . $_COOKIE['user'] . ' and food_id in (' . $stringFoodId . ')';

    $result = $db->query($query);


    // Session_start();

    if ($result) { 

        header('location: ../Pages/cart.php');
    } 

?>