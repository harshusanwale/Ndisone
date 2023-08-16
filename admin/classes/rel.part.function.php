<?php
//Get All Relationship participant
function getAllRelParti()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "relation_wi_par ORDER BY relation_wi_par_id DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

//Get particular Relationship participant Using id
function getRelParti($arg)
{
    global $conn;
    
    $sql = "SELECT * FROM  " . TBL . "relation_wi_par WHERE  relation_wi_par_id ='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>