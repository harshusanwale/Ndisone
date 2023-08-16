<?php
//Get All Availability Time Option
function getAllAvailTime()
{
    global $conn;
    $sql = "SELECT * FROM " . TBL . "availability_time ORDER BY avail_time_id   ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

//Get particular Availability Time Using id
function getAvailTime($arg)
{
    global $conn;
    
    $sql = "SELECT * FROM  " . TBL . "availability_time WHERE avail_time_id  ='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>