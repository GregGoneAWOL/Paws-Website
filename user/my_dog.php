<?php

include("functions/database.php");

session_start();

$dog_info_array = getDogs($_SESSION['login_user']);

$dogName = $dog_info_array[1];
$dogAge = $dog_info_array[2];
$dogWeight = $dog_info_array[3];


if (isset($_POST['save_info'])){

    $dogName = $_POST['form_dog_name'];
    $dogAge = $_POST['form_dog_age'];
    $dogWeight = $_POST['form_dog_weight'];

    if (!empty($dogName)){
        insertDogName($_SESSION['login_user'],$dogName);
    }

    if (!empty($dogAge)){
        insertDogAge($_SESSION['login_user'],$dogAge);
    }

    if (!empty($dogWeight)){
        insertDogWeight($_SESSION['login_user'],$dogWeight);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Universal - All In 1 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="../vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- owl carousel-->
    <link rel="stylesheet" href="../vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="../vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]><!---->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
<div id="all">

    <?php
    if (empty($_SESSION['login_user'])){
        header("location: login.php");
    }
    ?>

    <?php
    include ("../components/top_bar.php");
    ?>
    <!-- Navbar Start-->
    <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
            <div class="container"><a href="../index.php" class="navbar-brand home">
                    <img src="../img/paws_banner.png" alt="Universal logo" class="d-none d-md-inline-block">
                    <img src="../img/paws-banner-small.png" alt="Universal logo" class="d-inline-block d-md-none">
                    <span class="sr-only">Universal - go to homepage</span></a>

                <button type="button" data-toggle="collapse" data-target="#navigation"
                        class="navbar-toggler btn-template-outlined">
                    <span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>

                <div id="navigation" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item"><a href="../index.php" >Home <b class="caret"></b></a></li>
                        <li class="nav-item menu-large"><a href="../about_us.php">About Us <b class="caret"></b></a></li>
                        <li class="nav-item"><a href="../contact_us.php">Contact Us<b class="caret"></b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Navbar End-->

    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row d-flex align-items-center flex-wrap">
                <div class="col-md-7">
                    <h1 class="h2">My Dog</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active">My Dog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">
            <div class="row bar">
                <div id="customer-account" class="col-lg-9 clearfix">
                    <p class="lead">Change your dogs details here.</p>
                    <div class="box mt-5">
                        <div class="heading">
                            <h3 class="text-uppercase">Change Dogs Details</h3>
                        </div>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dog_name">Dog Name</label>
                                        <input id="dog_name" type="text" class="form-control" name="form_dog_name" value="<?php echo $dogName?> ">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dog_age">Dog Age</label>
                                        <input id="dog_age" type="text" class="form-control" name="form_dog_age" value="<?php echo $dogAge?> ">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dog_weight">Dog Weight</label>
                                        <input id="dog_weight" type="text" class="form-control" name="form_dog_weight" value="<?php echo $dogWeight?> ">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <br>
                                <br>
                                <button type="submit" class="btn btn-template-outlined" name="save_info">
                                    <i class="fa fa-save"></i> Save details</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-lg-3 mt-4 mt-lg-0">
                    <!-- CUSTOMER MENU -->
                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="h4 panel-title">Customer section</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills flex-column text-sm">
                                <li class="nav-item"><a href="dashboard.php" class="nav-link"><i class="fa fa-list"></i> My Account</a></li>
                                <li class="nav-item"><a href="my_dog.php" class="nav-link active"><i class="fa fa-hand-o-up"></i> My Dog</a> </li>
                                <li class="nav-item"><a href="settings.php" class="nav-link"><i class="fa fa-cog"></i> Settings</a></li>
                                <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Log out</a> </li>
                            </ul>
                        </div>
                        <br>
                        <br>
                        <div class="panel-heading">
                            <h3 class="h4 panel-title">My Dogs Statistics</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills flex-column text-sm">
                                <li class="nav-item"><a href="active_level.php" class="nav-link"><i class="fa fa-pie-chart"></i> Active Level</a></li>
                                <li class="nav-item"><a href="minutes_played.php" class="nav-link"><i class="fa fa-line-chart"></i> Minutes Played</a> </li>
                                <li class="nav-item"><a href="minutes_rest.php" class="nav-link"><i class="fa fa-bar-chart"></i> Minutes Rest</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include ("../components/footer.php");
    ?>
</div>
<!-- Javascript files-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/popper.js/umd/popper.min.js"> </script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="../vendor/waypoints/lib/jquery.waypoints.min.js"> </script>
<script src="../vendor/jquery.counterup/jquery.counterup.min.js"> </script>
<script src="../vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="../vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
<script src="../vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="../vendor/jquery.scrollto/jquery.scrollTo.min.js"></script>
</body>
</html>