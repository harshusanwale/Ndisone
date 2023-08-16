<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['qualifications_submit'])) {

        $qualifications_id = $_POST['qualifications_id'];
        $qualifications_name = $_POST['qualifications_name'];


        $qualifications_qry =
            " DELETE FROM  " . TBL . "qualifications  WHERE qualifications_id='" . $qualifications_id . "'";


        $qualifications_res = mysqli_query($conn,$qualifications_qry);


        if ($qualifications_res) {

            $_SESSION['status_msg'] = "Qualifications has been Permanently Deleted!!!";


            header('Location: admin-all-qualifications.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: admin-qualifications-delete.php?row=' . $qualifications_id);
        }

        //    Listing Update Part Ends

    }
} else {

    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: admin-all-qualifications.php');
}