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

        //Range Delete Part Starts        
        $range_qry =
            " DELETE FROM  " . TBL . "par_age_range  WHERE age_range_id='" . $rangeid . "'";

        $range_res = mysqli_query($conn,$range_qry);


        if ($range_res) {

            $_SESSION['status_msg'] = "Range Option has been Permanently Deleted!!!";


            header('Location: admin-all-age-range');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: delete-age-range?row=' . $rangeid);
        }
        //Range Delete Part Ends   
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin-all-age-range');
}