<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Project Placeholder</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <script defer src="../js/validation.js"></script>
    <?php
        Session_start();
        // set username and password
        @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

        if (mysqli_connect_errno()) {
            exit;  
        }
        $query = 'SELECT * FROM canteen order by canteen_id';
        $result = $db->query($query);
    ?>
</head>
<body>
    <header>
        <!-- Create Logo & Find BG image for Header-->
        <a href="admin.php"><img class="logo" src="../Icons/placeholder-image.png"></a>

        <div class="topButton">
            <?php
                if(isset($_COOKIE['user'])) {
            ?>
                <div>
                    <!--If not logged in, needs to display login button instead-->
                    <a href="../process/logoutprocess.php"><button><label>Logout</label></button></a>
                </div>
                <?php
                } else {
            ?>
                <a href="login.php"><button><label>Login</label><img src="../Icons/login.png"/></button></a>
            <?php
                }
            ?>
        </div>
        <div id="adminTitle">
            Admin Page
        </div>
    </header>
    <div class="content">
        <form id="updateCanteenList" method="post" action="../process/adminUpdateprocess.php" onsubmit="return adminclValidation()">
            <input type="text" name="clCanteenName"  id="clCanteenName" placeholder="Insert Canteen Name"/><br>
            <input type="submit" name="clSubmit" value="Add to Database"/><br><br>
        </form>

        <form id="updateFoodList" method="post" action="../process/adminUpdateprocess.php" onsubmit="return adminflValidation()">
            <!-- <input type="select" name="flCanteenName" placeholder="Insert Canteen Name"/><br> -->
            <select name="flCanteenId">
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value='. $row['canteen_id'].'>'.$row['canteen'].'</option>';
                    } 
                ?>
            </select><br>
            <input type="text" name="flFoodName" id="flFoodName" placeholder="Insert Food Name"/><br>
            <input type="text" name="flDescription"  id="flDescription" placeholder="Insert Description"/><br>
            <input type="text" name="flPrice" id="flPrice" placeholder="Insert Price(Format eg. 0.00)"/><br>
            <input type="submit" name="flSubmit" value="Add to Database"/>
        </form>
        <p id=errorText></p>
        <?php if(isset($_SESSION['updateFail'])) {
            echo $_SESSION['updateFail'];
                            if($_SESSION['updateFail']){
                                echo '<span id="errorMsg">Cannot update to database!</span>';
                                unset($_SESSION['updateFail']);
                            }
                        }
                        ?> 
    </div>
</body>

</html>