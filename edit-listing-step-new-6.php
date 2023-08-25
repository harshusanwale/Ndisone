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

//Get & Process Listing Data

if ($_GET['row'] == NULL && empty($_GET['row'])) {

    header("Location: db-all-listing");
}

if (!isset($_SESSION['listing_codea']) || empty($_SESSION['listing_codea'])) {
    $listing_codea = $_GET['row'];
} else {
    $listing_codea = $_SESSION['listing_codea'];
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
                            <a href="edit-listing-step-new-1?row=<?php echo $listing_codea; ?>">
                                <span><?php echo $BIZBOOK['STEP1']; ?></span>
                                <b><?php echo $BIZBOOK['BASIC_INFO']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-2?row=<?php echo $listing_codea; ?>" >
                                <span><?php echo $BIZBOOK['STEP2']; ?></span>
                                <b>Service Offered</b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-3?row=<?php echo $listing_codea; ?>" >
                                <span><?php echo $BIZBOOK['STEP3']; ?></span>
                                <b>Locations</b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-4?row=<?php echo $listing_codea; ?>">
                                <span><?php echo $BIZBOOK['STEP4']; ?></span>
                                <b><?php echo $BIZBOOK['SPECIAL_OFFERS']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-5?row=<?php echo $listing_codea; ?>">
                                <span><?php echo $BIZBOOK['STEP5']; ?></span>
                                <b><?php echo $BIZBOOK['MAP_PHOTO_GALLARY']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-6?row=<?php echo $listing_codea; ?>" class="act">
                                <span><?php echo $BIZBOOK['STEP6']; ?></span>
                                <b>Work Hours</b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-7?row=<?php echo $listing_codea; ?>">
                                <span><?php echo $BIZBOOK['STEP7']; ?></span>
                                <b><?php echo $BIZBOOK['BUSINESS_DETAILS']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-8?row=<?php echo $listing_codea; ?>">
                                <span><?php echo $BIZBOOK['STEP8']; ?></span>
                                <b><?php echo $BIZBOOK['OTHER']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-9?row=<?php echo $listing_codea; ?>">
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
                        <?php
                        $listings_a_row = getListing($listing_codea);
                        ?>
                        <form action="listing_update_new.php" class="listing_form_5" id="listing_form_5"
                              name="listing_form_5" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="src_path" value="edit-6"
                                   name="src_path" class="validate">
                            <input type="hidden" id="listing_codea" value="<?php echo $listing_codea; ?>"
                                   name="listing_codea" class="validate">
                            <input type="hidden" id="listing_code"
                                   value="<?php echo $listings_a_row['listing_code']; ?>"
                                   name="listing_code" class="validate">
                            <input type="hidden" id="listing_id" value="<?php echo $listings_a_row['listing_id']; ?>"
                                   name="listing_id" class="validate">
                            <input type="hidden" id="gallery_image_old"
                                   value="<?php echo $listings_a_row['gallery_image']; ?>" name="gallery_image_old"
                                   class="validate">

                            <!--FILED END-->
                            <h4>Work Hours</h4>
                            <!--FILED START-->
                            <div class="bor-box">
                                
                                <div class="row add-work-hrs">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Monday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="mon_is_open" class="chosen-select form-control">
                                                <option <?php if($listings_a_row['mon_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                <option <?php if($listings_a_row['mon_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="mon_open_time" class="chosen-select form-control">
                                                <option value="" >Open time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['mon_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['mon_open_time'] == '12:00 pm'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['mon_open_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['mon_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="mon_close_time" class="chosen-select form-control">
                                                <option value ="">Close time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['mon_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['mon_close_time'] == '12:00 pm'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['mon_close_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['mon_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row add-work-hrs">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Tuesday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="tue_is_open" class="chosen-select form-control">
                                                <option <?php if($listings_a_row['tue_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                <option <?php if($listings_a_row['tue_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="tue_open_time" class="chosen-select form-control">
                                                <option value ="">Open time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['tue_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['tue_open_time'] == '12:00 pm'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['tue_open_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['tue_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="tue_close_time" class="chosen-select form-control">
                                                <option value ="">Close time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['tue_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['tue_close_time'] == '12:00 pm'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['tue_close_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['tue_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row add-work-hrs">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Wednesday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="wed_is_open" class="chosen-select form-control">
                                                <option <?php if($listings_a_row['wed_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                <option <?php if($listings_a_row['wed_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="wed_open_time" class="chosen-select form-control">
                                                <option value ="">Open time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['wed_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['wed_open_time'] == '12:00 pm'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['wed_open_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['wed_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="wed_close_time" class="chosen-select form-control">
                                                <option value ="">Close time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['wed_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['wed_close_time'] == '12:00 pm'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['wed_close_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['wed_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row add-work-hrs">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Thursday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="thu_is_open" class="chosen-select form-control">
                                                <option <?php if($listings_a_row['thu_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                <option <?php if($listings_a_row['thu_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="thu_open_time" class="chosen-select form-control">
                                                <option value ="">Open time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['thu_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['thu_open_time'] == '12:00 am'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['thu_open_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['thu_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="thu_close_time" class="chosen-select form-control">
                                                <option value ="">Close time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['thu_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['thu_close_time'] == '12:00 am'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['thu_close_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['thu_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row add-work-hrs">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Friday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="fri_is_open" class="chosen-select form-control">
                                                <option <?php if($listings_a_row['fri_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                <option <?php if($listings_a_row['fri_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="fri_open_time" class="chosen-select form-control">
                                                <option value ="">Open time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['fri_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['fri_open_time'] == '12:00 pm'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['fri_open_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['fri_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="fri_close_time" class="chosen-select form-control">
                                                <option value ="">Close time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['fri_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['fri_close_time'] == '12:00 pm'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['fri_close_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['fri_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
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
                                                <option <?php if($listings_a_row['sat_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                <option <?php if($listings_a_row['sat_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="sat_open_time" class="chosen-select form-control">
                                                <option value ="">Open time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['sat_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['sat_open_time'] == '12:00 pm'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['sat_open_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['sat_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="sat_close_time" class="chosen-select form-control">
                                                <option value ="">Close time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['sat_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['sat_close_time'] == '12:00 pm'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['sat_close_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['sat_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row add-work-hrs">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Sunday</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="sun_is_open" class="chosen-select form-control">
                                                <option <?php if($listings_a_row['sun_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                <option <?php if($listings_a_row['sun_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="sun_open_time" class="chosen-select form-control">
                                                <option value ="">Open time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['sun_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['sun_open_time'] == '12:00 pm'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['sun_open_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['sun_open_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="sun_close_time" class="chosen-select form-control">
                                                <option value ="">Close time</option>
                                                <?php
                                                for ($i =6; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['sun_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                                <option <?php if($listings_a_row['sun_close_time'] == '12:00 pm'){ echo 'selected'; } ?> value="12:00 pm">12:00 pm</option>
                                                <?php
                                                for ($i =1; $i <= 11; $i++){?>
                                                    <option <?php if($listings_a_row['sun_close_time'] == $i.':00 pm'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 pm"><?php echo $i; ?>:00 pm</option>
                                                <?php } ?>
                                                <?php
                                                for ($i =1; $i <= 5; $i++){?>
                                                    <option <?php if($listings_a_row['sun_close_time'] == $i.':00 am'){ echo 'selected'; } ?> value="<?php echo $i; ?>:00 am"><?php echo $i; ?>:00 am</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--FILED END-->
                            

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="edit-listing-step-new-5?row=<?php echo $listing_codea; ?>">
                                        <button type="button"
                                                class="btn btn-primary"><?php echo $BIZBOOK['PREVIOUS']; ?></button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="listing_submit"
                                            class="btn btn-primary"><?php echo $BIZBOOK['SAVE_AND_EXIT']; ?></button>
                                </div>
                                <div class="col-md-12">
                                    <a href="edit-listing-step-new-7?row=<?php echo $listing_codea; ?>"
                                       class="skip"><?php echo $BIZBOOK['SKIP_THIS']; ?> >></a>
                                </div>
                                <div class="col-md-12">
                                    <a href="dashboard" class="skip"><?php echo $BIZBOOK['GO_TO_USER_DASHBOARD']; ?>
                                        >></a>
                                </div>
                            </div>
                            <!--FILED END-->
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
<!-- <script type="text/javascript" src="js/imageuploadify.min.js"></script> -->

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('input[type="file"]').imageuploadify();
    })
</script> -->
</body>

</html>