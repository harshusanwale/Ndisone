<?php
include "header.php";

if (file_exists('config/user_authentication.php')) {
    include('config/user_authentication.php');
}

$user_details_row = getUser($_SESSION['user_id']);

if (file_exists('config/general_user_authentication.php')) {
    include('config/general_user_authentication.php');
}

if (file_exists('config/listing_page_authentication.php')) {
    include('config/listing_page_authentication.php');
}

?>
<!-- START -->
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
<section>
    <div class="ad-com">
        <div class="ad-dash leftpadd">
            <div class="login-reg">
                <div class="container">
                    <?php
                    $listing_codea = $_GET['row'];
                    $listings_a_row = getListing($listing_codea);

                    ?>
                    <form action="listing_trash_new.php" class="listing_form" id="listing_form"
                          name="listing_form" method="post" enctype="multipart/form-data">

                        <input type="hidden" id="listing_codea" value="<?php echo $listing_codea; ?>"
                               name="listing_codea" class="validate">
                        <input type="hidden" id="listing_id" value="<?php echo $listings_a_row['listing_id']; ?>"
                               name="listing_id" class="validate">
                        <input type="hidden" id="listing_code" value="<?php echo $listings_a_row['listing_code']; ?>"
                               name="listing_code" class="validate">
                        <input type="hidden" id="listing_is_delete"
                               value="<?php echo $listings_a_row['listing_is_delete']; ?>"
                               name="listing_is_delete" class="validate">
                        <input type="hidden" id="reg_stamp_image_old"
                               value="<?php echo $listings_a_row['reg_stamp']; ?>" name="reg_stamp_image_old"
                               class="validate">
                        
                        <div class="row">
                            <div class="login-main add-list posr">
                                <div class="log-bor">&nbsp;</div>
                                <span class="udb-inst"><?php echo $BIZBOOK['DELETE_LISTING']; ?></span>
                                <div class="log log-1">
                                    <div class="login">
                                        <h4><?php
                                            if (isset($_GET['path'])) {
                                                if ($_GET['path'] == "restore") {
                                                    echo "Restore";
                                                } elseif ($_GET['path'] == "trash") {
                                                    echo "Delete Permanently";
                                                }

                                            } else {
                                                echo "Delete";
                                            }
                                            ?><?php echo $BIZBOOK['LISTING_DETAILS']; ?></h4>
                                        <?php include "page_level_message.php"; ?>
                                        <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input readonly="readonly" id="listing_name" name="listing_name" type="text" required="required"
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
                                        <input readonly="readonly" id="abn_number" name="abn_number" type="text" required="required"
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
                                    <select  readonly="readonly" name="organi_type" id="organi_type" class="form-control colorBackground ca-check-plan empty valid">
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
                                    <select readonly="readonly" name="ndis_reg" id="ndis_reg" class="form-control colorBackground ca-check-plan empty valid">
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
                                        <input  readonly="readonly" id="reg_number" name="reg_number" type="text" required="required"
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
                                            <input  readonly="readonly" type="file" name="reg_stamp" accept="image/*,.jpg,.jpeg,.png" class="form-control">
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
                                    <select  readonly="readonly" name="ndis_early_child" id="ndis_early_child" class="form-control colorBackground ca-check-plan empty valid">
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
                                        <input readonly="readonly" type="text" name="com_land_num" class="form-control"
                                               value="<?php echo $listings_a_row['com_land_number'] ?>"
                                               placeholder="<?php echo $BIZBOOK['COM_LAND_NUMBER']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input readonly="readonly" type="text" name="com_phone_1" class="form-control"
                                               value="<?php echo $listings_a_row['com_phone_1'] ?>"
                                               placeholder="<?php echo $BIZBOOK['COM_PHONE_1']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input readonly="readonly" type="text" name="com_phone_2" class="form-control"
                                               value="<?php echo $listings_a_row['com_phone_2'] ?>" 
                                               placeholder="<?php echo $BIZBOOK['COM_PHONE_2']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input readonly="readonly"  type="email" name="comp_email" class="form-control"
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
                                        <input readonly="readonly" type="text" name="com_website" class="form-control"
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
                                        <input readonly="readonly" type="text" name="primary_location" class="form-control"
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
                                        <input readonly="readonly" type="text" name="face_url" class="form-control"
                                               value="<?php echo $listings_a_row['fb_link'] ?>"
                                               placeholder="<?php echo $BIZBOOK['FACE_URL']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input readonly="readonly" type="text" name="insta_url" class="form-control"
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
                                        <input readonly="readonly" type="text" name="twi_url" class="form-control"
                                               value="<?php echo $listings_a_row['twitter_link'] ?>"
                                               placeholder="<?php echo $BIZBOOK['TWI_URL']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input readonly="readonly" type="text" name="link_url" class="form-control"
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
                                    <textarea readonly="readonly" class="form-control"
                                                id="listing_description"
                                                name="listing_description"
                                                placeholder="<?php echo $BIZBOOK['DETAILS_ABOUT_LISTING']; ?>"><?php echo $listings_a_row['listing_description']; ?></textarea>
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
                                        
                                            <input disabled="disabled" type="checkbox" name="reg_group[]"
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="login-main add-list posr">
                                <div class="log-bor">&nbsp;</div>
                                <span class="steps"><?php echo $BIZBOOK['STEP2']; ?></span>
                                <div class="log">
                                    <div class="login">

                                        <h4>Service Offered</h4>
                                        
                                       <!--FILED START-->
                                        <div class="row" id="reg_group" style="">
                                        <?php foreach(getAllCategories() as $row) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo $row['category_name']?>:</label>
                                                <!-- <input type="hidden" -->
                                                <?php foreach(getCategorySubCategories($row['category_id']) as $subrow)  { ?>                
                                                    <div class="chbox">
                                                        <input type="checkbox" disabled="disabled" name="sub_category_id[]" 
                                                        <?php $suppOffarray = explode(',',$listings_a_row['sub_category_id']);
                                                            foreach ($suppOffarray as $seroff_Array) {
                                                            if($subrow['sub_category_id'] == $seroff_Array){ 
                                                                echo 'checked="checked"';
                                                            }} 
                                                            ?>
                                                        value="<?php echo $subrow['sub_category_id']; ?>"   class="feature_check" id="suppOffr<?php echo $subrow['sub_category_id']; ?>"/>
                                                        <label for="suppOffr<?php echo $subrow['sub_category_id']; ?>"><?php echo $subrow['sub_category_name']; ?></label>                                           
                                                    </div>
                                                    <?php } ?>                            
                                                </div>                            
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <!--FILED END--> 
                                       
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="login-main add-list">
                                <div class="log-bor">&nbsp;</div>
                                <span class="steps"><?php echo $BIZBOOK['STEP3']; ?></span>
                                <div class="log">
                                    <div class="login add-list-off">
                                        <h4>Service Locations</h4>
                                        <ul>
                                        <?php
                                        $location_1 = $listings_a_row['service_locations'];                                        
                                        $location_array = json_decode($location_1,true);                                                                            
                                            foreach ($location_array as $location_Array) {                                   
                                                ?> 
                                                <li>                                       
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">Location
                                                            <input readonly="readonly" type="text" name="location[0][location]" value="<?php echo $location_Array['location'] ?>" id="location0" class=" form-control location colorBackground address" placeholder="Service Location" >
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">City
                                                            <input  readonly="readonly" type="text" autocomplete="off" value="<?php echo $location_Array['location_city'] ?>" name="location[0][location_city]" id="location_city0" class="form-control colorBackground" placeholder="City" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">State
                                                            <input  readonly="readonly" type="text" autocomplete="off" value="<?php echo $location_Array['location_state'] ?>" name="location[0][location_state]" id="location_state0" class="form-control colorBackground" placeholder="State" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">Country
                                                            <input  readonly="readonly" type="text" autocomplete="off" value="<?php echo $location_Array['location_country'] ?>" name="location[0][location_country]" id="location_country0" class="form-control colorBackground" placeholder="Country" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">Postcode
                                                            <input readonly="readonly" type="text" autocomplete="off" value="<?php echo $location_Array['location_zip_code'] ?>" name="location[0][location_zip_code]" id="location_zip_code0" class="form-control colorBackground" placeholder="Postcode" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">Latitude
                                                            <input readonly="readonly" type="text" autocomplete="off" value="<?php echo $location_Array['location_latitude'] ?>" name="location[0][location_latitude]" id="location_latitude0" class="form-control colorBackground" placeholder="Latitude" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">Longitude
                                                            <input readonly="readonly" type="text" autocomplete="off" value="<?php echo $location_Array['location_longitude'] ?>" name="location[0][location_longitude]" id="location_longitude0" class="form-control colorBackground" placeholder="Longitude" >
                                                        </div>
                                                    </div>

                                                </div>
                                            </li>
                                            <!--FILED END-->                                       
                                        <?php
                                       }?>                                                               
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="login-main add-list">
                                <div class="log-bor">&nbsp;</div>
                                <span class="steps"><?php echo $BIZBOOK['STEP4']; ?></span>
                                <div class="log add-list-map">
                                    <div class="login add-list-map">

                                        <h4><?php echo $BIZBOOK['OFFERS']; ?></h4>
                                        <ul>
                                            <?php
                                            $listings_a_row_service_1_name = $listings_a_row['service_1_name'];
                                            $listings_a_row_service_1_price = $listings_a_row['service_1_price'];
                                            $listings_a_row_service_1_detail = $listings_a_row['service_1_detail'];

                                            $ser_1_name_Array = explode(',', $listings_a_row_service_1_name);
                                            $ser_1_price_Array = explode(',', $listings_a_row_service_1_price);
                                            $ser_1_detail_Array = explode(',', $listings_a_row_service_1_detail);

                                            $zipped = array_map(null, $ser_1_name_Array, $ser_1_price_Array, $ser_1_detail_Array);

                                            foreach ($zipped as $tuple) {
                                                $tuple[0]; // offer name
                                                $tuple[1]; // offer Price
                                                $tuple[2]; // offer Detail

                                                ?>
                                                <li>
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input readonly="readonly" type="text"
                                                                       class="form-control"
                                                                       value="<?php echo $tuple[0]; ?>"
                                                                       name="service_1_name[]"
                                                                       placeholder="<?php echo $BIZBOOK['OFFER_NAME']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input readonly="readonly" type="text"
                                                                       class="form-control"
                                                                       value="<?php echo $tuple[1]; ?>"
                                                                       name="service_1_price[]"
                                                                       placeholder="<?php echo $BIZBOOK['PRICE']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                            <textarea readonly="readonly" class="form-control"
                                                                      name="service_1_detail[]"
                                                                      placeholder="<?php echo $BIZBOOK['DETAILS_ABOUT_OFFER']; ?>"><?php echo $tuple[2]; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="login-main add-list">
                                <div class="log-bor">&nbsp;</div>
                                <span class="steps"><?php echo $BIZBOOK['STEP5']; ?></span>
                                <div class="log add-list-map">
                                    <div class="login add-list-map">

                                        <h4><?php echo $BIZBOOK['MAP_360_VIEW']; ?></h4>
                                        <!--FILED START-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea readonly="readonly" class="form-control" name="google_map"
                                                              placeholder="<?php echo $BIZBOOK['SHOP_LOCATION']; ?>"><?php echo $listings_a_row['google_map']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--FILED END-->
                                        <!--FILED START-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea readonly="readonly" class="form-control" name="360_view"
                                                              placeholder="<?php echo $BIZBOOK['360_VIEW']; ?>"><?php echo $listings_a_row['360_view']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--FILED END-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="login-main add-list">
                                <div class="log-bor">&nbsp;</div>
                                <span class="steps"><?php echo $BIZBOOK['STEP6']; ?></span>
                                <div class="log add-list-map">
                                    <div class="login add-list-map">

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
                                                        <select  disabled="disabled"  name="mon_is_open" class="chosen-select form-control">
                                                            <option <?php if($listings_a_row['mon_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                            <option <?php if($listings_a_row['mon_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select disabled="disabled" name="mon_open_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="mon_close_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="tue_is_open" class="chosen-select form-control">
                                                            <option <?php if($listings_a_row['tue_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                            <option <?php if($listings_a_row['tue_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select disabled="disabled"  name="tue_open_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="tue_close_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="wed_is_open" class="chosen-select form-control">
                                                            <option <?php if($listings_a_row['wed_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                            <option <?php if($listings_a_row['wed_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select disabled="disabled" name="wed_open_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="wed_close_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="thu_is_open" class="chosen-select form-control">
                                                            <option <?php if($listings_a_row['thu_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                            <option <?php if($listings_a_row['thu_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select disabled="disabled" name="thu_open_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="thu_close_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="fri_is_open" class="chosen-select form-control">
                                                            <option <?php if($listings_a_row['fri_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                            <option <?php if($listings_a_row['fri_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select disabled="disabled" name="fri_open_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="fri_close_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="sat_is_open" class="chosen-select form-control">
                                                            <option <?php if($listings_a_row['sat_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                            <option <?php if($listings_a_row['sat_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select disabled="disabled" name="sat_open_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="sat_close_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="sun_is_open" class="chosen-select form-control">
                                                            <option <?php if($listings_a_row['sun_is_open'] == 1){ echo 'selected'; } ?> value="1">Open</option>
                                                            <option <?php if($listings_a_row['sun_is_open'] == 0){ echo 'selected'; } ?> value="0">Close</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select disabled="disabled" name="sun_open_time" class="chosen-select form-control">
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
                                                        <select disabled="disabled" name="sun_close_time" class="chosen-select form-control">
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
                                    </div>
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
                                        <ul>
                                        <li>
                                        <!--FILED START-->
                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Approach Method:</label>
                                                <select disabled="disabled" name="appr_method" id="appr_method" class="form-control colorBackground ca-check-plan empty valid">
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
                                                <select name="language" disabled="disabled" id="language" class="form-control colorBackground  chosen-select" >
                                                <option value="">--Select--</option>
                                                <?php foreach (getAllLanguages() as $Lrow) {
                                                    $extratarry = explode(',',$listings_a_row['language']);
                                                    ?>
                                                
                                                    <option 
                                                    <?php foreach ($extratarry as $value) {
                                                        if($Lrow['id'] == $value){ 
                                                            echo "selected" ; 
                                                        }}
                                                        ?>
                                                    value="<?php echo $Lrow['id']; ?>"><?php echo $Lrow['language_name']; ?></option>
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
                                                <select disabled="disabled" name="ser_special" id="ser_special" class="form-control colorBackground ca-check-plan empty valid">
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
                                                <select disabled="disabled" name="pet_frie" id="pet_frie" class="form-control colorBackground ca-check-plan empty valid">
                                                        <option value="">--Select--</option>
                                                        <option value="1" <?php if($listings_a_row['pet_frie'] == 1){echo "selected";}?>>Happy</option>
                                                        <option value="2" <?php if($listings_a_row['pet_frie'] == 2){echo  "selected" ;}?>>Not Happy</option>
                                                        <option value="3" <?php if($listings_a_row['pet_frie'] == 3){echo "selected";}?>>No preference</option>                                        
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
                                                <select disabled="disabled" name="ser_deli_method" id="ser_deli_method" class="form-control colorBackground ca-check-plan empty valid">
                                                        <option value="">--Select--</option>
                                                        <option value="1"  <?php if($listings_a_row['ser_deli_method'] == 1){echo "selected" ;}?>>Onliner</option>
                                                        <option value="2"  <?php if($listings_a_row['ser_deli_method'] == 2){ echo "selected" ;}?>>Telecare</option>
                                                        <option value="3" <?php if($listings_a_row['ser_deli_method'] == 3) {echo "selected" ;}?>>Group</option>
                                                        <option value="4" <?php if($listings_a_row['ser_deli_method'] == 4) {echo  "selected" ;}?>>We come to you</option>
                                                        <option value="5" <?php if($listings_a_row['ser_deli_method'] == 5) { echo "selected" ;}?>>You come to us</option>                                      
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
                                                <select disabled="disabled" name="age_group" id="age_group" class="form-control colorBackground ca-check-plan empty valid">
                                                        <option value="">--Select--</option>
                                                        <option value="1"  <?php if($listings_a_row['age_group'] == 1) {echo "selected" ;}?>>Earlychildhood ( 0-7)</option>
                                                        <option value="2"  <?php if($listings_a_row['age_group'] == 2) {echo  "selected" ;}?>>Children (8-16)</option>
                                                        <option value="3" <?php if($listings_a_row['age_group'] == 3) {echo  "selected" ;}?>>Young ( 17-21)</option>
                                                        <option value="4" <?php if($listings_a_row['age_group'] == 4) {echo  "selected" ;}?>>Adults (22-59)</option>
                                                        <option value="5" <?php if($listings_a_row['age_group'] == 5) {echo "selected" ;}?>>Mature Age ( 60+)</option>                                      
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        <!--FILED END-->
                                        </li>
                                        </ul>
                                        <!--FILED START-->
                                        
                                        <!--FILED END-->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="login-main add-list">
                                <div class="log-bor">&nbsp;</div>
                                <span class="steps"><?php echo $BIZBOOK['STEP9']; ?></span>
                                <div class="log">
                                    <div class="login add-lis-oth">

                                        <h4><?php echo $BIZBOOK['OTHER_INFORMATIONS']; ?></h4>
                                        <ul>
                                            <?php
                                            $listings_a_row_listing_info_question = $listings_a_row['listing_info_question'];
                                            $listings_a_row_listing_info_answer = $listings_a_row['listing_info_answer'];

                                            $listings_a_row_listing_info_question_Array = explode(',', $listings_a_row_listing_info_question);
                                            $listings_a_row_listing_info_answer_Array = explode(',', $listings_a_row_listing_info_answer);

                                            $zipped = array_map(null, $listings_a_row_listing_info_question_Array, $listings_a_row_listing_info_answer_Array);

                                            foreach ($zipped as $tuple) {
                                                $tuple[0]; // Info question
                                                $tuple[1]; // Info Answer

                                                ?>
                                                <li>
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <input readonly="readonly" type="text"
                                                                       class="form-control"
                                                                       name="listing_info_question[]"
                                                                       value="<?php echo $tuple[0]; ?>"
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
                                                                <input readonly="readonly" type="text"
                                                                       class="form-control"
                                                                       name="listing_info_answer[]"
                                                                       value="<?php echo $tuple[1]; ?>"
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
                                            <div class="col-md-12">
                                                <button type="submit" name="listing_submit"
                                                        class="btn btn-primary"><?php
                                                    if (isset($_GET['path'])) {
                                                        if ($_GET['path'] == "restore") {
                                                            echo "Restore";
                                                        } elseif ($_GET['path'] == "trash") {
                                                            echo "Delete Permanently";
                                                        }

                                                    } else {
                                                        echo "Delete";
                                                    }
                                                    ?><?php echo $BIZBOOK['LISTING']; ?></button>
                                            </div>
                                            <div class="col-md-12">
                                                <a href="profile"
                                                   class="skip"><?php echo $BIZBOOK['GO_TO_USER_DASHBOARD']; ?> >></a>
                                            </div>
                                        </div>
                                        <!--FILED END-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END -->

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