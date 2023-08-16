<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['rel_parti_submit'])) {


	  if($_POST['rel_parti'] != NULL){
		$cnt = count($_POST['rel_parti']);
		}
		
		// *********** if Count of Rel participant option is zero means redirect starts ********
		if ($cnt == 0) {
			header('Location: add-rel-partici.php');
			exit;
		}
		// *********** if Count of Rel participant option is zero means redirect ends ********

		//Rel participant option Part Starts

		for ($i = 0; $i < $cnt; $i++) {

		// Common Rel participant option Details
		$rel_parti = $_POST["rel_parti"] [$i];
		//************Rel participant option Title Already Exist Check Starts ***************
        $rel_parti_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "relation_wi_par  WHERE relation_wi_par_name='" . $rel_parti . "' ");

        if (mysqli_num_rows($rel_parti_exist_check) > 0) {

            $_SESSION['status_msg'] = "The Given Rel participant option $rel_parti is Already Exist Try Other!!!";
            header('Location: add-rel-partici.php');
            exit;
        }

		//************Rel participant option Title Already Exist Check Ends ***************

		$rel_parti_qry = "INSERT INTO " . TBL . "relation_wi_par
						(relation_wi_par_name, relation_wi_par_cdt, relation_wi_par_udt) 
						VALUES 
						('$rel_parti','$curDate','$curDate')";
						
		$rel_parti_res = mysqli_query($conn, $rel_parti_qry);

		}

		if($rel_parti_res){
		$_SESSION['status_msg'] = "New Rel participant option has been created Successfully!!!";
		header('Location: admin-all-rel-with-partici.php');
		} else {
			$_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
			header('Location: add-rel-partici.php');
		}
		//Rel participant option Part Ends

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: add-rel-partici.php');   
}