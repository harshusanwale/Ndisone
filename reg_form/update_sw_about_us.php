<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['option_submit'])) {
        $aboutus_id = $_POST["aboutus_id"];
        // Common About us Option Details
        $option_name = $_POST["option_name"];

        //************ About us Option name  Already Exist Check Starts ***************

        $aboutus_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "sw_about_us  WHERE sw_about_us_name='" . $option_name . "' AND sw_about_us_id != $aboutus_id ");
        if (mysqli_num_rows($aboutus_name_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given about us option name $option_name is Already Exist Try Other!!!";

            header("Location:edit_sw_about_us.php?row==$aboutus_id");
            exit;
        }

		//************ About us Option name Already Exist Check Ends ***************
        
        // Update About us Option  Part starts
        $aboutus_qry = "UPDATE  " . TBL . "sw_about_us SET sw_about_us_name='" . $option_name . "', sw_about_us_udt ='" . $curDate . "' where sw_about_us_id='" . $aboutus_id . "'";
        
        $aboutus_res = mysqli_query($conn, $aboutus_qry);

        if($aboutus_res){
            $_SESSION['status_msg'] = "Your about us option  has been Updated Successfully!!!";
            header('Location: admin_all_sw_about_us.php');
            exit;  
        }else{
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

             header("Location: edit_sw_about_us.php?row==$aboutus_id");
        }

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
    header('Location: admin_all_sw_about_us.php');
}