<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['plan_submit'])) {


	  if($_POST['plan_name'] != NULL){
		$cnt = count($_POST['plan_name']);
		}
		
		// *********** if Count of Plan manage option is zero means redirect starts ********
		if ($cnt == 0) {
			header('Location: add_plan_manage.php');
			exit;
		}
		// *********** if Count of Plan manage option is zero means redirect ends ********

		//Plan manage option Part Starts

		for ($i = 0; $i < $cnt; $i++) {

		// Common Plan manage option Details
		$plan_name = $_POST["plan_name"] [$i];
		//************ Plan manage option Title Already Exist Check Starts ***************
        $plan_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "nd_plan_managed  WHERE plan_man_name='" . $plan_name . "' ");

        if (mysqli_num_rows($plan_name_exist_check) > 0) {

            $_SESSION['status_msg'] = "The Given Plan manage option $plan_name is Already Exist Try Other!!!";
            header('Location: add_plan_manage.php');
            exit;
        }

		//************ Plan manage option Title Already Exist Check Ends ***************

		$plan_name_qry = "INSERT INTO " . TBL . "nd_plan_managed
						(plan_man_name, plan_man_udt, plan_man_cdt) 
						VALUES 
						('$plan_name','$curDate','$curDate')";
						
		$plan_name_res = mysqli_query($conn, $plan_name_qry);

		}

		if($plan_name_res){
		$_SESSION['status_msg'] = "New Plan manage option has been created Successfully!!!";
		header('Location: admin_all_plan_manage.php');
		} else {
			$_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
			header('Location: add_plan_manage.php');
		}
		//Plan manage option Part Ends

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: add_plan_manage.php');   
}