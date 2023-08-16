<?php

function getAllSwPlanType()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "sw_plan_type WHERE plan_type_status='Active' ORDER BY id ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

function getSwPlanType($arg)
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "sw_plan_type WHERE plan_type_status='Active' AND id = '$arg' ";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}



?>