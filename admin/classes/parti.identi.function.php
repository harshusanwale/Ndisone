<?php
//Get All Participant Identify Option
function getAllPartIdenti()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "pa_identify_as ORDER BY pa_identify_as_id  DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

//Get particular Participant Identify Using id
function getPartIdenti($arg)
{
    global $conn;
    
    $sql = "SELECT * FROM  " . TBL . "pa_identify_as WHERE pa_identify_as_id ='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>