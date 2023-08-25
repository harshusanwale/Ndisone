<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */


if (file_exists('config/info.php'))
{
    include ('config/info.php');
    
}
//print_r($_SERVER['REQUEST_METHOD']);die;
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['listing_submit']))
    {

        $src_path = $_POST["src_path"];

        $listing_code = $_POST["listing_code"];

        //    Condition to get User Id starts
        if (isset($_SESSION['user_code']) && !empty($_SESSION['user_code']))
        {
            $user_code = $_SESSION['user_code'];
            $user_details = mysqli_query($conn, "SELECT * FROM  " . TBL . "users where user_code='" . $user_code . "'");
            $user_details_row = mysqli_fetch_array($user_details);

            $user_id = $user_details_row['user_id']; //User Id
            if ($user_details_row['user_status'] == 'Active')
            {
                // Listing Status
                $listing_status = "Active";
            }
            else
            {
                // Listing Status
                $listing_status = "Inactive";
            }

        }
        else
        {
            $user_status = "Inactive";

            $qry = "INSERT INTO " . TBL . "users 
					(first_name, last_name, email_id, mobile_number, register_mode, user_status, user_cdt) 
					VALUES ('$first_name', '$last_name', '$email_id', '$mobile_number','$register_mode', '$user_status', '$curDate')";

            $res = mysqli_query($conn, $qry);
            $LID = mysqli_insert_id($conn);
            $lastID = $LID;

            switch (strlen($LID))
            {
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
        if ($src_path == "edit-1")
        {

            $listing_id = $_POST["listing_id"];
            $reg_stamp_old = $_POST["reg_stamp_old"];
            $profile_image_old = $_POST["profile_image_old"];
            $cover_image_old = $_POST["cover_image_old"];
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
            $listing_description = addslashes($_POST["listing_description"]);
            $listing_type_id = 1;

            $face_url = $_POST["face_url"];
            $insta_url = $_POST["insta_url"];

            $twi_url = $_POST["twi_url"];
            // print_r($twi_url);die;
            $link_url = $_POST["link_url"];

            $reg_group123 = $_POST["reg_group"];
            $prefix = $fruitList = '';
            foreach ($reg_group123 as $fruit)
            {
                $reg_groupid .= $prefix . $fruit;
                $prefix = ',';
            }
            // print_r($_POST);die;
            

            function checkListingSlug($link, $listing_id, $counter = 1)
            {
                global $conn;
                $newLink = $link;
                do
                {
                    $checkLink = mysqli_query($conn, "SELECT listing_id FROM " . TBL . "listings WHERE listing_slug = '$newLink' AND listing_id != '$listing_id'");
                    if (mysqli_num_rows($checkLink) > 0)
                    {
                        $newLink = $link . '' . $counter;
                        $counter++;
                    }
                    else
                    {
                        break;
                    }
                }
                while (1);

                return $newLink;
            }

            $listing_name1 = trim(preg_replace('/[^A-Za-z0-9]/', ' ', $listing_name));
            $listing_slug = checkListingSlug($listing_name1, $listing_id);

            //************************ Reg Stamp Image Upload starts  **************************
            if (!empty($_FILES['reg_stamp']['name']))
            {
                $file = rand(1000, 100000) . $_FILES['reg_stamp']['name'];
                $file_loc = $_FILES['reg_stamp']['tmp_name'];
                $file_size = $_FILES['reg_stamp']['size'];
                $file_type = $_FILES['reg_stamp']['type'];
                $allowed = array(
                    "image/jpeg",
                    "image/pjpeg",
                    "image/png",
                    "image/gif",
                    "image/webp",
                    "image/svg",
                    "application/pdf",
                    "application/msword",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.template"
                );
                if (in_array($file_type, $allowed))
                {
                    $folder = "images/listings/";
                    $new_size = $file_size / 1024;
                    $new_file_name = strtolower($file);
                    $event_image = str_replace(' ', '-', $new_file_name);
                    //move_uploaded_file($file_loc, $folder . $event_image);
                    $reg_stamp1 = compressImage($event_image, $file_loc, $folder, $new_size);
                    $reg_stamp_image = $reg_stamp1;
                }
                else
                {
                    $reg_stamp_image = $reg_stamp_old;
                }
            }
            else
            {
                $reg_stamp_image = $reg_stamp_old;
            }
            //************************  Reg Stamp Upload Ends  **************************
            

            //************************  Profile Image Upload starts  **************************
            if (!empty($_FILES['profile_image']['name']))
            {
                $file = rand(1000, 100000) . $_FILES['profile_image']['name'];
                $file_loc = $_FILES['profile_image']['tmp_name'];
                $file_size = $_FILES['profile_image']['size'];
                $file_type = $_FILES['profile_image']['type'];
                $allowed = array(
                    "image/jpeg",
                    "image/pjpeg",
                    "image/png",
                    "image/gif",
                    "image/webp",
                    "image/svg",
                    "application/pdf",
                    "application/msword",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.template"
                );
                if (in_array($file_type, $allowed))
                {
                    $folder = "images/listings/";
                    $new_size = $file_size / 1024;
                    $new_file_name = strtolower($file);
                    $event_image = str_replace(' ', '-', $new_file_name);
                    //move_uploaded_file($file_loc, $folder . $event_image);
                    $profile_image1 = compressImage($event_image, $file_loc, $folder, $new_size);
                    $profile_image = $profile_image1;
                }
                else
                {
                    $profile_image = $profile_image_old;
                }
            }
            else
            {
                $profile_image = $profile_image_old;
            }
            //************************  Profile Image Upload Ends  **************************
            //************************  Cover Image Upload starts  **************************
            if (!empty($_FILES['cover_image']['name']))
            {
                $file = rand(1000, 100000) . $_FILES['cover_image']['name'];
                $file_loc = $_FILES['cover_image']['tmp_name'];
                $file_size = $_FILES['cover_image']['size'];
                $file_type = $_FILES['cover_image']['type'];
                $allowed = array(
                    "image/jpeg",
                    "image/pjpeg",
                    "image/png",
                    "image/gif",
                    "image/webp",
                    "image/svg",
                    "application/pdf",
                    "application/msword",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.template"
                );
                if (in_array($file_type, $allowed))
                {
                    $folder = "images/listing-ban/";
                    $new_size = $file_size / 1024;
                    $new_file_name = strtolower($file);
                    $event_image = str_replace(' ', '-', $new_file_name);
                    //move_uploaded_file($file_loc, $folder . $event_image);
                    $cover_image1 = compressImage($event_image, $file_loc, $folder, $new_size);
                    $cover_image = $cover_image1;
                }
                else
                {
                    $cover_image = $cover_image_old;
                }
            }
            else
            {
                $cover_image = $cover_image_old;
            }
            //************************  Cover Image Upload ends  **************************
            

            $listing_qry = "UPDATE  " . TBL . "listings  SET user_id='" . $user_id . "', ndis_early_child='" . $ndis_early_child . "', abn_number='" . $abn_number . "',
                 listing_type_id='" . $listing_type_id . "', organi_type='" . $organi_type . "', ndis_regs='" . $ndis_reg . "', reg_number='" . $reg_number . "' 
    , com_land_number='" . $com_land_num . "', com_phone_1='" . $com_phone_1 . "', com_phone_2='" . $com_phone_2 . "',listing_name	='" . $listing_name . "',listing_description='" . $listing_description . "', com_email='" . $comp_email . "'
    , com_website='" . $com_website . "', listing_address='" . $primary_location . "', listing_slug ='" . $listing_slug . "'
    ,insta_url='" . $insta_url . "',twitter_link='" . $twi_url . "',linkd_url='" . $link_url . "',reg_group='" . $reg_groupid . "',fb_link='" . $face_url . "',reg_stamp='" . $reg_stamp_image . "',profile_image='" . $profile_image . "',cover_image='" . $cover_image . "'
    where listing_id='" . $listing_id . "'";

        }
        // print_r($listing_qry);die;
        //On Update data from edit listing step -1 ends
        //===========================================================================================
        //On Update data from edit listing step -2 starts
        if ($src_path == "edit-2")
        {
            $listing_id = $_POST["listing_id"];

            $category_id = $_POST["category_id"];

            $sub_category_id123 = $_POST["sub_category_id"];
            $prefix = $fruitList = '';
            foreach ($sub_category_id123 as $fruit)
            {
                $sub_category_id .= $prefix . $fruit;
                $prefix = ',';
            }
            // print_r($_POST);die;
            $listing_qry = "UPDATE  " . TBL . "listings SET user_id='" . $user_id . "',category_id='" . $category_id . "', sub_category_id='" . $sub_category_id . "'
             where listing_id='" . $listing_id . "'";

        }

        //On Update data from edit listing step -2 ends
        //===========================================================================================
        //On Update data from edit listing step -3 starts
        if ($src_path == "edit-3")
        {

            $listing_id = $_POST["listing_id"];

            // service location Details
            $location = json_encode($_POST["location"]);
            // print_r($location);die;
            $listing_qry = "UPDATE  " . TBL . "listings  SET user_id='" . $user_id . "'
             ,service_locations='" . $location . "' where listing_id='" . $listing_id . "'";

        }

        //On Update data from edit listing step -3 ends
        //===========================================================================================
        //On Update data from edit listing step -4 starts
        if ($src_path == "edit-4")
        {
            $listing_id = $_POST["listing_id"];

            $service_1_image_old = $_POST["service_1_image_old"];

            // Listing Service Names Details
            $service_1_name123 = $_POST["service_1_name"];

            $service_1_name = implode("|", $service_1_name123);

            // Listing Offer Prices Details
            $service_1_price123 = $_POST["service_1_price"];

            $prefix1 = $fruitList = '';
            foreach ($service_1_price123 as $fruit1)
            {
                $service_1_price .= $prefix1 . $fruit1;
                $prefix1 = ',';
            }

            // Listing Offer Details
            $service_1_detail123 = $_POST["service_1_detail"];
            $service_1_detail1 = implode("|", $service_1_detail123);
            $service_1_detail = addslashes($service_1_detail1);

            // Listing Offer View More
            $service_1_view_more123 = $_POST["service_1_view_more"];
            $prefix1 = $fruitList = '';
            foreach ($service_1_view_more123 as $fruit1)
            {
                $service_1_view_more .= $prefix1 . $fruit1;
                $prefix1 = ',';
            }

            // ************************  Offer Image Upload Starts  **************************
            $all_service_1_image = $_FILES['service_1_image'];
            $all_service_1_image2 = $_FILES['service_1_image']['name'];

            if (count(array_filter($_FILES['service_1_image']['name'])) <= 0)
            {
                $service_1_image = $service_1_image_old;
            }
            else
            {
                for ($k = 0;$k < count($all_service_1_image2);$k++)
                {

                    if (!empty($_FILES['service_1_image']['name'][$k]))
                    {
                        $file = rand(1000, 100000) . $_FILES['service_1_image']['name'][$k];
                        $file_loc = $_FILES['service_1_image']['tmp_name'][$k];
                        $file_size = $_FILES['service_1_image']['size'][$k];
                        $file_type = $_FILES['service_1_image']['type'][$k];
                        $allowed = array(
                            "image/jpeg",
                            "image/pjpeg",
                            "image/png",
                            "image/gif",
                            "image/webp",
                            "image/svg",
                            "application/pdf",
                            "application/msword",
                            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                            "application/vnd.openxmlformats-officedocument.wordprocessingml.template"
                        );
                        if (in_array($file_type, $allowed))
                        {
                            $folder = "images/services/";
                            $new_size = $file_size / 1024;
                            $new_file_name = strtolower($file);
                            $event_image = str_replace(' ', '-', $new_file_name);
                            //move_uploaded_file($file_loc, $folder . $event_image);
                            $service_1_image1[] = compressImage($event_image, $file_loc, $folder, $new_size);
                        }
                        else
                        {
                            $service_1_image1 = '';
                        }
                    }

                }
                if ($service_1_image1 != NULL)
                {
                    $service_1_image = implode(",", $service_1_image1);
                }
                else
                {
                    $service_1_image = '';
                }
            }
            // ************************  Offer Image Upload ends  **************************
            $listing_qry = "UPDATE  " . TBL . "listings  SET user_id='" . $user_id . "'
    ,service_1_name='" . $service_1_name . "',service_1_price='" . $service_1_price . "', service_1_detail='" . $service_1_detail . "'
    ,service_1_image='" . $service_1_image . "' , service_1_view_more='" . $service_1_view_more . "' where listing_id='" . $listing_id . "'";

        }
        //On Update data from edit listing step -4 ends
          
        //On Update data from edit listing step -5 starts
        if ($src_path == "edit-5") {

            $listing_id = $_POST["listing_id"];

            // Listing Location Details
            $google_map = $_POST["google_map"];
            $threesixty_view = $_POST["360_view"];

            $listing_video123 = $_POST["listing_video"];

            // Listing Video

            $prefix6 = $fruitList = '';
            foreach ($listing_video123 as $fruit6) {
                $listing_video1 = $prefix6 . $fruit6;
                $listing_video .= addslashes($listing_video1);
                $prefix6 = '|';
            }

            $gallery_image_old = $_POST["gallery_image_old"];

            // ************************  Gallery Image Upload starts  **************************

            // $all_gallery_image = $_FILES['gallery_image'];
            // $all_gallery_image23 = $_FILES['gallery_image']['name'];

            // if (count(array_filter($_FILES['gallery_image']['name'])) <= 0) {
            //     $gallery_image = $gallery_image_old;
            // } else {


            //     for ($k = 0; $k < count($all_gallery_image23); $k++) {


            //         if (!empty($all_gallery_image['name'][$k])) {
            //             $file1 = rand(1000, 100000) . $all_gallery_image['name'][$k];
            //             $file_loc1 = $all_gallery_image['tmp_name'][$k];
            //             $file_size1 = $all_gallery_image['size'][$k];
            //             $file_type1 = $all_gallery_image['type'][$k];
            //             $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
            //             if (in_array($file_type1, $allowed)) {
            //                 $folder1 = "images/listings/";
            //                 $new_size1 = $file_size1 / 1024;
            //                 $new_file_name1 = strtolower($file1);
            //                 $event_image1 = str_replace(' ', '-', $new_file_name1);
            //                 //move_uploaded_file($file_loc1, $folder1 . $event_image1);
            //                 $gallery_image1[] = compressImage($event_image1, $file_loc1, $folder1, $new_size1);
            //             } else {
            //                 $gallery_image1[] = '';
            //             }

            //         }


            //     }
            //     if($gallery_image1 != NULL){
            //         $gallery_image = implode(",", $gallery_image1);
            //         }else{
            //             $gallery_image = '';
            //         }
            // }

            // ************************  Gallery Image Upload ends  **************************

            $listing_qry =
                "UPDATE  " . TBL . "listings  SET user_id='" . $user_id . "'
    ,gallery_image='" . $gallery_image . "', google_map='" . $google_map . "',360_view ='" . $threesixty_view . "'
    ,listing_video ='" . $listing_video . "'
     where listing_id='" . $listing_id . "'";

        }
        //On Update data from edit listing step -5 ends


//===========================================================================================

        //On Update data from edit listing step -6 starts
        if ($src_path == "edit-6") {

            $listing_id = $_POST["listing_id"];

            // Work Hours Details
                $mon_is_open = $_POST['mon_is_open'];
                    $mon_open_time = $_POST['mon_open_time'];
                    $mon_close_time = $_POST['mon_close_time'];

                    $tue_is_open = $_POST['tue_is_open'];
                    $tue_open_time = $_POST['tue_open_time'];
                    $tue_close_time = $_POST['tue_close_time'];

                    $wed_is_open = $_POST['wed_is_open'];
                    $wed_open_time = $_POST['wed_open_time'];
                    $wed_close_time = $_POST['wed_close_time'];

                    $thu_is_open = $_POST['thu_is_open'];
                    $thu_open_time = $_POST['thu_open_time'];
                    $thu_close_time = $_POST['thu_close_time'];

                    $fri_is_open = $_POST['fri_is_open'];
                    $fri_open_time = $_POST['fri_open_time'];
                    $fri_close_time = $_POST['fri_close_time'];

                    $sat_is_open = $_POST['sat_is_open'];
                    $sat_open_time = $_POST['sat_open_time'];
                    $sat_close_time = $_POST['sat_close_time'];

                    $sun_is_open = $_POST['sun_is_open'];
                    $sun_open_time = $_POST['sun_open_time'];
                    $sun_close_time = $_POST['sun_close_time'];

            $listing_qry =
                "UPDATE  " . TBL . "listings  SET user_id='" . $user_id . "'
        ,mon_is_open='" . $mon_is_open . "',mon_open_time='" . $mon_open_time . "',mon_close_time='" . $mon_close_time . "'
        ,tue_is_open='" . $tue_is_open . "',tue_open_time='" . $tue_open_time . "',tue_close_time='" . $tue_close_time . "'
        ,wed_is_open='" . $wed_is_open . "',wed_open_time='" . $wed_open_time . "',wed_close_time='" . $wed_close_time . "'
        ,thu_is_open='" . $thu_is_open . "',thu_open_time='" . $thu_open_time . "',thu_close_time='" . $thu_close_time . "'
        ,fri_is_open='" . $fri_is_open . "',fri_open_time='" . $fri_open_time . "',fri_close_time='" . $fri_close_time . "'
        ,sat_is_open='" . $sat_is_open . "',sat_open_time='" . $sat_open_time . "',sat_close_time='" . $sat_close_time . "'
        ,sun_is_open='" . $sun_is_open . "',sun_open_time='" . $sun_open_time . "',sun_close_time='" . $sun_close_time . "'
        where listing_id='" . $listing_id . "'";

        }
        //On Update data from edit listing step -6 ends

//===========================================================================================

//===========================================================================================

    //On Update data from edit listing step -6 starts
    if ($src_path == "edit-7") {

        $listing_id = $_POST["listing_id"];

        //Business Details
               $appr_method = $_POST["appr_method"];
               
                $language123 = $_POST["language"];
                $prefix1 = $fruitList = '';
                foreach ($language123 as $fruit1)
                {
                    $language .= $prefix1 .  $fruit1 ;
                    $prefix1 = ',';
                }
                $ser_special = $_POST["ser_special"];
                $pet_frie = $_POST["pet_frie"];
                $age_group = $_POST["age_group"];
                $ser_deli_method = $_POST["ser_deli_method"];
                $listing_qry = "UPDATE  " . TBL . "listings  SET user_id='" . $user_id . "', appr_merhod ='" . $appr_method . "'
        , language ='" . $language . "',serv_specilisation ='" . $ser_special . "',pet_frie ='" . $pet_frie . "',ser_deli_method ='" . $ser_deli_method . "',age_group ='" . $age_group . "'  where listing_id='" . $listing_id . "'";

    }
    //On Update data from edit listing step -7 ends

//===========================================================================================

//===========================================================================================

    //On Update data from edit listing step -6 starts
    if ($src_path == "edit-8") {

        $listing_id = $_POST["listing_id"];

       //Listing Other Informations
       $listing_info_question123 = $_POST["listing_info_question"];
       $prefix1 = $fruitList = '';
       foreach ($listing_info_question123 as $fruit1) {
           $listing_info_question .= $prefix1 . $fruit1;
           $prefix1 = ',';
       }

       $listing_info_answer123 = $_POST["listing_info_answer"];
       $prefix1 = $fruitList = '';
       foreach ($listing_info_answer123 as $fruit1) {
           $listing_info_answer .= $prefix1 . $fruit1;
           $prefix1 = ',';
       }

       $listing_qry = "UPDATE  " . TBL . "listings  SET user_id='" . $user_id . "', listing_info_question ='" . $listing_info_question . "'
       , listing_info_answer ='" . $listing_info_answer . "'  where listing_id='" . $listing_id . "'";  

    }
    //On Update data from edit listing step -7 ends

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
        if ($listing_res)
        {

            $admin_email = $admin_primary_email; // Admin Email Id
            $webpage_full_link_with_login = $webpage_full_link . "login"; //URL Login Link
            //****************************    Admin email starts    *************************
            $to = $admin_email;
            $LISTING_UPDATE_ADMIN_SUBJECT = $BIZBOOK['LISTING_UPDATE_ADMIN_SUBJECT'];
            $subject = "$admin_site_name $LISTING_UPDATE_ADMIN_SUBJECT";

            $admin_sql_fetch = mysqli_query($conn, "SELECT * FROM " . TBL . "mail  WHERE mail_id = 9 "); //admin mail template fetch
            $admin_sql_fetch_row = mysqli_fetch_array($admin_sql_fetch);

            $mail_template_admin = $admin_sql_fetch_row['mail_template'];

            $message1 = stripslashes(str_replace(array(
                '\'.$admin_site_name.\'',
                '\' . $first_name . \'',
                '\' . $email_id . \'',
                '\' . $mobile_number . \'',
                '\' . $listing_name . \'',
                '\' . $listing_email . \'',
                '\' . $listing_mobile . \'',
                '\'.$admin_footer_copyright.\'',
                '\'.$admin_address.\'',
                '\'.$webpage_full_link.\'',
                '\'.$webpage_full_link_with_login.\'',
                '\'.$admin_primary_email.\''
            ) , array(
                '' . $admin_site_name . '',
                '' . $first_name . '',
                '' . $email_id . '',
                '' . $mobile_number . '',
                '' . $listing_name . '',
                '' . $listing_email . '',
                '' . $listing_mobile . '',
                '' . $admin_footer_copyright . '',
                '' . $admin_address . '',
                '' . $webpage_full_link . '',
                '' . $webpage_full_link_with_login . '',
                '' . $admin_primary_email . ''
            ) , $mail_template_admin));

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

            $message2 = stripslashes(str_replace(array(
                '\'.$admin_site_name.\'',
                '\' . $first_name . \'',
                '\' . $email_id . \'',
                '\' . $mobile_number . \'',
                '\' . $listing_name . \'',
                '\' . $listing_email . \'',
                '\' . $listing_mobile . \'',
                '\'.$admin_footer_copyright.\'',
                '\'.$admin_address.\'',
                '\'.$webpage_full_link.\'',
                '\'.$webpage_full_link_with_login.\'',
                '\'.$admin_primary_email.\''
            ) , array(
                '' . $admin_site_name . '',
                '' . $first_name . '',
                '' . $email_id . '',
                '' . $mobile_number . '',
                '' . $listing_name . '',
                '' . $listing_email . '',
                '' . $listing_mobile . '',
                '' . $admin_footer_copyright . '',
                '' . $admin_address . '',
                '' . $webpage_full_link . '',
                '' . $webpage_full_link_with_login . '',
                '' . $admin_primary_email . ''
            ) , $mail_template_client));

            $headers1 = "From: " . "$admin_email" . "\r\n";
            $headers1 .= "Reply-To: " . "$admin_email" . "\r\n";
            $headers1 .= "MIME-Version: 1.0\r\n";
            $headers1 .= "Content-Type: text/html; charset=utf-8\r\n";

            mail($to1, $subject1, $message2, $headers1); //admin email
            //****************************    client email ends    *************************
            if ($listing_type_id == 1)
            {

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
                unset($_SESSION['service_1_name']);
                unset($_SESSION['service_1_price']);
                unset($_SESSION['service_1_detail']);
                unset($_SESSION['service_1_image']);

                unset($_SESSION['google_map']);
                unset($_SESSION['360_view']);
                unset($_SESSION['gallery_image']);

                unset($_SESSION['listing_info_question']);
                unset($_SESSION['listing_info_answer']);

                header('Location: edit-listing-step-new-9?code=' . $listing_code);
                exit;
            }
            else
            {

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
                unset($_SESSION['service_1_name']);
                unset($_SESSION['service_1_price']);
                unset($_SESSION['service_1_detail']);
                unset($_SESSION['service_1_image']);

                unset($_SESSION['google_map']);
                unset($_SESSION['360_view']);
                unset($_SESSION['gallery_image']);

                unset($_SESSION['listing_info_question']);
                unset($_SESSION['listing_info_answer']);

                header('Location: edit-listing-step-new-9?code=' . $listing_code);
                exit;
            }

        }
        else
        {

            $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

            header('Location: edit-listing-step-new-1?row=' . $listing_code);
        }

        //    Listing Update Part Ends
        
    }
}
else
{

    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

    header('Location: edit-listing-step-new-1?row=' . $listing_code);
}

