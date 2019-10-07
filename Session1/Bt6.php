<?php
    function Bt6(){
        $price = 2000;
        $Keo = 0;
        while($price >= 200){
            $price -= 100;
            $Keo++;
        }
        
        echo $Keo;
    }

    echo Bt6();
?>