<?php
/**
 * Created by Vignesh.
 * User: Vignesh
 */

if (file_exists('config/info.php')) {
    include('config/info.php');
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['listing_submit'])) {
        
        $reg_group = "" ;
        $ser_offer  = "" ;

        $_SESSION['appr_method'] = $_POST["appr_method"];
        $_SESSION['language'] = $_POST["language"];
        $_SESSION['ser_special'] = $_POST["ser_special"];
        $_SESSION['pet_frie'] = $_POST["pet_frie"];
        // $_SESSION['days'] = $_POST["days"];
       

// Basic Personal Details
        $abn_number = $_SESSION["abn_number"];
        $organi_type = $_SESSION["organi_type"];
        $ndis_reg = $_SESSION["ndis_reg"];
        $reg_number = $_SESSION["reg_number"];

        $register_mode = "Direct";
        
// Common Listing Details
        $listing_name = $_SESSION["listing_name"];
        $ndis_early_child = $_SESSION["ndis_early_child"];
        $com_land_num = $_SESSION["com_land_num"];
        $com_phone_1 = $_SESSION["com_phone_1"];
        $com_phone_2 = $_SESSION["com_phone_2"];
        $comp_email = $_SESSION["comp_email"];
        $com_website = $_SESSION["com_website"];
        $primary_location = $_SESSION["primary_location"];
        $fb_link = $_SESSION["face_url"];
        $insta_url = $_SESSION["insta_url"];

        $twitter_link = $_SESSION["twi_url"];

        $link_url = $_SESSION["link_url"];

        $reg_group123 = $_SESSION["reg_group"];

        $prefix = $fruitList = '';
        foreach ($reg_group123 as $fruit)
        {
            $reg_group .= $prefix .  $fruit ;
            $prefix = ',';
        }

// Service Offers Details 
        // $ser_offer123 = $_SESSION["ser_offer"];
        // $prefix1 = $fruitList = '';
        // foreach ($ser_offer123 as $fruit1)
        // {
        //     $ser_offer .= $prefix1 .  $fruit1 ;
        //     $prefix1 = ',';
        // }
        $category_id = $_SESSION["category_id"];

        $sub_category_id123 = $_SESSION["sub_category_id"];

        $prefix = $fruitList = '';
        foreach ($sub_category_id123 as $fruit)
        {
            $sub_category_id .= $prefix .  $fruit ;
            $prefix = ',';
        }
//Location Details
        $service_locations = json_encode($_SESSION["location"]);
        // print_r( $location);die;

        $days = json_encode($_SESSION["days"]);

        $appr_method = $_SESSION["appr_method"];

// Other Details
        $language = $_SESSION["language"];
        $ser_special = $_SESSION["ser_special"];
        $pet_frie = $_SESSION["pet_frie"];

        // $listing_status = "Pending";
        $payment_status = "Pending";

        if(isset($_SESSION['listing_type_id']) && !empty($_SESSION['listing_type_id'])) {
            $listing_type_id = $_SESSION["listing_type_id"];
        }else{
            $listing_type_id = 1;
        }

        function checkListingSlug($link, $counter=1){
            global $conn;
            $newLink = $link;
            do{
                $checkLink = mysqli_query($conn, "SELECT listing_id FROM " . TBL . "listings WHERE listing_slug = '$newLink'");
                if(mysqli_num_rows($checkLink) > 0){
                    $newLink = $link.''.$counter;
                    $counter++;
                } else {
                    break;
                }
            } while(1);

            return $newLink;
        }


        $listing_name1 = trim(preg_replace('/[^A-Za-z0-9]/', ' ', $listing_name));
        $listing_slug = checkListingSlug($listing_name1);

//    Condition to get User Id starts
        if (isset($_SESSION['user_code']) && !empty($_SESSION['user_code'])) {
            $user_code = $_SESSION['user_code'];
            $user_details = mysqli_query($conn,"SELECT * FROM  " . TBL . "users where user_code='" . $user_code . "'");
            $user_details_row = mysqli_fetch_array($user_details);

            $user_id = $user_details_row['user_id'];  //User Id

            if($user_details_row['user_status'] == 'Active'){
                // Listing Status
                $listing_status = "Active";
            }else{
                // Listing Status
                $listing_status = "Inactive";
            }


        } else {
            $user_status = "Inactive";

            $qry = "INSERT INTO " . TBL . "users 
					(first_name, last_name, email_id, mobile_number, register_mode, user_status, user_cdt) 
					VALUES ('$first_name', '$last_name', '$email_id', '$mobile_number','$register_mode', '$user_status', '$curDate')";

            $res = mysqli_query($conn,$qry);
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
            
            $upres = mysqli_query($conn,$upqry);

            $user_id = $lastID; //User Id
            
            // Listing Status
            $listing_status = "Inactive";

        }
//    Condition to get User Id Ends

//************************  Reg Stamp Image Upload starts  **************************

$reg_stamp = $_SESSION["reg_stamp_image"];
//************************   Reg Stamp Image Upload Ends  **************************

//************************  Profile Image Upload starts  **************************

$profile_image = $_SESSION['profile_image'];
//************************  Profile Image Upload Ends  **************************

//************************  Cover Image Upload starts  **************************

$cover_image = $_SESSION['cover_image'];

//************************  Cover Image Upload ends  **************************


//    Listing Insert Part Starts

        // $listing_qry = "INSERT INTO " . TBL . "listing_new 
		// 			(user_id, abn_number, organi_type, ndis_regs, ndis_early_child, reg_number, reg_stamp, listing_name, com_land_number
		// 			, com_phone_1, com_phone_2, com_email, com_website, primary_location, face_url, insta_url, twit_url, linkd_url, serv_offers,reg_group, serv_locations, work_hours
		// 			, appr_merhod, language, serv_specilisation, pet_frie
		// 			,payment_status, listing_slug, listing_cdt,listing_status,listing_type_id) 
		// 			VALUES 
		// 			('$user_id', '$abn_number', '$organi_type', '$ndis_reg','$ndis_early_child', '$reg_number', '$reg_stamp', '$listing_name', '$com_land_num', '$com_phone_1', '$com_phone_2', '$comp_email', '$com_website', '$primary_location'
		// 			, '$face_url', '$insta_url', '$twi_url', '$link_url', '$ser_offer','$reg_group','$location ','$days', '$appr_method'
		// 			,'$language', '$ser_special', '$pet_frie', '$payment_status', '$listing_slug', '$curDate','$listing_status','$listing_type_id')";

        $listing_qry = "INSERT INTO " . TBL . "listings 
                        (user_id, category_id, sub_category_id, listing_type_id, listing_name, listing_address, service_locations,
                        fb_link, twitter_link, listing_status, payment_status, listing_slug, listing_cdt, abn_number, organi_type, ndis_regs, ndis_early_child, reg_number, reg_stamp, com_land_number,
                        com_phone_1, com_phone_2, com_email, com_website, insta_url, linkd_url, reg_group, work_hours,
                        appr_merhod, language, serv_specilisation, pet_frie,profile_image,cover_image) 
                        VALUES 
                        ('$user_id', '$category_id', '$sub_category_id', '$listing_type_id', '$listing_name', '$primary_location', '$service_locations',
                        '$fb_link', '$twitter_link', '$listing_status', '$payment_status', '$listing_slug', '$curDate', '$abn_number', '$organi_type', '$ndis_reg', '$ndis_early_child', '$reg_number', '$reg_stamp', '$com_land_num',
                        '$com_phone_1', '$com_phone_2', '$comp_email', '$com_website', '$insta_url', '$link_url', '$reg_group', '$days',
                        '$appr_method', '$language', '$ser_special', '$pet_frie','$profile_image','$cover_image')";

        $listing_res = mysqli_query($conn,$listing_qry);
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

        $lisupres = mysqli_query($conn,$lisupqry);

        //****************************    Top Service Providers listing count check and addition starts    *************************


        //**  To check the given category id is available on top_service_provider_table    ***

        $top_service_sql = "SELECT * FROM  " . TBL . "top_service_providers where top_service_provider_category_id='".$category_id."'";
        $top_service_sql_rs = mysqli_query($conn, $top_service_sql);
        $top_service_sql_count = mysqli_num_rows($top_service_sql_rs);

        if($top_service_sql_count > 0){  //if category ID available in top service provider

            $top_service_sql_row = mysqli_fetch_array($top_service_sql_rs);

            $top_service_provider_listings = $top_service_sql_row['top_service_provider_listings'];
            $top_service_provider_category_id = $top_service_sql_row['top_service_provider_category_id'];

            $top_service_provider_listings_array = explode(",", $top_service_provider_listings);

            $top_service_provider_listings_array_count = isset($top_service_provider_listings_array) ? count($top_service_provider_listings_array) : 0;

            if($top_service_provider_listings_array_count <= 4){   //if Listings less than or equal to 4 means update top service provider

                $parts = $top_service_provider_listings_array;
                $parts[] = $ListingID;                                  //updating existing listings array with new listing ID

                $top_service_provider_listings_new = implode(',', $parts);

                $top_service_provider_sql = mysqli_query($conn,"UPDATE  " . TBL . "top_service_providers SET top_service_provider_listings = '$top_service_provider_listings_new'
     where top_service_provider_category_id='" . $top_service_provider_category_id . "'");

            }
        }

        //****************************    Top Service Providers listing count check and addition ends    *************************

        //****************************    Admin Primary email fetch starts    *************************

        $admin_primary_email_fetch = mysqli_query($conn,"SELECT * FROM " . TBL . "footer  WHERE footer_id = '1' ");
        $admin_primary_email_fetchrow = mysqli_fetch_array($admin_primary_email_fetch);
        $admin_primary_email = $admin_primary_email_fetchrow['admin_primary_email'];
        $admin_footer_copyright = $admin_primary_email_fetchrow['footer_copyright'];
        $admin_site_name = $admin_primary_email_fetchrow['website_address'];
        $admin_address = $admin_primary_email_fetchrow['footer_address'];

        //****************************    Admin Primary email fetch ends    *************************


        if ($lisupres) {

            $admin_email = $admin_primary_email; // Admin Email Id

            $webpage_full_link_with_login = $webpage_full_link. "login";  //URL Login Link

//****************************    Admin email starts    *************************

            $to = $admin_email;
            $LISTING_INSERT_ADMIN_SUBJECT =  $BIZBOOK['LISTING_INSERT_ADMIN_SUBJECT'];
            $subject = "$admin_site_name $LISTING_INSERT_ADMIN_SUBJECT";
            

            $admin_sql_fetch = mysqli_query($conn,"SELECT * FROM " . TBL . "mail  WHERE mail_id = 7 "); //User mail template fetch
            $admin_sql_fetch_row = mysqli_fetch_array($admin_sql_fetch);

            $mail_template_admin = $admin_sql_fetch_row['mail_template'];

            $message1 =   stripslashes(str_replace(array('\'.$admin_site_name.\'', '\' . $first_name . \'', '\' . $email_id . \''
         ,'\' . $mobile_number . \'', '\' . $listing_name . \'', '\' . $listing_email . \'', '\' . $listing_mobile . \'', '\'.$admin_footer_copyright.\'', '\'.$admin_address.\'', '\'.$webpage_full_link.\'','\'.$webpage_full_link_with_login.\'','\'.$admin_primary_email.\''),
                array(''.$admin_site_name.'', '' . $first_name . '', '' . $email_id . '','' . $mobile_number . '', '' . $listing_name . '', '' . $listing_email . '', '' . $listing_mobile . '', ''.$admin_footer_copyright.'', ''.$admin_address.'', ''.$webpage_full_link.'',''.$webpage_full_link_with_login.'',''.$admin_primary_email.''), $mail_template_admin));


            $headers = "From: " . "$email_id" . "\r\n";
            $headers .= "Reply-To: " . "$email_id" . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=utf-8\r\n";


            mail($to, $subject, $message1, $headers); //admin email


//****************************    Admin email ends    *************************

//****************************    Client email starts    *************************

            $to1 = $email_id;
            $LISTING_INSERT_CLIENT_SUBJECT =  $BIZBOOK['LISTING_INSERT_CLIENT_SUBJECT'];
            $subject1 = "$admin_site_name $LISTING_INSERT_CLIENT_SUBJECT";

            $client_sql_fetch = mysqli_query($conn,"SELECT * FROM " . TBL . "mail  WHERE mail_id = 6 "); //User mail template fetch
            $client_sql_fetch_row = mysqli_fetch_array($client_sql_fetch);

            $mail_template_client = $client_sql_fetch_row['mail_template'];

               $message2 =   stripslashes(str_replace(array('\'.$admin_site_name.\'', '\' . $first_name . \'', '\' . $email_id . \''
            ,'\' . $mobile_number . \'', '\' . $listing_name . \'', '\' . $listing_email . \'', '\' . $listing_mobile . \'', '\'.$admin_footer_copyright.\'', '\'.$admin_address.\'', '\'.$webpage_full_link.\'','\'.$webpage_full_link_with_login.\'','\'.$admin_primary_email.\''),
                array(''.$admin_site_name.'', '' . $first_name . '', '' . $email_id . '','' . $mobile_number . '', '' . $listing_name . '', '' . $listing_email . '', '' . $listing_mobile . '', ''.$admin_footer_copyright.'', ''.$admin_address.'', ''.$webpage_full_link.'',''.$webpage_full_link_with_login.'',''.$admin_primary_email.''), $mail_template_client));
            

            $headers1 = "From: " . "$admin_email" . "\r\n";
            $headers1 .= "Reply-To: " . "$admin_email" . "\r\n";
            $headers1 .= "MIME-Version: 1.0\r\n";
            $headers1 .= "Content-Type: text/html; charset=utf-8\r\n";


            mail($to1, $subject1, $message2, $headers1); //admin email

//****************************    client email ends    *************************


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
            
            header('Location: add-listing-step-6?code='.$ListCode);
        } else {

            $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

            header('Location: add-listing-step-new-1');
        }

        //    Listing Insert Part Ends

    }
}else {

    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];

    header('Location: add-listing-step-new-1');
}