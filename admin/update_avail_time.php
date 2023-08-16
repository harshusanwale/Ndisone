<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['avail_time_submit'])) {
        $availtimeid = $_POST["availtimeid"];

        // Common Avaibility Timetime  Details
        $avail_time = $_POST["avail_time"];
        //************  Avaibility Timetime  name  Already Exist Check Starts ***************

        $avail_time_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "availability_time  WHERE avail_time_name='" . $avail_time . "' AND avail_time_id   != $availtimeid ");
        if (mysqli_num_rows($avail_time_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given avaibility time name $lang_name is Already Exist Try Other!!!";

            header("Location:edit_avail_time?row=$availtimeid");
            exit;
        }
        
		//************ Avaibility Timetime  name Already Exist Check Ends ***************
        
        // Update Avaibility Timetime   Part starts
        $avail_time_qry = "UPDATE  " . TBL . "availability_time SET avail_time_name='" . $avail_time . "', avail_time_udt ='" . $curDate . "' where avail_time_id  ='" . $availtimeid . "'";
        
        $avail_time_res = mysqli_query($conn, $avail_time_qry);

        if($avail_time_res){
            $_SESSION['status_msg'] = "Your avaibility time has been Updated Successfully!!!";
            header('Location: admin_all_avail_time.php');
            exit;  
        }else{
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

             header("Location: edit_avail_time?row=$availtimeid");
        }

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
    header('Location: admin_all_avail_time.php');
}