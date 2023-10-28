<?php
echo 
'<a href="./canteen.php?id='.$_SESSION['canteenID'].'"><div class="canteenListPhoto">
    <div class=canteenListText>
            <label>'.$_SESSION['canteenName'].'</label>
    </div>
</div></a>';
?>