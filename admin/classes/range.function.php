<?php
//Get All Range
function getAllRange()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "par_age_range ORDER BY age_range_id  DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

//Get particular Range Using id
function getRange($arg)
{
    global $conn;
    
    $sql = "SELECT * FROM  " . TBL . "par_age_range WHERE  age_range_id  ='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>