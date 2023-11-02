<?php
echo'
    <div class="canteenPhoto">
        <div id="photo">
            <img src="../foodPhoto/'.$_SESSION['image_path'].'"/>
        </div>
        <div id="description">
            <label>'.$_SESSION['foodName'].'</label>
            <p>'.$_SESSION['description'].'</p>
        </div>
        <div id="price">
            <p>$'.$_SESSION['price'].'</p>
        </div>
        <div id="addToCart">
            <button id="openModal" onClick="openCart(this, `' . $_SESSION['food_id'] . '`)">Add To Cart</button>
        </div>
    </div>
    ';
?>