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

        //Avaibility Timetime  Delete Part Starts        
        $availtime_qry =
            " DELETE FROM  " . TBL . "availability_time  WHERE avail_time_id   ='" . $availtimeid . "'";

        $availtime_res = mysqli_query($conn,$availtime_qry);


        if ($availtime_res) {

            $_SESSION['status_msg'] = "Avaibility Time Option has been Permanently Deleted!!!";


            header('Location: admin_all_avail_time.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: delete_avail_time?row=' . $availtimeid);
        }
        //Avaibility Timetime Delete Part Ends   
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin_all_avail_time.php');
}