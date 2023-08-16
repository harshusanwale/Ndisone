<?php

//Get All Categories
function getAllQualifications()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "qualifications ORDER BY qualifications_id DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

function getQualifications($arg)
{
    global $conn;

    $sql = "SELECT * FROM  " . TBL . "qualifications where qualifications_id='".$arg."'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

//Get All Location
function getAllLocations()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "locations ORDER BY location_id DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

function getLocation($arg)
{
    global $conn;

    $sql = "SELECT * FROM  " . TBL . "locations where location_id='".$arg."'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}


function getLocationCity($arg)
{
    global $conn;

    $sql = "SELECT * FROM  " . TBL . "locations where location_id='".$arg."'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}




//ajay

function getSlot($arg)
{
    global $conn;
    $sql = "SELECT * FROM  " . TBL . "slot where user_id='".$arg."'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;
}

function getAllWorkers()
{
    global $conn;
    $sql = "SELECT * FROM " . TBL . "supp_worker_type ORDER BY supp_worker_type_id ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}


function getAllQueAboutUs()
{   global $conn;
    $sql = "SELECT * FROM " . TBL . "sw_about_us ORDER BY sw_about_us_id ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function getAllTravelDistance()
{   global $conn;
    $sql = "SELECT * FROM " . TBL . "sw_travel_distance ORDER BY sw_travel_distance_id ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function getAllLanguages()
{   global $conn;
    $sql = "SELECT * FROM " . TBL . "sw_languages ORDER BY sw_language_id ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function getAllPetFriendly()
{   global $conn;
    $sql = "SELECT * FROM " . TBL . "pet_friendly ORDER BY pet_fri_id ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function getAllSupportPreference()
{   global $conn;
    $sql = "SELECT * FROM " . TBL . "support_preference ORDER BY supp_pre_id ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function getAllSupportOffer()
{   global $conn;
    $sql = "SELECT * FROM " . TBL . "support_offer ORDER BY supp_offer_id ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}
//ajay