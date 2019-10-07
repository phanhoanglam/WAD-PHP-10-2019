<?php
    function Bt7(){
        $Usd = 50;
        $Euro = 0;
        $Keo = 0;
        while($Keo < 50){
            $Usd -= 5;
            $Euro += 3;
            $Keo += 1;
            while($Euro >= 2){
                $Usd += 3;
                $Keo += 1;
                $Euro -= 2;
            }
        }
        echo 50 - $Usd;
    }

    Bt7();
?>