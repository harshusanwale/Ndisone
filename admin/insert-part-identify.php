<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['partidenti_submit'])) {


	  if($_POST['part_ident'] != NULL){
		$cnt = count($_POST['part_ident']);
		}
		
		// *********** if Count of Participant Identify option is zero means redirect starts ********
		if ($cnt == 0) {
			header('Location: add-part-identify.php');
			exit;
		}
		// *********** if Count of Participant Identify option is zero means redirect ends ********

		//Participant Identify option Part Starts

		for ($i = 0; $i < $cnt; $i++) {

		// Common Participant Identify option Details
		$part_ident = $_POST["part_ident"] [$i];
		//************Participant Identify option Title Already Exist Check Starts ***************
        $part_ident_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "pa_identify_as  WHERE pa_identify_as_name='" . $part_ident . "' ");

        if (mysqli_num_rows($part_ident_exist_check) > 0) {

            $_SESSION['status_msg'] = "The Given Participant Identify option $part_ident is Already Exist Try Other!!!";
            header('Location: add-part-identify.php');
            exit;
        }

		//************Participant Identify option Title Already Exist Check Ends ***************

		$part_ident_qry = "INSERT INTO " . TBL . "pa_identify_as
						(pa_identify_as_name, pa_identify_as_cdt, pa_identify_as_udt) 
						VALUES 
						('$part_ident','$curDate','$curDate')";
						
		$part_ident_res = mysqli_query($conn, $part_ident_qry);

		}

		if($part_ident_res){
		$_SESSION['status_msg'] = "New Participant Identify option has been created Successfully!!!";
		header('Location: admin-all-parti-identify.php');
		} else {
			$_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
			header('Location: add-part-identify.php');
		}
		//Participant Identify option Part Ends

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: add-part-identify.php');   
}