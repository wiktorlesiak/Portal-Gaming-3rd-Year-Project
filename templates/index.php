<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>

    <?php include 'css/css.html'; ?>
</head>

<?php
if ( $_SESSION['logged_in'] == 1 ) {
    $_SESSION['message'] = "Hey, How are you today?";
    header("location: ?action=profile");
}
else {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['login'])) { //user logging in

            require 'login.php';

        } elseif (isset($_POST['register'])) { //user registering

            require 'register.php';

        }
    }
    ?>
    <div class="w3-bar w3-black w3-hide-small">
        <a href="index.php?action=home" class="w3-bar-item w3-button"><i class="fa fa-home"> Home</i></a>
        <a href="index.php?action=profile" class="w3-bar-item w3-button"><i class="fa fa-user"> Profile</i></a>
        <a href="index.php?action=about" class="w3-bar-item w3-button"><i class="fa fa-info"> About</i></a>
        <a href="/forum" class="w3-bar-item w3-button"><i class="fa fa-pencil-square-o"> Forum</i></a>
        <a href="index.php?action=shop" class="w3-bar-item w3-button"><i class="fa fa-shopping-bag"> Shop</i></a>


        <a href="index.php?action=logout" class="w3-bar-item w3-button w3-right"><i class="fa fa-sign-out"> Sign Out</i></a>
        <a href="index.php?action=profile" class="w3-bar-item w3-button w3-right"><i class="fa fa-user-circle"> User</i></a>
        <a href="index.php?action=cart" class="w3-bar-item w3-button w3-right"><i class="fa fa-shopping-cart"> Cart</i></a>

    </div>

    <body>
    <div class="form">

        <ul class="tab-group">
            <li class="tab"><a href="#signup">Sign Up</a></li>
            <li class="tab active"><a href="#login">Log In</a></li>
        </ul>

        <div class="tab-content">

            <div id="login">
                <h1>Welcome Back!</h1>

                <form action="index.php" method="post" autocomplete="off">

                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email" required autocomplete="off" name="email"/>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off" name="password"/>
                    </div>

                    <p class="forgot"><a href="index.php?action=forgot">Forgot Password?</a></p>

                    <button class="button button-block" name="login"/>
                    Log In</button>

                </form>

            </div>

            <div id="signup">
                <h1>Sign Up for Free</h1>

                <form action="index.php" method="post" autocomplete="off">

                    <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                First Name<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" name='firstname'/>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Last Name<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" name='lastname'/>
                        </div>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email" required autocomplete="off" name='email'/>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Set A Password<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off" name='password'/>
                    </div>

                    <button type="submit" class="button button-block" name="register"/>
                    Register</button>

                </form>

            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

    </body>
    </html>
    <?php
    require_once __DIR__ . '/../templates/_footer.php';
}
?>