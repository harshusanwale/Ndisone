<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['listing_submit'])) {

        $src_path = $_POST["src_path"];

        $listing_code = $_POST["listing_code"];

//    Condition to get User Id starts

        if (isset($_SESSION['user_code']) && !empty($_SESSION['user_code'])) {
            $user_code = $_SESSION['user_code'];
            $user_details = mysqli_query($conn, "SELECT * FROM  " . TBL . "users where user_code='" . $user_code . "'");
            $user_details_row = mysqli_fetch_array($user_details);

            $user_id = $user_details_row['user_id'];  //User Id

            if ($user_details_row['user_status'] == 'Active') {
                // Listing Status
                $listing_status = "Active";
            } else {
                // Listing Status
                $listing_status = "Inactive";
            }

        } else {
            $user_status = "Inactive";

            $qry = "INSERT INTO " . TBL . "users 
					(first_name, last_name, email_id, mobile_number, register_mode, user_status, user_cdt) 
					VALUES ('$first_name', '$last_name', '$email_id', '$mobile_number','$register_mode', '$user_status', '$curDate')";

            $res = mysqli_query($conn, $qry);
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

            $userID = 'USER' . $LID;

            $upqry = "UPDATE " . TBL . "users 
					  SET user_code = '$userID' 
					  WHERE user_id = $lastID";

            $upres = mysqli_query($conn, $upqry);

            $user_id = $lastID; //User Id

            // Listing Status
            $listing_status = "Inactive";

        }
//    Condition to get User Id Ends

        //On Update data from edit listing step -1 starts
        if ($src_path == "edit-1") {

            $listing_id = $_POST["listing_id"];
            $reg_stamp_old = $_POST["reg_stamp_old"];
            // Basic Personal Details
            $abn_number = $_POST["abn_number"];
            $organi_type = $_POST["organi_type"];
            $ndis_reg = $_POST["ndis_reg"];
            $reg_number = $_POST["reg_number"];

            $register_mode = "Direct";

// Common Listing Details
            $listing_name = $_POST["listing_name"];
            $ndis_early_child = $_POST["ndis_early_child"];
            $com_land_num = $_POST["com_land_num"];
            $com_phone_1 = $_POST["com_phone_1"];
            $com_phone_2 = $_POST["com_phone_2"];
            $comp_email = $_POST["comp_email"];
            $com_website = $_POST["com_website"];
            $primary_location = $_POST["primary_location"];
            $listing_type_id = 1;

            $face_url = $_POST["face_url"];
            $insta_url = $_POST["insta_url"];

            $twi_url = $_POST["twi_url"];
            // print_r($twi_url);die;

            $link_url = $_POST["link_url"];

            $reg_group123 = $_POST["reg_group"];
            $prefix = $fruitList = '';
            foreach ($reg_group123 as $fruit) {
                $reg_groupid .= $prefix . $fruit;
                $prefix = ',';
            }
            // print_r($_POST);die;
            

            function checkListingSlug($link, $listing_id, $counter = 1)
            {
                global $conn;
                $newLink = $link;
                do {
                    $checkLink = mysqli_query($conn, "SELECT listing_id FROM " . TBL . "listings WHERE listing_slug = '$newLink' AND listing_id != '$listing_id'");
                    if (mysqli_num_rows($checkLink) > 0) {
                        $newLink = $link . '' . $counter;
                        $counter++;
                    } else {
                        break;
                    }
                } while (1);

                return $newLink;
            }


            $listing_name1 = trim(preg_replace('/[^A-Za-z0-9]/', ' ', $listing_name));
            $listing_slug = checkListingSlug($listing_name1, $listing_id);


//************************ Reg Stamp Image Upload starts  **************************

            if (!empty($_FILES['reg_stamp']['name'])) {
                $file = rand(1000, 100000) . $_FILES['reg_stamp']['name'];
                $file_loc = $_FILES['reg_stamp']['tmp_name'];
                $file_size = $_FILES['reg_stamp']['size'];
                $file_type = $_FILES['reg_stamp']['type'];
                $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
                if (in_array($file_type, $allowed)) {
                    $folder = "images/listings/";
                    $new_size = $file_size / 1024;
                    $new_file_name = strtolower($file);
                    $event_image = str_replace(' ', '-', $new_file_name);
                    //move_uploaded_file($file_loc, $folder . $event_image);
                    $reg_stamp1 = compressImage($event_image, $file_loc, $folder, $new_size);
                    $reg_stamp_image = $reg_stamp1;
                } else {
                    $reg_stamp_image = $reg_stamp_old;
                }
            } else {
                $reg_stamp_image = $reg_stamp_old;
            }
//************************  Reg Stamp Upload Ends  **************************


//************************  Profile Image Upload starts  **************************

if (!empty($_FILES['profile_image']['name'])) {
    $file = rand(1000, 100000) . $_FILES['profile_image']['name'];
    $file_loc = $_FILES['profile_image']['tmp_name'];
    $file_size = $_FILES['profile_image']['size'];
    $file_type = $_FILES['profile_image']['type'];
    $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
    if (in_array($file_type, $allowed)) {
        $folder = "images/listings/";
        $new_size = $file_size / 1024;
        $new_file_name = strtolower($file);
        $event_image = str_replace(' ', '-', $new_file_name);
        //move_uploaded_file($file_loc, $folder . $event_image);
        $profile_image1 = compressImage($event_image, $file_loc, $folder, $new_size);
        $profile_image = $profile_image1;
    } else {
        $profile_image = $profile_image_old;
    }
} else {
    $profile_image = $profile_image_old;
}
//************************  Profile Image Upload Ends  **************************

//************************  Cover Image Upload starts  **************************

if (!empty($_FILES['cover_image']['name'])) {
    $file = rand(1000, 100000) . $_FILES['cover_image']['name'];
    $file_loc = $_FILES['cover_image']['tmp_name'];
    $file_size = $_FILES['cover_image']['size'];
    $file_type = $_FILES['cover_image']['type'];
    $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
    if (in_array($file_type, $allowed)) {
        $folder = "images/listing-ban/";
        $new_size = $file_size / 1024;
        $new_file_name = strtolower($file);
        $event_image = str_replace(' ', '-', $new_file_name);
        //move_uploaded_file($file_loc, $folder . $event_image);
        $cover_image1 = compressImage($event_image, $file_loc, $folder, $new_size);
        $cover_image = $cover_image1;
    } else {
        $cover_image = $cover_image_old;
    }
} else {
    $cover_image = $cover_image_old;
}
//************************  Cover Image Upload ends  **************************


            $listing_qry =
                "UPDATE  " . TBL . "listings  SET user_id='" . $user_id . "', ndis_early_child='" . $ndis_early_child . "', abn_number='" . $abn_number . "',
                 listing_type_id='" . $listing_type_id . "', organi_type='" . $organi_type . "', ndis_regs='" . $ndis_reg . "', reg_number='" . $reg_number . "' 
    , com_land_number='" . $com_land_num . "', com_phone_1='" . $com_phone_1 . "', com_phone_2='" . $com_phone_2 . "',listing_name	='" . $listing_name . "', com_email='" . $comp_email . "'
    , com_website='" . $com_website . "', listing_address='" . $primary_location . "', listing_slug ='" . $listing_slug . "'
    ,insta_url='" . $insta_url . "',twitter_link='" . $twi_url . "',linkd_url='" . $link_url . "',reg_group='" . $reg_groupid . "',fb_link='" . $face_url . "',reg_stamp='" . $reg_stamp_image . "',profile_image='" . $profile_image . "',cover_image='" . $cover_image . "'
    where listing_id='" . $listing_id . "'";

        }
        // print_r($listing_qry);die;

        //On Update data from edit listing step -1 ends

//===========================================================================================

        //On Update data from edit listing step -2 starts
        if ($src_path == "edit-2") {
            $listing_id = $_POST["listing_id"];

            $category_id = $_POST["category_id"];

            $sub_category_id123 = $_POST["sub_category_id"];
            $prefix = $fruitList = '';
            foreach ($sub_category_id123 as $fruit) {
                $sub_category_id .= $prefix . $fruit;
                $prefix = ',';
            }
            // print_r($_POST);die;

            $listing_qry =
                "UPDATE  " . TBL . "listings SET user_id='" . $user_id . "',category_id='" . $category_id . "', sub_category_id='" . $sub_category_id . "'
             where listing_id='" . $listing_id . "'";

        }

        //On Update data from edit listing step -2 ends

//===========================================================================================

        //On Update data from edit listing step -3 starts
        if ($src_path == "edit-3") {

            $listing_id = $_POST["listing_id"];

// service location Details
            $location = json_encode($_POST["location"]);
            // print_r($location);die;
            $listing_qry =
                "UPDATE  " . TBL . "listings  SET user_id='" . $user_id . "'
    ,service_locations='" . $location . "' where listing_id='" . $listing_id . "'";


        }

        //On Update data from edit listing step -3 ends

//===========================================================================================

        //On Update data from edit listing step -4 starts
        if ($src_path == "edit-4") {

            $listing_id = $_POST["listing_id"];

            //Work Hours Details
           $work_hours  = json_encode($_POST["days"]);


            $listing_qry =
                "UPDATE  " . TBL . "listings  SET user_id='" . $user_id . "'
    ,work_hours='" . $work_hours  . "'
     where listing_id='" . $listing_id . "'";

        }

        //On Update data from edit listing step -4 ends


//===========================================================================================

        //On Update data from edit listing step -5 starts

        if ($src_path == "edit-5") {

            $listing_id = $_POST["listing_id"];


//Listing Other Informations
            $appr_method = $_POST["appr_method"];
            $language = $_POST["language"];
            $ser_special = $_POST["ser_special"];
            $pet_frie = $_POST["pet_frie"];

            $listing_qry = "UPDATE  " . TBL . "listings  SET user_id='" . $user_id . "', appr_merhod ='" . $appr_method . "'
    , language ='" . $language . "',serv_specilisation ='" . $ser_special . "',pet_frie ='" . $pet_frie . "'  where listing_id='" . $listing_id . "'";


        }

        //On Update data from edit listing step -5 ends

        //===========================================================================================


//   ***************************** Listing Update Part Starts *****************************

        $listing_res = mysqli_query($conn, $listing_qry);


        //****************************    Admin Primary email fetch starts    *************************

        $admin_primary_email_fetch = mysqli_query($conn, "SELECT * FROM " . TBL . "footer  WHERE footer_id = '1' ");
        $admin_primary_email_fetchrow = mysqli_fetch_array($admin_primary_email_fetch);
        $admin_primary_email = $admin_primary_email_fetchrow['admin_primary_email'];
        $admin_footer_copyright = $admin_primary_email_fetchrow['footer_copyright'];
        $admin_site_name = $admin_primary_email_fetchrow['website_address'];
        $admin_address = $admin_primary_email_fetchrow['footer_address'];

        //****************************    Admin Primary email fetch ends    *************************

        if ($listing_res) {

            $admin_email = $admin_primary_email; // Admin Email Id

            $webpage_full_link_with_login = $webpage_full_link . "login";  //URL Login Link

//****************************    Admin email starts    *************************

            $to = $admin_email;
            $LISTING_UPDATE_ADMIN_SUBJECT = $BIZBOOK['LISTING_UPDATE_ADMIN_SUBJECT'];
            $subject = "$admin_site_name $LISTING_UPDATE_ADMIN_SUBJECT";

            $admin_sql_fetch = mysqli_query($conn, "SELECT * FROM " . TBL . "mail  WHERE mail_id = 9 "); //admin mail template fetch
            $admin_sql_fetch_row = mysqli_fetch_array($admin_sql_fetch);

            $mail_template_admin = $admin_sql_fetch_row['mail_template'];

            $message1 = stripslashes(str_replace(array('\'.$admin_site_name.\'', '\' . $first_name . \'', '\' . $email_id . \''
            , '\' . $mobile_number . \'', '\' . $listing_name . \'', '\' . $listing_email . \'', '\' . $listing_mobile . \'', '\'.$admin_footer_copyright.\'', '\'.$admin_address.\'', '\'.$webpage_full_link.\'', '\'.$webpage_full_link_with_login.\'', '\'.$admin_primary_email.\''),
                array('' . $admin_site_name . '', '' . $first_name . '', '' . $email_id . '', '' . $mobile_number . '', '' . $listing_name . '', '' . $listing_email . '', '' . $listing_mobile . '', '' . $admin_footer_copyright . '', '' . $admin_address . '', '' . $webpage_full_link . '', '' . $webpage_full_link_with_login . '', '' . $admin_primary_email . ''), $mail_template_admin));


            $headers = "From: " . "$email_id" . "\r\n";
            $headers .= "Reply-To: " . "$email_id" . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=utf-8\r\n";


            mail($to, $subject, $message1, $headers); //admin email


//****************************    Admin email ends    *************************

//****************************    Client email starts    *************************

            $to1 = $email_id;
            $LISTING_UPDATE_CLIENT_SUBJECT = $BIZBOOK['LISTING_UPDATE_CLIENT_SUBJECT'];
            $subject1 = "$admin_site_name $LISTING_UPDATE_CLIENT_SUBJECT";

            $client_sql_fetch = mysqli_query($conn, "SELECT * FROM " . TBL . "mail  WHERE mail_id = 8 "); //User mail template fetch
            $client_sql_fetch_row = mysqli_fetch_array($client_sql_fetch);

            $mail_template_client = $client_sql_fetch_row['mail_template'];

            $message2 = stripslashes(str_replace(array('\'.$admin_site_name.\'', '\' . $first_name . \'', '\' . $email_id . \''
            , '\' . $mobile_number . \'', '\' . $listing_name . \'', '\' . $listing_email . \'', '\' . $listing_mobile . \'', '\'.$admin_footer_copyright.\'', '\'.$admin_address.\'', '\'.$webpage_full_link.\'', '\'.$webpage_full_link_with_login.\'', '\'.$admin_primary_email.\''),
                array('' . $admin_site_name . '', '' . $first_name . '', '' . $email_id . '', '' . $mobile_number . '', '' . $listing_name . '', '' . $listing_email . '', '' . $listing_mobile . '', '' . $admin_footer_copyright . '', '' . $admin_address . '', '' . $webpage_full_link . '', '' . $webpage_full_link_with_login . '', '' . $admin_primary_email . ''), $mail_template_client));


            $headers1 = "From: " . "$admin_email" . "\r\n";
            $headers1 .= "Reply-To: " . "$admin_email" . "\r\n";
            $headers1 .= "MIME-Version: 1.0\r\n";
            $headers1 .= "Content-Type: text/html; charset=utf-8\r\n";


            mail($to1, $subject1, $message2, $headers1); //admin email

//****************************    client email ends    *************************

            if ($listing_type_id == 1) {


            // Basic Personal Details
            unset($_SESSION['appr_method']);
            unset($_SESSION['ser_special']);
            unset($_SESSION['pet_frie']);
            unset($_SESSION['days']);

            unset($_SESSION['register_mode']);
            unset($_SESSION['user_status']);

            // Common Listing Details

            unset($_SESSION['listing_name']);
            unset($_SESSION['ndis_early_child']);
            unset($_SESSION['com_land_num']);
            unset($_SESSION['com_phone_1']);
            unset($_SESSION['abn_number']);
            unset($_SESSION['com_phone_2']);
            unset($_SESSION['comp_email']);
            unset($_SESSION['com_website']);
            unset($_SESSION['face_url']);
            unset($_SESSION['insta_url']);
            unset($_SESSION['twi_url']);
            unset($_SESSION['link_url']);

            unset($_SESSION['reg_group']);
            unset($_SESSION["category_id"]);
            unset($_SESSION["sub_category_id"]);
            unset($_SESSION['location']);
            unset($_SESSION['days']);
            unset($_SESSION['reg_stamp']);
            unset($_SESSION["reg_number"]); 
            unset($_SESSION["primary_location"]);
            unset($_SESSION['profile_image']);
            unset($_SESSION['cover_image']);


            header('Location: edit-listing-step-new-6?code=' . $listing_code);
            exit;
            } else {


            // Basic Personal Details
            unset($_SESSION['appr_method']);
            unset($_SESSION['ser_special']);
            unset($_SESSION['pet_frie']);
            unset($_SESSION['days']);

            unset($_SESSION['register_mode']);
            unset($_SESSION['user_status']);

            // Common Listing Details

            unset($_SESSION['listing_name']);
            unset($_SESSION['ndis_early_child']);
            unset($_SESSION['com_land_num']);
            unset($_SESSION['com_phone_1']);
            unset($_SESSION['abn_number']);
            unset($_SESSION['com_phone_2']);
            unset($_SESSION['comp_email']);
            unset($_SESSION['com_website']);
            unset($_SESSION['face_url']);
            unset($_SESSION['insta_url']);
            unset($_SESSION['twi_url']);
            unset($_SESSION['link_url']);

            unset($_SESSION['reg_group']);
            unset($_SESSION["category_id"]);
            unset($_SESSION["sub_category_id"]);
            unset($_SESSION['location']);
            unset($_SESSION['days']);
            unset($_SESSION['reg_stamp']);
            unset($_SESSION["reg_number"]); 
            unset($_SESSION["primary_location"]);
            unset($_SESSION['profile_image']);
            unset($_SESSION['cover_image']);

            header('Location: edit-listing-step-6?code=' . $listing_code);
            exit;
            }

        } else {

            $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

            header('Location: edit-listing-step-new-1?row=' . $listing_code);
        }

        //    Listing Update Part Ends

    }
} else {

    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

    header('Location: edit-listing-step-new-1?row=' . $listing_code);
}