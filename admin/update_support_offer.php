<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['offer_submit'])) {
        $supp_off_id = $_POST["sup_off_id"];

        // Common Support Offer Details
        $offer_name = $_POST["offer_name"];
        $offer_title = $_POST["offer_title"];

        //************ support offer Title Already Exist Check Starts ***************

        $offer_title_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "support_offer  WHERE offer_title='" . $offer_title . "' AND supp_offer_id != $supp_off_id ");

        if (mysqli_num_rows($offer_title_name_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given support offer title $offer_title is Already Exist Try Other!!!";

            header("Location: admin-support-offer-edit.php?row=$supp_off_id");
            exit;
        }

		//************ support offer Title Already Exist Check Ends ***************
        
        // Update Support Offer Part starts
        $supp_off_qry = "UPDATE  " . TBL . "support_offer SET offer_name='" . $offer_name . "', offer_title='" . $offer_title . "', offer_udt ='" . $curDate . "' where supp_offer_id='" . $supp_off_id . "'";
        
        $supp_off_res = mysqli_query($conn, $supp_off_qry);

        if($supp_off_res){
            $_SESSION['status_msg'] = "Your support offer has been Updated Successfully!!!";
            header('Location: admin-support_offers.php');
            exit;  
        }else{
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

             header("Location: admin-support-offer-edit.php?row=$supp_off_id");
        }

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
    header('Location: admin-support_offers.php');
}