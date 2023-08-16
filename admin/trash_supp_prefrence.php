<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['supp_pref_submit'])) {
        $supppreid = $_POST["supppreid"];

        //Support Preference Delete Part Starts        
        $supp_pref_qry =
            " DELETE FROM  " . TBL . "support_preference  WHERE supp_pre_id='" . $supppreid . "'";

        $supp_pref_res = mysqli_query($conn,$supp_pref_qry);


        if ($supp_pref_res) {

            $_SESSION['status_msg'] = "Support Preference Option has been Permanently Deleted!!!";

            header('Location: admin_all_supp_prefrence.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: delete_supp_prefrence?row=' . $langid);
        }
        //SW About Us Delete Part Ends   
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin_all_supp_prefrence.php');
}