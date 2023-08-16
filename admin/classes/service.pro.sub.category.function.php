<?php

//Get All Sub Categories
function getAllProSubCategories()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "service_provider_sub_categories ORDER BY id DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}


//Get particular Category using category id
function getProSubCategory($arg)
{
    global $conn;

    $sql = "SELECT * FROM  " . TBL . "service_provider_sub_categories where id='".$arg."'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}


//Sub Category Count using Category Id
function getCountProSubCategoryCategory($arg)
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "service_provider_sub_categories WHERE category_id= '$arg'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($rs);
    return $row;

}

//Get All Sub Category with given Category Id
function getProCategorySubCategories($arg)
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "service_provider_sub_categories where category_id='$arg' ORDER BY id DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}
