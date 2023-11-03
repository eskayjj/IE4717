<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        Session_start();

        if(!isset($_COOKIE['user'])) {
            header('location: ../Pages/login.php');
            setcookie('loginRedirect', "../Pages/canteen.php?id=". $_GET['id'] , time() + (86400), "/");
        } 

        if(isset($_COOKIE['loginRedirect'])){
            setcookie("loginRedirect", "", time() - 3600 ,"/");
        }

        @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

        if (mysqli_connect_errno()) {
            exit;  
        }

        $query = 'SELECT canteen FROM canteen WHERE canteen_id = "'. $_GET['id'] . '"';
        $result = $db->query($query);
        if ($result->num_rows == 0) {
            header('location: ../Pages/pageNotFound.php');
        }
        $title = mysqli_fetch_assoc($result);
        $query2 = 'SELECT * from food WHERE canteen_id = "'. $_GET['id'] .'"';
        $result2 = $db->query($query2);
       
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title['canteen']?></title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/canteen.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../favicon/favicon.ico">
    <script defer src="../js/canteenFoodModal.js"></script>
    <script defer src=../js/counter.js></script>
</head>
<body>
    <header>
        <!-- Create Logo & Find BG image for Header-->
        <a href="index.php"><img class="logo" src="../Icons/studyfuelLogo.png"></a>

        <!--Change the colour of hover and link to new webpages-->
        <?php
                include 'loginheader.php';
        ?>
        <div id="canteenTitle">
            <?php
                 
                 echo $title['canteen'];
            ?>
        </div>
    </header>

    <div class=content>
        <div id="canteenList">
            <div id="returnCanteenList">
                <img src="../Icons/left-arrow.png"><a href="./canteenlist.php"><label><u>Back To Canteens</u></label></a>
            </div>
            <?php
                while ($row = mysqli_fetch_assoc($result2)) {
                    $_SESSION['food_id'] = $row['food_id'];
                    $_SESSION['foodName'] = $row['food_name'];
                    $_SESSION['description'] = $row['description'];
                    $_SESSION['price'] = $row['price'];
                    $_SESSION['image_path'] = $row['image_path'];
                    include 'canteenphoto.php';
                }
            ?>
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div id=closeBtn>
                <span class="close">&times;</span>
            </div>
            <div id="modalList">
                <div id="modalPhoto">
                </div>
                <div id="modalDescription">
                </div>
                <div id="modalPrice">
                </div>
                <div class="number">
	                <span class="minus" onclick="decrement()"><b>-</b></span>
	                <input type="text" class="qty" value="1" disabled />
	                <span class="plus" onclick="increment()"><b>+</b></span>
                </div>
                
            </div>
            <div id=addToCartInner>
                <form id='addToCartForm' method='post' action='../process/addToCartprocess.php'>
                    <input type="hidden" name="hiddenFoodId" id="hiddenFoodId">
                    <input type="hidden" name="hiddenPrice" id="hiddenPrice">
                    <input type="hidden" name="hiddenQty" id="hiddenQty">
                    <button onclick='return addToCart()'><b>Add To Cart</b></button>
                </form>
            </div>
        </div>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>