<?php
// Here the member id is harcoded.
// You can integrate your authentication code here to get the logged in member id
session_start();
$id = (isset($_GET['id']));
$member_id = $_SESSION['id'];


if (! empty($_POST["rating"]) && ! empty($_POST["id"])) {
    require_once ("Rate.php");
    $rate = new Rate();
    
    $ratingResult = $rate->getRatingByTutorial($member_id, $member_id);
    
    if (! empty($ratingResult)) {
        $rate->updateRating($_POST["rating"], $ratingResult[0]["id"]);
    } else {
        $rate->addRating($_POST["id"], $_POST["rating"], $member_id);
    }
    
    $postRating = $rate->getRatingByTutorial($_POST["id"]);
    
    if (! empty($postRating[0]["rating_total"])) {
        $average = round(($postRating[0]["rating_total"] / $postRating[0]["rating_count"]), 1);
        echo "Average Star Rating is " . $average . " from the Total " . $postRating[0]["rating_count"] . " Ratings";
    } else {
        echo "No Ratings";
    }
}
?>