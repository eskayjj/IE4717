<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studyfuel</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/global.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Inder&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../favicon/favicon.ico">
    <?php
        session_start();
        // set username and password
        @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

        if (mysqli_connect_errno()) {
            exit;  
        }
        $query = 'SELECT * FROM food ORDER BY rank DESC LIMIT 5';
        $result = $db->query($query);
    ?>
</head>
<body>
    <header>
        <!-- Create Logo & Find BG image for Header-->
        <a href="index.php"><img class="logo" src="../Icons/studyfuelLogo.png"></a>

        <!--Change the colour of hover and link to new webpages-->
        <?php
            include 'loginheader.php';
        ?>
        
    </header>
    <div class="content">
        <div id="popularChoicesTitle">
            Featured food
        </div>
        <!--Link Image to Food in Different canteen using PHP and SQL-->
        <div id="popularChoicesPhoto">
            <?php
                while($row = mysqli_fetch_assoc($result) ){
                    echo '<a href="../Pages/canteen.php?id='.$row['canteen_id'].'"><img src="../foodPhoto/'.$row['image_path'].'"></a>';
                }
            ?>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>

</html>