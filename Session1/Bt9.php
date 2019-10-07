<?php
    function Bt9(){
        $xanh = 120*3/10;
        $do = 120/5;
        echo "So bi Xanh: " .$xanh ;
        echo "<br>";
        echo "So bi Do: " .$do ;
        echo "<br>";
        
        $vang = 120 - $do - $xanh;
        $trang = 0;
        while((3*$vang) != (7*$trang)) {
          $vang --;
          $trang ++;
        };
        echo "So bi vang: " .$vang;
        echo "<br>";
        echo "So bi trang: " .$trang;
        echo "<br>";
    }

    Bt9();
?>