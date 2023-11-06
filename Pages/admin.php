<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../favicon/favicon.ico">
    <script defer src="../js/validation.js"></script>
    <!-- <script defer src="../js/fileValidation.js"></script> -->
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
        <a href="admin.php"><img class="logo" src="../Icons/studyfuelLogo.png"></a>

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
        <div id=innerContent>
            <table style="width:100%">
                <tr>
                    <td>
                        <div class="addCanteen">
                            <u>Update Canteens</u>
                        </div>
                        <form id="updateCanteenList" method="post" action="../process/adminUpdateprocess.php" onsubmit="return adminclValidation()" enctype="multipart/form-data">
                            <input type="text" name="clCanteenName"  id="clCanteenName" placeholder="Insert Canteen Name"/><br><br>
                            <input type="file" name="clPhoto" id="clPhoto"/><br><br>
                            <input type="submit" name="clSubmit" value="Add to Database"/><br>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="addFood">
                            <u>Update Food List</u>
                        </div>
                        <form id="updateFoodList" method="post" action="../process/adminUpdateprocess.php" onsubmit="return adminflValidation()" enctype="multipart/form-data">
                            <!-- <input type="select" name="flCanteenName" placeholder="Insert Canteen Name"/><br> -->
                            <select name="flCanteenId">
                                <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value='. $row['canteen_id'].'>'.$row['canteen'].'</option>';
                                    } 
                                ?>
                            </select><br><br>
                            <input type="text" name="flFoodName" id="flFoodName" placeholder="Insert Food Name"/><br><br>
                            <input type="text" name="flDescription"  id="flDescription" placeholder="Insert Description"/><br><br>
                            <input type="text" name="flPrice" id="flPrice" placeholder="Insert Price(Format eg. 0.00)"/><br><br>
                            <input type="file" name="flPhoto" id="flPhoto"/><br><br>
                            <input type="submit" name="flSubmit" value="Add to Database"/>
                            <p id="errorText" style="color: red; font-size:100%;"></p>
                    </td>
                </tr>
            </form>
        </table>
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
    </div>
</body>

</html>
