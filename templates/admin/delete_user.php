<?php
/*if ( $_SESSION['logged_in'] != 1 ) {
    $_SESSION['message'] = "Only For ADMINS!";
    header("location: index.php?action=error");
}else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $admin = $_SESSION['admin'];
}


if(!$admin ){
    $_SESSION['message'] = "You must have admin privileges to enter!";
    header("location: index.php?action=error");
}*/

require_once("db.php");
$sql = "DELETE FROM products WHERE id='" . $_GET["id"] . "'";
mysqli_query($conn,$sql);
header("Location: index.php?action=admin");
?>