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

        //Plan Manage Option  Delete Part Starts        
        $plan_qry =
            " DELETE FROM  " . TBL . "nd_plan_managed  WHERE plan_managed_id='" . $planid . "'";

        $plan_res = mysqli_query($conn,$plan_qry);


        if ($plan_res) {

            $_SESSION['status_msg'] = "Plan Manage Option has been Permanently Deleted!!!";


            header('Location: admin_all_plan_manage.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: delete_plan_manage?row=' . $planid);
        }
        //Plan Manage Option Delete Part Ends   
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin_all_plan_manage.php');
}