<?php
    function Bt8(){
        $do = 50;
        $xanh = 0;
        
        while((2/5 * $xanh) + (3/4 * $do) != 27) {
            $do--;
            $xanh++;
        }

        echo "Bi do: ".$do;
        echo "<br>";
        echo "Bi xanh: ".$xanh;
    }

    Bt8();
?>