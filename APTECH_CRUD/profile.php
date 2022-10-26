<?php
include 'crudBook.php';
include 'book.php';
$insert = new crudBook();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $auther = $_POST["auther"];
    $price = $_POST["price"];
    $tmp_name = $_FILES['imgaddress']["tmp_name"];
    $img_name = $_FILES['imgaddress']["name"];
    $imgpath = "./uploads/" . $img_name;
    move_uploaded_file($tmp_name, $imgpath);
    $bk = new book(0, $title, $auther, $price, $imgpath);
    echo $insert->Insert($bk);
    header("Location: basic_table.php");
}
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Ample Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="dashboard.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="plugins/images/logo-icon.png" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="plugins/images/logo-text.png" alt="homepage" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><span class="text-white font-medium">

                                </span></a>
                            <a href="logout.php" class="btn btn-dark">logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    <?php
include "sideBar.php";
?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="page-wrapper">
                <div class="page-breadcrumb bg-white">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">

                            </h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="container-fluid border border-secondary">
                    <form class="container" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-xlg-9 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Book Title</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input type="text" name="title" placeholder="Book Title" class="form-control p-0 border-0">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Book Auther</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input type="text" name="auther" placeholder="Book Auther" class="form-control p-0 border-0">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Book Price</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input type="number" name="price" placeholder="Book Price" class="form-control p-0 border-0">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Choose Iamage</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" name="imgaddress" placeholder="123 456 7890" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                            <div class="form-group mb-4">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" name="submit">Add Book</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a>wrappixel.com</a>
                </footer>
            </div>
        </form>
    </div>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>