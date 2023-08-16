<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reg_group_submit'])) {
        $group_id = $_POST["group_id"];

        //SW About Us Delete Part Starts        
        $group_qry =
            " DELETE FROM  " . TBL . "reg_group  WHERE id='" . $group_id . "'";

        $group_res = mysqli_query($conn,$group_qry);


        if ($group_res) {

            $_SESSION['status_msg'] = "Reg Group has been Permanently Deleted!!!";


            header('Location: admin-all-regis-group.php');
        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: delete-reg-group?row==' . $group_id);
        }
        //SW About Us Delete Part Ends   
    }
}else{
        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin-all-regis-group.php');
}