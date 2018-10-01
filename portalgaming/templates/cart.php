
<?php
require_once __DIR__ . '/../templates/_header.php';
?>
<body>
<?php
require_once __DIR__ . '/../templates/_nav.php';
?>
<?php

$connect = mysqli_connect("localhost", "root", "root", "portalgaming");

if ( $_SESSION['logged_in'] != 1 ) {
    $_SESSION['message'] = "You must log in your before viewing your cart!";
    header("location: index.php?action=error");
}else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}


if( !$active ){
    $_SESSION['message'] = "You must activate your account before viewing your cart!";
    header("location: index.php?action=errorActivate");
}
?>
<!doctype html>
<html>

<h1>Shopping Cart</h1>

<!--SHOPPING CART-->
<div style="clear:both"></div>
<br>
<hr>
<h2>My Shopping Bag</h2>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th width="40%">Product Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price Details</th>
            <th width="15%">Order Total</th>
            <th width="5%">Action</th>
        </tr>
        <?php

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
        if(empty($_SESSION["cart"])) {
            ?>
           <h1>Your shopping cart is empty!</h1>
            <p>purchse some games in <a href="index.php?action=store">store</a> </p>
            <?php
        }else{
            if (!empty($_SESSION["cart"])) {
                $total = 0;
                foreach ($_SESSION["cart"] as $keys => $values) {
                    ?>
                    <tr>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"] ?></td>
                        <td>&euro; <?php echo $values["product_price"]; ?></td>
                        <td>&euro; <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
                        <td><a href="index.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                        <td><input type="button" value="Check Out" onclick="window.location='index.php?action=billing'"></td>
                    </tr>

                    <?php
                    $total = $total + ($values["item_quantity"] * $values["product_price"]);
                }
                ?>

                <tr>

                    <td colspan="3" align="right"><strong>Total</strong></td>
                    <td align="right"> <br>Total: &euro; <?php echo number_format($total, 2); ?></td>
                    <td></td>
                     </tr>
                <?php
            }
        }
        ?>
    </table>
</div>
<!--SHOPPING CART END-->
<?php
require_once __DIR__ . '/../templates/_footer.php';
