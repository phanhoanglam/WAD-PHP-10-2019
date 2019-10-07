<?php
    function Bt10(){
        echo "<div style='border: solid;border-color: green;width: 400px;'>";
        for($i = 1; $i <= 8; $i++){
            for($j = $i; $j < ($i + 8); $j++){
                if($j % 2 == 0){
                    echo "<span style='background-color: green; width: 50px; height: 50px;display: inline-block;'></span>";
                }else{
                    echo "<span style='background-color: white; width: 50px; height: 50px;display: inline-block;'></span>";
                }
            }
        }
        echo "</div>";
    }

    Bt10();
?>