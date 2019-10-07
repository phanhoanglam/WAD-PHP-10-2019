<?php
    echo "Hello world"
?>
<h3>Hello</h3>
<?php
    // Bien trong PHP
    $myClass = "WAD PHP";
    echo $myClass;

    $loptoi = "WAD PHP"; // khong nen

    $defineMyUserForClass = "Test";
    $ab = "Demo test"; // khong nen

    // Cac phep toan co ban + , - , * , / , %
    $numberOne = 7;
    $numberTwo = 8;
    echo '<br>';
    echo $numberOne + $numberTwo;

    // Cac phep so sanh > , < , >= , <= , == , !=

    // Ham trong PHP
    function myFunction(){
        echo "Test Function";
    }
    echo '<br>';
    myFunction();

    function myFunction1(){
        $a = 4;
        $b = 1;
        return $a + $b;
    }
    echo '<br>';
    echo myFunction1();

    function myFunction2($x,$y){
        return $x + $y;
    }
    echo '<br>';
    echo myFunction2(5,2);
?>