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
            <button id=openModal>Add To Cart</button>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div id=closeBtn>
                <span class="close">&times;</span>
            </div>
            <div id="modalList">
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
            </div>
            <div id=addToCart>
                <button><b>Add To Cart</b></button>
            </div>
        </div>
    </div>
    <script src="../js/canteenFoodModal.js"></script>';
?>