<?php
    Session_start();
    // set username and password
    @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

    if (mysqli_connect_errno()) {
        exit;  
    }

    $clSubmit = $_POST['clSubmit'];
    // $flSubmit = $_POST['flSubmit'];

    function fileCanteenValidation($name) {
        if($_FILES["clPhoto"]["name"] != null)
        {
            $allowedType = array("image/jpg", "image/png", "image/jpeg", "image/avif", "image/webp");


            if ( in_array ( $_FILES["clPhoto"]["type"] , $allowedType ) )
            {
                echo "File Type is acceptable <br>"; // proceed to upload
                if ( $_FILES["clPhoto"]["size"] < 500000 ) // larger than 5kB
                    echo "File Size is acceptable<br>"; // proceed to upload
                else
                {
                    echo " file is to large";
                    exit();
                }
            }
            else
            {
                echo "Invalid file type";
                exit();
            }
            
            $fileExt = explode('.',$_FILES['clPhoto']['name']);
            $fileActualExt = strtolower(end($fileExt));
            $target = "../canteenPhoto/" . $name . "." .$fileActualExt;

            if(move_uploaded_file($_FILES["clPhoto"]["tmp_name"],$target)){
                return $name . "." . $fileActualExt;
            }

            else{
                echo "Upload Fail!";
            }
        }
    }

    function fileFoodValidation($name) {
        if($_FILES["flPhoto"]["name"] != null)
        {
            $allowedType = array("image/jpg", "image/png", "image/jpeg", "image/avif", "image/webp");


            if ( in_array ( $_FILES["flPhoto"]["type"] , $allowedType ) )
            {
                echo "File Type is acceptable <br>"; // proceed to upload
                if ( $_FILES["flPhoto"]["size"] < 500000 ) // larger than 5kB
                    echo "File Size is acceptable<br>"; // proceed to upload
                else
                {
                    echo " file is to large";
                    exit();
                }
            }
            else
            {
                echo "Invalid file type";
                exit();
            }
            
            $fileExt = explode('.',$_FILES['flPhoto']['name']);
            $fileActualExt = strtolower(end($fileExt));
            $target = "../foodPhoto/" . $name . "." .$fileActualExt;

            if(move_uploaded_file($_FILES["flPhoto"]["tmp_name"],$target)){
                return $name . "." . $fileActualExt;
            }

            else{
                echo "Upload Fail!";
            }
        }
    }

    if($clSubmit){
        $clCanteenName = $_POST['clCanteenName'];

        try{
            $clPhoto = fileCanteenValidation($clCanteenName);

            $query = 'INSERT INTO canteen(canteen, image_path) values ("'.$clCanteenName.'","'.$clPhoto.'")';
         
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

            $flPhoto = fileFoodValidation($flFoodName);

            $query = 'INSERT INTO food(canteen_id, food_name, description, price, image_path) values ('.$flCanteenId.','.'"'.$flFoodName.'","'.$flDescription.'",'.$flPrice.',"'.$flPhoto.'")';
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