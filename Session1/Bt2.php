<?php
    function checkDate1($n){
        if($n == 2){
            echo "Thứ 2";
            return;
        }
        else if($n == 3){
            echo "Thứ 3";
            return;
        }
        else if($n == 4){
            echo "Thứ 4";
            return;
        }
        else if($n == 5){
            echo "Thứ 5";
            return;
        }
        else if($n == 6){
            echo "Thứ 6";
            return;
        }
        else if($n == 7){
            echo "Thứ 7";
            return;
        }
        else if($n == 8){
            echo "Chủ nhật";
            return;
        }
        echo "Không phải ngày trong tuần";
    }
    checkDate1(10);
?>