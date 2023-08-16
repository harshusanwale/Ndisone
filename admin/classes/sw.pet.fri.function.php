<?php
//Get All Pet friendly Option
function getAllPetFri()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "pet_friendly ORDER BY pet_fri_id    DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

//Get particular Pet friendly Using id
function getPetFri($arg)
{
    global $conn;
    
    $sql = "SELECT * FROM  " . TBL . "pet_friendly WHERE pet_fri_id   ='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>