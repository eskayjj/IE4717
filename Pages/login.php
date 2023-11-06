<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../favicon/favicon.ico">
    <?php
        if(isset($_COOKIE['user'])) {
            header('location: ../Pages/index.php');
        } 

        Session_start();
    ?>
</head>
<body>
    <header style="background-color: transparent; max-height: 169px;">
        <!-- Create Logo & Find BG image for Header-->
        <a href="index.php"><img class="logo" src="../Icons/studyfuelLogo.png"></a>
    </header>
    <div class="content" style="margin-top: 145px;">
        <div id="loginDetails">
            <form action="../process/loginprocess.php" method="post">
            <?php if(isset($_SESSION['loginFail'])) {
                        if($_SESSION['loginFail']){
                            echo '<span id="errorMsg">Invalid Email and/or Password!</span>';
                            unset($_SESSION['loginFail']);
                        }
                    }
                    ?>                
                <p id="pEmail">Email Address</p>
                <input type="email" name="loginEmail" placeholder="eg. name@example.com" required>
                <p id="pPassword">Password</p>
                <input type="password" name="loginPassword" required>
                <input type="submit" id="loginSubmit" name="loginBtn" value="Login" style= "margin-top: 56px;">
            </form>
        </div>
        <div id="loginBtns">
            <div>
                <a href="register.php"><button style= "margin-bottom: 66px;">Register</button></a>
            </div>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>