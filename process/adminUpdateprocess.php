<?php
    Session_start();
    // set username and password
    @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

    if (mysqli_connect_errno()) {
        exit;  
    }

    $clSubmit = $_POST['clSubmit'];
    // $flSubmit = $_POST['flSubmit'];

    if($clSubmit){
        $clCanteenName = $_POST['clCanteenName'];

        try{
            $query = 'INSERT INTO canteen(canteen) values ("'.$clCanteenName.'")';
         
            if($db->query($query)){
                $_SESSION['updateFail']= false;
                header('location: ../Pages/admin.php');
            }
    
            else {  
                $_SESSION['updateFail']= true;
                header('location: ../Pages/admin.php');
            } 
        }
        catch(Exception $e){
            $_SESSION['updateFail']= true;
            header('location: ../Pages/admin.php');
        }
        
    } 
    
    else {
        try{
            $flCanteenId = $_POST['flCanteenId'];
            $flFoodName = $_POST['flFoodName'];
            $flDescription = $_POST['flDescription'];
            $flPrice = $_POST['flPrice'];

            $query = 'INSERT INTO food(canteen_id, food_name, description, price) values ('.$flCanteenId.','.'"'.$flFoodName.'","'.$flDescription.'",'.$flPrice.')';
            $result = $db->query($query);

            if($result){
                $_SESSION['updateFail']= false;
                header('location: ../Pages/admin.php');
            }

            else {  
                $_SESSION['updateFail']= true;
                header('location: ../Pages/admin.php');
            } 
        }
        catch(Exception $e){
            $_SESSION['updateFail']= true;
            header('location: ../Pages/admin.php');
        }
    }

    $db->close();
?>