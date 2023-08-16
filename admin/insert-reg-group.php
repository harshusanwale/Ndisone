<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";
if (isset($_POST['reg_group_submit'])) {

    if($_POST['group_name'] != NULL){
        $cnt = count($_POST['group_name']);
        }

// *********** if Count of Reg Group name is zero means redirect starts ********

    if ($cnt == 0) {
        header('Location: admin-add-new- Reg Group.php');
        exit;
    }

// *********** if Count of  Reg Group name is zero means redirect ends ********

    for ($i = 0; $i < $cnt; $i++) {

        $group_name = $_POST['group_name'][$i];


//************  Reg Group Name Already Exist Check Starts ***************


        $group_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "reg_group  WHERE name='" . $group_name . "' ");

        if (mysqli_num_rows($group_name_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given  Reg Group name $group_name is Already Exist Try Other!!!";

            header('Location:admin-add-new-group.php');
            exit;


        }

//************  Reg Group Name Already Exist Check Ends ***************

        $sql = mysqli_query($conn, "INSERT INTO  " . TBL . "reg_group ( name,group_cdt,group_udt)
VALUES ('$group_name','$curDate', '$curDate')");

        $LID = mysqli_insert_id($conn);
        $lastID = $LID;

        switch (strlen($LID)) {
            case 1:
                $LID = '00' . $LID;
                break;
            case 2:
                $LID = '0' . $LID;
                break;
            default:
                $LID = $LID;
                break;
        }

        $REGGROUPID = 'GROUP' . $LID;

        $upqry = mysqli_query($conn, "UPDATE " . TBL . "reg_group
					  SET reg_group_code = '$REGGROUPID' 
					  WHERE  id = $lastID");

    }


    if ($upqry) {

        $_SESSION['status_msg'] = " Reg Group name has been Added Successfully!!!";


        header('Location: admin-all-regis-group.php');
        exit;

    } else {


        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin-add-new-group.php');
        exit;
    }

}
?>