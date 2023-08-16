<?php
//Get All Support Preference Option
function getAllPlanManage()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "nd_plan_managed ORDER BY plan_managed_id DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

//Get particular Support Preference Using id
function getPlanManage($arg)
{
    global $conn;
    
    $sql = "SELECT * FROM  " . TBL . "nd_plan_managed WHERE plan_managed_id='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>