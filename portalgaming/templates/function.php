<?php
require_once __DIR__ . '/../templates/_header.php';
?>

<?php
require_once __DIR__ . '/../templates/_nav.php';
?>

<?php
$connect = mysqli_connect("localhost", "root", "root", "portalgaming");


// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You must log in or activate your account before viewing shop!";
    header("location: index.php?action=error");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];

}

/*if ( !$active ) {
    $_SESSION['message'] = "You must activate your account before you can access shop!";
    header("location: errorActivate.php");
}*/

?>
<!doctype html>




        <h1>PØRTAL GAMING Shop</h1>

<div class="w3-content" style="max-width:1400px">

    <?php
	$query = "SELECT * FROM products ORDER BY id ASC";
    $result = mysqli_query($connect, $query);

	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>




                <div class="w3-row w3-padding w3-border">

            <div class="thumbnail">
            <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
                <div class="w3-center">
            <h2 class="text-info"><?php echo $row["p_name"]; ?></h2>
                    <a href="<?php echo $row["link"]; ?>"><img src="<?php echo $row["image"]; ?>" height="215" width="460" class="img-responsive"></a>
                    <h5 class="text-danger"><strong>Price: &euro;<?php echo $row["p_price"]; ?></strong></h5>

                    <div class="w3-justify">
            <p><?php echo $row["description"]; ?></p>
            </div>
            <br>

                    <br>
                    <input type="text" name="quantity" class="w3-click" value="1">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["p_price"]; ?>">
                    <input type="hidden" name="hidden_about" value="<?php echo $row["description"]; ?>">
                    <input type="submit" name="add"  class="w3-button" value="Add to Bag">
            </form>
            </div>
            </div>
            </div>
            <br>


            <?php
		}
	}
	?>
        <!--PRODUCT ITEMS END-->



    <!--SHOPPING CART-->

    <!--SHOPPING CART END-->
<br>

<?php
require_once __DIR__ . '/../templates/_footer.php';
?>