<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['partidenti_submit'])) {
        $partideid = $_POST["partideid"];

        // Common Participant Identify OptionDetails
        $part_ident = $_POST["part_ident"];

        //************ Participant Identify Option Already Exist Check Starts ***************

        $part_ident_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "pa_identify_as  WHERE pa_identify_as_name='" . $part_ident . "' AND pa_identify_as_id != $partideid ");

        if (mysqli_num_rows($part_ident_name_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given Participant Identify Option $part_ident is Already Exist Try Other!!!";

            header("Location: edit-part-identify?row=$partideid");
            exit;
        }

		//************ Participant Identify Option Already Exist Check Ends ***************
        
        // Update Participant Identify OptionPart starts
        $part_ident_qry = "UPDATE  " . TBL . "pa_identify_as SET  pa_identify_as_name='" . $part_ident . "', pa_identify_as_udt ='" . $curDate . "' where pa_identify_as_id ='" . $partideid . "'";
        
        $part_ident_res = mysqli_query($conn, $part_ident_qry);

        if($part_ident_res){
            $_SESSION['status_msg'] = "Your Participant Identify Option has been Updated Successfully!!!";
            header('Location: admin-all-parti-identify.php');
            exit;  
        }else{
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

             header("Location: edit-part-identify?row=$partideid");
        }

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
    header('Location: admin-all-parti-identify.php');
}