<?php
    function Bt5(){
        $BinhBooks = 27;
        $MinhBooks = $BinhBooks / 3;
        $i = 0;
        while($BinhBooks/$MinhBooks!=2){
            $BinhBooks--;
            $MinhBooks++;
            $i++;
        }
        return $i;
    }
    echo Bt5();
?>