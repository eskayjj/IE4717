<?php
echo 
'<a href="./canteen.php?id='.$_SESSION['canteenID'].'"><div class="canteenListPhoto">
    <img src="../canteenPhoto/'.$_SESSION['canteenImage'].'"/>
    <div class="fade"></div>
    <div class=canteenListText>
            <label>'.$_SESSION['canteenName'].'</label>
    </div>
</div></a>';
?>