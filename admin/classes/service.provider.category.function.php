<?php

//Get All Categories
function getAllProCategory()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "service_provider_categories ORDER BY id DESC";
    $rs = mysqli_query($conn, $sql);
     return $rs;

    // print_r($rs);die;

}


//Get particular Category using category id
function getProCategory($arg)
{
    global $conn;

    $sql = "SELECT * FROM  " . TBL . "service_provider_categories where id='".$arg."'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}



?>