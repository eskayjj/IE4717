<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Project Placeholder-Feedback</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/feedback.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <script defer src="../js/validation.js"></script>
</head>

<body>
    <header>
        <!-- Create Logo & Find BG image for Header-->
        <a href="index.php"><img class="logo" src="../Icons/placeholder-image.png"></a>
        <!--Change the colour of hover and link to new webpages-->
        <div class="topButton">
            <div class="dropdown">
                <!--If not logged in, needs to display login button instead-->
                <button class="dropbtn"><label>Account</label><img src="../Icons/dropdown.png"></button>
                <div class="dropdown-content">
                    <!-- Use PHP to display Username  -->
                    <a href="#">Username</a>
                    <!-- Use PHP/JS to code logout -->
                    <a href="#">Logout</a>
                </div>
            </div>
            <button><label>Cart</label><img src="../Icons/cart.png" /></button>
        </div>
        <div id="feedbackTitle">
            Feedback
        </div>
    </header>
    <div class="content">
        <div id="feedbackFormBG">
            <div id="feedbackForm">
                <form onsubmit="return feedbackValidation()">
                    <p id="pSubject">Subject*</p>
                    <select name="subject" id="subject" required>
                        <option value="" disabled selected>Choose one...</option>
                        <option value="generalEnquiry">General Enquiry</option>
                        <option value="compliment">Compliment</option>
                        <option value="missingOrder">Missing/Wrong Order</option>
                        <option value="lateDelivery">Late Delivery/Long Waiting Time</option>
                        <option value="refund">Refund</option>
                        <option value="foodQuality">Food Quality</option>
                    </select>
                    <p id="pName">Full Name*</p>
                    <input type="text" name="feedbackName" id="feedbackName" required>
                    <p id="pEmail">Email Address*</p>
                    <input type="email" name="feedbackEmail" id="feedbackEmail" placeholder="eg. name@example.com" required>
                    <p id="pContact">Contact Number</p>
                    <input type="text" name="feedbackContact" id="feedbackContact">
                    <p id="pFeedback">Feedback*</p>
                    <input type="text" name="feedbackFeedback" id="feedbackBox" required>
                    <input type="submit" id="feedbackSubmit" name="feedbackBtn" value="Submit Feedback!"
                        style="margin-top: 61px;">
                </form>
            </div>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>

</html>