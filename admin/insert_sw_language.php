<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['lang_submit'])) {

	  if($_POST['lang_name'] != NULL){
		$cnt = count($_POST['lang_name']);
		}
      
		// *********** if Count of language option is zero means redirect starts ********
		if ($cnt == 0) {
			header('Location: add_sw_lang.php');
			exit;
		}
		// *********** if Count of language option is zero means redirect ends ********

		// language  option Part Starts

		for ($i = 0; $i < $cnt; $i++) {

		// Common  language  option  type Details
		$sw_lang = $_POST["lang_name"] [$i];

		$sw_lang_code = $_POST["lang_code"] [$i];

		//************ language option name Already Exist Check Starts ***************
        $sw_lang_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "languages  WHERE language_name		='" . $sw_lang . "' ");

        if (mysqli_num_rows($sw_lang_name_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given language option name $sw_lang is Already Exist Try Other!!!";
            header('Location:add_sw_lang.php');
            exit;
        }

		//************ language option name Already Exist Check Ends ***************

		$sw_lang_qry = "INSERT INTO " . TBL . "languages 
						(language_name,language_code,language_udt,language_cdt) 
						VALUES 
						('$sw_lang','$sw_lang_code','$curDate','$curDate')";						
		$sw_lang_res = mysqli_query($conn, $sw_lang_qry);
		}

		if($sw_lang_res){
		$_SESSION['status_msg'] = "New language option has been created Successfully!!!";
		header('Location: admin_all_sw_languages.php');
		} else {
			$_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
			header('Location: add_sw_lang.php');
		}
		//language option Part Ends
    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: add_sw_lang.php');   
}