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
                                <b>Work Hours</b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-5?row=<?php echo $listing_codea; ?>" class="act">
                                <span><?php echo $BIZBOOK['STEP5']; ?></span>
                                <b><?php echo $BIZBOOK['OTHER']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="edit-listing-step-new-6?row=<?php echo $listing_codea; ?>">
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
                        <span class="add-list-add-btn lis-add-oad" title="add new offer">+</span>
                        <span class="add-list-rem-btn lis-add-ore" title="remove offer">-</span>
                        <?php
                        $listings_a_row = getListing($listing_codea);
                        ?>
                        <form action="listing_update_new.php" class="listing_form_5" id="listing_form_5"
                              name="listing_form_5" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="src_path" value="edit-5"
                                   name="src_path" class="validate">
                            <input type="hidden" id="listing_codea" value="<?php echo $listing_codea; ?>"
                                   name="listing_codea" class="validate">
                            <input type="hidden" id="listing_code"
                                   value="<?php echo $listings_a_row['listing_code']; ?>"
                                   name="listing_code" class="validate">
                            <input type="hidden" id="listing_id" value="<?php echo $listings_a_row['listing_id']; ?>"
                                   name="listing_id" class="validate">
                            <ul>
                            <li>
                            <!--FILED START-->
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Approach Method:</label>
                                    <select name="appr_method" id="appr_method" class="form-control colorBackground ca-check-plan empty valid">
                                            <option value="">--Select--</option>
                                            <option value="1" <?php if($listings_a_row['appr_merhod'] == 1){echo "selected" ;}?>>Online</option>
                                            <option value="2" <?php  if($listings_a_row['appr_merhod'] == 2){echo "selected" ; }?>>Telehealth</option>
                                            <option value="3" <?php  if($listings_a_row['appr_merhod'] == 3){echo "selected" ;}?>>We come to you</option>
                                            <option value="4" <?php if($listings_a_row['appr_merhod'] == 4){echo "selected" ;}?>>You come to us</option>                                        
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
                                            <option value="<?php echo $Lrow['id']; ?>"  <?php if($listings_a_row['language'] == $Lrow['id']){ echo "selected" ; }?>><?php echo $Lrow['language_name']; ?></option>
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
                                            <option value="1"  <?php if($listings_a_row['serv_specilisation'] == 1){echo "selected" ;}?>>Aboriginal and Torres Strait Islander</option>
                                            <option value="2"  <?php if($listings_a_row['serv_specilisation'] == 2){echo "selected" ;}?>>LGBTIQ+</option>
                                            <option value="3" <?php if($listings_a_row['serv_specilisation'] == 3) {echo  "selected" ;}?>>Autism</option>
                                            <option value="4" <?php if($listings_a_row['serv_specilisation'] == 4){echo "selected" ;}?>>CALD</option>
                                            <option value="5" <?php if($listings_a_row['serv_specilisation'] == 5) {echo"selected" ;}?>>Intellectual Disability</option> 
                                            <option value="6" <?php if($listings_a_row['serv_specilisation'] ==  6){echo "selected" ;}?>>Psychosocial Disability</option> 
                                            <option value="7" <?php if($listings_a_row['serv_specilisation'] ==  7){echo "selected" ;}?>>Sensory Impairment</option>                                           
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
                                            <option value="1" <?php if($listings_a_row['pet_frie'] == 1){echo "selected";}?>>Happy</option>
                                            <option value="2" <?php if($listings_a_row['pet_frie'] == 2){echo  "selected" ;}?>>Not Happy</option>
                                            <option value="3" <?php if($listings_a_row['pet_frie'] == 3){echo "selected";}?>>No preference</option>                                        
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
                                    <a href="edit-listing-step-new-4?row=<?php echo $listings_a_row['listing_codea']; ?>">
                                        <button type="button"
                                                class="btn btn-primary"><?php echo $BIZBOOK['PREVIOUS']; ?></button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="listing_submit"
                                            class="btn btn-primary"><?php echo $BIZBOOK['SAVE_AND_EXIT']; ?></button>
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
</body>

</html>