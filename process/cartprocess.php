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

            header('location: ../Pages/final.php');

        } 
    }

    $db->close();
?>