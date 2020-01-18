<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
    $_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: ?action=error");
}
else {
    $id = (isset($_GET['id']));
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $active = $_SESSION['admin'];

}
?>



<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="w3-bar w3-black w3-hide-small">
    <a href="index.php?action=home" class="w3-bar-item w3-button"><i class="fa fa-home"> Home</i></a>
<!--    <a href="index.php?action=profile" class="w3-bar-item w3-button"><i class="fa fa-user"> Profile</i></a> -->
    <a href="index.php?action=about" class="w3-bar-item w3-button"><i class="fa fa-info"> About</i></a>
    <a href="/forum" class="w3-bar-item w3-button"><i class="fa fa-file-text-o"> Forum</i></a>
    <a href="index.php?action=shop" class="w3-bar-item w3-button"><i class="fa fa-shopping-bag"> Shop</i></a>


    <a href="index.php?action=logout" class="w3-bar-item w3-button w3-right"><i class="fa fa-sign-out">  Sign Out</i></a>
    <a href="index.php?action=profile" class="w3-bar-item w3-button w3-right"><i class="fa fa-user-circle">  <?=$first_name?></i></a>
    <a href="index.php?action=cart" class="w3-bar-item w3-button w3-right"><i class="fa fa-shopping-cart">  Cart</i></a>
    <a href="index.php?action=rating" class="w3-bar-item w3-button w3-right"><i class="fa fa-star">  RATING</i></a>

    <?php
    if ( $_SESSION['admin'] == 1 ) {
        ?> <a href="index.php?action=admin" class="w3-bar-item w3-button w3-right"><i class="fa fa-edit">  ADMIN CURD</i></a>
    <?php
    }
    ?>
<!--    <a href="index.php?action=search" class="w3-bar-item w3-button w3-right"><i class="fa fa-search"> Search</i></a>
-->    <!--<input  type="text" placeholder="Search..">-->

</div>

