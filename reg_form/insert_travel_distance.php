<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['travel_dis_submit'])) {

	  if($_POST['travel_distance'] != NULL){
		$cnt = count($_POST['travel_distance']);
		}

		// *********** if Count of travel distance option is zero means redirect starts ********
		if ($cnt == 0) {
			header('Location: add_travel_distance.php');
			exit;
		}
		// *********** if Count of travel distance option is zero means redirect ends ********

		// travel distance  option Part Starts

		for ($i = 0; $i < $cnt; $i++) {

		// Common  travel distance  option  type Details
		$travel_distance = $_POST["travel_distance"] [$i];

		//************ travel distance option name Already Exist Check Starts ***************
        $tra_dis_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "sw_travel_distance  WHERE sw_travel_distance	='" . $travel_distance . "' ");

        if (mysqli_num_rows($tra_dis_name_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given travel distance option name $travel_distance is Already Exist Try Other!!!";
            header('Location:add_travel_distance.php');
            exit;
        }

		//************ travel distance option name Already Exist Check Ends ***************

		$travel_dis_qry = "INSERT INTO " . TBL . "sw_travel_distance 
						(sw_travel_distance, sw_travel_distance_cdt, sw_travel_distance_udt) 
						VALUES 
						('$travel_distance','$curDate','$curDate')";						
		$travel_dis_res = mysqli_query($conn, $travel_dis_qry);
		}

		if($travel_dis_res){
		$_SESSION['status_msg'] = "New travel distance option has been created Successfully!!!";
		header('Location: admin_all_travel_distance.php');
		} else {
			$_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
			header('Location: add-about-us-option.php');
		}
		//travel distance option Part Ends
    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: add_travel_distance.php');   
}