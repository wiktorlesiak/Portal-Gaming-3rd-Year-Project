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
if(count($_POST)>0) {
	$sql = "UPDATE products set p_name='" . $_POST["p_name"] . "', image='" . $_POST["image"] . "', p_price='" . $_POST["p_price"] . "', description='" . $_POST["description"] . "', link='" . $_POST["link"] . "' WHERE id='" . $_POST["id"] . "'";
	mysqli_query($conn,$sql);
	$message = "Record Modified Successfully";
}
$select_query = "SELECT * FROM products WHERE id='" . $_GET["id"] . "'";
$result = mysqli_query($conn,$select_query);
$row = mysqli_fetch_array($result);
?>
<html>
<head>
<title>Add New User</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="index.php?action=admin" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> List User</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Edit User</td>
</tr>
<tr>
<td><label>ID</label></td>
<td><input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>"><input type="text" name="userName" class="txtField" value="<?php echo $row['userName']; ?>"></td>
</tr>
<tr>
<td><label>Name</label></td>
<td><input type="text" name="p_name" class="txtField" value="<?php echo $row['p_name']; ?>"></td>
</tr>
<td><label>Image</label></td>
<td><input type="text" name="image" class="txtField" value="<?php echo $row['image']; ?>"></td>
</tr>
<td><label>Price</label></td>
<td><input type="text" name="p_price" class="txtField" value="<?php echo $row['p_price']; ?>"></td>
</tr>
<tr>
<td><label>Description</label></td>
<td><textarea rows="4" cols="50" name="description"><?php echo $row['description']; ?> </textarea></td>
</tr>
<tr>
<td><label>Link</label></td>
<td><input type="text" name="link" class="txtField" value="<?php echo $row['link']; ?>"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</body></html>