<!-- Top bar-->
<div class="top-bar">
    <div class="container">
        <div class="row d-flex align-items-center">
            <!--The below is intentionally left blank to add a space-->
            <div class="col-md-6 d-md-block d-none"></div>
            <div class="col-md-6">
                <div class="d-flex justify-content-md-end justify-content-between">
                    <?php
                    if (empty($_SESSION['login_user'])){
                        echo '<div class="login"><a href="#" data-toggle="modal" data-target="#login-modal" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Sign In</span></a></div>';
                    }else{
                        echo '<div class="login"><a href="/Project/user/dashboard.php" class="login-btn"><i 
                                            class="fa fa-user-o"></i><span class="d-none d-md-inline-block">My Account</span></a></div>';

                        echo '<div class="login"><a href="/Project/user/logout.php" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Log Out</span></a></div>';
                    }
                    ?>
                    <ul class="social-custom list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top bar end-->