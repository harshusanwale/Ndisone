<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['rel_parti_submit'])) {
        $relpartid = $_POST["relpartid"];

        //Rel participant Delete Part Starts        
        $relparti_qry =
            " DELETE FROM  " . TBL . "relation_wi_par  WHERE relation_wi_par_id ='" . $relpartid . "'";

        $relparti_res = mysqli_query($conn,$relparti_qry);


        if ($relparti_res) {

            $_SESSION['status_msg'] = "Rel participant Option has been Permanently Deleted!!!";


            header('Location: admin-all-rel-with-partici.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: delete-rel-parti?row==' . $relpartid);
        }
        //Rel participant Delete Part Ends   
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin-all-rel-with-partici.php');
}