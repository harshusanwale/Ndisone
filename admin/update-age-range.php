<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['range_submit'])) {
        $rangeid = $_POST["rangeid"];

        // Common Range Option Details
        $range = $_POST["range"];

        $range_max = $_POST["range_max"];

        $range_min = $_POST["range_min"];

        //************ Range Option Already Exist Check Starts ***************

        $range_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "par_age_range   WHERE age_range_name='" . $range . "' AND age_range_id  != $rangeid ");

        if (mysqli_num_rows($range_name_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given Range Option $range is Already Exist Try Other!!!";

            header("Location: edit-age-range?row=$rangeid");
            exit;
        }

		//************ Range Option Already Exist Check Ends ***************
        
        // Update Range Option Part starts
        $range_qry = "UPDATE  " . TBL . "par_age_range SET  age_range_name='" . $range . "',range_max='" . $range_max . "',range_min='" . $range_min . "', range_udt ='" . $curDate . "' where age_range_id ='" . $rangeid . "'";
        
        $range_res = mysqli_query($conn, $range_qry);

        if($range_res){
            $_SESSION['status_msg'] = "Your Range Option has been Updated Successfully!!!";
            header('Location: admin-all-age-range');
            exit;  
        }else{
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

             header("Location: edit-age-range?row=$rangeid");
        }

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
    header('Location: admin-all-age-range');
}