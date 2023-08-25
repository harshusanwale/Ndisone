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
        $work_hour_check = $_SESSION["work_hour_check"];
        $reg_stamp_checkbox = $_SESSION["reg_stamp_checkbox"];
        $_SESSION['listing_info_question'] = $_POST["listing_info_question"];
        $_SESSION['listing_info_answer'] = $_POST["listing_info_answer"];
       
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
        $listing_description = addslashes($_SESSION["listing_description"]);

        $twitter_link = $_SESSION["twi_url"];

        $link_url = $_SESSION["link_url"];

        $reg_group123 = $_SESSION["reg_group"];

        $prefix = $fruitList = '';
        foreach ($reg_group123 as $fruit)
        {
            $reg_group .= $prefix .  $fruit ;
            $prefix = ',';
        }

        //$category_id = $_SESSION["category_id"];
        $category_id = 30;

        $sub_category_id123 = $_SESSION["sub_category_id"];

        $prefix = $fruitList = '';
        foreach ($sub_category_id123 as $fruit)
        {
            $sub_category_id .= $prefix .  $fruit ;
            $prefix = ',';
        }
//Location Details
        $service_locations = json_encode($_SESSION["location"]);



// Listing Service Names Details

        $service_1_name123 = $_SESSION["service_1_name"];
                
        $service_1_name = implode("|",$service_1_name123);

        // Listing Offer Prices Details
        $service_1_price123 = $_SESSION["service_1_price"];

        $prefix1 = $fruitList = '';
        foreach ($service_1_price123 as $fruit1)
        {
            $service_1_price .= $prefix1 .  $fruit1 ;
            $prefix1 = ',';
        }
        $service_2_price = 0;
        $service_3_price = 0;
        $service_4_price = 0;
        $service_5_price = 0;
        $service_6_price = 0;

        // Listing Offer Details
        $service_1_detail123 = $_SESSION["service_1_detail"];

        $service_1_detail1 = implode("|",$service_1_detail123);
        $service_1_detail = addslashes($service_1_detail1);

        // Listing Offer View more link
        $service_1_view_more123 = $_SESSION["service_1_view_more"];
        $prefix1 = $fruitList = '';
        foreach ($service_1_view_more123 as $fruit1)
        {
            $service_1_view_more .= $prefix1 .  $fruit1 ;
            $prefix1 = ',';
        }

// Listing Location Details
        $google_map = $_SESSION["google_map"];
        $threesixty_view = $_SESSION["360_view"];

        // Listing Video
        $listing_video123 = $_SESSION['listing_video'];

        $prefix6 = $fruitList = '';
        foreach ($listing_video123 as $fruit6)
        {
            $listing_video1 = $prefix6 .  $fruit6 ;
            $listing_video .= addslashes($listing_video1);
            $prefix6 = '|';
        }

// Working Hours
        $mon_is_open = $_SESSION['mon_is_open'];
        $mon_open_time = $_SESSION['mon_open_time'];
        $mon_close_time = $_SESSION['mon_close_time'];
        $mon_check  =  $_SESSION['mon_check'];

        if($mon_check == "on"){
            $mon_check = 1 ; 
        }else{
            $mon_check = 0 ; 
        }

        $tue_is_open = $_SESSION['tue_is_open'];
        $tue_open_time = $_SESSION['tue_open_time'];
        $tue_close_time = $_SESSION['tue_close_time'];
        $tue_check      = $_SESSION['tue_check'];

        if($tue_check == "on"){
            $tue_check = 1 ; 
        }else{
            $tue_check = 0 ; 
        }

        $wed_is_open = $_SESSION['wed_is_open'];
        $wed_open_time = $_SESSION['wed_open_time'];
        $wed_close_time = $_SESSION['wed_close_time'];
        $wed_check = $_SESSION['wed_check'] ;

        if($wed_check == "on"){
            $wed_check = 1 ; 
        }else{
            $wed_check = 0 ; 
        }

        $thu_is_open = $_SESSION['thu_is_open'];
        $thu_open_time = $_SESSION['thu_open_time'];
        $thu_close_time = $_SESSION['thu_close_time'];
        $thu_check = $_SESSION['thu_check'];
        if($thu_check == "on"){
            $thu_check = 1 ; 
        }else{
            $thu_check = 0 ; 
        }

        $fri_is_open = $_SESSION['fri_is_open'];
        $fri_open_time = $_SESSION['fri_open_time'];
        $fri_close_time = $_SESSION['fri_close_time'];
        $fri_check = $_SESSION['fri_check'];
        if($fri_check == "on"){
            $fri_check = 1 ; 
        }else{
            $fri_check = 0 ; 
        }

        $sat_is_open = $_SESSION['sat_is_open'];
        $sat_open_time = $_SESSION['sat_open_time'];
        $sat_close_time = $_SESSION['sat_close_time'];
        $sat_check = $_SESSION['sat_check'];
        if($sat_check == "on"){
            $sat_check = 1 ; 
        }else{
            $sat_check = 0 ; 
        }

        $sun_is_open = $_SESSION['sun_is_open'];
        $sun_open_time = $_SESSION['sun_open_time'];
        $sun_close_time = $_SESSION['sun_close_time'];
        $sun_check =  $_SESSION['sun_check'];
        if($sun_check == "on"){
            $sun_check = 1 ; 
        }else{
            $sun_check = 0 ; 
        }
       

// Business Details
        //$language = $_SESSION["language"];
        $ser_special = $_SESSION["ser_special"];
        $pet_frie = $_SESSION["pet_frie"];
        $ser_deli_method =  $_SESSION['ser_deli_method'];
        $age_group =      $_SESSION['age_group'];
        $appr_method = $_SESSION["appr_method"];

         $language123 = $_SESSION["language"];
         $prefix1 = $fruitList = '';
         foreach ($language123 as $fruit1)
         {
             $language .= $prefix1 .  $fruit1 ;
             $prefix1 = ',';
         }

         //print_r($language);die;        
        //Listing Other Informations
        $listing_info_question123 = $_SESSION["listing_info_question"];
        $prefix1 = $fruitList = '';
        foreach ($listing_info_question123 as $fruit1)
        {
            $listing_info_question .= $prefix1 .  $fruit1 ;
            $prefix1 = ',';
        }

        $listing_info_answer123 = $_SESSION["listing_info_answer"];
        $prefix1 = $fruitList = '';
        foreach ($listing_info_answer123 as $fruit1)
        {
            $listing_info_answer .= $prefix1 .  $fruit1 ;
            $prefix1 = ',';
        }
        //print_r($_SESSION);die;

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

// ************************  Gallery Image Upload starts  **************************

$gallery_image = $_SESSION['gallery_image'];

// ************************  Gallery Image Upload ends  **************************   

// ************************  Service Image Upload starts  ************************** 

        $service_image = $_SESSION['service_image'];

// ************************  Service Image Upload ends  **************************

// ************************  Offer Image Upload Starts  **************************

        $service_1_image = $_SESSION['service_1_image'];



//    Listing Insert Part Starts
$listing_qry = "INSERT INTO " . TBL . "listings 
                (user_id, category_id, sub_category_id, listing_type_id, listing_name, listing_address, service_locations,
                fb_link, twitter_link, listing_status, payment_status, listing_slug, listing_cdt, abn_number, organi_type, ndis_regs, ndis_early_child, reg_number, reg_stamp, com_land_number,
                com_phone_1, com_phone_2, com_email, com_website, insta_url, linkd_url, reg_group, work_hours,
                appr_merhod, language, serv_specilisation, pet_frie,profile_image,cover_image,listing_description,service_1_name, service_1_price, service_1_detail, service_1_image, service_1_view_more, service_2_name,service_2_price, service_2_image, service_3_name,service_3_price, service_3_image
                 , service_4_name,service_4_price,service_4_image,service_5_name,service_5_price, service_5_image, service_6_name,service_6_price, service_6_image, gallery_image, opening_days, opening_time, closing_time,  gplus_link, google_map
                 , 360_view, listing_video,mon_is_open, mon_open_time, mon_close_time,mon_check, tue_is_open, tue_open_time, tue_close_time,tue_check, wed_is_open, wed_open_time, wed_close_time,wed_check
                 , thu_is_open, thu_open_time, thu_close_time,thu_check, fri_is_open, fri_open_time, fri_close_time,fri_check, sat_is_open, sat_open_time, sat_close_time,sat_check
                 , sun_is_open,sun_open_time, sun_close_time,sun_check,listing_info_question , listing_info_answer,ser_deli_method,age_group) 
                VALUES 
                ('$user_id', '$category_id', '$sub_category_id', '$listing_type_id', '$listing_name', '$primary_location', '$service_locations',
                '$fb_link', '$twitter_link', '$listing_status', '$payment_status', '$listing_slug', '$curDate', '$abn_number', '$organi_type', '$ndis_reg', '$ndis_early_child', '$reg_number', '$reg_stamp', '$com_land_num',
                '$com_phone_1', '$com_phone_2', '$comp_email', '$com_website', '$insta_url', '$link_url', '$reg_group', '$days',
                '$appr_method', '$language', '$ser_special', '$pet_frie','$profile_image','$cover_image','$listing_description','$service_1_name', '$service_1_price', '$service_1_detail', '$service_1_image', '$service_1_view_more', '$service_2_name', '$service_2_price', '$service_2_image', '$service_3_name', '$service_3_price', '$service_3_image'
                ,'$service_4_name', '$service_4_price', '$service_4_image', '$service_5_name', '$service_5_price', '$service_5_image', '$service_6_name', '$service_6_price', '$service_6_image','$gallery_image', '$opening_days', '$opening_time', '$closing_time','$gplus_link', '$google_map'
                ,'$threesixty_view', '$listing_video','$mon_is_open', '$mon_open_time','$mon_close_time','$mon_check', '$tue_is_open', '$tue_open_time', '$tue_close_time','$tue_check','$wed_is_open', '$wed_open_time', '$wed_close_time','$wed_check'
                , '$thu_is_open', '$thu_open_time', '$thu_close_time','$thu_check', '$fri_is_open', '$fri_open_time', '$fri_close_time','$fri_check' ,'$sat_is_open', '$sat_open_time', '$sat_close_time','$sat_check'
                , '$sun_is_open', '$sun_open_time', '$sun_close_time','$sun_check','$listing_info_question', '$listing_info_answer','$ser_deli_method','$age_group')";
        //print_r($listing_qry);die;

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
            unset($_SESSION['listing_description']);
            unset($_SESSION['service_1_name']);
            unset($_SESSION['service_1_price']);
            unset($_SESSION['service_1_detail']);
            unset($_SESSION['service_1_image']);
            
            unset($_SESSION['google_map']);
            unset($_SESSION['360_view']);
            unset($_SESSION['listing_video']);
            unset($_SESSION['gallery_image']);
            
            unset($_SESSION['listing_info_question']);
            unset($_SESSION['listing_info_answer']);

            unset($_SESSION['mon_is_open']);
            unset($_SESSION['mon_open_time']);
            unset($_SESSION['mon_close_time']);

            unset($_SESSION['tue_is_open']);
            unset($_SESSION['tue_open_time']);
            unset($_SESSION['tue_close_time']);

            unset($_SESSION['wed_is_open']);
            unset($_SESSION['wed_open_time']);
            unset($_SESSION['wed_close_time']);

            unset($_SESSION['thu_is_open']);
            unset($_SESSION['thu_open_time']);
            unset($_SESSION['thu_close_time']);

            unset($_SESSION['fri_is_open']);
            unset($_SESSION['fri_open_time']);
            unset($_SESSION['fri_close_time']);

            unset($_SESSION['sat_is_open']);
            unset($_SESSION['sat_open_time']);
            unset($_SESSION['sat_close_time']);

            unset($_SESSION['sun_is_open']);
            unset($_SESSION['sun_open_time']);
            unset($_SESSION['sun_close_time']);
               
            header('Location: add-listing-step-new-9?code='.$ListCode);
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