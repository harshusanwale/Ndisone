<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

include "config/info.php";
if (isset($_POST['qualifications_submit'])) {



    if($_POST['qualifications_name'] != NULL){

        $cnt = count($_POST['qualifications_name']);
    }
// *********** if Count of qualifications name is zero means redirect starts ********

    if ($cnt == 0) {
        header('Location: admin-add-qualifications.php');
        exit;
    }

// *********** if Count of qualifications name is zero means redirect ends ********

    for ($i = 0; $i < $cnt; $i++) {
        $type = $_POST['type'];
        $qualifications_name = $_POST['qualifications_name'][$i];


//************ qualifications Name Already Exist Check Starts ***************


        $qualifications_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "qualifications  WHERE qualifications_name='" . $qualifications_name . "' ");

        if (mysqli_num_rows($qualifications_name_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given qualifications name $qualifications_name is Already Exist Try Other!!!";

            header('Location: admin-add-qualifications.php');
            exit;


        }

//************ qualifications Name Already Exist Check Ends ***************


        $_FILES['qualifications_image']['name'][$i];

        if (!empty($_FILES['qualifications_image']['name'][$i])) {
            $file = rand(1000, 100000) . $_FILES['qualifications_image']['name'][$i];
            $file_loc = $_FILES['qualifications_image']['tmp_name'][$i];
            $file_size = $_FILES['qualifications_image']['size'][$i];
            $file_type = $_FILES['qualifications_image']['type'][$i];
            $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
            if (in_array($file_type, $allowed)) {
                $folder = "../images/services/";
                $new_size = $file_size / 1024;
                $new_file_name = strtolower($file);
                $event_image = str_replace(' ', '-', $new_file_name);
                //move_uploaded_file($file_loc, $folder . $event_image);
                $qualifications_image = compressImage($event_image, $file_loc, $folder, $new_size);
            } else {
                $qualifications_image = '';
            }
        }

        $sql = mysqli_query($conn, "INSERT INTO  " . TBL . "qualifications (qualifications_name,type,status)VALUES ('$qualifications_name','$type','1')");

        $qualifications_id = mysqli_insert_id($conn);




    }


    if ($sql) {

        $_SESSION['status_msg'] = "Data has been Added Successfully!!!";


        header('Location: admin-all-qualifications.php');
        exit;

    } else {


        $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

        header('Location: admin-add-qualifications.php');
        exit;
    }

}
?>