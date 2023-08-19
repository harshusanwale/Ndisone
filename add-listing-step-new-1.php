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
                            <a href="add-listing-step-new-1" class="act">
                                <span><?php echo $BIZBOOK['STEP1']; ?></span>
                                <b><?php echo $BIZBOOK['BASIC_INFO']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
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
                                <b><?php echo $BIZBOOK['WPR_HOURS']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
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
                <span class="steps"><?php echo $BIZBOOK['STEP1']; ?></span>
                <div class="log">
                    <div class="login">
                        <h4><?php echo $BIZBOOK['LISTING_DETAILS']; ?></h4>
                        <?php include "page_level_message.php"; ?>
                        <form action="add-listing-step-new-2.php" class="listing_form_1" id="listing_form_1"
                              name="listing_form_1" method="post" enctype="multipart/form-data">
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="listing_name" name="listing_name" type="text" required="required"
                                               class="form-control" value="<?php echo $_SESSION['listing_name'] ?>"
                                               placeholder="<?php echo $BIZBOOK['LISTING_NAME_STAR'].'/'.$BIZBOOK['BUSINESS_NAME']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="abn_number" name="abn_number" type="text" required="required"
                                               class="form-control" value="<?php echo $_SESSION['abn_number'] ?>"
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
                                            <option value="1" <?php if($_SESSION['organi_type'] == 1){ echo "selected" ;}?>>Sole Trader</option>
                                            <option value="2"  <?php if($_SESSION['organi_type'] == 2){ echo  "selected" ; }?>>Digital</option>
                                            <option value="3"  <?php if($_SESSION['organi_type'] == 3){ echo  "selected" ; }?>>Agency</option>                                            
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
                                            <option value="1" <?php if($_SESSION['ndis_reg'] == 1) {echo "selected";}?>>Yes</option>
                                            <option value="2" <?php if($_SESSION['ndis_reg'] == 2) {echo "selected" ;} ?>>NO</option>                                                                         
                                    </select>
                                </div>
                                </div>
                             </div>
                            <!--FILED END-->
                            <!--FILED START-->
                         
                            
                            <div class="row d-flex" id="question_class"  style="<?php if($_SESSION['ndis_reg'] == 1){echo 'display: block' ;}else{
                             echo 'display: none';   
                               }?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $BIZBOOK['REGSITRATION_NUMBER']; ?></label>
                                        <div class="fil-img-uplo">
                                        <input id="reg_number" name="reg_number" type="text" required="required"
                                               class="form-control" value="<?php echo $_SESSION['reg_number'] ?>"
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
                        
                            <!--FILED END-->

                            <!--FILED START-->
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Are you registered for NDIS early Childhood?:</label>
                                    <select name="ndis_early_child" id="ndis_early_child" class="form-control colorBackground ca-check-plan empty valid">
                                            <option value="">--Select--</option>
                                            <option value="1"  <?php if($_SESSION['ndis_early_child'] == 1) {echo "selected";}?>>Yes</option>
                                            <option value="2"  <?php if($_SESSION['ndis_early_child'] == 2) { echo "selected" ;}?>>NO</option>                                                                            
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
                                               value="<?php echo $_SESSION['com_land_num'] ?>"
                                               placeholder="<?php echo $BIZBOOK['COM_LAND_NUMBER']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="com_phone_1" class="form-control"
                                               value="<?php echo $_SESSION['com_phone_1'] ?>"
                                               placeholder="<?php echo $BIZBOOK['COM_PHONE_1']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="com_phone_2" class="form-control"
                                               value="<?php echo $_SESSION['com_phone_2'] ?>" 
                                               placeholder="<?php echo $BIZBOOK['COM_PHONE_2']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="comp_email" class="form-control"
                                               value="<?php echo $_SESSION['comp_email'] ?>"
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
                                               value="<?php echo $_SESSION['com_website'] ?>"
                                               placeholder="<?php echo $BIZBOOK['COM_WEBSITE']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="primary_location" class="form-control"
                                               value="<?php echo $_SESSION['primary_location'] ?>" id="primary_location"
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
                                               value="<?php echo $_SESSION['face_url'] ?>"
                                               placeholder="<?php echo $BIZBOOK['FACE_URL']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="insta_url" class="form-control"
                                               value="<?php echo $_SESSION['insta_url'] ?>" 
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
                                               value="<?php echo $_SESSION['twi_url'] ?>"
                                               placeholder="<?php echo $BIZBOOK['TWI_URL']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="link_url" class="form-control"
                                               value="<?php echo $_SESSION['link_url'] ?>" 
                                               placeholder="<?php echo $BIZBOOK['LINK_URL']; ?>">
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
                            <div class="row" id="reg_group" style="<?php if($_SESSION['ndis_reg'] == 1){echo 'display: block;' ;}else{
                             echo '"display: none"';   
                               }?>">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Your Registration Group:</label>
                                        <?php foreach(getAllRegGroup() as $row) { ?>
                                        <div class="chbox">
                                            <?php
                                             if($_SESSION['reg_group']){?>
                                            <input type="checkbox" name="reg_group[]" value="<?php echo $row['id']; ?>"  <?php if(in_array($row['id'], $_SESSION['reg_group'])){echo 'checked="checked"'; }?>  class="feature_check" id="suppOffr<?php echo $row['id']; ?>" />
                                            <label for="suppOffr<?php echo $row['id']; ?>"><h6><?php echo $row['name']; ?></h6></label>
                                            <?php }else{?>
                                            <input type="checkbox" name="reg_group[]" value="<?php echo $row['id']; ?>"    class="feature_check" id="suppOffr<?php echo $row['id']; ?>" />
                                            <label for="suppOffr<?php echo $row['id']; ?>"><h6><?php echo $row['name']; ?></h6></label>
                                            <?php } ?>
                                            
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                         
                            <button type="submit" name="listing_submit" class="btn btn-primary"><?php echo $BIZBOOK['NEXT']; ?></button>
                            
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