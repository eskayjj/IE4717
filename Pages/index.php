<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Project Placeholder</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <?php
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
        
        <!-- If got spare time then implement Search Button -->
        <div id="searchBar">
            <form>
                <input type="search" name="foodSearch" placeholder="Search for food...">
            </form>
        </div>
    </header>
    <div class="content">
        <div id="popularChoicesTitle">
            Featured food
        </div>
        <!--Link Image to Food in Different canteen using PHP and SQL-->
        <div id="popularChoicesPhoto">
            <a href="#"><img src="../Icons/placeholder-image.png"></a>
            <a href="#"><img src="../Icons/placeholder-image.png"></a>
            <a href="#"><img src="../Icons/placeholder-image.png"></a>
            <a href="#"><img src="../Icons/placeholder-image.png"></a>
            <a href="#"><img src="../Icons/placeholder-image.png"></a>  
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>

</html>