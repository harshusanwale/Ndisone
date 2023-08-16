<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['plan_submit'])) {
        $planid = $_POST["planid"];

        // Common Plan Manage OptionDetails
        $plan_name = $_POST["plan_name"];

        //************ Plan Manage Option Already Exist Check Starts ***************

        $plan_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "nd_plan_managed  WHERE plan_man_name='" . $plan_name . "' AND plan_managed_id  != $planid ");

        if (mysqli_num_rows($plan_name_exist_check) > 0) {
            $_SESSION['status_msg'] = "The Given Plan Manage Option $offer_title is Already Exist Try Other!!!";

            header("Location: edit_plan_manage.php?row=$planid");
            exit;
        }

		//************ Plan Manage Option Already Exist Check Ends ***************
        
        // Update Plan Manage OptionPart starts
        $planmange_qry = "UPDATE  " . TBL . "nd_plan_managed SET  plan_man_name='" . $plan_name . "', plan_man_udt ='" . $curDate . "' where plan_managed_id ='" . $planid . "'";
        
        $planmange_res = mysqli_query($conn, $planmange_qry);

        if($planmange_res){
            $_SESSION['status_msg'] = "Your Plan Manage Optionhas been Updated Successfully!!!";
            header('Location: admin_all_plan_manage.php');
            exit;  
        }else{
            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

             header("Location: edit_plan_manage.php?row=$planid");
        }

    }
}else{
    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";
    header('Location: admin_all_plan_manage.php');
}