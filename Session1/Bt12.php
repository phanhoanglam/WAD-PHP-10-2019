<?php
    function Bt12(){
       for($i = 1; $i <= 3; $i++){
          for($j = $i; $j < 3; $j++){
             echo "&nbsp;&nbsp;";
          }
          for($k = 1; $k <= (2*$i-1); $k++){
             echo "*";
          }
          echo "<br>";
       }
    }

    Bt12();
?>