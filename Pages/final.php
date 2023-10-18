<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Project Placeholder-Final</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/final.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <script src="../js/timeCheck.js"></script>
</head>
<body>
    <header style="background-color: transparent; max-height: 169px;">
        <!-- Create Logo & Find BG image for Header-->
        <a href="index.php"><img class="logo" src="../Icons/placeholder-image.png"></a>
    </header>
    <div class="content">
        <div id="textInfo">
            <div id="timeCheck">
                Thanks for your order!<br>Your order will arrive approximately at <script>timeCheck()</script>.<br>
            </div>
            <div id="defaultText">
                You can keep track of the status of your order using the email just sent to your inbox.
            </div>
        </div>
        <div id="backLink">
            <a href="canteen.php">Back to Canteens -></a>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>