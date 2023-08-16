<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['range_submit'])) {


	  if($_POST['range'] != NULL){
		$cnt = count($_POST['range']);
	  }
	  if($_POST['age_range'] != NULL){
		$cnt2 = count($_POST['age_range']);
	  }
		
		// *********** if Count of Age Range option is zero means redirect starts ********
		if ($cnt == 0) {
			header('Location: add-age-range');
			exit;
		}
		// *********** if Count of Age Range option is zero means redirect ends ********

		//Age Range option Part Starts

		for ($i = 0; $i < $cnt; $i++) {

		// Common Age Range option Details
		$range = $_POST["range"] [$i];

        $range_max = $_POST['range_max'] [$i];
        $range_min = $_POST['range_min'] [$i];

		//************Age Range option Title Already Exist Check Starts ***************
        $range_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "par_age_range  WHERE age_range_name='" . $range . "' ");

        if (mysqli_num_rows($range_exist_check) > 0) {

            $_SESSION['status_msg'] = "The Given Age Range option $range is Already Exist Try Other!!!";
            header('Location: add-age-range');
            exit;
        }

		//************Age Range option Title Already Exist Check Ends ***************

        $data = mysqli_real_escape_string($conn,$age_range);
        
		$range_qry = "INSERT INTO " . TBL . "par_age_range
						(age_range_name,range_max,range_min,range_cdt,range_udt) 
						VALUES 
						('$range','$range_max','$range_min','$curDate','$curDate')";
            
		$range_res = mysqli_query($conn, $range_qry);
		}

		if($range_res){
		$_SESSION['status_msg'] = "New Age Range option has been created Successfully!!!";
		header('Location: admin-all-age-range.php');
		} else {
			$_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
			header('Location: add-age-range');
		}
		//Age Range option Part Ends

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: add-age-range');   
}