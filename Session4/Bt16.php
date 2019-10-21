<?php
$Server = 'localhost';
$username = 'root';
$password = '';
$database = 'wad-php-1019';
$connect = mysqli_connect($Server, $username, $password, $database);

// Tạo folder để chứa ảnh 
$target_dir = "Avatar/";

$image = "";
$fullname = "";
$password1 = "";
$phone = "";
$email = "";
$birthday = "";
$update = false;

$imageError = '';

// Display users
$result = mysqli_query($connect, "select Id, Fullname, Phone, Email, Birthday, Image from users");

// Add user
if (isset($_POST['submitRegister'])) {
    $fullname = $_POST['username'];
    $password1 = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];

    if ($_FILES['image']['name'] != null) {
        // Tạo đường dẫn file sau khi upload lên hệ thống
        $target_file = $target_dir . basename($_FILES['image']['name']);

        // Kiểm tra loại file (png, jpg, jpeg, gif)
        $file_type = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $file_type_allow = array('png', 'jpg', 'jpeg', 'gif');
        if (!in_array(strtolower($file_type), $file_type_allow)) {
            $imageError = "Image Invalid!";
        }

        // Kiểm tra file đã tồn tại
        if (file_exists($target_file)) {
            $imageError = "Image already exists!";
        }

        if ($imageError == '') {
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        }
        //  print_r($_FILES['image']['tmp_name']);
        //  print_r($target_file);

        $sql = "INSERT INTO users(Fullname, Password, Phone, Email, Image, Birthday)
        VALUES('$fullname','$password1','$phone','$email','$target_file','$birthday')";

        if (mysqli_query($connect, $sql) === TRUE) {
            echo "<h3>Register success!!!</h3>";
            header('location: Bt16.php');
            exit;
        }
    }else{
        $sql = "INSERT INTO users(Fullname, Password, Phone, Email, Birthday)
        VALUES('$fullname','$password1','$phone','$email','$birthday')";

        if (mysqli_query($connect, $sql) === TRUE) {
            echo "<h3>Register success!!!</h3>";
            header('location: Bt16.php');
            exit;
        }
    }
}

// Edit user
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $record = mysqli_query($connect, "select * from users where Id = $id");
    if ($record) {
        $n = mysqli_fetch_array($record);
        $fullname = $n['Fullname'];
        $password1 = $n['Password'];
        $phone = $n['Phone'];
        $email = $n['Email'];
        $birthday = $n['Birthday'];
        $image = $n['Image'];
    }
}


if (isset($_POST['submitUpdate'])) {
    $id = $_POST['id'];
    $fullname = $_POST['username'];
    $password1 = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $image = $_FILES['image']['name'];

    if ($image != null) {
        // Tạo đường dẫn file sau khi upload lên hệ thống
        $target_file = $target_dir . basename($_FILES['image']['name']);

        // Kiểm tra loại file (png, jpg, jpeg, gif)
        $file_type = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $file_type_allow = array('png', 'jpg', 'jpeg', 'gif');
        if (!in_array(strtolower($file_type), $file_type_allow)) {
            $imageError = "Image Invalid!";
        }

        // Kiểm tra file đã tồn tại
        if (file_exists($target_file)) {
            $imageError = "Image already exists!";
        }

        if ($imageError == '') {
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        }
        $sql = "Update users info SET Fullname='$fullname', Password='$password1', Phone='$phone'
        , Email='$email', Birthday='$birthday', Image='$target_file' WHERE id=$id";

        if (mysqli_query($connect, $sql) === TRUE) {
            echo "<h3>Update success!!!</h3>";
        }
        header('location: Bt16.php');
        exit;
    }

    $sql = "Update users info SET Fullname='$fullname', Password='$password1', Phone='$phone'
    , Email='$email', Birthday='$birthday' WHERE id=$id";

    if (mysqli_query($connect, $sql) === TRUE) {
        echo "<h3>Update success!!!</h3>";
        header('location: Bt16.php');
        exit;
    }
}

// delete user
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM users WHERE id=$id";
    if (mysqli_query($connect, $sql) === TRUE) {
        echo "<h3>Delete success!!!</h3>";
        header('location: Bt16.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Bt16</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="col-md-4">
        <h1> Form Example </h1>
        <form name="registerForm" action="Bt16.php" method="POST" id="formUser" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Fullname :</label>
                <input type="text" class="form-control" name="username" placeholder="Enter fullname" value="<?php echo $fullname; ?>">
            </div>

            <div class="form-group">
                <label>Password :</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" value="<?php echo $password1; ?>">
            </div>

            <div class="form-group">
                <label>Phone :</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter phone" value="<?php echo $phone; ?>">
            </div>

            <div class="form-group">
                <label>Email :</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo $email; ?>">
            </div>

            <div class="form-group">
                <label>Birthday :</label>
                <input type="date" class="form-control" name="birthday" value="<?php echo $birthday; ?>">
            </div>

            <div class="form-group">
                <label>Avatar :</label>
                <input type="file" name="image" value="<?php echo $birthday; ?>">
                <?php if ($image == '') { ?>
                    <img width="200px" src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" name="imgvalue" alt="">
                <?php } else { ?>
                    <img width="200px" src="<?php echo $image ?>" alt="">
                <?php } ?>
                <?php echo $imageError != '' ? $imageError : '' ?>
            </div>

            <?php if ($update == false) { ?>
                <button class="btn btn-success" type="submit" name="submitRegister">Submit</button>
            <?php } else { ?>
                <button class="btn btn-success" type="submit" name="submitUpdate">Update</button>
            <?php } ?>
        </form>
    </div>
    <div class="col-md-8">
        <h1>Users table</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Birthday</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rows = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $rows['Fullname']; ?></td>
                        <td><?php echo $rows['Phone']; ?></td>
                        <td><?php echo $rows['Email']; ?></td>
                        <td><?php echo $rows['Birthday']; ?></td>
                        <td>
                            <a href="Bt16.php?edit=<?php echo $rows['Id']; ?>">Edit</a>
                            |
                            <a href="Bt16.php?delete=<?php echo $rows['Id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#formUser").validate({
            rules: {
                username: "required",
                password: "required",
                phone: "required",
                birthday: "required",
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                username: "Username required!",
                password: "Password required!",
                phone: "Phone required!",
                birthday: "Birthday required!",
                email: {
                    required: "Email required!",
                    email: "Invalid email address!"
                },
            }
        });
    });
</script>