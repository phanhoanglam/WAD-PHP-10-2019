<?php
   if(isset($_POST['submitRegister'])){
    if(strlen($_POST['email']) != 0 && strlen($_POST['username']) != 0 && strlen($_POST['password']) != 0){
        echo "<h3>Đăng kí thành công</h3>";
    }
   }
?>
<h1> Form Example </h1>
<form name="registerForm" action="Bt13.php" method="POST">
    <p>Email
        <input type="text" name="email">
        <?php
          if(isset($_POST['submitRegister'])){
            if(strlen($_POST['email']) == 0){
                echo "<p style='color:red'>Nhap Email</p>";
            }
          }
        ?>
    </p>
    <p>Username
        <input type="text" name="username">
        <?php
          if(isset($_POST['submitRegister'])){
            if(strlen($_POST['username']) == 0){
                echo "<p style='color:red'>Nhap username</p>";
            }
          }
        ?>
    </p>
    <p>Password
        <input type="password" name="password">
        <?php
          if(isset($_POST['submitRegister'])){
            if(strlen($_POST['password']) == 0){
                echo "<p style='color:red'>Nhap password</p>";
            }
          }
        ?>
    </p>
    <input type="submit" value="Submit" name="submitRegister">
</form>