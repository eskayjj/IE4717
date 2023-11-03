<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/final.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../favicon/favicon.ico">
    <!-- <script src="../js/timeCheck.js"></script> -->
    <?php
        Session_start();
        
        if(!isset($_COOKIE['user'])) {
            header('location: ../Pages/login.php');
        } 
    ?>
</head>
<body>
    <header style="background-color: transparent; max-height: 169px;">
        <!-- Create Logo & Find BG image for Header-->
        <a href="index.php"><img class="logo" src="../Icons/studyfuelLogo.png"></a>
        <?php
            include 'loginheader.php';
        ?>
    </header>
    <div class="content">
        <div id="textInfo">
            <div id="timeCheck">
                Page requested not found
            </div>
        </div>
        <div id="backLink">
            <a href="../Pages/canteenlist.php">Back to Canteens -></a>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>