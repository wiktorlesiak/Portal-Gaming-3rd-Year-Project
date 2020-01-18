<?php
// Here the member id is harcoded.
// You can integrate your authentication code here to get the logged in member id
require_once __DIR__ . '/../../templates/_nav.php';
$id = (isset($_GET['id']));
$member_id = $_SESSION['id'];
echo $_SESSION['id'];
require_once ("Rate.php");
$rate = new Rate();
$result = $rate->getAllPost();
?>
<HTML>
<HEAD>
<TITLE>Star Rating with PHP and jQuery AJAX</TITLE>
<link href="css/rating.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>function highlightStar(obj,id) {
	removeHighlight(id);		
	$('.demo-table #tutorial-'+id+' li').each(function(index) {
		$(this).addClass('highlight');
		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
			return false;	
		}
	});
}
function removeHighlight(id) {
	$('.demo-table #tutorial-'+id+' li').removeClass('selected');
	$('.demo-table #tutorial-'+id+' li').removeClass('highlight');
}

function addRating(obj,id) {
	$('.demo-table #tutorial-'+id+' li').each(function(index) {
		$(this).addClass('selected');
		$('#tutorial-'+id+' #rating').val((index+1));
		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
			return false;	
		}
	});
	$.ajax({
	url: "index.php?action=add_rating",
	data:'id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
	type: "POST",
    success: function(data) {
        $("#star-rating-count-"+id).html(data);    
        }
	});
}

function resetRating(id) {
	if($('#tutorial-'+id+' #rating').val() != 0) {
		$('.demo-table #tutorial-'+id+' li').each(function(index) {
			$(this).addClass('selected');
			if((index+1) == $('#tutorial-'+id+' #rating').val()) {
				return false;	
			}
		});
	}
} </script>

</HEAD>
<BODY>
    <table class="demo-table">
        <tbody>
            <tr>
                <th><strong>Games Rating</strong></th>
            </tr>
<?php
if (! empty($result)) {
    $i = 0;
    foreach ($result as $tutorial) {
        $ratingResult = $rate->getRatingByTutorialForMember($tutorial["id"], $member_id);
        $ratingVal = "";
        if (! empty($ratingResult[0]["rating"])) {
            $ratingVal = $ratingResult[0]["rating"];
        }
        ?>
<tr>
                <td valign="top">
                    <div class="feed_title"><?php echo $tutorial["p_name"]; ?></div>
                    <a href="<?php echo $tutorial["link"]; ?>"><img src="<?php echo $tutorial["image"]; ?>" height="215" width="460" class="img-responsive"></a>

                    <div id="tutorial-<?php echo $tutorial["id"]; ?>"
                        class="star-rating-box">
                        <input type="hidden" name="rating" id="rating"
                            value="<?php echo $ratingVal; ?>" />
                        <ul
                            onMouseOut="resetRating(<?php echo $tutorial["id"]; ?>);">
  <?php
        for ($i = 1; $i <= 5; $i ++) {
            $selected = "";
            if (! empty($ratingResult[0]["rating"]) && $i <= $ratingResult[0]["rating"]) {
                $selected = "selected";
            }
            ?>
  <li class='<?php echo $selected; ?>'
                                onmouseover="highlightStar(this,<?php echo $tutorial["id"]; ?>);"
                                onmouseout="removeHighlight(<?php echo $tutorial["id"]; ?>);"
                                onClick="addRating(this,<?php echo $tutorial["id"]; ?>);">&#9733;</li>  
  <?php }  ?>
</ul>
                        <div
                            id="star-rating-count-<?php echo $tutorial["id"]; ?>"
                            class="star-rating-count">
                                <?php
        
        if (! empty($tutorial["rating_total"])) {
            $average = round(($tutorial["rating_total"] / $tutorial["rating_count"]), 1);
            echo "Average Star Rating is " . $average . " from the Total " . $tutorial["rating_count"] . " Ratings";
            ?>
                                
                                <?php } else { ?>
                                No Ratings
                                <?php  } ?>
                                </div>

                    </div>
                    <div><?php echo $tutorial["description"]; ?></div>
                </td>
            </tr>
<?php
    }
}
?>
</tbody>
    </table>
</BODY>
</HTML>