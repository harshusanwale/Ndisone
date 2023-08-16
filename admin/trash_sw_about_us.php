<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['option_submit'])) {
        $aboutus_id = $_POST["aboutus_id"];

        //SW About Us Delete Part Starts        
        $aboutus_qry =
            " DELETE FROM  " . TBL . "sw_about_us  WHERE sw_about_us_id='" . $aboutus_id . "'";

        $aboutus_res = mysqli_query($conn,$aboutus_qry);


        if ($aboutus_res) {

            $_SESSION['status_msg'] = "About us Option has been Permanently Deleted!!!";


            header('Location: admin_all_sw_about_us.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: delete_sw_about_us.php?row==' . $aboutus_id);
        }
        //SW About Us Delete Part Ends   
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin-supp-worker-type.php');
}