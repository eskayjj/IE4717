<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Project Placeholder-Cart</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <script defer src="../js/cart.js"></script>
    <?php
        if(!isset($_COOKIE['user'])) {
            header('location: ../Pages/login.php');
        } 
        @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

        if (mysqli_connect_errno()) {
            exit;  
        }

        $query = 'SELECT * from cart inner join food on cart.food_id = food.food_id where name_id = ' . $_COOKIE['user'] . '';

        $result = $db->query($query);

        Session_start();
        $_SESSION['grand_total'] = 0;
    ?>
</head>
<body>
    <header>
        <!-- Create Logo & Find BG image for Header-->
        <a href="index.php"><img class="logo" src="../Icons/placeholder-image.png"></a>

        <!--Change the colour of hover and link to new webpages-->
        <?php
                include 'loginheader.php';
        ?>

        <div id="mycartTitle">
            <?php
                echo 'My Cart (' . mysqli_num_rows($result) . ')'
            ?>
            
        </div>
    </header>
        <div class="content">   
            <!-- TODO if time permits -->
            <!-- <div class="canteenLabel">
                <label>Canteen [?]</label>
            </div>   -->
            <form method='post' action='../process/cartprocess.php'>
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $subTotal = floatval($row['price']) * floatval($row['quantity']);
            ?>
                <div id="orderbox">
                    <label class="container">
                        <input type="checkbox" name="cartItem[]" class="cartItem" onclick="return onCartItemCheck(<?php echo $row['food_id'] ?>)" value="<?php echo $row['food_id'] . ',' . $subTotal ?>">
                        <span class="checkmark"></span>
                    </label>
                    <div onload="openCart">
                        <img src="../foodPhoto/<?php echo $row['image_path'] ?>" alt="Image of Food" width="500" height="300" style="float: left; margin: 20px 120px"/>
                    </div>
                    <div id="description">
                        <?php
                            echo '<p>' . $row['food_name'] . '</p>'
                        ?>
                         <br><br> 
                        <!-- <p> [Item Description] </p> <br><br> -->
                        <?php
                            echo '<p>Quantity: ' . $row['quantity'] . '</p>'
                        ?>
                        <br><br>
                        <?php
                            echo '<p>$' . number_format($subTotal,2). '</p>'
                        ?>
                        <br><br>
                    </div>     
                </div>

            <?php
                }
            ?>
        
            <div style="text-align:right;">
                <div>
                    <p id="totalP"></p>
                </div>
                <div id="inputBtns">
                    <!-- <input type="hidden" id="selectedFood" name="selectedFood" /> -->
                    <input type="submit" id="orderClear" name="clearBtn" value="Clear"/>
                    <input type="submit" id="orderSubmit" name="orderBtn" value="Checkout"/>
                </div>
            </div>
        </form>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>