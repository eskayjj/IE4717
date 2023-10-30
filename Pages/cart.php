<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Project Placeholder-Cart</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/cart.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/cartx.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Create Logo & Find BG image for Header-->
        <a href="index.php"><img class="logo" src="../Icons/placeholder-image.png"></a>

        <!--Change the colour of hover and link to new webpages-->
        <?php
                include 'loginheader.php';
        ?>

        <div id="mycartTitle">
            My Cart (X)
        </div>
    </header>
     <div class="content">   
      <div class="canteenLabel">
        <label>Canteen [?]</label>
      </div>  
       <div id="orderbox">
       <label class="container">
        <input type="checkbox">
        <span class="checkmark"></span>
       </label>
        <img src="placeholder.jpg" alt="Image of Food" width="500" height="300" style="float: left; padding-left: 10%; padding-top: 6%;">
        <div id="description">
           <p> [Name of food] </p> <br><br> 
           <p> [Item Description] </p> <br><br>
           <p> [Qty] </p> <br><br>
           <p> [Total Price] </p> <br><br>
        </div>     
       </div>
       <div>
       <p id="totalP" style="float: right;">Total: $X.XX</p>
       <input type="submit" id="orderSubmit" name="orderBtn" value="Checkout">
       </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>