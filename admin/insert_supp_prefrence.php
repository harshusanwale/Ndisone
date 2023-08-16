<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['supp_pref_submit'])) {

	  if($_POST['supp_pref'] != NULL){
		$cnt = count($_POST['supp_pref']);
		}
      
		// *********** if Count of Support Preference option is zero means redirect starts ********
		if ($cnt == 0) {
			header('Location: add_supp_prefrence.php');
			exit;
		}
		// *********** if Count of Support Preference option is zero means redirect ends ********

		// Support Preference option Part Starts

		for ($i = 0; $i < $cnt; $i++) {

		// Common  Support Preference option  type Details
		$supp_pref = $_POST["supp_pref"] [$i];

		//************ Support Preference option name Already Exist Check Starts ***************
        $supp_pref_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "support_preference  WHERE support_prefer_name	='" . $supp_pref . "' ");

        if (mysqli_num_rows($supp_pref_name_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given Support Preference option name $supp_pref is Already Exist Try Other!!!";
            header('Location:add_supp_prefrence.php');
            exit;
        }

		//************ Support Preference option name Already Exist Check Ends ***************

		$supp_pref_qry = "INSERT INTO " . TBL . "support_preference 
						(support_prefer_name, support_prefer_cdt, support_prefer_udt) 
						VALUES 
						('$supp_pref','$curDate','$curDate')";						
		$supp_pref_res = mysqli_query($conn, $supp_pref_qry);
		}

		if($supp_pref_res){
		$_SESSION['status_msg'] = "New Support Preference option has been created Successfully!!!";
		header('Location: admin_all_supp_prefrence.php');
		} else {
			$_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
			header('Location: add_supp_prefrence.php');
		}
		//Support Preference option Part Ends
    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: add_supp_prefrence.php');   
}