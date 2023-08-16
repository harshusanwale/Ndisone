<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['about_us_submit'])) {

	  if($_POST['option_name'] != NULL){
		$cnt = count($_POST['option_name']);
		}
		


		// *********** if Count of about us option is zero means redirect starts ********
		if ($cnt == 0) {
			header('Location: add-about-us-option.php');
			exit;
		}
		// *********** if Count of about us option is zero means redirect ends ********

		//about us option Part Starts

		for ($i = 0; $i < $cnt; $i++) {

		// Common about us option  type Details
		$option_name = $_POST["option_name"] [$i];

		//************ about us option name Already Exist Check Starts ***************


        $about_us_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "sw_about_us  WHERE sw_about_us_name='" . $option_name . "' ");

        if (mysqli_num_rows($about_us_name_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given about us option name $option_name is Already Exist Try Other!!!";

            header('Location:admin_all_sw_about_us.php');
            exit;


        }
       
		//************ about us option name Already Exist Check Ends ***************

		$about_us_qry = "INSERT INTO " . TBL . "sw_about_us 
						(sw_about_us_name, sw_about_us_cdt, sw_about_us_udt) 
						VALUES 
						('$option_name','$curDate','$curDate')";						
		$about_us_res = mysqli_query($conn, $about_us_qry);

		}

		if($about_us_res){
		$_SESSION['status_msg'] = "New about us option has been created Successfully!!!";
		header('Location: admin_all_sw_about_us.php');
		} else {
			$_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
			header('Location: add-about-us-option.php');
		}
		//about us option Part Ends
    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: add-about-us-option.php');   
}