<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Project Placeholder-Canteen</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/canteenlist.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <?php
        @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

        if (mysqli_connect_errno()) {
            exit;  
        }

        $query = 'SELECT * from canteen';
        $result = $db->query($query);
       
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

        <div id="canteenListTitle">
            CANTEENS
        </div>
    </header>

    <div class=content>
        <div id="list">
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['canteenName'] = $row['canteen'];
                    $_SESSION['canteenID'] = $row['canteen_id'];
                    include 'canteenlistphoto.php';
                }
            ?>
        </div>
    </div>
    
    <?php
        include 'footer.php';
    ?>
</body>
</html>