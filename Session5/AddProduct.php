<?php include 'connect.php'; ?>
<?php
$sql = "SELECT * FROM product_categories";
$category = mysqli_query($connect, $sql);

// Tạo folder để chứa ảnh 
$target_dir = "ImageProducts/";

if (isset($_POST['addproduct'])) {
    $name = $_POST['Name'];
    $productCategory = $_POST['Category'];
    $description = $_POST['Description'];
    $price = $_POST['Price'];
    $discount = $_POST['Discount'];
    $created = date('Y-m-d H:i:s');
    $image_file = $_FILES['image']['name'];

    if ($image_file != null) {
        // Tạo đường dẫn file sau khi upload lên hệ thống
        $target_file = $target_dir . basename($image_file);

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

        $sql = "INSERT INTO products(name, description, image, price, created, discount, product_category_id) 
        VALUES ('$name','$description', '$target_file', '$price', '$created', '$discount', '$productCategory')";
        if (mysqli_query($connect, $sql) === TRUE) {
            header("Location: ListProducts.php");
            exit;
        }
    }
    $sql = "INSERT INTO products(name, description, price, created, discount, product_category_id) 
    VALUES ('$name','$description', '$price', '$created', '$discount', '$productCategory')";
    if (mysqli_query($connect, $sql) === TRUE) {
        header("Location: ListProducts.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description1" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="dashboard.html">
                        <!-- Logo icon image, you can use font-icon also --><b>
                            <!--This is dark logo icon--><img src="images/admin-logo.png" alt="home" class="dark-logo" />
                            <!--This is light logo icon--><img src="images/admin-logo-dark.png" alt="home" class="light-logo" />
                        </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                            <!--This is dark logo text--><img src="images/admin-text.png" alt="home" class="dark-logo" />
                            <!--This is light logo text--><img src="images/admin-text-dark.png" alt="home" class="light-logo" />
                        </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li>
                        <a class="profile-pic" href="#"> <img src="images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Steave</b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'sidebar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Basic Table</h4>
                    </div>
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create a product!</h1>
                            </div>
                            <form class="user" action="AddProduct.php" method="POST" enctype='multipart/form-data'>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Name" placeholder="Product Name">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="Category">
                                        <?php while ($rows = mysqli_fetch_array($category)) { ?>
                                            <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Description" placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                                            <input name="image" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
                                        </span>
                                        <span class="form-control"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Price" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Discount" placeholder="Discount">
                                </div>
                                <input type="submit" name="addproduct" value="Add product" class="btn btn-primary btn-user btn-block">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com</footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>