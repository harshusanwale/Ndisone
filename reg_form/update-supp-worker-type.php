<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['type_submit'])) {
        $sw_id = $_POST["sw_id"];
        // Common Support Worker type Details
        $type_name = $_POST["type_name"];

        //************ support worker Type  Already Exist Check Starts ***************

        $type_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "supp_worker_type  WHERE type_name='" . $type_name . "' AND supp_worker_type_id != $sw_id ");
        if (mysqli_num_rows($type_name_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given support worker type $type_name is Already Exist Try Other!!!";

            header("Location: edit_supp_worker_type.php?row=$sw_id");
            exit;
        }

		//************ support worker type Already Exist Check Ends ***************
        
        // Update Support worker type Part starts
        $type_qry = "UPDATE  " . TBL . "supp_worker_type SET type_name='" . $type_name . "', type_udt ='" . $curDate . "' where supp_worker_type_id='" . $sw_id . "'";
        
        $type_qry_res = mysqli_query($conn, $type_qry);

        if($type_qry_res){
            $_SESSION['status_msg'] = "Your support worker type has been Updated Successfully!!!";
            header('Location: admin-supp-worker-type.php');
            exit;  
        }else{
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

             header("Location: edit_supp_worker_type.php?row=$sw_id");
        }

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
    header('Location: admin-supp-worker-type.php');
}