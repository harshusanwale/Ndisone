<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['pet_frie_submit'])) {

	  if($_POST['pet_frie'] != NULL){
		$cnt = count($_POST['pet_frie']);
		}
      
		// *********** if Count of Pet friendly option is zero means redirect starts ********
		if ($cnt == 0) {
			header('Location: add_pet_friendl.php');
			exit;
		}
		// *********** if Count of Pet friendly option is zero means redirect ends ********

		// Pet friendly option Part Starts

		for ($i = 0; $i < $cnt; $i++) {

		// Common  Pet friendly option  type Details
		$pet_frie = $_POST["pet_frie"] [$i];

		//************ Pet friendly option name Already Exist Check Starts ***************
        $pet_frie_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "pet_friendly  WHERE pet_fri_name	='" . $pet_frie . "' ");

        if (mysqli_num_rows($pet_frie_name_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given Pet friendly option name $pet_frie is Already Exist Try Other!!!";
            header('Location:add_pet_friendl.php');
            exit;
        }

		//************ Pet friendly option name Already Exist Check Ends ***************

		$pet_frie_qry = "INSERT INTO " . TBL . "pet_friendly 
						(pet_fri_name, pet_fri_cdt, pet_fri_udt) 
						VALUES 
						('$pet_frie','$curDate','$curDate')";						
		$pet_frie_res = mysqli_query($conn, $pet_frie_qry);
		}

		if($pet_frie_res){
		$_SESSION['status_msg'] = "New Pet friendly option has been created Successfully!!!";
		header('Location: admin_all_pet_frie.php');
		} else {
			$_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
			header('Location: add_pet_friendl.php');
		}
		//Pet friendly option Part Ends
    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: add_pet_friendl.php');   
}