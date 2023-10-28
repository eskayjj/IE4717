<?php
echo'
    <div class="canteenPhoto">
        <div id="photo">
            <img src="../Icons/placeholder-image">
        </div>
        <div id="description">
            <label>'.$_SESSION['foodName'].'</label>
            <p>'.$_SESSION['description'].'</p>
        </div>
        <div id="price">
            <p>$'.$_SESSION['price'].'</p>
        </div>
        <div id="addToCart">
            <button>Add To Cart</button>
        </div>
    </div>';
?>