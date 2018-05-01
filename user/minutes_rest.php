<?php
include "functions/database.php";
session_start();

$array = getDogsData($_SESSION['login_user'], 30);

$index = 0;

foreach ($array as $row){

    $date = $row[5];
    $date = new DateTime($date);

    $minutesRestArray[$index] = $row[4];
    $minutesRestDates[$index] = $date->format('Y-m-d');

    $index++;

}

//TODO the array contains all the data for last 30 days, add to the chart, perhaps loop through and append.
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
    <!--    CDN for Charts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
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
                    <h1 class="h2">Minutes Rest</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Minutes Rest</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">
            <div class="row bar">
                <div id="customer-account" class="col-lg-9 clearfix">

                    <p>Here you can check out how many minutes your dog rests for!
                        You can access legacy information as well as check out the current days progress</p>
                    <br>
                    <?php
                    if (empty($minutesRestDates) || empty($minutesRestArray)){
                        echo "No data available";
                    }else{
                        echo '<canvas id="bar-chart" width="800" height="450"></canvas>';
                    }
                    ?>
                    <br>
                    <br>
                    <br>
                    <br>

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
                                <li class="nav-item"><a href="my_dog.php" class="nav-link"><i class="fa fa-hand-o-up"></i> My Dog</a> </li>
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
                                <li class="nav-item"><a href="minutes_rest.php" class="nav-link active"><i class="fa fa-bar-chart"></i> Minutes Rest</a></li>
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
<script>
    // Bar chart
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {

            labels: [<?php

                foreach ($minutesRestDates as $row){

                    echo  "'" . $row . "',";
                }

                ?>],
            datasets: [
                {
                    label: "Minutes rested",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                    data: [
                        <?php

                            foreach ($minutesRestArray as $row){

                                echo $row . ",";
                            }


                        ?>
                    ]
                }
            ]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Minutes Rested in the last 30 days'
            }
        }
    });
</script>
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