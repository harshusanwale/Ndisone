<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['travel_dis_submit'])) {
        $tradisid = $_POST["tradisid"];

        //SW Travel Distance Delete Part Starts        
        $tradis_qry =
            " DELETE FROM  " . TBL . "sw_travel_distance  WHERE sw_travel_distance_id ='" . $tradisid . "'";

        $tradis_res = mysqli_query($conn,$tradis_qry);


        if ($tradis_res) {

            $_SESSION['status_msg'] = "Travel Distance Option has been Permanently Deleted!!!";


            header('Location: admin_all_travel_distance.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: /delete_sw_travel_distance?row==' . $tradisid);
        }
        //SW About Us Delete Part Ends   
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin_all_travel_distance.php');
}