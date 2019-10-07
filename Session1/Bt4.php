<?php
    function Bt4(){
        for($i = 0; $i <= 100; $i++){
            if($i%2==0){
                if($i%6==0){
                    echo "So $i chia het cho 6<br>";
                    continue;
                }
                echo "So $i chia het cho 2<br>";
                continue;
            }else if($i%3==0){
                echo "So $i chia het cho 3<br>";
                continue;
            }
            echo "So $i khong chia het cho 2,3,6<br>";
        }
    }
    Bt4();
?>