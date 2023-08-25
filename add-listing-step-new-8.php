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

// Bussiness Details
$_SESSION['appr_method'] = $_POST["appr_method"];
$_SESSION['language'] = $_POST["language"];
$_SESSION['ser_special'] = $_POST["ser_special"];
$_SESSION['pet_frie'] = $_POST["pet_frie"];
$_SESSION['ser_deli_method'] = $_POST["ser_deli_method"];
$_SESSION['age_group'] = $_POST["age_group"];
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
                            <a href="add-listing-step-new-7" >
                                <span><?php echo $BIZBOOK['STEP7']; ?></span>
                                <b><?php echo $BIZBOOK['BUSINESS_DETAILS']; ?></b>
                            </a>
                        </li>
                         <li>
                            <a href="add-listing-step-new-8" class="act">
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
                <span class="steps"><?php echo $BIZBOOK['STEP5']; ?></span>
                <div class="log">
                    <div class="login add-lis-oth">

                        <h4><?php echo $BIZBOOK['OTHER_INFORMATIONS']; ?></h4>
                        <span class="add-list-add-btn lis-add-oad" title="add new offer">+</span>
                        <span class="add-list-rem-btn lis-add-ore" title="remove offer">-</span>
                        <form action="listing_insert_new.php" class="listing_form" id="listing_form_5" name="listing_form_5"
                              method="post" enctype="multipart/form-data">
                            <ul>
                                <?php
                                $listings_a_row_listing_info_question = $_SESSION['listing_info_question'];
                                $listings_a_row_listing_info_answer = $_SESSION['listing_info_answer'];
                                
                                $listings_a_row_listing_info_question_count = isset($listings_a_row_listing_info_question) ? count($listings_a_row_listing_info_question) : 0; //Get count of array

                                if ($listings_a_row_listing_info_question_count != 0) {

                                    $zipped = array_map(null, $listings_a_row_listing_info_question, $listings_a_row_listing_info_answer);

                                    foreach ($zipped as $tuple) {
                                        $tuple[0]; // Info question
                                        $tuple[1]; // Info Answer

                                        ?>
                                        <li>
                                            <!--FILED START-->
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <input type="text" name="listing_info_question[]"
                                                               value="<?php echo $tuple[0]; ?>" class="form-control"
                                                               placeholder="<?php echo $BIZBOOK['OTHER_INFORMATIONS_PLACEHOLDER_LEFT']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <i class="material-icons">arrow_forward</i>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <input type="text" name="listing_info_answer[]"
                                                               value="<?php echo $tuple[1]; ?>" class="form-control"
                                                               placeholder="<?php echo $BIZBOOK['OTHER_INFORMATIONS_PLACEHOLDER_RIGHT']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--FILED END-->
                                        </li>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <li>
                                        <!--FILED START-->
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="text" name="listing_info_question[]"
                                                           class="form-control"
                                                           placeholder="<?php echo $BIZBOOK['OTHER_INFORMATIONS_PLACEHOLDER_LEFT']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <i class="material-icons">arrow_forward</i>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="text" name="listing_info_answer[]" class="form-control"
                                                           placeholder="<?php echo $BIZBOOK['OTHER_INFORMATIONS_PLACEHOLDER_RIGHT']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!--FILED END-->
                                    </li>
                                    <?php
                                }
                                ?>

                            </ul>
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="add-listing-step-4">
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