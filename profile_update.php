<?php

/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_code = $_SESSION['user_code'];
    if (isset($_POST['profile_update_submit']) && $_POST['hidden_user_type'] == 'Support Worker') {


        $all = $_POST;
        $days = $_POST['days'];

        if($_POST['days']){ $days = $_POST['days']; $jsonDays = json_encode($days);}else{$jsonDays = '[]';}
        if($_POST['workexp']){ $workexp = $_POST['workexp']; $jsonworkexp = json_encode($workexp);}else{$jsonworkexp = '[]';}
        if($_POST["showering"]) {$showering = json_encode($_POST['showering']);}else{$showering = '[]';}
        if($_POST["qualifications"]) {$qualifications = json_encode($_POST['qualifications']); }else{$qualifications = '[]';}
        if($_POST["certificates"]) {$certificates = json_encode($_POST['certificates']); }else{$certificates = '[]';}
        if($_POST["skills"]) {$skills = json_encode($_POST['skills']); }else{$skills = '[]';}


        $happy_to_travel = $_POST["happy_to_travel"];
        $language = $_POST["language"];
        $pet_friendly = $_POST["pet_friendly"];
        $type_of_support_work = $_POST["type_of_support_work"];
        $how_did_you_hear_about_us = $_POST["how_did_you_hear_about_us"];
        $support_prefer = $_POST["support_prefer"];
        $work_avail = $_POST["work_avail"];
        $gender = $_POST["gender"];
        $ABN_number = $_POST["ABN_number"];

        // echo "<pre>";print_r($_POST);
        // echo "<pre>";print_r($jsonDays);
        // echo "<pre>";print_r($jsonworkexp);
        // echo "<pre>";print_r($showering);
        // echo "<pre>";print_r($qualifications);
        // echo "<pre>";print_r($certificates);
        // echo "<pre>";print_r($skills);
        // echo $_COOKIE['user_id'];die;

        $user_code = $_SESSION['user_code']; //Session User Code
        // $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $mobile_number = $_POST["mobile_number"];
        $email_id = $_POST["email_id"];
        $date_of_birth = $_POST["birth_year"];
        $user_city = $_POST["user_city"];

        $password_old = $_POST["password_old"];

        if ($_POST["password"] != NULL) {

            $password = md5($_POST["password"]);
        } else {
            $password = $password_old;
        }

        $user_facebook = $_POST["user_facebook"];
        $user_twitter = $_POST["user_twitter"];
        $user_youtube = $_POST["user_youtube"];
        $user_website = $_POST["user_website"];

        $profile_image_old = $_POST["profile_image_old"];
        $cover_photo_old = $_POST["cover_photo_old"];
        $profile_id_proof_old = $_POST["profile_id_proof_old"];


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

        $_FILES['cover_photo']['name'];

        if (!empty($_FILES['cover_photo']['name'])) {
            $file = rand(1000, 100000) . $_FILES['cover_photo']['name'];
            $file_loc = $_FILES['cover_photo']['tmp_name'];
            $file_size = $_FILES['cover_photo']['size'];
            $file_type = $_FILES['cover_photo']['type'];
            $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
            if (in_array($file_type, $allowed)) {
                $folder = "images/user/";
                $new_size = $file_size / 1024;
                $new_file_name = strtolower($file);
                $event_image = str_replace(' ', '-', $new_file_name);
                //move_uploaded_file($file_loc, $folder . $event_image);
                $cover_photo = compressImage($event_image, $file_loc, $folder, $new_size);
            } else {
                $cover_photo = $cover_photo_old;
            }
        } else {
            $cover_photo = $cover_photo_old;
        }

        $_FILES['profile_id_proof']['name'];

        if (!empty($_FILES['profile_id_proof']['name'])) {
            $file = rand(1000, 100000) . $_FILES['profile_id_proof']['name'];
            $file_loc = $_FILES['profile_id_proof']['tmp_name'];
            $file_size = $_FILES['profile_id_proof']['size'];
            $file_type = $_FILES['profile_id_proof']['type'];
            $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
            if (in_array($file_type, $allowed)) {
                $folder = "images/user/";
                $new_size = $file_size / 1024;
                $new_file_name = strtolower($file);
                $event_image = str_replace(' ', '-', $new_file_name);
                //move_uploaded_file($file_loc, $folder . $event_image);
                $profile_id_proof = compressImage($event_image, $file_loc, $folder, $new_size);
            } else {
                $profile_id_proof = $profile_id_proof_old;
            }
        } else {
            $profile_id_proof = $profile_id_proof_old;
        }

        /*
                    $sql = mysqli_query($conn, "UPDATE  " . TBL . "users SET  last_name ='" . $last_name . "'
                ,date_of_birth ='" . $date_of_birth . "', user_city ='" . $user_city . "', profile_image ='" . $profile_image . "'
                ,password ='" . $password . "', user_facebook ='" . $user_facebook . "', user_twitter ='" . $user_twitter . "'
                ,user_youtube ='" . $user_youtube . "', user_website ='" . $user_website . "'
                ,cover_image ='" . $cover_photo . "', profile_id_proof ='" . $profile_id_proof . "'
                ,mobile_number='" . $mobile_number . "'
                where user_code='" . $user_code . "'");

            */


        $w_n_services       = $_POST["w_n_services"];
        $w_n_services1  = (isset($w_n_services) && !empty($w_n_services) && $w_n_services  != '') ? $w_n_services  : null;
        $p_age_range         = $_POST["p_age_range"];
        $p_age_range1  = (isset($p_age_range) && !empty($p_age_range) && $p_age_range  != '') ? $p_age_range  : null;
        $n_p_managed          = $_POST["n_p_managed"];
        $n_p_managed1  = (isset($n_p_managed) && !empty($n_p_managed) && $n_p_managed  != '') ? $n_p_managed  : null;
        $service_location     = $_POST["service_location"];
        $service_location1  = (isset($service_location) && !empty($service_location) && $service_location  != '') ? $service_location  : null;
        $relation_w_p         = $_POST["relation_w_p"];
        $relation_w_p1  = (isset($relation_w_p) && !empty($relation_w_p) && $relation_w_p  != '') ? $relation_w_p  : null;
        $p_first_name         = $_POST["p_first_name"];
        $p_first_name1  = (isset($p_first_name) && !empty($p_first_name) && $p_first_name  != '') ? $p_first_name  : null;
        $p_last_name          = $_POST["p_last_name"];
        $p_last_name1  = (isset($p_last_name) && !empty($p_last_name) && $p_last_name  != '') ? $p_last_name  : null;
        $age_range            = $_POST["age_range"];
        $age_range1  = (isset($age_range) && !empty($age_range) && $age_range  != '') ? $age_range  : null;
        $p_contact_method     = $_POST["p_contact_method"];
        $p_contact_method1  = (isset($p_contact_method) && !empty($p_contact_method) && $p_contact_method  != '') ? $p_contact_method  : null;
        $p_identify_as        = $_POST["p_identify_as"];
        $p_identify_as1  = (isset($p_identify_as) && !empty($p_identify_as) && $p_identify_as  != '') ? $p_identify_as  : null;
        $language_spoken          = $_POST["language_spoken"];
        $language_spoken1  = (isset($language_spoken) && !empty($language_spoken) && $language_spoken  != '') ? $language_spoken  : null;
        $interpreter_r            = $_POST["interpreter_r"];
        $interpreter_r1  = (isset($interpreter_r) && !empty($interpreter_r) && $interpreter_r  != '') ? $interpreter_r  : null;
        $ndis_number              = $_POST["ndis_number"];
        $ndis_number1  = (isset($ndis_number) && !empty($ndis_number) && $ndis_number  != '') ? $ndis_number  : null;




        $sql = mysqli_query($conn, "UPDATE  " . TBL . "users SET  last_name ='" . $last_name . "'
        ,date_of_birth ='" . $date_of_birth . "', user_city ='" . $user_city . "', profile_image ='" . $profile_image . "'
        ,password ='" . $password . "', user_facebook ='" . $user_facebook . "', user_twitter ='" . $user_twitter . "'
        ,user_youtube ='" . $user_youtube . "', user_website ='" . $user_website . "'
        ,cover_image ='" . $cover_photo . "', profile_id_proof ='" . $profile_id_proof . "'
        ,mobile_number='" . $mobile_number . "', w_n_services ='" . $w_n_services1 . "',
            p_age_range ='" . $p_age_range1 . "',
            n_p_managed ='" . $n_p_managed1 . "',
            service_location ='" . $service_location1 . "',
                relation_w_p ='" . $relation_w_p1 . "',
                p_first_name ='" . $p_first_name1 . "',
                    p_last_name ='" . $p_last_name1 . "',
                    age_range ='" . $age_range1 . "',
                    p_contact_method ='" . $p_contact_method1 . "',
                    p_identify_as ='" . $p_identify_as1 . "',
                        language_spoken ='" . $language_spoken1 . "',
                        interpreter_r ='" . $interpreter_r1 . "',

                        availability_time = '".$jsonDays."',
                        showering = '".$showering."',
                        qualifications = '".$qualifications."',
                        certificates = '".$certificates."',
                        skills = '".$skills."',
                        position = '".$jsonworkexp."',
                        happy_to_travel = '".$happy_to_travel."',
                        language = '".$language."',
                        pet_friendly = '".$pet_friendly."',
                        type_of_support_work = '".$type_of_support_work."',
                        how_did_you_hear_about_us = '".$how_did_you_hear_about_us."',
                        support_prefer = '".$support_prefer."',
                        work_avail = '".$work_avail."',
                        gender = '".$gender."',
                        ABN_number = '".$ABN_number."',
                        date_of_birth = '".$date_of_birth."',

                        ndis_number ='" . $ndis_number1 . "'


        where user_code='" .$user_code . "'
            ");



        if ($sql) {

            $_SESSION['status_msg'] = $BIZBOOK['USER_PROFILE_UPDATE_SUCCESS_MESSAGE'];


            header('Location: db-my-profile');
            exit;
        } else {

            $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

            header('Location: db-my-profile-edit');
            exit;
        }
    }


//ssssssssss

if (isset($_POST['profile_update_submit']) && $_POST['hidden_user_type'] == 'Participant') {


    $user_code = $_SESSION['user_code']; //Session User Code

    // $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $mobile_number = $_POST["mobile_number"];
    $email_id = $_POST["email_id"];
    $date_of_birth = $_POST["date_of_birth"];
    $user_city = $_POST["user_city"];

    $password_old = $_POST["password_old"];

    if ($_POST["password"] != NULL) {

        $password = md5($_POST["password"]);
    } else {
        $password = $password_old;
    }

    $user_facebook = $_POST["user_facebook"];
    $user_twitter = $_POST["user_twitter"];
    $user_youtube = $_POST["user_youtube"];
    $user_website = $_POST["user_website"];

    $profile_image_old = $_POST["profile_image_old"];
    $cover_photo_old = $_POST["cover_photo_old"];
    $profile_id_proof_old = $_POST["profile_id_proof_old"];


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

    $_FILES['cover_photo']['name'];

    if (!empty($_FILES['cover_photo']['name'])) {
        $file = rand(1000, 100000) . $_FILES['cover_photo']['name'];
        $file_loc = $_FILES['cover_photo']['tmp_name'];
        $file_size = $_FILES['cover_photo']['size'];
        $file_type = $_FILES['cover_photo']['type'];
        $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
        if (in_array($file_type, $allowed)) {
            $folder = "images/user/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $event_image = str_replace(' ', '-', $new_file_name);
            //move_uploaded_file($file_loc, $folder . $event_image);
            $cover_photo = compressImage($event_image, $file_loc, $folder, $new_size);
        } else {
            $cover_photo = $cover_photo_old;
        }
    } else {
        $cover_photo = $cover_photo_old;
    }

    $_FILES['profile_id_proof']['name'];

    if (!empty($_FILES['profile_id_proof']['name'])) {
        $file = rand(1000, 100000) . $_FILES['profile_id_proof']['name'];
        $file_loc = $_FILES['profile_id_proof']['tmp_name'];
        $file_size = $_FILES['profile_id_proof']['size'];
        $file_type = $_FILES['profile_id_proof']['type'];
        $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
        if (in_array($file_type, $allowed)) {
            $folder = "images/user/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $event_image = str_replace(' ', '-', $new_file_name);
            //move_uploaded_file($file_loc, $folder . $event_image);
            $profile_id_proof = compressImage($event_image, $file_loc, $folder, $new_size);
        } else {
            $profile_id_proof = $profile_id_proof_old;
        }
    } else {
        $profile_id_proof = $profile_id_proof_old;
    }

    /*
                $sql = mysqli_query($conn, "UPDATE  " . TBL . "users SET  last_name ='" . $last_name . "'
            ,date_of_birth ='" . $date_of_birth . "', user_city ='" . $user_city . "', profile_image ='" . $profile_image . "'
            ,password ='" . $password . "', user_facebook ='" . $user_facebook . "', user_twitter ='" . $user_twitter . "'
            ,user_youtube ='" . $user_youtube . "', user_website ='" . $user_website . "'
            ,cover_image ='" . $cover_photo . "', profile_id_proof ='" . $profile_id_proof . "'
            ,mobile_number='" . $mobile_number . "'
            where user_code='" . $user_code . "'");

        */


    $w_n_services       = $_POST["w_n_services"];
    $w_n_services1  = (isset($w_n_services) && !empty($w_n_services) && $w_n_services  != '') ? $w_n_services  : null;
    $p_age_range         = $_POST["p_age_range"];
    $p_age_range1  = (isset($p_age_range) && !empty($p_age_range) && $p_age_range  != '') ? $p_age_range  : null;
    $n_p_managed          = $_POST["n_p_managed"];
    $n_p_managed1  = (isset($n_p_managed) && !empty($n_p_managed) && $n_p_managed  != '') ? $n_p_managed  : null;
    $service_location     = $_POST["service_location"];
    $service_location1  = (isset($service_location) && !empty($service_location) && $service_location  != '') ? $service_location  : null;
    $relation_w_p         = $_POST["relation_w_p"];
    $relation_w_p1  = (isset($relation_w_p) && !empty($relation_w_p) && $relation_w_p  != '') ? $relation_w_p  : null;
    $p_first_name         = $_POST["p_first_name"];
    $p_first_name1  = (isset($p_first_name) && !empty($p_first_name) && $p_first_name  != '') ? $p_first_name  : null;
    $p_last_name          = $_POST["p_last_name"];
    $p_last_name1  = (isset($p_last_name) && !empty($p_last_name) && $p_last_name  != '') ? $p_last_name  : null;
    $age_range            = $_POST["age_range"];
    $age_range1  = (isset($age_range) && !empty($age_range) && $age_range  != '') ? $age_range  : null;
    $p_contact_method     = $_POST["p_contact_method"];
    $p_contact_method1  = (isset($p_contact_method) && !empty($p_contact_method) && $p_contact_method  != '') ? $p_contact_method  : null;
    $p_identify_as        = $_POST["p_identify_as"];
    $p_identify_as1  = (isset($p_identify_as) && !empty($p_identify_as) && $p_identify_as  != '') ? $p_identify_as  : null;
    $language_spoken          = $_POST["language_spoken"];
    $language_spoken1  = (isset($language_spoken) && !empty($language_spoken) && $language_spoken  != '') ? $language_spoken  : null;
    $interpreter_r            = $_POST["interpreter_r"];
    $interpreter_r1  = (isset($interpreter_r) && !empty($interpreter_r) && $interpreter_r  != '') ? $interpreter_r  : null;
    $ndis_number              = $_POST["ndis_number"];
    $ndis_number1  = (isset($ndis_number) && !empty($ndis_number) && $ndis_number  != '') ? $ndis_number  : null;




    $sql = mysqli_query($conn, "UPDATE  " . TBL . "users SET  last_name ='" . $last_name . "'
    ,date_of_birth ='" . $date_of_birth . "', user_city ='" . $user_city . "', profile_image ='" . $profile_image . "'
    ,password ='" . $password . "', user_facebook ='" . $user_facebook . "', user_twitter ='" . $user_twitter . "'
    ,user_youtube ='" . $user_youtube . "', user_website ='" . $user_website . "'
    ,cover_image ='" . $cover_photo . "', profile_id_proof ='" . $profile_id_proof . "'
    ,mobile_number='" . $mobile_number . "', w_n_services ='" . $w_n_services1 . "',
        p_age_range ='" . $p_age_range1 . "',
        n_p_managed ='" . $n_p_managed1 . "',
        service_location ='" . $service_location1 . "',
            relation_w_p ='" . $relation_w_p1 . "',
            p_first_name ='" . $p_first_name1 . "',
                p_last_name ='" . $p_last_name1 . "',
                age_range ='" . $age_range1 . "',
                p_contact_method ='" . $p_contact_method1 . "',
                p_identify_as ='" . $p_identify_as1 . "',
                    language_spoken ='" . $language_spoken1 . "',
                    interpreter_r ='" . $interpreter_r1 . "',
                    ndis_number ='" . $ndis_number1 . "'


    where user_code='" . $user_code . "'
        ");



    if ($sql) {

        $_SESSION['status_msg'] = $BIZBOOK['USER_PROFILE_UPDATE_SUCCESS_MESSAGE'];


        header('Location: db-my-profile');
        exit;
    } else {

        $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

        header('Location: db-my-profile-edit');
        exit;
    }

}
//sssssssssss
} else {

    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

    header('Location: db-my-profile');
    exit;
}

// For Support coordinator Edit profile start
if (isset($_POST['profile_update_submit']) && $_POST['hidden_user_type'] == 'Support coordinator') {

    
    $user_code = $_SESSION['user_code']; //Session User Code
    // Common Details

    // $last_name = $_POST["last_name"];
    $mobile_number = $_POST["mobile_number"];
    // $email_id = $_POST["email_id"];
    // $date_of_birth = $_POST["date_of_birth"];
    $user_city = $_POST["user_city"];

    $password_old = $_POST["password_old"];

    if ($_POST["password"] != NULL) {

        $password = md5($_POST["password"]);
    } else {
        $password = $password_old;
    }

    $user_facebook = $_POST["user_facebook"];
    $user_twitter = $_POST["user_twitter"];
    $user_youtube = $_POST["user_youtube"];
    $user_website = $_POST["user_website"];

    $profile_image_old = $_POST["profile_image_old"];
    $cover_photo_old = $_POST["cover_photo_old"];
    $profile_id_proof_old = $_POST["profile_id_proof_old"];


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

    $_FILES['cover_photo']['name'];

    if (!empty($_FILES['cover_photo']['name'])) {
        $file = rand(1000, 100000) . $_FILES['cover_photo']['name'];
        $file_loc = $_FILES['cover_photo']['tmp_name'];
        $file_size = $_FILES['cover_photo']['size'];
        $file_type = $_FILES['cover_photo']['type'];
        $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
        if (in_array($file_type, $allowed)) {
            $folder = "images/user/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $event_image = str_replace(' ', '-', $new_file_name);
            //move_uploaded_file($file_loc, $folder . $event_image);
            $cover_photo = compressImage($event_image, $file_loc, $folder, $new_size);
        } else {
            $cover_photo = $cover_photo_old;
        }
    } else {
        $cover_photo = $cover_photo_old;
    }

    $_FILES['profile_id_proof']['name'];

    if (!empty($_FILES['profile_id_proof']['name'])) {
        $file = rand(1000, 100000) . $_FILES['profile_id_proof']['name'];
        $file_loc = $_FILES['profile_id_proof']['tmp_name'];
        $file_size = $_FILES['profile_id_proof']['size'];
        $file_type = $_FILES['profile_id_proof']['type'];
        $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
        if (in_array($file_type, $allowed)) {
            $folder = "images/user/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $event_image = str_replace(' ', '-', $new_file_name);
            //move_uploaded_file($file_loc, $folder . $event_image);
            $profile_id_proof = compressImage($event_image, $file_loc, $folder, $new_size);
        } else {
            $profile_id_proof = $profile_id_proof_old;
        }
    } else {
        $profile_id_proof = $profile_id_proof_old;
    }

    $acc_pro_stamp_old = $_POST["acc_pro_stamp_old"];

    $_FILES['acc_pro_stamp']['name'];

    if (!empty($_FILES['acc_pro_stamp']['name'])) {
        $file = rand(1000, 100000) . $_FILES['acc_pro_stamp']['name'];
        $file_loc = $_FILES['acc_pro_stamp']['tmp_name'];
        $file_size = $_FILES['acc_pro_stamp']['size'];
        $file_type = $_FILES['acc_pro_stamp']['type'];
        $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
        if (in_array($file_type, $allowed)) {
            $folder = "images/provider_stamp/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $event_image = str_replace(' ', '-', $new_file_name);
            //move_uploaded_file($file_loc, $folder . $event_image);
            $acc_pro_stamp = compressImage($event_image, $file_loc, $folder, $new_size);
        } else {
            $acc_pro_stamp = $acc_pro_stamp_old;
        }
    } else {
        $acc_pro_stamp = $acc_pro_stamp_old;
    }


   

    $access_methods         = $_POST["access_methods"];
    $access_methods1        = (isset($access_methods) && !empty($access_methods) && $access_methods  != '') ? $access_methods  : null;
    $age_groups             = $_POST["age_groups"];
    $age_groups1            = (isset($age_groups) && !empty($age_groups) && $age_groups  != '') ? $age_groups  : null;
    $service_location       = $_POST["service_location"];
    $service_location1      = (isset($service_location) && !empty($service_location) && $service_location  != '') ? $service_location  : null;
    $registration_no        = $_POST["registration_no"];
    $registration_no1       = (isset($registration_no) && !empty($registration_no) && $registration_no  != '') ? $registration_no  : null;
    $p_trading_name         = $_POST["provider_trading_name"];
    $p_trading_name1        = (isset($p_trading_name) && !empty($p_trading_name) && $p_trading_name  != '') ? $p_trading_name  : null;
    $reg_companys_name      = $_POST["registered_companys_name"];
    $reg_companys_name1     = (isset($reg_companys_name) && !empty($reg_companys_name) && $reg_companys_name  != '') ? $reg_companys_name  : null;
    $busi_contact_number    = $_POST["business_contact_number"];
    $busi_contact_number1   = (isset($busi_contact_number) && !empty($busi_contact_number) && $busi_contact_number  != '') ? $busi_contact_number  : null;
    $busi_email_address     = $_POST["business_email_address"];
    $busi_email_address1    = (isset($busi_email_address) && !empty($busi_email_address) && $busi_email_address  != '') ? $busi_email_address  : null;

    $sql = mysqli_query($conn, "UPDATE  " . TBL . "users SET  user_city ='" . $user_city . "', profile_image ='" . $profile_image . "'
    ,password ='" . $password . "', user_facebook ='" . $user_facebook . "', user_twitter ='" . $user_twitter . "'
    ,user_youtube ='" . $user_youtube . "', user_website ='" . $user_website . "'
    ,cover_image ='" . $cover_photo . "', profile_id_proof ='" . $profile_id_proof . "'
    ,mobile_number='" . $mobile_number . "', access_methods ='" . $access_methods1      . "',
    age_groups ='" . $age_groups1 . "',
    registration_no ='" . $registration_no1 . "',
        service_location ='" . $service_location1 . "',
        accredited_provider_stamp ='" . $acc_pro_stamp . "',
            provider_trading_name ='" . $p_trading_name1 . "',
            registered_companys_name ='" . $reg_companys_name1 . "',
            business_contact_number ='" . $busi_contact_number1 . "',
            business_email_address ='" . $busi_email_address1 . "'
    where user_code='" . $user_code . "'
        ");



    if ($sql) {

        $_SESSION['status_msg'] = $BIZBOOK['USER_PROFILE_UPDATE_SUCCESS_MESSAGE'];


        header('Location: db-my-profile');
        exit;
    } else {

        $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

        header('Location: db-my-profile-edit');
        exit;
    }

}
//sssssssssss
else {

    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

    header('Location: db-my-profile');
    exit;
}
// Support coordinator Edit profile End
