<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../favicon/favicon.ico">
    <script defer src="../js/validation.js"></script>
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
    <div class="content">
        <div id="returnLogin">
            <img src="../Icons/left-arrow.png"><a href="login.php"><label>Back To Login</label></a>
        </div>
        <div id="registerDetails">
            <form action="../process/registerprocess.php" method="post" onsubmit="return registerValidation()">
            <?php if(isset($_SESSION['registerFail'])) {
                        if($_SESSION['registerFail']){
                            echo '<span id="errorMsg">Username/Email address already exist!</span>';
                            unset($_SESSION['registerFail']);
                        }
                    }
                    ?> 
                <p id="pUser">Username</p>
                <div class="parent">
                    <div class="inputText">
                        <input type="text" name="regUser" onfocus="focusEntry(this)" onfocusout="focusEntry(this)" oninput="updateErrorStatusUser()" required>
                    </div>
                    <div class="validation">
                        <p id="charLength" class="invalid" style="display:none;"> 8 - 16 characters</p>
                        <p id="specialChar" class="valid" style="display:none;"> No special character (eg. @,!.<>/*)</p>
                        <p id="noSpace" class="valid" style="display:none;"> No spaces</p>
                    </div>
                </div>
                <p id="pEmail">Email Address</p>
                <div class="parent">
                    <div class="inputText">
                        <input type="email" name="regEmail" placeholder="eg. name@example.com" onfocus="focusEntry(this)" onfocusout="focusEntry(this)" oninput="updateErrorStatusEmail()" required>
                    </div>
                    <div class="validation">
                        <p id="emailValid" class="invalid" style="display:none;"> Valid email address</p>
                    </div>
                </div>
                <p id="pPassword">Password</p>
                <div class="parent">
                    <div class="inputText">
                        <input type="password" name="regPassword" onfocus="focusEntry(this)" onfocusout="focusEntry(this)" oninput="updateErrorStatusPW()" required>
                    </div>
                    <div class="validation">
                        <p id="pwLength" class="invalid" style="display:none;"> 8 - 16 characters</p>
                        <p id="pwUpper" class="invalid" style="display:none;"> At least 1 uppercase letter</p>
                        <p id="pwLower" class="invalid" style="display:none;"> At least 1 lowercase letter</p>
                        <p id="pwNum" class="invalid" style="display:none;"> At least 1 numeral</p>
                        <p id="pwSpecial" class="invalid" style="display:none;"> At least 1 special character</p>
                        <p id="pwSpace" class="valid" style="display:none;"> No spaces</p>
                    </div>
                </div>
                <p id="pCfrmPassword">Confirm Password</p>
                <div class="parent">
                    <div class="inputText">
                        <input type="password" name="regCfrmPassword" onfocus="focusEntry(this)" onfocusout="focusEntry(this)" oninput="updateErrorStatusPWConfirm()" required>
                    </div>
                    <div class="validation">
                        <p id="cfrmPWCheck" class="invalid" style="display:none;"> Password match</p>
                    </div>
                </div>
                <input type="submit" id="regSubmit" name="regBtn" value="Register" style= "margin-top: 270px;">
            </form>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>