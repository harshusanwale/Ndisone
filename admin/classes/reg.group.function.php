<?php
//Get All Reg Group
function getAllRegGroup()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "reg_group ORDER BY id  ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

//Get particular Range Using id
function getRegGroup($arg)
{
    global $conn;
    
    $sql = "SELECT * FROM  " . TBL . "reg_group WHERE  id  ='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>