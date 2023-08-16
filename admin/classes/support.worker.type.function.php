<?php
//Get All Support worker type
function getAllSwType()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "supp_worker_type ORDER BY supp_worker_type_id DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

//Get particular worker type Using id
function getSWType($arg)
{
    global $conn;

    $sql = "SELECT * FROM  " . TBL . "supp_worker_type WHERE supp_worker_type_id='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>