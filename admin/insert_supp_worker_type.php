<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['type_submit'])) {

	  if($_POST['type_name'] != NULL){
		$cnt = count($_POST['type_name']);
		}
		


		// *********** if Count of type name is zero means redirect starts ********
		if ($cnt == 0) {
			header('Location: add-supp-worker-type.php');
			exit;
		}
		// *********** if Count of type name is zero means redirect ends ********

		//support worker type Part Starts

		for ($i = 0; $i < $cnt; $i++) {

		// Common support worker  type Details
		$type_name= $_POST["type_name"] [$i];

		//************ support type name Already Exist Check Starts ***************


        $type_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "supp_worker_type  WHERE type_name='" . $type_name . "' ");

        if (mysqli_num_rows($type_name_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given support worker type name $type_name is Already Exist Try Other!!!";

            header('Location: admin-supp-worker-type.php');
            exit;


        }
       
		//************ support type name Already Exist Check Ends ***************

		$type_qry = "INSERT INTO " . TBL . "supp_worker_type 
						(type_name, type_udt, type_cdt) 
						VALUES 
						('$type_name','$curDate','$curDate')";						
		$type_res = mysqli_query($conn, $type_qry);

		}

		if($type_res){
		$_SESSION['status_msg'] = "New support worker type has been created Successfully!!!";
		header('Location: admin-supp-worker-type.php');
		} else {
			$_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
			header('Location: admin_add_support_offer.php');
		}
		//support worker type Part Ends\
    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: admin_add_support_offer.php');   
}