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

// Basic Personal Details

        $register_mode = "Direct";

// Common Listing Details
        $listing_name = $_POST["listing_name"];
        $ndis_early_child = $_POST["ndis_early_child"];
        $com_land_num = $_POST["com_land_num"];
        $com_phone_1 = $_POST["com_phone_1"];
        $com_phone_2 = $_POST["com_phone_2"];
        $comp_email = $_POST["comp_email"];
        $com_website = $_POST["com_website"];
        $face_url = $_POST["face_url"];
        $listing_type_id = 1;
        $abn_number = $_POST["abn_number"];
        $organi_type = $_POST["organi_type"];
        $ndis_reg = $_POST["ndis_reg"];
        $reg_number = $_POST["reg_number"];
        $primary_location = $_POST["primary_location"];
        $insta_url = $_POST["insta_url"];
        $state_id = "1";

        $twi_url = $_POST["twi_url"];

        $link_url = $_POST["link_url"];
     
        $reg_group123 = $_POST["reg_group"];
        
        $prefix = $fruitList = '';
        foreach ($reg_group123 as $fruit)
        {
            $reg_group .= $prefix .  $fruit ;
            $prefix = ',';
        }

        // Service Offers Details 
        // $ser_offer123 = $_POST["ser_offer"];
        // $prefix1 = $fruitList = '';
        // foreach ($ser_offer123 as $fruit1)
        // {
        //     $ser_offer .= $prefix1 .  $fruit1 ;
        //     $prefix1 = ',';
        // }
        $category_id = $_POST["category_id"];

        $sub_category_id123 = $_POST["sub_category_id"];

        $prefix = $fruitList = '';
        foreach ($sub_category_id123 as $fruit)
        {
            $sub_category_id .= $prefix .  $fruit ;
            $prefix = ',';
        }
        
        //Location Details
        $service_locations = json_encode($_POST["location"]);
        // print_r( $location);die;

        $days = json_encode($_POST["days"]);

        $appr_method = $_POST["appr_method"];

        // Other Details
        $language = $_POST["language"];
        $ser_special = $_POST["ser_special"];
        $pet_frie = $_POST["pet_frie"];

// Listing Status
        $payment_status = "Pending";
        // print_r($_POST);die;

        function checkListingSlug($link, $counter = 1)
        {
            global $conn;
            $newLink = $link;
            do {
                $checkLink = mysqli_query($conn, "SELECT listing_id FROM " . TBL . "listings WHERE listing_slug = '$newLink'");
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
        $listing_slug = checkListingSlug($listing_name1);

//    Condition to get User Id starts

        if (isset($_POST['user_code']) && !empty($_POST['user_code'])) {
            $user_code = $_POST['user_code'];
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

            //echo $upqry; die();
            $upres = mysqli_query($conn, $upqry);

            $user_id = $lastID; //User Id

            // Listing Status
            $listing_status = "Inactive";


        }
//    Condition to get User Id Ends

//************************  Profile Image Upload starts  **************************

        if (!empty($_FILES['profile_image']['name'])) {
            $file = rand(1000, 100000) . $_FILES['profile_image']['name'];
            $file_loc = $_FILES['profile_image']['tmp_name'];
            $file_size = $_FILES['profile_image']['size'];
            $file_type = $_FILES['profile_image']['type'];
            $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
            if (in_array($file_type, $allowed)) {
                $folder = "../images/listings/";
                $new_size = $file_size / 1024;
                $new_file_name = strtolower($file);
                $event_image = str_replace(' ', '-', $new_file_name);
                //move_uploaded_file($file_loc, $folder . $event_image);
                $profile_image = compressImage($event_image, $file_loc, $folder, $new_size);
            } else {
                $profile_image = '';
            }
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
                $folder = "../images/listing-ban/";
                $new_size = $file_size / 1024;
                $new_file_name = strtolower($file);
                $event_image = str_replace(' ', '-', $new_file_name);
                //move_uploaded_file($file_loc, $folder . $event_image);
                $cover_image = compressImage($event_image, $file_loc, $folder, $new_size);
            } else {
                $cover_image = '';
            }
        }

//************************  Cover Image Upload ends  **************************

//************************  Register Stamp Image Upload starts  **************************

if (!empty($_FILES['reg_stamp']['name'])) {
    $file = rand(1000, 100000) . $_FILES['reg_stamp']['name'];
    $file_loc = $_FILES['reg_stamp']['tmp_name'];
    $file_size = $_FILES['reg_stamp']['size'];
    $file_type = $_FILES['reg_stamp']['type'];
    $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
    if (in_array($file_type, $allowed)) {
        $folder = "../images/listings/";
        $new_size = $file_size / 1024;
        $new_file_name = strtolower($file);
        $event_image = str_replace(' ', '-', $new_file_name);
        //move_uploaded_file($file_loc, $folder . $event_image);
        $reg_stamp_image = compressImage($event_image, $file_loc, $folder, $new_size);
    } else {
        $reg_stamp_image = '';
    }
}

//************************   Register Stamp Upload ends  **************************


//    Listing Insert Part Starts

        $listing_qry = "INSERT INTO " . TBL . "listings 
        (user_id, category_id, sub_category_id, listing_type_id, listing_name, listing_address, service_locations,
        fb_link, twitter_link, listing_status, payment_status, listing_slug, listing_cdt, abn_number, organi_type, ndis_regs, ndis_early_child, reg_number, reg_stamp, com_land_number,
        com_phone_1, com_phone_2, com_email, com_website, insta_url, linkd_url, reg_group, work_hours,
        appr_merhod, language, serv_specilisation, pet_frie,profile_image,cover_image) 
        VALUES 
        ('$user_id', '$category_id', '$sub_category_id', '$listing_type_id', '$listing_name', '$primary_location', '$service_locations',
        '$face_url', '$twi_url', '$listing_status', '$payment_status', '$listing_slug', '$curDate', '$abn_number', '$organi_type', '$ndis_reg', '$ndis_early_child', '$reg_number', '$reg_stamp_image', '$com_land_num',
        '$com_phone_1', '$com_phone_2', '$comp_email', '$com_website', '$insta_url', '$link_url', '$reg_group', '$days',
        '$appr_method', '$language', '$ser_special', '$pet_frie','$profile_image','$cover_image')";

        $listing_res = mysqli_query($conn, $listing_qry);
        $ListingID = mysqli_insert_id($conn);
        $listlastID = $ListingID;

        switch (strlen($ListingID)) {
            case 1:
                $ListingID = '00' . $ListingID;
                break;
            case 2:
                $ListingID = '0' . $ListingID;
                break;
            default:
                $ListingID = $ListingID;
                break;
        }

        $ListCode = 'LIST' . $ListingID;

        $lisupqry = "UPDATE " . TBL . "listings
					  SET listing_code = '$ListCode' 
					  WHERE listing_id = $listlastID";

        $lisupres = mysqli_query($conn, $lisupqry);

        //****************************    Top Service Providers listing count check and addition starts    *************************


        //**  To check the given category id is available on top_service_provider_table    ***

        $top_service_sql = "SELECT * FROM  " . TBL . "top_service_providers where top_service_provider_category_id='" . $category_id . "'";
        $top_service_sql_rs = mysqli_query($conn, $top_service_sql);
        $top_service_sql_count = mysqli_num_rows($top_service_sql_rs);

        if ($top_service_sql_count > 0) {  //if category ID available in top service provider

            $top_service_sql_row = mysqli_fetch_array($top_service_sql_rs);

            $top_service_provider_listings = $top_service_sql_row['top_service_provider_listings'];
            $top_service_provider_category_id = $top_service_sql_row['top_service_provider_category_id'];

            $top_service_provider_listings_array = explode(",", $top_service_provider_listings);

            $top_service_provider_listings_array_count = count($top_service_provider_listings_array);

            if ($top_service_provider_listings_array_count <= 4) {   //if Listings less than or equal to 4 means update top service provider

                $parts = $top_service_provider_listings_array;
                $parts[] = $ListingID;                                  //updating existing listings array with new listing ID

                $top_service_provider_listings_new = implode(',', $parts);

                $top_service_provider_sql = mysqli_query($conn, "UPDATE  " . TBL . "top_service_providers SET top_service_provider_listings = '$top_service_provider_listings_new'
     where top_service_provider_category_id='" . $top_service_provider_category_id . "'");

            }
        }

        //****************************    Top Service Providers listing count check and addition ends    *************************


        //****************************    Admin Primary email fetch starts    *************************

        $admin_primary_email_fetch = mysqli_query($conn, "SELECT * FROM " . TBL . "footer  WHERE footer_id = '1' ");
        $admin_primary_email_fetchrow = mysqli_fetch_array($admin_primary_email_fetch);
        $admin_primary_email = $admin_primary_email_fetchrow['admin_primary_email'];
        $admin_footer_copyright = $admin_primary_email_fetchrow['footer_copyright'];
        $admin_site_name = $admin_primary_email_fetchrow['website_address'];
        $admin_address = $admin_primary_email_fetchrow['footer_address'];

        //****************************    Admin Primary email fetch ends    *************************


        if ($lisupres) {

            $admin_email = $admin_primary_email; // Admin Email Id

            $webpage_full_link_with_login = $webpage_full_link . "login";  //URL Login Link

//****************************    Admin email starts    *************************

            $to = $admin_email;
            $subject = "$admin_site_name -New Listing has been created";

            $admin_sql_fetch = mysqli_query($conn, "SELECT * FROM " . TBL . "mail  WHERE mail_id = 7 "); //admin mail template fetch
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
            $subject1 = "$admin_site_name Listing Creation Successful";

            $client_sql_fetch = mysqli_query($conn, "SELECT * FROM " . TBL . "mail  WHERE mail_id = 6 "); //User mail template fetch
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


            $_POST['status_msg'] = "New Listing has been created Successfully!!!";

            header('Location: admin-all-listings.php');
        } else {

            $_POST['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

            header('Location: admin-add-new-listings-start.php');
        }

        //    Listing Insert Part Ends

    }
} else {

    $_POST['status_msg'] = "Oops!! Something Went Wrong Try Later!!!";

    header('Location: admin-add-new-listings-start.php');
}