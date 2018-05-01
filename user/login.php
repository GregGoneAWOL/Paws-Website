<?php
    include("includes/config.php");
    include ("functions/database.php");
    /*Creates a session, which is just a way to store data for individual users*/
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['login'])){

            $emailAddress = mysqli_real_escape_string($db,$_POST['email']);
            $password = mysqli_real_escape_string($db,$_POST["pass"]);

            $sql_query = "SELECT user_id FROM user WHERE email = '$emailAddress' AND password = '$password'";
            $result = mysqli_query($db,$sql_query);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

//        If login information is correct and user has registered, then it will return 1;

            if ($count == 1){
                $_SESSION['login_user'] = getIDFromDB($emailAddress);

                header("location: dashboard.php");
            }else{

                header("location: login.php");
            }

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
    include ("../components/top_bar.php");
    ?>

    <!-- Navbar Start-->
    <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
            <div class="container"><a href="../index.php" class="navbar-brand home"><img src="../img/paws_banner.png" alt="Universal logo" class="d-none d-md-inline-block"><img src="img/paws-banner-small.png" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
                <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
                <div id="navigation" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active"><a href="../index.php" >Home <b class="caret"></b></a></li>
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
                    <h1 class="h2">Sign In</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Sign In</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="content">
        <div class="container">
            <div class="row" >

                <div class="col-lg-6">
                    <div class="box">
                        <h2 class="text-uppercase">Login</h2>
                        <br>
                        <br>
                        <form method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="pass">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-template-outlined"
                                name="login"><i class="fa fa-sign-in"></i> Log in</button>
                            </div>
                        </form>
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

