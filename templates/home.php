<?php

require_once __DIR__ . '/../templates/_header.php';

?>


<?php
require_once __DIR__ . '/../templates/_nav.php';
?>
    <!-- Header -->
    <header class="w3-container w3-center w3-padding-48 w3-white">
        <h1 class="w3-xxxlarge"><b>PORTAL GAMING</b></h1>
        <h6>Welcome to Portal Gaming website</h6>
    </header>

<?php
$connect = mysqli_connect("localhost", "root", "root", "portalgaming");

	$query = "SELECT * FROM devupdate ORDER BY id DESC ";
	$result = mysqli_query($connect, $query);

	if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            ?>


    <div class="w3-content" style="max-width:1400px">


        <!-- Grid -->
        <div class="w3-row w3-padding w3-border">

            <!-- Blog entries -->
            <div class="w3-col 29 s12">

                <!-- Blog entry -->
                <div class="w3-container w3-white w3-margin w3-padding-large">
                    <div class="w3-center">
                        <h3><?php echo $row["title"]; ?></h3>
                        <hr>
                        <h5><?php echo $row["titledesc"]; ?>, <span class="w3-opacity"><i><?php echo $row["timestamp"]; ?></i></span></h5>
                    </div>

                    <div class="w3-justify">
                        <p><?php echo $row["description"]; ?></p>

                    </div>
                </div>

            </div>

                <!-- END About/Intro Menu -->
            </div>

            <!-- END GRID -->
        </div>

        <!-- END w3-content -->
<hr>

            <?php
        }
    }
?>

<?php
require_once __DIR__ . '/../templates/_footer.php';

