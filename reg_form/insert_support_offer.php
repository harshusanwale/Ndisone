<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['offer_submit'])) {


	  if($_POST['offer_title'] != NULL){
		$cnt = count($_POST['offer_title']);
		}
		if($_POST['offer_name'] != NULL){
		$cnt2 = count($_POST['offer_name']);
	   }
		
		// *********** if Count of offer titie is zero means redirect starts ********
		if ($cnt == 0) {
			header('Location: admin_add_support_offer.php');
			exit;
		}
		// *********** if Count of offer titie is zero means redirect ends ********

		//support offer Part Starts

		for ($i = 0; $i < $cnt; $i++) {

		// Common support offer Details
		$offer_title = $_POST["offer_title"] [$i];
		$offer_name  = $_POST["offer_name"] [$i];

		//************ support offer Title Already Exist Check Starts ***************


        $offer_title_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "support_offer  WHERE offer_title='" . $offer_title . "' ");

        if (mysqli_num_rows($offer_title_name_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given support offer title $offer_title is Already Exist Try Other!!!";

            header('Location: admin_add_support_offer.php');
            exit;


        }

		//************ support offer Title Already Exist Check Ends ***************

		$offer_qry = "INSERT INTO " . TBL . "support_offer 
						(offer_title, offer_name, offer_udt, offer_cdt) 
						VALUES 
						('$offer_title', '$offer_name', '$curDate','$curDate')";
						
		$offer_res = mysqli_query($conn, $offer_qry);

		}

		if($offer_res){
		$_SESSION['status_msg'] = "New support offer has been created Successfully!!!";
		header('Location: admin-support_offers.php');
		} else {
			$_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
			header('Location: admin_add_support_offer.php');
		}
		//support offer Part Ends

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: admin_add_support_offer.php');   
}