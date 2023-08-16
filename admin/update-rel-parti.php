<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['rel_parti_submit'])) {
        $relpartid = $_POST["relpartid"];

        // Common Rel participant Option Details
        $rel_parti = $_POST["rel_parti"];

        //************ Rel participant Option Already Exist Check Starts ***************

        $rel_parti_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "relation_wi_par  WHERE relation_wi_par_name='" . $rel_parti . "' AND relation_wi_par_id != $relpartid ");

        if (mysqli_num_rows($rel_parti_name_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given Rel participant Option $rel_parti is Already Exist Try Other!!!";

            header("Location: edit-rel-partici?row=$relpartid");
            exit;
        }

		//************ Rel participant Option Already Exist Check Ends ***************
        
        // Update Rel participant Option Part starts
        $rel_parti_qry = "UPDATE  " . TBL . "relation_wi_par SET  relation_wi_par_name='" . $rel_parti . "', relation_wi_par_udt ='" . $curDate . "' where relation_wi_par_id ='" . $relpartid . "'";
        
        $rel_parti_res = mysqli_query($conn, $rel_parti_qry);

        if($rel_parti_res){
            $_SESSION['status_msg'] = "Your Rel participant Option has been Updated Successfully!!!";
            header('Location: admin-all-rel-with-partici.php');
            exit;  
        }else{
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

             header("Location: edit-rel-partici?row=$relpartid");
        }

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
    header('Location: admin-all-rel-with-partici.php');
}