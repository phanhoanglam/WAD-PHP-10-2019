<?php
    $Server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'wad-php-1019';
    $connect = mysqli_connect($Server,$username,$password,$database);

    // check connection
    if(mysqli_connect_error()){
        echo "Failed to connect to MySQL: ". mysqli_connect_error();
    }

    $title = "Demo title";

    $sql = "INSERT INTO products(Title,Description,Image,Price, Created, Updated)
    VALUES('$title','Apple','IPhone12.jpg','1200','2019-10-09','2019-10-09')";

if (mysqli_query($connect, $sql) === TRUE) {
    echo "Insert success!";
}
?>

