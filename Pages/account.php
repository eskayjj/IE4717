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
    <script defer src="../js/validation.js"></script>
    <script defer src="../js/account.js"></script>
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
            Welcome, <?php echo $_SESSION['username'] ?>!
        </div>
    </header>
    <div class="content">
        <div class="headLabel">
            <label>Account Details</label>
        </div>
        <div id=innerContent>
            <form id="accountForm" onsubmit="return accountDetailValidation()" method="post" action="../process/updateAccountprocess.php">
                <div id="details">
                    <label><b>Name</b><br></label>
                    <?php
                        echo '<span class="detailFix">'.$_SESSION['name'].'</span>';
                        echo '<input type="text" name="accountName" id="accountName" class="detailEdit invisible" value="'.$_SESSION['name'].'"/>';
                    ?>
                    <span id="accountNameFail">Invalid name</span>
                    
                    <label><br><b>Contact Number</b><br></label>
                    <?php
                        echo '<span class="detailFix">'.$_SESSION['contactNumber'].'</span>';
                        echo '<input type="number" name="contactNumber" id="contactNumber" class="detailEdit invisible" value="'.$_SESSION['contactNumber'].'"/>';
                    ?>
                    <span id="accountContactFail">Invalid Contact Number</span>
                    <label><br><b>Delivery Address</b><br></label>
                    <?php
                        echo '<span class="detailFix">'.$_SESSION['deliveryAddress'].'</span>';
                        echo '<input type="text" name="accountAddress" id="accountAddress" class="detailEdit invisible" value="'.$_SESSION['deliveryAddress'].'"/>';
                    ?>
                </div>
                <div id=editBtn>
                    <button onclick="return showAccountForm()"  class="detailFix"><u>Edit</u></button>
                    <button onclick="return accountFormSubmit()" class="detailEdit invisible"><u>Save</u></button>
                </div>
            </form>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>