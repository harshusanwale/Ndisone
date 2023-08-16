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

        //Participant Identify Delete Part Starts        
        $partident_qry =
            " DELETE FROM  " . TBL . "pa_identify_as  WHERE pa_identify_as_id='" . $partideid . "'";

        $partident_res = mysqli_query($conn,$partident_qry);


        if ($partident_res) {

            $_SESSION['status_msg'] = "Participant identify Option has been Permanently Deleted!!!";


            header('Location: admin-all-parti-identify.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: delete-part-identify?row==' . $partideid);
        }
        //Participant Identify Delete Part Ends   
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin-all-parti-identify.php');
}