<?php

require_once __DIR__ . '/../_header.php';
?>

<?php
require_once __DIR__ . '/../_nav.php';

if ( $_SESSION['logged_in'] != 1 ) {
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
}

require_once("db.php");
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
?>
<html>

<head>
    <header class="w3-container w3-center w3-padding-48 w3-white">
        <h1 class="w3-xxxlarge"><b>ADMIN CURD</b></h1>
        <h6><i>Edit Portal Gaming website</i></h6>
    </header>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
<div class="w3-content" style="max-width:1400px">
    <!--SHOP CURD-->

    <div class="w3-row w3-padding w3-border">
        <div class="w3-col 29 s12">

            <div class="w3-container w3-white w3-margin w3-padding-large">
                <div class="w3-center">

<form name="frmUser" method="post" action="">

    <h1>GAMES EDIT</h1>
    <hr>
    <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
    <div align="left" style="padding-bottom:5px;"><a href="index.php?action=add_user" class="link"><img alt='Add' title='Add' src='images/add.png' width='15px' height='15px'/> Add Game</a></div>
    <table border="0" cellpadding="10" cellspacing="1" class="tblListForm">
        <tr class="listheader">
            <td>ID</td>
            <td>Name</td>
            <td>Image</td>
            <td>Price</td>
            <td>Description</td>
            <td>CRUD Actions</td>
        </tr>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
            if($i%2==0)
                $classname="evenRow";
            else
                $classname="oddRow";
            ?>
            <tr class="<?php if(isset($classname)) echo $classname;?>">
                <td><?php echo $row["id"]; ?></td>
                <td> <?php echo $row["p_name"]; ?></td>
                <td><?php echo $row["image"]; ?></td>
                <td>&euro;<?php echo $row["p_price"]; ?></td>
                <td><?php echo $row["description"]; ?></td>
                <td><a href="index.php?action=edit_user&id=<?php echo $row["id"]; ?>" class="link"><img alt='Edit' title='Edit' src='images/edit.png' width='15px' height='15px' hspace='10' /></a>  <a href="index.php?action=delete_user&id=<?php echo $row["id"]; ?>" class="link"><img alt='Delete' title='Delete' src='images/delete.png' width='15px' height='15px' hspace='10' /></a></td>
            </tr>
            <?php
            $i++;
        }
        ?>

    </table>

</form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
<br>
    <!--END SHOP CURD-->

    <!--DEV UPDATE CURD-->
<div class="w3-content" style="max-width:1400px">
    <div class="w3-row w3-padding w3-border">
        <div class="w3-col 29 s12">

            <div class="w3-container w3-white w3-margin w3-padding-large">
                <div class="w3-center">

                <?php
    $sql = "SELECT * FROM devupdate ORDER BY id DESC";
    $result = mysqli_query($conn,$sql);
    ?>

    <form name="frmUser" method="post" action="">

        <h1>DEV UPDATE EDIT</h1>
        <hr>
        <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
        <div align="left" style="padding-bottom:5px;"><a href="index.php?action=add_update" class="link"><img alt='Add' title='Add' src='images/add.png' width='15px' height='15px'/> Add Update</a></div>
        <table border="0" cellpadding="10" cellspacing="1" class="tblListForm">
            <tr class="listheader">
                <td>ID</td>
                <td>Title</td>
                <td>Title Description</td>
                <td>Description</td>
                <td>TIMESTAMP</td>
                <td>CRUD Actions</td>
            </tr>
            <?php
            $i=0;
            while($row = mysqli_fetch_array($result)) {
                if($i%2==0)
                    $classname="evenRow";
                else
                    $classname="oddRow";
                ?>
                <tr class="<?php if(isset($classname)) echo $classname;?>">
                    <td><?php echo $row["id"]; ?></td>
                    <td> <?php echo $row["title"]; ?></td>
                    <td><?php echo $row["titledesc"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td><?php echo $row["timestamp"]; ?></td>
                    <td><a href="index.php?action=edit_update&id=<?php echo $row["id"]; ?>" class="link"><img alt='Edit' title='Edit' src='images/edit.png' width='15px' height='15px' hspace='10' /></a>  <a href="index.php?action=delete_update&id=<?php echo $row["id"]; ?>" class="link"><img alt='Delete' title='Delete' src='images/delete.png' width='15px' height='15px' hspace='10' /></a></td>
                </tr>
                <?php
                $i++;
            }
            ?>



        </table>
    </form>
<!--END UPDATE CURD-->
                </div>
            </div>
        </div>
    </div>
</div>

</form>
</div>
</body>
</html>
<?php
require_once __DIR__ . '/../_footer.php';