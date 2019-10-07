<?php
    function Bt11(){
        $count = 0;
        for($i = 1; $i <= 4; $i++){
            for($j = 1; $j <= $i; $j++){
                echo " ".($count += 1);
            }
            echo "<br>";
        }
    }

    Bt11();
?>