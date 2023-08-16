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

        $group_name =   $_POST['group_name'];
        $group_id   =   $_POST['group_id'];

//************Reg Group Name Already Exist Check Starts ***************

        $reg_group_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "reg_group  WHERE name='" . $group_name . "' AND id != $group_id ");

        if (mysqli_num_rows($reg_group_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given Reg Group name is Already Exist Try Other!!!";

            header('Location: admin-edit-group.php?row=' . $group_id);
            exit;


        }

//************Reg Group Name Already Exist Check Ends ***************


        $sql = mysqli_query($conn, "UPDATE  " . TBL . "reg_group SET name='" . $group_name . "', group_udt='" . $curDate . "'
     where id='" . $group_id . "'");

        if ($sql) {

            $_SESSION['status_msg'] = " Reg Group has been Updated Successfully!!!";


            header('Location: admin-all-regis-group.php');
            exit;

        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: admin-edit-group.php?row=' . $group_id);
            exit;
        }

    }
} else {

    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: admin-all-regis-group.php');
    exit;
}
?>