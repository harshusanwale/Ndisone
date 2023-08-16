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
        $sw_type_id = $_POST["sw_type_id"];

        //Support Worker type Delete Part Starts        
        $sw_type_qry =
            " DELETE FROM  " . TBL . "supp_worker_type  WHERE supp_worker_type_id='" . $sw_type_id . "'";

        $sw_type_res = mysqli_query($conn,$sw_type_qry);


        if ($sw_type_res) {

            $_SESSION['status_msg'] = "Support worker type has been Permanently Deleted!!!";


            header('Location: admin-supp-worker-type.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: delete_supp_worker_type.php?row=' . $sw_type_id);
        }
        //Support Worker type Delete Part Ends   
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin-supp-worker-type.php');
}