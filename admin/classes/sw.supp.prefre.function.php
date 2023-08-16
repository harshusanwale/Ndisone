<?php
//Get All Support Preference Option
function getAllSuppPre()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "support_preference ORDER BY supp_pre_id DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

//Get particular Support Preference Using id
function getSuppPre($arg)
{
    global $conn;
    
    $sql = "SELECT * FROM  " . TBL . "support_preference WHERE supp_pre_id='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>