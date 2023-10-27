<div class="topButton">
    <?php
        if(isset($_COOKIE['user'])) {
    ?>
        <div class="dropdown">
            <!--If not logged in, needs to display login button instead-->
            <button class="dropbtn"><label>Account</label><img src="../Icons/dropdown.png"></button>
            <div class="dropdown-content">
                <!-- Use PHP to display Username  -->
                <a href="#">Username</a>
                <!-- Use PHP/JS to code logout -->
                <a href="../process/logoutprocess.php">Logout</a>
            </div>
        </div>
        <button><label>Cart</label><img src="../Icons/cart.png" /></button>
    <?php
        } else {
    ?>
        <a href="login.php"><button><label>Login</label><img src="../Icons/login.png"/></button></a>
    <?php
        }
    ?>
</div>