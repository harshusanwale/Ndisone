<?php
include "header.php";

if (file_exists('config/user_authentication.php')) {
    include('config/user_authentication.php');
}

if (file_exists('config/general_user_authentication.php')) {
    include('config/general_user_authentication.php');
}

if (file_exists('config/listing_page_authentication.php')) {
    include('config/listing_page_authentication.php');
}
//To check the listings count with current plan starts

$plan_type_listing_count = $user_plan_type['plan_type_listing_count'];
$listing_count_user = getCountUserListing($_SESSION['user_id']);

if($listing_count_user >= $plan_type_listing_count){

    $_SESSION['status_msg'] = $BIZBOOK['LISTINGS_LIMIT_EXCEED_MESSAGE'];

    header('Location: db-all-listing');
}
//To check the listings count with current plan ends

//Get & Process Listing Data
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (isset($_POST['listing_submit'])) {


// Service Provided Details
$_SESSION['google_map'] = $_POST["google_map"];
$_SESSION['360_view'] = $_POST["360_view"];
$_SESSION['listing_video'] = $_POST["listing_video"];

// ************************  Gallery Image Upload starts  **************************   

$all_gallery_image = $_FILES['gallery_image'];
$all_gallery_image23 = $_FILES['gallery_image']['name'];

for ($k = 0; $k < count($all_gallery_image23); $k++) {


    if (!empty($all_gallery_image['name'][$k])) {
        $file1 = rand(1000, 100000) . $all_gallery_image['name'][$k];
        $file_loc1 = $all_gallery_image['tmp_name'][$k];
        $file_size1 = $all_gallery_image['size'][$k];
        $file_type1 = $all_gallery_image['type'][$k];
        $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
        if(in_array($file_type1, $allowed)) {
            $folder1 = "images/listings/";
            $new_size = $file_size1 / 1024;
            $new_file_name1 = strtolower($file1);
            $event_image1 = str_replace(' ', '-', $new_file_name1);
            //move_uploaded_file($file_loc1, $folder1 . $event_image1);
            $gallery_image1[] = compressImage($event_image1, $file_loc1, $folder1, $new_size);
        }else{
            $gallery_image1[] = '';
        }
    }
    if($gallery_image1 != NULL){
        $gallery_image = implode(",", $gallery_image1);
        }else{
            $gallery_image = '';
        }
}

// ************************  Gallery Image Upload ends  **************************   

$_SESSION['gallery_image'] = $gallery_image;

}


?>
<style>
 .Monday,
.Tuesday,
.Wednesday,
.Thursday,
.Friday,
.Saturday,
.Sunday {
display: none;
}

.dinon {

display: block;

}

.diBlo {

display: none;

}
</style>
<!-- START -->
<!--PRICING DETAILS-->
<section class="<?php if ($footer_row['admin_language'] == 2) {
    echo "lg-arb";
} ?> login-reg">
    <div class="container">
        <div class="row">
            <div class="add-list-ste">
                <div class="add-list-ste-inn">
                    <ul>
                    <li>
                            <a href="add-listing-step-new-1">
                                <span><?php echo $BIZBOOK['STEP1']; ?></span>
                                <b><?php echo $BIZBOOK['BASIC_INFO']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="add-listing-step-new-2" >
                                <span><?php echo $BIZBOOK['STEP2']; ?></span>
                                <b>Service Offered</b>
                            </a>
                        </li>
                        <li>
                            <a href="add-listing-step-new-3">
                                <span><?php echo $BIZBOOK['STEP3']; ?></span>
                                <b><?php echo $BIZBOOK['SER-LOCATION']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="add-listing-step-new-4">
                                <span><?php echo $BIZBOOK['STEP4']; ?></span>
                                <b><?php echo $BIZBOOK['SPECIAL_OFFERS']; ?></b>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#!">
                                <span><?php echo $BIZBOOK['STEP4']; ?></span>
                                <b><?php echo $BIZBOOK['WPR_HOURS']; ?></b>
                            </a>
                        </li> -->
                        <!-- <li>
                            <a href="#!">
                                <span><?php echo $BIZBOOK['STEP5']; ?></span>
                                <b><?php echo $BIZBOOK['OTHER']; ?></b>
                            </a>
                        </li> -->
                        <li>
                            <a href="add-listing-step-new-5" >
                                <span><?php echo $BIZBOOK['STEP5']; ?></span>
                                <b><?php echo $BIZBOOK['MAP_PHOTO_GALLARY']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="add-listing-step-new-6" class="act">
                                <span><?php echo $BIZBOOK['STEP6']; ?></span>
                                <b><?php echo $BIZBOOK['WPR_HOURS']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <span><?php echo $BIZBOOK['STEP7']; ?></span>
                                <b><?php echo $BIZBOOK['BUSINESS_DETAILS']; ?></b>
                            </a>
                        </li>
                         <li>
                            <a href="#!">
                                <span><?php echo $BIZBOOK['STEP8']; ?></span>
                                <b><?php echo $BIZBOOK['OTHER']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <span><?php echo $BIZBOOK['STEP9']; ?></span>
                                <b><?php echo $BIZBOOK['DONE']; ?></b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="login-main add-list">
                <div class="log-bor">&nbsp;</div>
                <span class="steps"><?php echo $BIZBOOK['STEP6']; ?></span>
                <div class="log add-list-map">
                    <div class="login add-list-map">
                        <form action="add-listing-step-new-7.php" class="listing_form_4" id="listing_form_4"
                              name="listing_form_4" method="post" enctype="multipart/form-data">
                              
                              <input id="location" name="location" type="hidden"
                                   value="<?php echo $_SESSION['location']; ?>"
                                   required="required" class="validate">

                            <!--FILED START-->
                            <h4>Working Hours</h4>
                            
                            <?php 
                             //$si = 1;
                           //foreach(getAllAvailTime() as $row) {?>
                            <!-- <ul>                    
                            <li>
                                <div class="col-md-12">
                                    <div class="form-group chbox">
                                        //<input type="checkbox" name="days[][day]" value="" class="feature_check" id="<?php echo  $row['avail_time_name'].$si ;?>" />
                                        <label for="<?php echo  $row['avail_time_name'].$si ;?>"></label>
                                        <div class="">
                                            <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                            <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                        </div>
                                    </div>
                                </div>
                            </li>                            
                        </ul> -->
                        <div class="row add-work-hrs">
                        <div class="col-md-3">
                            <div class="form-group ">
                            <!-- //<input type="checkbox" name="mon_check"  class="feature_check" id="" /> -->
                                <label for="">Monday</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="mon_is_open" class="chosen-select form-control">
                                    <option selected="selected" value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="mon_open_time" class="chosen-select form-control">
                                    <option value="">Open time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="mon_close_time" class="chosen-select form-control">
                                    <option value="">Close time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row add-work-hrs">
                        <div class="col-md-3">
                            <div class="form-group ">
                            <!-- //<input type="checkbox" name="tue_check"  class="feature_check" id="<?php echo  $row['avail_time_name'].$si ;?>" /> -->
                                <label for="">Tuesday</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="tue_is_open" class="chosen-select form-control">
                                    <option selected="selected" value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="tue_open_time" class="chosen-select form-control">
                                    <option value="">Open time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="tue_close_time" class="chosen-select form-control">
                                    <option value="">Close time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row add-work-hrs">
                        <div class="col-md-3">
                            <div class="form-group">
                            <!-- //<input type="checkbox" name="wed_check"  class="feature_check" id="" /> -->
                                <label for="">Wednesday</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="wed_is_open" class="chosen-select form-control">
                                    <option selected="selected" value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="wed_open_time" class="chosen-select form-control">
                                    <option value="">Open time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="wed_close_time" class="chosen-select form-control">
                                    <option value="">Close time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row add-work-hrs">
                        <div class="col-md-3">
                            <div class="form-group ">
                            <!-- <input type="checkbox" name="thu_check"  class="feature_check" id="<?php //echo  $row['avail_time_name'].$si ;?>" /> -->
                                <label for="">Thursday</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="thu_is_open" class="chosen-select form-control">
                                    <option selected="selected" value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group chbox">
                                <select name="thu_open_time" class="chosen-select form-control">
                                    <option value="">Open time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="thu_close_time" class="chosen-select form-control">
                                    <option value="">Close time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row add-work-hrs">
                        <div class="col-md-3">
                            <div class="form-group ">
                            <!-- //<input type="checkbox" name="fri_check"  class="feature_check" id="<?php echo  $row['avail_time_name'].$si ;?>" /> -->
                                <label for="">Friday</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="fri_is_open" class="chosen-select form-control">
                                    <option selected="selected" value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="fri_open_time" class="chosen-select form-control">
                                    <option value="">Open time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="fri_close_time" class="chosen-select form-control">
                                    <option value="">Close time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row add-work-hrs">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Saturday</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="sat_is_open" class="chosen-select form-control">
                                    <option selected="selected" value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="sat_open_time" class="chosen-select form-control">
                                    <option value="">Open time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="sat_close_time" class="chosen-select form-control">
                                    <option value="">Close time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row add-work-hrs">
                        <div class="col-md-3">
                            <div class="form-group ">
                          
                                <label for="">Sunday</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="sun_is_open" class="chosen-select form-control">
                                    <option selected="selected" value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="sun_open_time" class="chosen-select form-control">
                                    <option value="">Open time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="sun_close_time" class="chosen-select form-control">
                                    <option value="">Close time</option>
                                    <?php
                                    for ($i =6; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                    <option value="12:00 pm">12:00 pm</option>
                                    <?php
                                    for ($i =1; $i <= 11; $i++){?>
                                        <option value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                    <?php } ?>
                                    <?php
                                    for ($i =1; $i <= 5; $i++){?>
                                        <option value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                        <?php //$si++;
                           // }  ?>
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="add-listing-step-new-6">
                                        <button type="button" class="btn btn-primary"><?php echo $BIZBOOK['PREVIOUS']; ?></button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="listing_submit" class="btn btn-primary"><?php echo $BIZBOOK['NEXT']; ?></button>
                                </div>
                                <div class="col-md-12">
                                    <a href="add-listing-step-new-7" class="skip"><?php echo $BIZBOOK['SKIP_THIS']; ?> >></a>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--PROGRESSBAR START-->
                            <div class="progress biz-prog">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width:60%">60%</div>
                            </div>
                            <!--PROGRESSBAR END-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END PRICING DETAILS-->
<?php
include "footer.php";
?>
<?php
include "google_address_api.php";
?>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">var webpage_full_link ='<?php echo $webpage_full_link;?>';</script>
<script type="text/javascript">var login_url ='<?php echo $LOGIN_URL;?>';</script>
<script type="text/javascript" src="js/imageuploadify.min.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('input[type="file"]').imageuploadify();
    })
</script>
<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').click(function() {
            var inputValue = $(this).attr("value");
            $("." + inputValue).toggle();
            var currentUl = $(this).closest("ul");
            var currentLi = currentUl.closest("li");
            if (currentUl.children("li").length > 1) {
                currentUl.find("li[class=removeable").remove();
            }
        });
    });
</script>
</body>

</html>