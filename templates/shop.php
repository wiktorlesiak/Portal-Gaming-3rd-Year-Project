<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You must log in before you can purchase!";
    header("location: index.php?action=error");

}else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}

if ( !$active ){
    $_SESSION['message'] = "You must activate your account before you can purchase!";
    header("location: index.php?action=errorActivate");
}

if(isset($_POST["add"]))
{
    if(isset($_SESSION["cart"]))
    {
        $item_array_id = array_column($_SESSION["cart"], "product_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["cart"]);
            $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="index.php?action=shop"</script>';
        }
        else
        {
            echo '<script>alert("Products already added to cart")</script>';
            echo '<script>window.location="index.php?action=shop"</script>';
        }
    }
    else
    {
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["cart"][0] = $item_array;
    }
}
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["cart"] as $keys => $values)
        {
            if($values["product_id"] == $_GET["id"])
            {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been removed")</script>';
                echo '<script>window.location="index.php?action=cart"</script>';
            }
        }
    }
}
?>