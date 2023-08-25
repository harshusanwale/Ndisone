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

if ($_GET['row'] == NULL && empty($_GET['row'])) {

    header("Location: db-all-listing");
}

if (!isset($listings_a_row['listing_codea']) || empty($listings_a_row['listing_codea'])) {
    $listing_codea = $_GET['row'];
} else {
    $listing_codea = $listings_a_row['listing_codea'];
}

?>
<!-- START -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb1vGO92hZfS0oRzq9X9VhDJzz2BcqV0w&libraries=places"></script>

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
                            <a href="edit-listing-step-new-1?row=<?php echo $listing_codea; ?>" class="act">
                                <span><?php echo $BIZBOOK['STEP1']; ?></span>
                                <b><?php echo $BIZBOOK['BASIC_INFO']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-2?row=<?php echo $listing_codea; ?>">
                                <span><?php echo $BIZBOOK['STEP2']; ?></span>
                                <b>Service Offered</b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-3?row=<?php echo $listing_codea; ?>">
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
                            <a href="edit-listing-step-new-6?row=<?php echo $listing_codea; ?>">
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
                <span class="steps"><?php echo $BIZBOOK['STEP1']; ?></span>
                <div class="log">
                    <div class="login">
                        <h4><?php echo $BIZBOOK['LISTING_DETAILS']; ?></h4>
                        <?php include "page_level_message.php"; ?>
                        <?php
                        $listing_codea = $_GET['row'];
                        $listings_a_row = getListing($listing_codea);

                        ?>
                        <form action="listing_update_new.php" id="listing_form_1"
                              name="listing_form_1" method="post" enctype="multipart/form-data">

                            <input type="hidden" id="src_path" value="edit-1"
                                   name="src_path" class="validate">
                            <input type="hidden" id="listing_codea" value="<?php echo $listing_codea; ?>"
                                   name="listing_codea" class="validate">
                            <input type="hidden" id="listing_id" value="<?php echo $listings_a_row['listing_id']; ?>"
                                   name="listing_id" class="validate">
                            <input type="hidden" id="listing_code"
                                   value="<?php echo $listings_a_row['listing_code']; ?>"
                                   name="listing_code" class="validate">
                            <input type="hidden" id="reg_stamp_old"
                                   value="<?php echo $listings_a_row['reg_stamp']; ?>" name="reg_stamp_old"
                                   class="validate">
                            <input type="hidden" id="profile_image_old"
                            value="<?php echo $listings_a_row['profile_image']; ?>" name="profile_image_old"
                            class="validate">
                            <input type="hidden" id="cover_image_old"
                                   value="<?php echo $listings_a_row['cover_image']; ?>" name="cover_image_old"
                                   class="validate">
                         

                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="listing_name" name="listing_name" type="text" required="required"
                                               value="<?php echo $listings_a_row['listing_name']; ?>"
                                               class="form-control"
                                               placeholder="<?php echo $BIZBOOK['LISTING_NAME_STAR']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="abn_number" name="abn_number" type="text" required="required"
                                               class="form-control" value="<?php echo $listings_a_row['abn_number'] ?>"
                                               placeholder="<?php echo $BIZBOOK['ABN_NUMBER']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Organisation Type:</label>
                                    <select name="organi_type" id="organi_type" class="form-control colorBackground ca-check-plan empty valid">
                                            <option value="">--Select--</option>                                            
                                            <option value="1" <?php if($listings_a_row['organi_type'] == 1) {echo 'selected' ; }  ?>>Sole Trader</option>
                                            <option value="2"  <?php if($listings_a_row['organi_type'] == 2) {echo 'selected' ; }  ?>>Digital</option>
                                            <option value="3"  <?php if($listings_a_row['organi_type'] == 3) {echo 'selected' ; }  ?>>Agency</option>                                            
                                    </select>
                                </div>
                                </div>
                             </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Are you registered for NDIS?:</label>
                                    <select name="ndis_reg" id="ndis_reg" class="form-control colorBackground ca-check-plan empty valid">
                                            <option value="">--Select--</option>
                                            <option value="1" <?php if($listings_a_row['ndis_regs'] == 1) {echo "selected";}?>>Yes</option>
                                            <option value="2" <?php if($listings_a_row['ndis_regs'] == 2) {echo "selected" ;} ?>>NO</option>                                       
                                    </select>
                                </div>
                                </div>
                             </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <?php if($listings_a_row['ndis_reg'] != 2) {?>
                            <div class="row" id="question_class" >
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $BIZBOOK['REGSITRATION_NUMBER']; ?></label>
                                        <div class="fil-img-uplo">
                                        <input id="reg_number" name="reg_number" type="text" required="required"
                                               class="form-control" value="<?php echo $listings_a_row['reg_number'] ?>"
                                               placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $BIZBOOK['REGSITRATION_STAMP']; ?></label>
                                        <div class="fil-img-uplo">
                                            <span class="dumfil"><?php echo $BIZBOOK['UPLOAD_A_FILE'];  ?></span>
                                            <input type="file" name="reg_stamp" accept="image/*,.jpg,.jpeg,.png" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!--FILED END-->

                            <!--FILED START-->
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Are you registered for NDIS early Childhood?:</label>
                                    <select name="ndis_early_child" id="ndis_early_child" class="form-control colorBackground ca-check-plan empty valid">
                                            <option value="">--Select--</option>
                                            <option value="1"  <?php if($listings_a_row['ndis_early_child'] == 1) {echo "selected";}?>>Yes</option>
                                            <option value="2"  <?php if($listings_a_row['ndis_early_child'] == 2) { echo "selected" ;}?>>NO</option>                                       
                                    </select>
                                </div>
                                </div>
                             </div>
                            <!--FILED END-->

                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="com_land_num" class="form-control"
                                               value="<?php echo $listings_a_row['com_land_number'] ?>"
                                               placeholder="<?php echo $BIZBOOK['COM_LAND_NUMBER']; ?>*(This will be displayed on the listing )">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="com_phone_1" class="form-control"
                                               value="<?php echo $listings_a_row['com_phone_1'] ?>"
                                               placeholder="<?php echo $BIZBOOK['COM_PHONE_1']; ?>(alternate number)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="com_phone_2" class="form-control"
                                               value="<?php echo $listings_a_row['com_phone_2'] ?>" 
                                               placeholder="<?php echo $BIZBOOK['COM_PHONE_2']; ?>(alternate number)">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="comp_email" class="form-control"
                                               value="<?php echo $listings_a_row['com_email'] ?>"
                                               placeholder="<?php echo $BIZBOOK['COM_EMAIL']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="com_website" class="form-control"
                                               value="<?php echo $listings_a_row['com_website'] ?>"
                                               placeholder="<?php echo $BIZBOOK['COM_WEBSITE']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="primary_location" class="form-control location"
                                               value="<?php echo $listings_a_row['listing_address'] ?>" id="primary_location"
                                               placeholder="<?php echo $BIZBOOK['PRIMARY_LOCATION']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->

                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="face_url" class="form-control"
                                               value="<?php echo $listings_a_row['fb_link'] ?>"
                                               placeholder="<?php echo $BIZBOOK['FACE_URL']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="insta_url" class="form-control"
                                               value="<?php echo $listings_a_row['insta_url'] ?>" 
                                               placeholder="<?php echo $BIZBOOK['INSTA_URL']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="twi_url" class="form-control"
                                               value="<?php echo $listings_a_row['twitter_link'] ?>"
                                               placeholder="<?php echo $BIZBOOK['TWI_URL']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="link_url" class="form-control"
                                               value="<?php echo $listings_a_row['linkd_url'] ?>" 
                                               placeholder="<?php echo $BIZBOOK['LINK_URL']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="listing_description"
                                            name="listing_description"
                                            placeholder="<?php echo $BIZBOOK['DETAILS_ABOUT_LISTING']; ?>"><?php echo $listings_a_row['listing_description']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->

                             <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $BIZBOOK['CHOOSE_PROFILE_IMAGE']; ?></label>
                                        <div class="fil-img-uplo">
                                            <span class="dumfil"><?php echo $BIZBOOK['UPLOAD_A_FILE'];  ?></span>
                                            <input type="file" name="profile_image" accept="image/*,.jpg,.jpeg,.png" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $BIZBOOK['CHOOSE_COVER_IMAGE']; ?></label>
                                        <div class="fil-img-uplo">
                                            <span class="dumfil"><?php echo $BIZBOOK['UPLOAD_A_FILE'];  ?></span>
                                            <input type="file" name="cover_image" accept="image/*,.jpg,.jpeg,.png" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
  
                             <!--FILED START-->
                             <?php if($listings_a_row['ndis_reg'] != 2) {?>
                            <div class="row" id="reg_group" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Your Registration Group:</label>
                                        <?php foreach(getAllRegGroup() as $row) {
                                            ?>
                                        <div class="chbox">
                                        
                                            <input type="checkbox" name="reg_group[]"
                                            <?php $regArray = explode(',', $listings_a_row['reg_group']);
                                                foreach ($regArray as $reg_Array) {
                                                if($row['id'] == $reg_Array){ 
                                                    echo 'checked="checked"';
                                                }} 
                                                ?>
                                             value="<?php echo $row['id']; ?>"    class="feature_check" id="suppOffr<?php echo $row['id']; ?>" />
                                            <label for="suppOffr<?php echo $row['id']; ?>"><h6><?php echo $row['name']; ?></h6></label>    
                                                                             
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <button name="listing_submit" type="submit"
                                            class="btn btn-primary"><?php echo $BIZBOOK['SAVE_AND_EXIT']; ?></button>
                                </div>
                                <div class="col-md-12">
                                    <a href="edit-listing-step-new-2?row=<?php echo $_GET['row']; ?>"
                                       class="skip"><?php echo $BIZBOOK['SKIP_THIS']; ?>>></a>
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
<script src="js/select-opt.js"></script>
<script type="text/javascript">var webpage_full_link = '<?php echo $webpage_full_link;?>';</script>
<script type="text/javascript">var login_url = '<?php echo $LOGIN_URL;?>';</script>
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
<script src="admin/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('listing_description');
</script>
<script>
    function getCities(val) {
        $.ajax({
            type: "POST",
            url: "city_process.php",
            data: 'country_id=' + val,
            success: function (data) {
                $("#city_id").html(data);
                $('#city_id').trigger("chosen:updated");
            }
        });
    }
</script>
<script>
$(document).ready(function(){
    $('#ndis_reg').on('change', function(){
    	var demovalue = $(this).val(); 
        if(demovalue == 1){         
        $("#question_class").show();
        $("#reg_group").show();
        }else{
        $("#question_class").hide();
        $("#reg_group").hide();
        }


    });
});
</script> 
</body>

</html>