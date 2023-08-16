<?php

/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else { 
    $redirect_url = $webpage_full_link . 'login';  //Redirect Url
    header("Location: $redirect_url");  //Redirect When No Listing Found in Table
    exit();
}

// Add Provider Deatils
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    if (isset($_POST['ser_provider_detail'])) {
        $user_id  = $_COOKIE['user_id'];
        // print_r($user_id );die;//
        // provider details
        $list_type = $_POST["list_type"];
        $reg_type = $_POST["reg_type"];
        $company_name = $_POST["company_name"];
        $position = $_POST["position"];
        $category_id = $_POST["category_id"];
        $sub_category_id12 = $_POST["sub_category_id"];
        $register_num = $_POST["register_num"];
        $sub_category_id =  implode(",", $sub_category_id12);

        //************************  Provider Stamp Image Upload starts  **************************
        if (!empty($_FILES['provider_stamp']['name'])) {
            $file = rand(1000, 100000) . $_FILES['provider_stamp']['name'];
            $file_loc = $_FILES['provider_stamp']['tmp_name'];
            $file_size = $_FILES['provider_stamp']['size'];
            $file_type = $_FILES['provider_stamp']['type'];
            $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
            if (in_array($file_type, $allowed)) {
                $folder = "images/provider_stamp/";
                $new_size = $file_size / 1024;
                $new_file_name = strtolower($file);
                $event_image = str_replace(' ', '-', $new_file_name);
                //move_uploaded_file($file_loc, $folder . $event_image);
                $provider_stamp1 = compressImage($event_image, $file_loc, $folder, $new_size);
                $provider_stamp = $provider_stamp1;
            }
        }
        //************************  Provider Stamp Image Upload Ends  **************************

        $qry = "UPDATE " . TBL . "users
                    SET list_type = $list_type, register_type = $reg_type,company_name = '$company_name',position ='$position',category_id = $category_id,sub_category_id= '$sub_category_id',registration_no = $register_num, accredited_provider_stamp = '$provider_stamp',register_status = 0,verification_code = '', verification_link = ''
                    WHERE user_id = $user_id";

        if (mysqli_query($conn, $qry)) {
            // header('Location: service_provider_success');
            unset($_COOKIE['user_id']);
            // unset($_COOKIE['reg_status']);
            header('Location: dashboard.php');
        } else {
            $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
            $_SESSION['register_status_msg'] = 1;
            header('Location: registration_sp_form');
            exit();
        }
    }
} else {
    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
    $_SESSION['register_status_msg'] = 1;
    header('Location: login');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_plan'])) {
        $user_id  = $_SESSION['user_id'];
        $user_plan = $_POST["user_plan"];
        $plan_type = "SELECT * FROM " . TBL . "plan_type WHERE plan_type_status='Active' AND plan_type_id = '$user_plan'";
        $rs_plan_type = mysqli_query($conn, $plan_type);
        $plan_type_row = mysqli_fetch_array($rs_plan_type);
        $user_points = $plan_type_row['plan_type_points'];
        $updateplan =  "UPDATE " . TBL . "users
                    SET user_points = '$user_points', user_plan ='$user_plan'
                    WHERE user_id = $user_id";
        if (mysqli_query($conn, $updateplan)) {
            // header('Location: service_provider_success');
            header('Location: payment_option');
        } else {
            $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
            $_SESSION['register_status_msg'] = 1;
            header('Location: provider-plans');
            exit();
        }
    }
} else {
    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
    $_SESSION['register_status_msg'] = 1;
    header('Location: provider-plans');
    exit();
}
