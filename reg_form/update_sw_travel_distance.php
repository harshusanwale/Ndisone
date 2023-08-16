<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['travel_dis_submit'])) {
        $tradisid = $_POST["tradisid"];
        // Common Travel distance Option Details
        $tra_distance = $_POST["travel_distance"];

        //************  Travel distance Option name  Already Exist Check Starts ***************

        $tradis_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "sw_travel_distance  WHERE sw_travel_distance='" . $tra_distance . "' AND sw_travel_distance_id != $tradisid ");
        if (mysqli_num_rows($tradis_name_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given travel distance option name $option_name is Already Exist Try Other!!!";

            header("Location:edit_travel_distance.php?row==$tradisid");
            exit;
        }

		//************ Travel distance Option name Already Exist Check Ends ***************
        
        // Update Travel distance Option  Part starts
        $tradis_qry = "UPDATE  " . TBL . "sw_travel_distance SET sw_travel_distance='" . $tra_distance . "', sw_travel_distance_udt ='" . $curDate . "' where sw_travel_distance_id='" . $tradisid . "'";
        
        $tradis_res = mysqli_query($conn, $tradis_qry);

        if($tradis_res){
            $_SESSION['status_msg'] = "Your travel distance option  has been Updated Successfully!!!";
            header('Location: admin_all_travel_distance.php');
            exit;  
        }else{
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

             header("Location: edit_travel_distance.php?row==$tradisid");
        }

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
    header('Location: admin_all_travel_distance.php');
}