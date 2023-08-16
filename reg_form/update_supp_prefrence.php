<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['supp_pref_submit'])) {
        $supppreid = $_POST["supppreid"];

        // Common Support Preference  Details
        $supp_pref = $_POST["supp_pref"];

        //************  Support Preference  name  Already Exist Check Starts ***************
        $supp_pref_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "support_preference  WHERE support_prefer_name='" . $supp_pref . "' AND supp_pre_id != $supppreid ");
        if (mysqli_num_rows($supp_pref_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given Support Preference name $lang_name is Already Exist Try Other!!!";

            header("Location:edit_supp_prefrence?row=$supppreid");
            exit;
        }
        
		//************ Support Preference name Already Exist Check Ends ***************
        
        // Update Support Preference Part starts
        $supp_pref_qry = "UPDATE  " . TBL . "support_preference SET support_prefer_name='" . $supp_pref . "', support_prefer_udt ='" . $curDate . "' where supp_pre_id  ='" . $supppreid . "'";
        
        $supp_pref_res = mysqli_query($conn, $supp_pref_qry);

        if($supp_pref_res){
            $_SESSION['status_msg'] = "Your Support Preference has been Updated Successfully!!!";
            header('Location: admin_all_supp_prefrence.php');
            exit;  
        }else{
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

             header("Location:edit_supp_prefrence?row=$supppreid");
        }

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
    header('Location: admin_all_supp_prefrence.php');
}