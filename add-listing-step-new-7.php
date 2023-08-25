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


//Working Hours Details
$_SESSION['mon_is_open'] = $_POST["mon_is_open"];
$_SESSION['mon_open_time'] = $_POST["mon_open_time"];
$_SESSION['mon_close_time'] = $_POST["mon_close_time"];
$_SESSION['mon_check'] = $_POST["mon_check"];

$_SESSION['tue_is_open'] = $_POST["tue_is_open"];
$_SESSION['tue_open_time'] = $_POST["tue_open_time"];
$_SESSION['tue_close_time'] = $_POST["tue_close_time"];
$_SESSION['tue_check'] = $_POST["tue_check"];

$_SESSION['wed_is_open'] = $_POST["wed_is_open"];
$_SESSION['wed_open_time'] = $_POST["wed_open_time"];
$_SESSION['wed_close_time'] = $_POST["wed_close_time"];
$_SESSION['wed_check'] = $_POST["wed_check"];

$_SESSION['thu_is_open'] = $_POST["thu_is_open"];
$_SESSION['thu_open_time'] = $_POST["thu_open_time"];
$_SESSION['thu_close_time'] = $_POST["thu_close_time"];
$_SESSION['thu_check'] = $_POST["thu_checke"];

$_SESSION['fri_is_open'] = $_POST["fri_is_open"];
$_SESSION['fri_open_time'] = $_POST["fri_open_time"];
$_SESSION['fri_close_time'] = $_POST["fri_close_time"];
$_SESSION['fri_check'] = $_POST["fri_close_time"];

$_SESSION['sat_is_open'] = $_POST["sat_is_open"];
$_SESSION['sat_open_time'] = $_POST["sat_open_time"];
$_SESSION['sat_close_time'] = $_POST["sat_close_time"];
$_SESSION['sat_check'] = $_POST["sat_check"];


$_SESSION['sun_is_open'] = $_POST["sun_is_open"];
$_SESSION['sun_open_time'] = $_POST["sun_open_time"];
$_SESSION['sun_close_time'] = $_POST["sun_close_time"];
$_SESSION['sun_check'] = $_POST["sun_check"];
//print_r($_SESSION);die;
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
                            <a href="add-listing-step-new-4" >
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
                            <a href="add-listing-step-new-5">
                                <span><?php echo $BIZBOOK['STEP5']; ?></span>
                                <b><?php echo $BIZBOOK['MAP_PHOTO_GALLARY']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="add-listing-step-new-6">
                                <span><?php echo $BIZBOOK['STEP6']; ?></span>
                                <b><?php echo $BIZBOOK['WPR_HOURS']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="add-listing-step-new-7" class="act">
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
                <span class="steps"><?php echo $BIZBOOK['STEP7']; ?></span>
                <div class="log">
                    <div class="login add-lis-oth">

                        <h4><?php echo $BIZBOOK['BUSINESS_DETAILS']; ?></h4>
                        <!-- <span class="add-list-add-btn lis-add-oad" title="add new offer">+</span>
                        <span class="add-list-rem-btn lis-add-ore" title="remove offer">-</span> -->
                        <form action="add-listing-step-new-8" class="listing_form" id="listing_form_5" name="listing_form_5"
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
                                    <select name="language[]" id="language" multiple class="chosen-select form-control colorBackground ca-check-plan" >
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
                             <!--FILED START-->
                             <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Service delivery method :</label>
                                    <select name="ser_deli_method" id="ser_deli_method" class="form-control colorBackground ca-check-plan empty valid">
                                            <option value="">--Select--</option>
                                            <option value="1"  <?php ($_SESSION['ser_deli_method'] == 1) ? "selected" : "";?>>Onliner</option>
                                            <option value="2"  <?php ($_SESSION['ser_deli_method'] == 2) ? "selected" : "";?>>Telecare</option>
                                            <option value="3" <?php ($_SESSION['ser_deli_method'] == 3) ? "selected" : "";?>>Group</option>
                                            <option value="4" <?php ($_SESSION['ser_deli_method'] == 4) ? "selected" : "";?>>We come to you</option>
                                            <option value="5" <?php ($_SESSION['ser_deli_method'] == 5) ? "selected" : "";?>>You come to us</option>                                      
                                    </select>
                                </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Which age group do you support? :</label>
                                    <select name="age_group" id="age_group" class="form-control colorBackground ca-check-plan empty valid">
                                            <option value="">--Select--</option>
                                            <option value="1"  <?php ($_SESSION['age_group'] == 1) ? "selected" : "";?>>Earlychildhood ( 0-7)</option>
                                            <option value="2"  <?php ($_SESSION['age_group'] == 2) ? "selected" : "";?>>Children (8-16)</option>
                                            <option value="3" <?php ($_SESSION['age_group'] == 3) ? "selected" : "";?>>Young ( 17-21)</option>
                                            <option value="4" <?php ($_SESSION['age_group'] == 4) ? "selected" : "";?>>Adults (22-59)</option>
                                            <option value="5" <?php ($_SESSION['age_group'] == 5) ? "selected" : "";?>>Mature Age ( 60+)</option>                                      
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
                                    <a href="add-listing-step-new-6">
                                        <button type="button"
                                                class="btn btn-primary"><?php echo $BIZBOOK['PREVIOUS']; ?></button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="listing_submit"
                                            class="btn btn-primary"><?php echo $BIZBOOK['NEXT']; ?></button>
                                </div>
                                <div class="col-md-12">
                                    <a href="add-listing-step-new-8" class="skip"><?php echo $BIZBOOK['SKIP_THIS']; ?>
                                        >></a>
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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/select-opt.js"></script>
<script type="text/javascript">var webpage_full_link = '<?php echo $webpage_full_link;?>';</script>
<script type="text/javascript">var login_url = '<?php echo $LOGIN_URL;?>';</script>
<script src="js/custom.js"></script>
</body>

</html>