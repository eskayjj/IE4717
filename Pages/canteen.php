<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Project Placeholder-List</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/canteen.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <?php
        @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

        if (mysqli_connect_errno()) {
            exit;  
        }

        $query = 'SELECT canteen FROM canteen WHERE canteen_id = "'. $_GET['id'] . '"';
        $result = $db->query($query);
        $query2 = 'SELECT * from food';
        $result2 = $db->query($query2);
       
        Session_start();
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
        <div id="canteenTitle">
            <?php
                 $title = mysqli_fetch_assoc($result);
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
                    if($row['canteen_id'] == $_GET['id']) {
                        $_SESSION['foodName'] = $row['food_name'];
                        $_SESSION['description'] = $row['description'];
                        $_SESSION['price'] = $row['price'];
                        include 'canteenphoto.php';
                    }
                    else{
                        $_SESSION['foodName'] = '';
                        $_SESSION['description'] = '';
                        $_SESSION['price'] = '';
                    }
                }
            ?>
        </div>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>