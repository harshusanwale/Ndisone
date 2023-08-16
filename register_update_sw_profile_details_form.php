<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */


if (file_exists('config/info.php')) {
    include('config/info.php');
}

if(!isset($_COOKIE['user_id'])) {
    echo "'user_id' is not Created!";
    unset($_COOKIE['user_id']);
    die;
} else {
    $user_id = $_COOKIE['user_id'];
    //unset($_COOKIE['user_id']);

        $login = mysqli_query($conn, "SELECT * FROM " . TBL . "users  WHERE user_id = '$user_id'");
        if (mysqli_num_rows($login) > 0) {
            $login_row = mysqli_fetch_array($login);
            // echo "<pre>";print_r($login_row);die;
            $first_name = $login_row['first_name'];
            $last_name = $login_row['last_name'];
            $email_id = $login_row['email_id'];
            $mobile_number = $login_row['mobile_number'];
            $regstatus = $login_row['register_status'];
        }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

     $newreg_status = ++$regstatus ;
     setcookie("reg_status", $newreg_status, time() + (86400 * 30), "/"); 

     if(!isset($_COOKIE['user_id'])) {
         echo "'user_id' is not Created!";
         unset($_COOKIE['user_id']);
         die;
     }

    if (isset($_POST['support_worker_submit'])) {

    $all = $_POST;
    $days = $_POST['days'];

    if($_POST['days']){ $days = $_POST['days']; $jsonDays = json_encode($days);}else{$jsonDays = '[]';}
    if($_POST['workexp']){ $workexp = $_POST['workexp']; $jsonworkexp = json_encode($workexp);}else{$jsonworkexp = '[]';}
    if($_POST["showering"]) {$showering = json_encode($_POST['showering']);}else{$showering = '[]';}
    if($_POST["qualifications"]) {$qualifications = json_encode($_POST['qualifications']); }else{$qualifications = '[]';}
    if($_POST["certificates"]) {$certificates = json_encode($_POST['certificates']); }else{$certificates = '[]';}
    if($_POST["skills"]) {$skills = json_encode($_POST['skills']); }else{$skills = '[]';}
    $profile_image_old = $_POST["profile_image_old"];



    $_FILES['profile_image']['name'];

    if (!empty($_FILES['profile_image']['name'])) {
        $file = rand(1000, 100000) . $_FILES['profile_image']['name'];
        $file_loc = $_FILES['profile_image']['tmp_name'];
        $file_size = $_FILES['profile_image']['size'];
        $file_type = $_FILES['profile_image']['type'];
        $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
        if (in_array($file_type, $allowed)) {
            $folder = "images/user/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $event_image = str_replace(' ', '-', $new_file_name);
            //move_uploaded_file($file_loc, $folder . $event_image);
            $profile_image = compressImage($event_image, $file_loc, $folder, $new_size);
        } else {
            $profile_image = $profile_image_old;
        }
    } else {
        $profile_image = $profile_image_old;
    }


        // echo "<pre>";print_r($_POST);
        // echo "<pre>";print_r($jsonDays);
        // echo "<pre>";print_r($jsonworkexp);
        // echo "<pre>";print_r($showering);
        // echo "<pre>";print_r($qualifications);
        // echo "<pre>";print_r($certificates);
        // echo "<pre>";print_r($skills);
        // echo $_COOKIE['user_id'];die;

        $upqry = "UPDATE " . TBL . "users SET
                            user_address = '".$_POST['user_address']."',
                            user_city = '".$_POST['user_city']."',
                            user_state = '".$_POST['user_state']."',
                            user_country = '".$_POST['user_country']."',
                            user_zip_code = '".$_POST['user_zip_code']."',
                            user_latitude = '".$_POST['user_latitude']."',
                            user_longitude = '".$_POST['user_longitude']."',
                            type_of_support_work = '".$_POST['type_of_support_work']."',
                            ABN_number = '".$_POST['ABN_number']."',
                            how_did_you_hear_about_us = '".$_POST['how_did_you_hear_about_us']."',
                            birth_year = '".$_POST['birth_year']."',
                            date_of_birth = '".$_POST['birth_year']."',
                            age = '".$_POST['age']."',
                            location = '".$_POST['location']."',
                            happy_to_travel = '".$_POST['happy_to_travel']."',
                            language = '".$_POST['language']."',
                            about_me = '".$_POST['about_me']."',

                            availability_time = '".$jsonDays."',
                            showering = '".$showering."',
                            qualifications = '".$qualifications."',
                            certificates = '".$certificates."',
                            skills = '".$skills."',
                            position = '".$jsonworkexp."',
                            profile_image ='" . $profile_image . "',

                            pet_friendly = '".$_POST['pet_friendly']."',
                            gender = '".$_POST['gender']."',
                            company_name = '".$_POST['company_name']."',
                            work_from = '".$_POST['work_from']."',
                            work_to = '".$_POST['work_to']."',
                            exp_year_month = '".$_POST['exp_year_month']."',
                            support_prefer = '".$_POST['support_prefer']."',
                            work_avail = '".$_POST['work_avail']."',
                            register_status = '".$newreg_status."'
                            WHERE user_id = ".$user_id;


                $upres = mysqli_query($conn,$upqry);

                $_SESSION['user_code'] = $login_row['user_code'];
                //$_SESSION['user_name'] = $login_row['first_name'];
                $_SESSION['user_id'] = $_COOKIE['user_id'];

                //header("Location: dashboard");
                header('Location: pricing-details');

    }


    if (isset($_POST['support_worker_skip_submit'])) {

        $_SESSION['user_code'] = $login_row['user_code'];
        //$_SESSION['user_name'] = $login_row['first_name'];
        $_SESSION['user_id'] = $_COOKIE['user_id'];

        header("Location: dashboard");
    }

  

} else {

    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
    $_SESSION['register_status_msg'] = 1;

    header('Location: login?login=register');
    exit();

}