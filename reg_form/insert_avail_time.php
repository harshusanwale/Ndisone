<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['avail_time_submit'])) {

	  if($_POST['avail_time'] != NULL){
		$cnt = count($_POST['avail_time']);
		}
      
		// *********** if Count of Availability time option is zero means redirect starts ********
		if ($cnt == 0) {
			header('Location: add_sw_lang.php');
			exit;
		}
		// *********** if Count of Availability time option is zero means redirect ends ********

		// Availability time option Part Starts

		for ($i = 0; $i < $cnt; $i++) {

		// Common  Availability time option  type Details
		$avail_time = $_POST["avail_time"] [$i];

		//************ Availability time option name Already Exist Check Starts ***************
        $avail_time_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "sw_languages  WHERE language_name		='" . $sw_lang . "' ");

        if (mysqli_num_rows($avail_time_name_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given Availability time option name $sw_lang is Already Exist Try Other!!!";
            header('Location:add_avail_time.php');
            exit;
        }

		//************ Availability time option name Already Exist Check Ends ***************

		$avail_time_qry = "INSERT INTO " . TBL . "availability_time 
						(avail_time_name, avail_time_cdt, avail_time_udt) 
						VALUES 
						('$avail_time','$curDate','$curDate')";						
		$avail_time_res = mysqli_query($conn, $avail_time_qry);
		}

		if($avail_time_res){
		$_SESSION['status_msg'] = "New Availability time option has been created Successfully!!!";
		header('Location: admin_all_avail_time.php');
		} else {
			$_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
			header('Location: add_avail_time.php');
		}
		//Availability time option Part Ends
    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: add_avail_time.php');   
}