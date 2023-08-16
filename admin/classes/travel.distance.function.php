<?php
//Get All Travel Distance Option
function getAllTraDistance()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "sw_travel_distance ORDER BY sw_travel_distance_id DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

//Get particular worker type Using id
function getTraDistance($arg)
{
    global $conn;

    $sql = "SELECT * FROM  " . TBL . "sw_travel_distance WHERE sw_travel_distance_id='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>