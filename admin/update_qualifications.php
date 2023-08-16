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
       $type = $_POST['type'];

//************ qualifications Name Already Exist Check Starts ***************


        $qualifications_name_exist_check = mysqli_query($conn, "SELECT * FROM " . TBL . "qualifications  WHERE qualifications_name='" . $qualifications_name . "' AND qualifications_id != $qualifications_id ");

        if (mysqli_num_rows($qualifications_name_exist_check) > 0) {


            $_SESSION['status_msg'] = "The Given Qualifications name is Already Exist Try Other!!!";

            header('Location: admin-qualifications-edit.php?row=' . $qualifications_id);
            exit;


        }

//************ qualifications Name Already Exist Check Ends ***************


        $_FILES['qualifications_image']['name'];

        if (!empty($_FILES['qualifications_image']['name'])) {
            $file = rand(1000, 100000) . $_FILES['qualifications_image']['name'];
            $file_loc = $_FILES['qualifications_image']['tmp_name'];
            $file_size = $_FILES['qualifications_image']['size'];
            $file_type = $_FILES['qualifications_image']['type'];
            $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
            if (in_array($file_type, $allowed)) {
                $folder = "../images/services/";
                $new_size = $file_size / 1024;
                $new_file_name = strtolower($file);
                $event_image = str_replace(' ', '-', $new_file_name);
                //move_uploaded_file($file_loc, $folder . $event_image);
                $qualifications_image = compressImage($event_image, $file_loc, $folder, $new_size);
            } else {
                $qualifications_image = $qualifications_image_old;
            }
        } else {
            $qualifications_image = $qualifications_image_old;
        }


        $sql = mysqli_query($conn, "UPDATE  " . TBL . "qualifications SET qualifications_name='" . $qualifications_name . "', type='" . $type . "'
     where qualifications_id='" . $qualifications_id . "'");

        if ($sql) {

            $_SESSION['status_msg'] = "Data has been Updated Successfully!!!";


            header('Location: admin-all-qualifications.php');
            exit;

        } else {

            $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: admin-qualifications-edit.php?row=' . $qualifications_id);
            exit;
        }

    }
} else {

    $_SESSION['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: admin-all-qualifications.php');
    exit;
}
?>