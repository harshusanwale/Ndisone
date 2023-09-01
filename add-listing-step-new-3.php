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
    // print_r($_POST);die;
// Service Offered Details   
       $_SESSION['sub_category_id'] = $_POST["sub_category_id"];
       $arr = array();
        foreach ($_SESSION['sub_category_id'] as $catid)
        {
            $category_id1 = getsubCategoryCategories($catid);
            $testid = $category_id1['category_id'];
            
            if(!in_array( $testid ,$arr))
            {
                $arr[] = $testid;     
            }            
        }
    
        $catid = implode(",", $arr);
       $_SESSION["category_id"] =   $catid;
        
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
                            <a href="add-listing-step-new-1">
                                <span><?php echo $BIZBOOK['STEP1']; ?></span>
                                <b><?php echo $BIZBOOK['BASIC_INFO']; ?></b>
                            </a>
                        </li>
                        <li>
                            <a href="add-listing-step-new-2">
                                <span><?php echo $BIZBOOK['STEP2']; ?></span>
                                <b>Service Offered</b>
                            </a>
                        </li>
                        <li>
                            <a href="add-listing-step-new-3" class="act">
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
            <div class="login-main add-list add-list-ser">
                <div class="log-bor">&nbsp;</div>
                <span class="steps"><?php echo $BIZBOOK['STEP3']; ?></span>
                <div class="log">
                    <div class="login">
                        <h4>Service Locations</h4>
                        <?php include "page_level_message.php"; ?>
                        <!-- <span class="add-list-add-btn location-add-btn" title="add new offer">+</span>
                        <span class="add-list-rem-btn location-rem-btn" title="remove offer">-</span> -->
                        <form action="add-listing-step-new-4.php" class="listing_form_3" id="listing_form_3"
                              name="listing_form_3" method="post" enctype="multipart/form-data">

                            <input id="category_id" name="category_id" type="hidden"
                                   value="<?php echo $_SESSION['category_id']; ?>"
                                   required="required" class="validate">

                            <input id="sub_category_id" name="sub_category_id" type="hidden"
                                   value="<?php echo $_SESSION['sub_category_id']; ?>"
                                   required="required" class="validate">

                            <ul>
                            <div class="login-main" style="float: right;">
                                <span class="add-list-add-btn location-add-btn slots-add" title="add new Location">+</span>
                                <span class="add-list-rem-btn location-rem-btn slots-rev" title="remove Location">-</span>
                            </div></br></br>
                            <div class="add-list-location">
                                <ul>
                                <?php
                                $location_1 = $_SESSION['location'];
                                
                                $location_count = isset($location_1) ? count($location_1) : 0;
                              
                                if ($location_count == 2) {
                                    foreach ($location_1 as $location_Array) {                                   
                                        ?> 
                                        <li>                                       
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">Location
                                                    <input type="text" name="location[0][location]" value="<?php echo $location_Array['location'] ?>" id="location0" class=" form-control location colorBackground address" placeholder="Service Location" >
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">City
                                                    <input type="text" autocomplete="off" value="<?php echo $location_Array['location_city'] ?>" name="location[0][location_city]" id="location_city0" class="form-control colorBackground" placeholder="City" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">State
                                                    <input type="text" autocomplete="off" value="<?php echo $location_Array['location_state'] ?>" name="location[0][location_state]" id="location_state0" class="form-control colorBackground" placeholder="State" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">Country
                                                    <input type="text" autocomplete="off" value="<?php echo $location_Array['location_country'] ?>" name="location[0][location_country]" id="location_country0" class="form-control colorBackground" placeholder="Country" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">Postcode
                                                    <input type="text" autocomplete="off" value="<?php echo $location_Array['location_zip_code'] ?>" name="location[0][location_zip_code]" id="location_zip_code0" class="form-control colorBackground" placeholder="Postcode" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">Latitude
                                                    <input type="text" autocomplete="off" value="<?php echo $location_Array['location_latitude'] ?>" name="location[0][location_latitude]" id="location_latitude0" class="form-control colorBackground" placeholder="Latitude" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">Longitude
                                                    <input type="text" autocomplete="off" value="<?php echo $location_Array['location_longitude'] ?>" name="location[0][location_longitude]" id="location_longitude0" class="form-control colorBackground" placeholder="Longitude" >
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                            <!--FILED END-->
                                        </li>
                                        <?php
                                    }
                                } else {?>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">Location
                                                    <input type="text" name="location[0][location]" value="" id="location0" class=" form-control location colorBackground address" placeholder="Service Location" >
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">City
                                                    <input type="text" autocomplete="off" value="" name="location[0][location_city]" id="location_city0" class="form-control colorBackground" placeholder="City" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">State
                                                    <input type="text" autocomplete="off" value="" name="location[0][location_state]" id="location_state0" class="form-control colorBackground" placeholder="State" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">Country
                                                    <input type="text" autocomplete="off" value="" name="location[0][location_country]" id="location_country0" class="form-control colorBackground" placeholder="Country" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">Postcode
                                                    <input type="text" autocomplete="off" value="" name="location[0][location_zip_code]" id="location_zip_code0" class="form-control colorBackground" placeholder="Postcode" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">Latitude
                                                    <input type="text" autocomplete="off" value="" name="location[0][location_latitude]" id="location_latitude0" class="form-control colorBackground" placeholder="Latitude" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">Longitude
                                                    <input type="text" autocomplete="off" value="" name="location[0][location_longitude]" id="location_longitude0" class="form-control colorBackground" placeholder="Longitude" >
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                            </ul>
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="add-listing-step-new-2">
                                        <button type="button"
                                                class="btn btn-primary"><?php echo $BIZBOOK['PREVIOUS']; ?></button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="listing_submit"
                                            class="btn btn-primary"><?php echo $BIZBOOK['NEXT']; ?></button>
                                </div>
                                <div class="col-md-12">
                                    <a href="add-listing-step-new-4" class="skip"><?php echo $BIZBOOK['SKIP_THIS']; ?>
                                        >></a>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--PROGRESSBAR START-->
                            <div class="progress biz-prog">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width:30%">30%</div>
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