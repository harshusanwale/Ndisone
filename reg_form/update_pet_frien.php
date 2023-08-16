<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['pet_fri_submit'])) {
        $petfriid = $_POST["petfriid"];

        // Common Pet friendly  Details
        $pet_frie = $_POST["pet_frie"];
        //************  Pet friendly  name  Already Exist Check Starts ***************

        $pet_frie_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "pet_friendly  WHERE pet_fri_name='" . $pet_frie . "' AND pet_fri_id != $petfriid ");
        if (mysqli_num_rows($pet_frie_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given Pet friendly name $lang_name is Already Exist Try Other!!!";

            header("Location:edit_pet_frien?row=$petfriid");
            exit;
        }
        
		//************ Pet friendly name Already Exist Check Ends ***************
        
        // Update Pet friendly Part starts
        $pet_frie_qry = "UPDATE  " . TBL . "pet_friendly SET pet_fri_name='" . $pet_frie . "', pet_fri_udt ='" . $curDate . "' where pet_fri_id  ='" . $petfriid . "'";
        
        $pet_frie_res = mysqli_query($conn, $pet_frie_qry);

        if($pet_frie_res){
            $_SESSION['status_msg'] = "Your pet friendly has been Updated Successfully!!!";
            header('Location: admin_all_pet_frie.php');
            exit;  
        }else{
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

             header("Location: edit_pet_frien?row=$petfriid");
        }

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
    header('Location: admin_all_pet_frie.php');
}