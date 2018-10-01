<?php
require_once "DBController.php";

class Rate extends DBController
{

    function getAllPost()
    {
        $query = "SELECT products.*, COUNT(tbl_member_rating.rating) as rating_count, SUM(tbl_member_rating.rating) as rating_total FROM products LEFT JOIN tbl_member_rating ON products.id = tbl_member_rating.tutorial_id GROUP BY tbl_member_rating.tutorial_id";
        
        $postResult = $this->getDBResult($query);
        return $postResult;
    }

    function getRatingByTutorial($tutorial_id)
    {
        $query = "SELECT products.*, COUNT(tbl_member_rating.rating) as rating_count, SUM(tbl_member_rating.rating) as rating_total FROM products LEFT JOIN tbl_member_rating ON products.id = tbl_member_rating.tutorial_id WHERE tbl_member_rating.tutorial_id = ? GROUP BY tbl_member_rating.tutorial_id";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $tutorial_id
            )
        );
        
        $postResult = $this->getDBResult($query, $params);
        return $postResult;
    }

    function getRatingByTutorialForMember($tutorial_id, $member_id)
    {
        $query = "SELECT * FROM tbl_member_rating WHERE tutorial_id = ? AND member_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $tutorial_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $ratingResult = $this->getDBResult($query, $params);
        return $ratingResult;
    }

    function addRating($tutorial_id, $rating, $member_id)
    {
        $query = "INSERT INTO tbl_member_rating (tutorial_id,rating,member_id) VALUES (?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $tutorial_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $rating
            ),
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function updateRating($rating, $rating_id)
    {
        $query = "UPDATE tbl_member_rating SET  rating = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $rating
            ),
            array(
                "param_type" => "i",
                "param_value" => $rating_id
            )
        );
        
        $this->updateDB($query, $params);
    }
}
