<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Project Placeholder-Account</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/account.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <?php
        if(!isset($_COOKIE['user'])) {
            header('location: ../Pages/login.php');
        } 
        session_start();
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
        
        <!-- Retrieve Username from SQL -->
        <div id="accountTitle">
            Welcome, {User}!
        </div>
    </header>
    <div class="content">
        <div class="headLabel">
            <label>Address</label>
        </div>
        <div>
            {Details}
        </div>
        <div class="headLabel">
            <label>Order History</label>
        </div>
        <div>
            {History Details}
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>