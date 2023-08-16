<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['offer_submit'])) {
        $suppoffer_id = $_POST["sup_off_id"];

        //Support Offer Delete Part Starts
        
        $suppoffer_qry =
            " DELETE FROM  " . TBL . "support_offer  WHERE supp_offer_id='" . $suppoffer_id . "'";

        $suppoffer_res = mysqli_query($conn,$suppoffer_qry);


        if ($suppoffer_res) {

            $_SESSION['status_msg'] = "Support offer has been Permanently Deleted!!!";


            header('Location: admin-support_offers.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: admin-delete-sup_offers.php?row=' . $suppoffer_id);
        }

          //Support Offer Delete Part Ends
    
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin-support_offers.php');
}