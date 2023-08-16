<?php
//Get All About us option
function getAllAboutus()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "sw_about_us ORDER BY sw_about_us_id DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

//Get particular About us option Using id
function getAboutusOption($arg)
{
    global $conn;

    $sql = "SELECT * FROM  " . TBL . "sw_about_us WHERE sw_about_us_id='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>