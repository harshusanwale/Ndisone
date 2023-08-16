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
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (isset($_POST['listing_submit'])) {
   
// Service Provided Details
    $_SESSION['days'] = $_POST["days"];
    // print_r(json_encode($_SESSION['days']));die;
    // $_SESSION['360_view'] = $_POST["360_view"];
    // $_SESSION['listing_video'] = $_POST["listing_video"];

    // ************************  Gallery Image Upload starts  **************************   

    // $all_gallery_image = $_FILES['gallery_image'];
    // $all_gallery_image23 = $_FILES['gallery_image']['name'];

    // for ($k = 0; $k < count($all_gallery_image23); $k++) {


    //     if (!empty($all_gallery_image['name'][$k])) {
    //         $file1 = rand(1000, 100000) . $all_gallery_image['name'][$k];
    //         $file_loc1 = $all_gallery_image['tmp_name'][$k];
    //         $file_size1 = $all_gallery_image['size'][$k];
    //         $file_type1 = $all_gallery_image['type'][$k];
    //         $allowed = array("image/jpeg", "image/pjpeg", "image/png", "image/gif", "image/webp", "image/svg", "application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.wordprocessingml.template");
    //         if(in_array($file_type1, $allowed)) {
    //             $folder1 = "images/listings/";
    //             $new_size = $file_size1 / 1024;
    //             $new_file_name1 = strtolower($file1);
    //             $event_image1 = str_replace(' ', '-', $new_file_name1);
    //             //move_uploaded_file($file_loc1, $folder1 . $event_image1);
    //             $gallery_image1[] = compressImage($event_image1, $file_loc1, $folder1, $new_size);
    //         }else{
    //             $gallery_image1[] = '';
    //         }
    //     }
    //     if($gallery_image1 != NULL){
    //         $gallery_image = implode(",", $gallery_image1);
    //         }else{
    //             $gallery_image = '';
    //         }
    // }

// ************************  Gallery Image Upload ends  **************************   

    // $_SESSION['gallery_image'] = $gallery_image;
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
                            <a href="add-listing-step-new-2">
                                <span><?php echo $BIZBOOK['STEP2']; ?></span>
                                <b><?php echo $BIZBOOK['SERVICES']; ?></b>
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
                                <b><?php echo $BIZBOOK['WPR_HOURS']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="add-listing-step-new-5" class="act">
                                <span><?php echo $BIZBOOK['STEP5']; ?></span>
                                <b><?php echo $BIZBOOK['OTHER']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <span><?php echo $BIZBOOK['STEP6']; ?></span>
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
                <span class="steps"><?php echo $BIZBOOK['STEP5']; ?></span>
                <div class="log">
                    <div class="login add-lis-oth">

                        <h4><?php echo $BIZBOOK['OTHER_INFORMATIONS']; ?></h4>
                        <!-- <span class="add-list-add-btn lis-add-oad" title="add new offer">+</span>
                        <span class="add-list-rem-btn lis-add-ore" title="remove offer">-</span> -->
                        <form action="listing_insert_new.php" class="listing_form" id="listing_form_5" name="listing_form_5"
                              method="post" enctype="multipart/form-data">
                              <input id="days" name="days" value="<?php echo $_SESSION['days']; ?>"
                                required="required"
                                type="hidden" class="validate">
                            <ul>                                               
                            <li>
                            <!--FILED START-->
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Approach Method:</label>
                                    <select name="appr_method" id="appr_method" class="form-control colorBackground ca-check-plan empty valid">
                                            <option value="">--Select--</option>
                                            <option value="1" <?php ($_SESSION['appr_method'] == 1) ? "selected" : "";?>>Online</option>
                                            <option value="2" <?php ($_SESSION['appr_method'] == 2) ? "selected" : "";?>>Telehealth</option>
                                            <option value="3" <?php ($_SESSION['appr_method'] == 3) ? "selected" : "";?>>We come to you</option>
                                            <option value="4" <?php ($_SESSION['appr_method'] == 4) ? "selected" : "";?>>You come to us</option>                                        
                                    </select>
                                </div>
                                </div>
                             </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Languages:</label>
                                    <select name="language" id="language" class="form-control colorBackground ca-check-plan" >
                                        <option value="">--Select--</option>
                                        <?php foreach (getAllLanguages() as $Lrow) { ?>
                                            <option value="<?php echo $Lrow['id']; ?>"  <?php ($_SESSION['language'] == $Lrow['id']) ? "selected" : "";?>><?php echo $Lrow['language_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                </div>
                             </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Service Specilisation:</label>
                                    <select name="ser_special" id="ser_special" class="form-control colorBackground ca-check-plan empty valid">
                                            <option value="">--Select--</option>
                                            <option value="1"  <?php ($_SESSION['ser_special'] == 1) ? "selected" : "";?>>Aboriginal and Torres Strait Islander</option>
                                            <option value="2"  <?php ($_SESSION['ser_special'] == 2) ? "selected" : "";?>>LGBTIQ+</option>
                                            <option value="3" <?php ($_SESSION['ser_special'] == 3) ? "selected" : "";?>>Autism</option>
                                            <option value="4" <?php ($_SESSION['ser_special'] == 4) ? "selected" : "";?>>CALD</option>
                                            <option value="5" <?php ($_SESSION['ser_special'] == 5) ? "selected" : "";?>>Intellectual Disability</option> 
                                            <option value="6" <?php ($_SESSION['ser_special'] ==  6)? "selected" : "";?>>Psychosocial Disability</option> 
                                            <option value="7" <?php ($_SESSION['ser_special'] ==  7)? "selected" : "";?>>Sensory Impairment</option>                                           
                                    </select>
                                </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Pet friendly !:</label>
                                    <select name="pet_frie" id="pet_frie" class="form-control colorBackground ca-check-plan empty valid">
                                            <option value="">--Select--</option>
                                            <option value="1" <?php ($_SESSION['pet_frie'] == 1) ? "selected" : "";?>>Happy</option>
                                            <option value="2" <?php ($_SESSION['pet_frie'] == 2) ? "selected" : "";?>>Not Happy</option>
                                            <option value="3" <?php ($_SESSION['pet_frie'] == 3) ? "selected" : "";?>>No preference</option>                                        
                                    </select>
                                </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            </li>
                            </ul>
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="add-listing-step-new-4">
                                        <button type="button"
                                                class="btn btn-primary"><?php echo $BIZBOOK['PREVIOUS']; ?></button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="listing_submit"
                                            class="btn btn-primary"><?php echo $BIZBOOK['FINISH']; ?></button>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--PROGRESSBAR START-->
                            <div class="progress biz-prog">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width:90%">90%</div>
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
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">var webpage_full_link = '<?php echo $webpage_full_link;?>';</script>
<script type="text/javascript">var login_url = '<?php echo $LOGIN_URL;?>';</script>
<script src="js/custom.js"></script>
</body>

</html>