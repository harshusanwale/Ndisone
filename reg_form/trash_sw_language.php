<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['lang_submit'])) {
        $langid = $_POST["langid"];

        //SW language Delete Part Starts        
        $lang_qry =
            " DELETE FROM  " . TBL . "languages  WHERE id  ='" . $langid . "'";

        $lang_res = mysqli_query($conn,$lang_qry);


        if ($lang_res) {

            $_SESSION['status_msg'] = "Language Option has been Permanently Deleted!!!";


            header('Location: admin_all_sw_languages.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: delete_sw_travel_distance?row=' . $langid);
        }
        //SW About Us Delete Part Ends   
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin_all_sw_languages.php');
}