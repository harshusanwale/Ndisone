<?php
//Get All Support offers
function getAllOffers()
{
    global $conn;

    $sql = "SELECT * FROM " . TBL . "support_offer ORDER BY supp_offer_id DESC";
    $rs = mysqli_query($conn, $sql);
    return $rs;

}

//Get particular support offer Using id
function getSupportOffer($arg)
{
    global $conn;

    $sql = "SELECT * FROM  " . TBL . "support_offer WHERE supp_offer_id='" . $arg . "'";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    return $row;

}

?>