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

if ($listing_count_user >= $plan_type_listing_count) {

    $_SESSION['status_msg'] = $BIZBOOK['LISTINGS_LIMIT_EXCEED_MESSAGE'];

    header('Location: db-all-listing');
}
//To check the listings count with current plan ends

//Get & Process Listing Data


if (isset($_POST['listing_submit'])) {

// Basic Personal Details
    // $_SESSION['first_name'] = $_POST["first_name"];
    // $_SESSION['last_name'] = $_POST["last_name"];
    // $_SESSION['mobile_number'] = $_POST["mobile_number"];
    // $_SESSION['email_id'] = $_POST["email_id"];

    $_SESSION['register_mode'] = "Direct";
    $_SESSION['user_status'] = "Inactive";

// Common Listing Details
    $_SESSION['listing_name'] = $_POST["listing_name"];
    $_SESSION['abn_number'] = $_POST["abn_number"];
    $_SESSION['organi_type'] = $_POST["organi_type"];
    $_SESSION['ndis_reg'] = $_POST["ndis_reg"];
    $_SESSION['reg_number'] = $_POST["reg_number"];
    $_SESSION['ndis_early_child'] = $_POST["ndis_early_child"];
    $_SESSION['com_land_num'] = $_POST["com_land_num"];
    $_SESSION['com_phone_1'] = $_POST["com_phone_1"];
    $_SESSION['com_phone_2'] = $_POST["com_phone_2"];
    $_SESSION['comp_email'] = $_POST["comp_email"];
    $_SESSION['com_website'] = $_POST["com_website"];
    $_SESSION['primary_location'] = $_POST["primary_location"];
    $_SESSION['face_url'] = $_POST["face_url"];
    $_SESSION['insta_url'] = $_POST["insta_url"];
    $_SESSION['twi_url'] = $_POST["twi_url"];
    $_SESSION['link_url'] = $_POST["link_url"];
    $_SESSION['reg_group'] = $_POST["reg_group"];
    $_SESSION['listing_description'] = $_POST["listing_description"];
//        $state_id = $_POST["state_id"];


    // $_SESSION['state_id'] = "1";

    // $_SESSION['city_id'] = $_POST["city_id"];


    //************************  Register stamp Image Upload starts  **************************

    if (!empty($_FILES['reg_stamp']['name'])) {
        $file = rand(1000, 100000) . $_FILES['reg_stamp']['name'];
        $file_loc = $_FILES['reg_stamp']['tmp_name'];
        $file_size = $_FILES['reg_stamp']['size'];
        $file_type = $_FILES['reg_stamp']['type'];
        $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
        if(in_array($file_type, $allowed)) {
            $folder = "images/listings/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $event_image = str_replace(' ', '-', $new_file_name);
            //move_uploaded_file($file_loc, $folder . $event_image);
            $reg_stamp_image = compressImage($event_image, $file_loc, $folder, $new_size);
        }else{
            $reg_stamp_image = '';
        }
    }

    $_SESSION['reg_stamp_image'] = $reg_stamp_image;
//************************ Register stamp Image Upload Ends  **************************


    //************************  Profile Image Upload starts  **************************

    if (!empty($_FILES['profile_image']['name'])) {
        $file = rand(1000, 100000) . $_FILES['profile_image']['name'];
        $file_loc = $_FILES['profile_image']['tmp_name'];
        $file_size = $_FILES['profile_image']['size'];
        $file_type = $_FILES['profile_image']['type'];
        $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
        if(in_array($file_type, $allowed)) {
            $folder = "images/listings/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $event_image = str_replace(' ', '-', $new_file_name);
            //move_uploaded_file($file_loc, $folder . $event_image);
            $profile_image = compressImage($event_image, $file_loc, $folder, $new_size);
        }else{
            $profile_image = '';
        }
    }

    $_SESSION['profile_image'] = $profile_image;

//************************  Profile Image Upload Ends  **************************

//************************  Cover Image Upload starts  **************************

    if (!empty($_FILES['cover_image']['name'])) {
        $file = rand(1000, 100000) . $_FILES['cover_image']['name'];
        $file_loc = $_FILES['cover_image']['tmp_name'];
        $file_size = $_FILES['cover_image']['size'];
        $file_type = $_FILES['cover_image']['type'];
        $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
        if(in_array($file_type, $allowed)) {
            $folder = "images/listing-ban/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $event_image = str_replace(' ', '-', $new_file_name);
            //move_uploaded_file($file_loc, $folder . $event_image);
            $cover_image = compressImage($event_image, $file_loc, $folder, $new_size);
        }else{
            $cover_image = '';
        }
    }

    $_SESSION['cover_image'] = $cover_image;

    //print_r($_SESSION);die;

//************************  Cover Image Upload ends  **************************


if ($_SESSION['listing_name'] == NULL || empty($_SESSION['listing_name'])) {
    header('Location: add-listing-step-new-1');
}
}

?>


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
                            <a href="add-listing-step-new-2" class="act">
                                <span><?php echo $BIZBOOK['STEP2']; ?></span>
                                <b>Service Offered</b>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <span><?php echo $BIZBOOK['STEP3']; ?></span>
                                <b><?php echo $BIZBOOK['SER-LOCATION']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
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
                            <a href="#!">
                                <span><?php echo $BIZBOOK['STEP5']; ?></span>
                                <b><?php echo $BIZBOOK['MAP_PHOTO_GALLARY']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
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
            <div class="login-main add-list ">
                <div class="log-bor">&nbsp;</div>
                <span class="steps"><?php echo $BIZBOOK['STEP2']; ?></span>
                <div class="log">
                    <div class="login">
                        <h4>Service Offered</h4>
                        <?php include "page_level_message.php"; ?>
                        <!-- <span class="add-list-add-btn lis-ser-add-btn" title="add new offer">+</span>
                        <span class="add-list-rem-btn lis-ser-rem-btn" title="remove offer">-</span> -->
                        <form action="add-listing-step-new-3.php" class="listing_form_2" id="listing_form_2"
                              name="listing_form_2" method="post" enctype="multipart/form-data">

                            <input id="listing_name" name="listing_name" type="hidden"
                                   value="<?php echo $_SESSION['listing_name']; ?>"
                                   required="required" class="validate">

                            <input id="abn_number" name="abn_number" type="hidden"
                                   value="<?php echo $_SESSION['abn_number']; ?>"
                                   required="required" class="validate">

                            <input id="organi_type" name="organi_type" type="hidden"
                                   value="<?php echo $_SESSION['organi_type']; ?>"
                                   required="required" class="validate">


                            <input id="ndis_reg" name="ndis_reg" type="hidden"
                                   value="<?php echo $_SESSION['ndis_reg']; ?>"
                                   required="required" class="validate">

                            <input id="reg_number" name="reg_number" type="hidden"
                                   value="<?php echo $_SESSION['reg_number']; ?>"
                                   required="required" class="validate">

                            <input id="ndis_early_child" name="ndis_early_child" type="hidden"
                                   value="<?php echo $_SESSION['ndis_early_child']; ?>"
                                   required="required" class="validate">

                            <input id="com_land_num" name="com_land_num" type="hidden"
                                   value="<?php echo $_SESSION['com_land_num']; ?>"
                                   required="required" class="validate">

                            <input id="com_phone_1" name="com_phone_1"
                                   value="<?php echo $_SESSION['com_phone_1']; ?>"
                                   required="required" type="hidden" class="validate">

                            <input id="com_phone_2" name="com_phone_2"
                            value="<?php echo $_SESSION['com_phone_2']; ?>"
                            required="required" type="hidden" class="validate">

                            <input id="comp_email" name="comp_email" value="<?php echo $_SESSION['comp_email']; ?>"
                                   required="required"
                                   type="hidden" class="validate">

                            <!-- <input id="comp_email" name="comp_email" value="<?php echo $_SESSION['comp_email']; ?>"
                                   required="required"
                                   type="hidden" class="validate"> -->

                            <input id="com_website" name="com_website"
                                   value="<?php echo $_SESSION['com_website']; ?>" required="required"
                                   type="hidden" class="validate">

                            <input id="primary_location" name="primary_location" value="<?php echo $_SESSION['primary_location']; ?>"
                                   required="required"
                                   type="hidden" class="validate">
                            
                            <input id="face_url" name="face_url" value="<?php echo $_SESSION['face_url']; ?>"
                            required="required"
                            type="hidden" class="validate">

                            <input id="insta_url" name="insta_url" value="<?php echo $_SESSION['insta_url']; ?>"
                                   required="required"
                                   type="hidden" class="validate">

                            <input id="twi_url" name="twi_url" value="<?php echo $_SESSION['twi_url']; ?>"
                            required="required"
                            type="hidden" class="validate">

                            <input id="link_url" name="link_url" value="<?php echo $_SESSION['link_url']; ?>"
                            required="required"
                            type="hidden" class="validate">

                            <input id="reg_group" name="reg_group" value="<?php echo $_SESSION['reg_group']; ?>"
                            required="required"
                            type="hidden" class="validate">

                            <input id="reg_stamp" name="reg_stamp" value="<?php echo $_SESSION['reg_stamp_image']; ?>"
                            required="required"
                            type="hidden" class="validate">

                            <input id="profile_image" name="profile_image"
                                   value="<?php echo $_SESSION['profile_image']; ?>" required="required"
                                   type="hidden" class="validate">

                            <input id="cover_image" name="cover_image" value="<?php echo $_SESSION['cover_image']; ?>"
                                   required="required"
                                   type="hidden" class="validate">

                            <input id="listing_description" name="listing_description" type="hidden"
                            value="<?php echo $_SESSION['listing_description']; ?>"
                            required="required" class="validate">

                            <!--FILED START-->
                            <div class="row" id="reg_group" style="">
                            <?php foreach(getAllCategories() as $row) { ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                       <label><?php echo $row['category_name']?>:</label>
                                       <!-- <input type="hidden" -->
                                       <?php foreach(getCategorySubCategories($row['category_id']) as $subrow)  { ?>
                      
                                        
                                        <div class="chbox">
                                        <?php 
                                        if($_SESSION['ser_offer']) {?>
                                            <input type="checkbox" name="sub_category_id[]" value="<?php echo $subrow['sub_category_id']; ?>"  <?php if (in_array($subrow, $_SESSION['ser_offer'])) echo 'checked="checked"'; ?> class="feature_check" id="suppOffr<?php echo $subrow['sub_category_id']; ?>"/>
                                            <label for="suppOffr<?php echo $subrow['sub_category_id']; ?>"><?php echo $subrow['sub_category_name']; ?></label>
                                            <?php } else {?>
                                            <input type="checkbox" name="sub_category_id[]" value="<?php echo $subrow['sub_category_id']; ?>" class="feature_check" id="suppOffr<?php echo $subrow['sub_category_id']; ?>"/>
                                            <label for="suppOffr<?php echo $subrow['sub_category_id']; ?>"><?php echo $subrow['sub_category_name']; ?></label>
                                            <?php } ?>
                                           
                                        </div>
                                        <?php } ?>                                   
                                    </div>                            
                                </div>
                                <?php } ?>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="add-listing-step-new-1">
                                        <button type="button"
                                                class="btn btn-primary"><?php echo $BIZBOOK['PREVIOUS']; ?></button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="listing_submit"
                                            class="btn btn-primary"><?php echo $BIZBOOK['NEXT']; ?></button>
                                </div>
                                <div class="col-md-12">
                                    <a href="add-listing-step-new-3" class="skip"><?php echo $BIZBOOK['SKIP_THIS']; ?>
                                        >></a>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--PROGRESSBAR START-->
                            <div class="progress biz-prog">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width:20%">20%</div>
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


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/select-opt.js"></script>
<script type="text/javascript">var webpage_full_link = '<?php echo $webpage_full_link;?>';</script>
<script type="text/javascript">var login_url = '<?php echo $LOGIN_URL;?>';</script>
<script src="js/custom.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/custom_validation.js"></script> -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/select-opt.js"></script>
<script type="text/javascript">var webpage_full_link ='<?php echo $webpage_full_link;?>';</script>
<script type="text/javascript">var login_url ='<?php echo $LOGIN_URL;?>';</script>
<script src="js/custom.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/custom_validation.js"></script>
<script>
    function getSubCategory(val) {
        $.ajax({
            type: "POST",
            url: "sub_category_process.php",
            data: 'category_id=' + val,
            success: function (data) {
                $("#sub_category_id").html(data);
                $('#sub_category_id').trigger("chosen:updated");
            }
        });
    }
</script>
</body>
</html>