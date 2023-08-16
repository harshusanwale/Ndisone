<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['register_sc_1_submit'])) {


        $user_code = $_SESSION['user_code']; //Session User Code
        //  echo "<pre>";print_r($user_code);
        //  echo "<pre>";print_r($_POST);die;
        $ask_ques = $_POST["ask_ques"];

        $sql = mysqli_query($conn, "UPDATE  " . TBL . "users SET  ask_ques ='" . $ask_ques . "' where user_code='" . $user_code . "' ");

        if ($sql) {


                if($ask_ques == "Sole Trader"){
                    $_SESSION['status_msg'] = $BIZBOOK['STEP_2_YES'];
                    header('Location: registration_sw_form2_plan');
                exit;
                }else{
                    $_SESSION['status_msg'] = $BIZBOOK['STEP_2_NO'];
                    header('Location: registration_sw_form2_plan');
                }



        } else {

            $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

            header('Location: db-my-profile-edit');
            exit;
        }

    }
    if (isset($_POST['register_sc_2_submit'])) {


        $user_code = $_SESSION['user_code']; //Session User Code
        // echo "<pre>";print_r($_POST);
        // echo "<pre>";print_r($user_code);die;
        $access_methods = $_POST["access_methods"];
        $age_groups = $_POST["age_groups"];
        $service_locations = $_POST["service_locations"];
        $registration_no = $_POST["registration_no"];
        $provider_trading_name = $_POST["provider_trading_name"];
        $registered_companys_name = $_POST["registered_companys_name"];
        $business_contact_number = $_POST["business_contact_number"];
        $business_email_address = $_POST["business_email_address"];
        $website = $_POST["website"];

        //  echo "<pre>";print_r($_POST);die;
        $_FILES['accredited_provider_stamp']['name'];

        if (!empty($_FILES['accredited_provider_stamp']['name'])) {
            $file = rand(1000, 100000) . $_FILES['accredited_provider_stamp']['name'];
            $file_loc = $_FILES['accredited_provider_stamp']['tmp_name'];
            $file_size = $_FILES['accredited_provider_stamp']['size'];
            $file_type = $_FILES['accredited_provider_stamp']['type'];
            $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
            if (in_array($file_type, $allowed)) {
                $folder = "images/user/";
                $new_size = $file_size / 1024;
                $new_file_name = strtolower($file);
                $event_image = str_replace(' ', '-', $new_file_name);
                //move_uploaded_file($file_loc, $folder . $event_image);
                $accredited_provider_stamp = compressImage($event_image, $file_loc, $folder, $new_size);
            } else {
                $accredited_provider_stamp = $accredited_provider_stamp_old;
            }
        } else {
            $accredited_provider_stamp = $accredited_provider_stamp_old;
        }

        $sql = mysqli_query($conn, "UPDATE  " . TBL . "users SET
                                                        access_methods ='" . $access_methods . "',
                                                        age_groups ='" . $age_groups . "',
                                                        service_locations ='" . $service_locations . "',
                                                        accredited_provider_stamp ='" . $accredited_provider_stamp . "',
                                                        registration_no ='" . $registration_no . "',
                                                        provider_trading_name ='" . $provider_trading_name . "',
                                                        registered_companys_name ='" . $registered_companys_name . "',
                                                        business_contact_number ='" . $business_contact_number . "',
                                                        business_email_address ='" . $business_email_address . "',
                                                        website ='" . $website . "',
                                                        verification_status ='0' where user_code='" . $user_code . "' ");
        if ($sql) {
            $_SESSION['status_msg'] = $BIZBOOK['USER_PROFILE_UPDATE_SUCCESS_MESSAGE'];
            header('Location: dashboard');
            exit;
        } else {

            $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

            header('Location: db-my-profile-edit');
            exit;
        }

    }










} else {

    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

    header('Location: db-my-profile');
    exit;
}
?>