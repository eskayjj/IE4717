<div class="footer">
    <!-- Fill in About Us -->
    <div class="aboutUs">
        <h2>About Us</h2>
         At StudyFuel, we are committed to revolutionizing the way students and faculty experience school dining. We understand that in the fast-paced world of education, time is precious, and that's why we're here to ensure that everyone at NTU can enjoy delicious and nutritious meals without the hassle and to 'fuel up' your study sessions!
    </div>
    <!-- Change Email Destination -->
    <div class="contactUs">
        <h2>Contact Us</h2>
        <a href="mailto:f32ee@localhost">f32ee@localhost</a>
    </div>
    <div class="quickLinks">
        <h2>Quick Links</h2>
        <?php
            if(isset($_COOKIE['user'])) {
        ?>
            <a href="feedback.php">Feedback</a><br><a href="canteenlist.php">Canteens</a></p>
        <?php
            } else {
        ?>
            <a href="feedback.php">Feedback</a><br><a href="register.php">Register</a></p>
        <?php
            }
        ?>
    </div>
    <div class="followUs">
        <h2>Follow Us!</h2>
        <br>
        <!--Link to Social Media-->
        <div>
            <a href="#"><img class="icon" src="../Icons/facebook.png"></a>
            <a href="#"><img class="icon" src="../Icons/instagram.png"></a>
            <a href="#"><img class="icon" src="../Icons/twitter.png"></a>
        </div>
    </div>
    
</div>
