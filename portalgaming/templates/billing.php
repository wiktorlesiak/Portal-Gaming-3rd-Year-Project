
<?php
require_once __DIR__ . '/../templates/_nav.php';
ob_start();
require 'db.php';
?>
<div style="clear:both"></div>

        <h2>Billing</h2>

        <div class="table-responsive" align="center">
            <table>
                <tr>
                    <th width="40%">Product Name</th>
                    <th width="10%">Quantity</th>
                    <th width="20%">Price Details</th>
                    <th width="15%">Order Total</th>
                    <th width="5%">Action</th>
                </tr>
                <?php
                if(!empty($_SESSION["cart"]))
                {
                    $total = 0;
                    foreach($_SESSION["cart"] as $keys => $values)
                    {
                        ?>
                        <tr>
                            <th><?php echo $values["item_name"]; ?></th>
                            <th><?php echo $values["item_quantity"] ?></th>
                            <th>&euro; <?php echo $values["product_price"]; ?></th>
                            <th>&euro; <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></th>
                            <th><a href="index.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">X</span></a></th>

                        </tr>

                        <?php
                        $total = $total + ($values["item_quantity"] * $values["product_price"]);
                    }
                    ?>
                    <tr>
                        <td colspan="3" align="right"><strong>Total</strong></td>
                        <td align="right"><u>&euro;<?php echo number_format($total, 2); ?></u></td>
                        <td></td>
                    </tr>

                    <?php
                }
                ?>

    <div align="left">
        <h4>Enter Your Detals</h4>
        <fieldset>

        <legend>Personal Detals</legend>

        <label for="user">Name:</label>
        <input type="text" name="firstName" required placeholder = "Enter first name" autofocus><strong>*</strong>
        <br>

        <label for="comments">Phone Number:</label>
        <input type="text" name="phonenumber" required placeholder = "Enter your phone number" autofocus><strong>*</strong>

        <br>

            <label for="date">Date of Birth:</label>
            <input type="date" name="quantity" min="0" max="100">
<br>
            <label for="gender">Gender: </label>
            <input type="radio" name="male" value = "male" >
            <span class = "radio"> Male </span>
            <input type="radio" name="female" value = "female" >
            <span class = "radio">Female</span>

        </fieldset>

        <br>
        <fieldset>
            <legend>Payment</legend>
            <label for="user">Credit Card Number:</label>
            <input type="text" name="Number" required placeholder = "Credit Card Number" autofocus><strong>*</strong>
            <br>
            <label for="user">Card Valid Date</label>
            <input type="date" name="Valid"  autofocus><strong>*</strong>
            <br>
            <label for="user">Security Code:</label>
            <input type="text" name="code" required placeholder = "Security Code" autofocus><strong>*</strong>
            <br>

        </fieldset>



        <?php

        $games = $values["item_name"];
        // Check if form submitted with method="post"
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
        {
            $email = $mysqli->escape_string($_POST['email']);
            $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

            if ( $result->num_rows == 0 ) // User doesn't exist
            {
                $_SESSION['message'] = "User with that email doesn't exist!";
                header("location: index.php?action=error");
            }
            else { // User exists (num_rows != 0)

                $user = $result->fetch_assoc(); // $user becomes array with user data

                $email = $user['email'];
                $hash = $user['hash'];
                $first_name = $user['first_name'];

                // Session message to display on success.php
                $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
                    . " for a receipt and list of games purchased!</p>";

                // Send registration confirmation link (reset.php)
                $to      = $email;
                $subject = 'Thank you for shopping with Portal Gaming! ( noreply)';
                $message_body = '
        Hello '.$first_name.',

        Thank you for shopping with Portal Gaming today!

        Purchased games:

        Games: '. print_r( $keys, true ) .
        ' Total: €' . $total;



                mail($to, $subject, $message_body);

                header("location: index.php?action=success");
            }
        }
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Reset Your Password</title>
            <style> @import "css/main.css"; </style>
        </head>

        <body>

        <div class="form">

            <h1>Confirm Address Email</h1>

            <form action="index.php?action=billing" method="post">
                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email"required autocomplete="off" name="email"/>
                </div>
                <button class="button button-block"/>Purchase</button>
            </form>
        </div>



        </body>

        </html>
        <hr>
        <h2><center>Items in Cart</center></h2>
