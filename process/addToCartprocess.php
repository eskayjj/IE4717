<?php

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('location: ../Pages/index.php');
    }

    // set username and password
    @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

    if (mysqli_connect_errno()) {
        exit;  
    }

    $hiddenFoodId = $_POST['hiddenFoodId'];
    $hiddenQty = $_POST['hiddenQty'];

    $query1 = 'SELECT * from food where food_id = "' . $hiddenFoodId . '"';

    $query2 = 'INSERT INTO cart (name_id, food_id, quantity) VALUES (' . $_COOKIE['user'] . ', '. $hiddenFoodId .', '. $hiddenQty .')';

    $result1 = $db->query($query1);
    $result2 = $db->query($query2);
    
    if($result2){
        $data = mysqli_fetch_assoc($result1);
        header('location: ../Pages/canteen.php?id='.$data['canteen_id'].'');
    }

    $db->close();
    
?>