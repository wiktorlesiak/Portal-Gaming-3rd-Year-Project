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

if(count($_POST)>0) {
	require_once("db.php");
	$sql = "INSERT INTO devupdate (title, titledesc, description) VALUES ('" . $_POST["title"] . "','" . $_POST["titledesc"] . "','" . $_POST["description"] . "')";
	mysqli_query($conn,$sql);
	$current_id = mysqli_insert_id($conn);
	if(!empty($current_id)) {
		$message = "New User Added Successfully";
	}
}
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
<div align="right" style="padding-bottom:5px;"><a href="index.php?action=admin" class="link"><img alt='List' title='List' src='/images/list.png' width='15px' height='15px'/> List User</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Add New User</td>
</tr>
<tr>
<td><label>Title</label></td>
<td><input type="text" name="title" class="txtField"></td>
</tr>
<tr>
<td><label>Tile Description</label></td>
<td><input type="text" name="titledesc" class="txtField"></td>
</tr>
<td><label>Description</label></td>
<td><input type="text" name="description" class="txtField"></td>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</body></html>