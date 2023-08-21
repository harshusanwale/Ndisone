<?php
   include "header.php";
   include "config/all_texts_english.php";
   ?>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb1vGO92hZfS0oRzq9X9VhDJzz2BcqV0w&libraries=places"></script>
<!-- START -->
<section>
   <div class="ad-com">
      <div class="ad-dash leftpadd">
         <div class="login-reg">
            <div class="container">
               <form action="insert_listing.php" class="listing_form" id="listing_form"
                  name="listing_form" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="login-main add-list posr">
                        <div class="log-bor">&nbsp;</div>
                        <span class="udb-inst">step 1</span>
                        <div class="log log-1">
                           <div class="login">
                              <h4>Listing Details</h4>
                              <?php include "../page_level_message.php"; ?>
                              <!--FILED START-->
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <select name="user_code" id="user_code" class="form-control"
                                          required="required">
                                          <option value="" disabled selected>User Name</option>
                                          <?php
                                             foreach (getAllUser() as $ad_users_row) {
                                             
                                                 ?>
                                          <option
                                             value="<?php echo $ad_users_row['user_code']; ?>"><?php echo $ad_users_row['first_name']; ?></option>
                                          <?php
                                             }
                                             
                                             ?>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <!--FILED END-->
                              <!--FILED START-->
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input id="listing_name" name="listing_name" type="text" required="required"
                                          class="form-control" value=""
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
                                          class="form-control" value=""
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
                                          <option value="1">Sole Trader</option>
                                          <option value="2" >Digital</option>
                                          <option value="3" >Agency</option>
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
                                          <option value="1" >Yes</option>
                                          <option value="2" >NO</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <!--FILED END-->
                              <!--FILED START-->
                              <div class="row d-flex" id="question_class" >
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label><?php echo $BIZBOOK['REGSITRATION_NUMBER']; ?></label>
                                       <div class="fil-img-uplo">
                                          <input id="reg_number" name="reg_number" type="text" required="required"
                                             class="form-control" value=""
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
                                          <option value="1"  >Yes</option>
                                          <option value="2"  >NO</option>
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
                                          value=""
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
                                          value=""
                                          placeholder="<?php echo $BIZBOOK['COM_PHONE_1']; ?>">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <input type="text" name="com_phone_2" class="form-control"
                                          value="" 
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
                                          value=""
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
                                          value=""
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
                                          value="" id="primary_location"
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
                                          value=""
                                          placeholder="<?php echo $BIZBOOK['FACE_URL']; ?>">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <input type="text" name="insta_url" class="form-control"
                                          value="" 
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
                                          value=""
                                          placeholder="<?php echo $BIZBOOK['TWI_URL']; ?>">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <input type="text" name="link_url" class="form-control"
                                          value="" 
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
                                          <input type="checkbox" name="reg_group[]" value="<?php echo $row['id']; ?>"    class="feature_check" id="suppOffr<?php echo $row['id']; ?>" />
                                          <label for="suppOffr<?php echo $row['id']; ?>">
                                             <h6><?php echo $row['name']; ?></h6>
                                          </label>                                          
                                       </div>
                                       <?php } ?>
                                    </div>
                                 </div>
                              </div>
                              <!--FILED END-->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="login-main add-list add-list-ser">
                        <div class="log-bor">&nbsp;</div>
                        <span class="steps">Step 2</span>
                        <div class="log">
                           <div class="login">
                              <h4>Service Offered</h4>
                              <!-- <span class="add-list-add-btn lis-ser-add-btn" title="add new offer">+</span>
                              <span class="add-list-rem-btn lis-ser-rem-btn" title="remove offer">-</span> -->
                              <ul>
                                 <li>
                                    <!--FILED START-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select onChange="getSubCategory(this.value);" name="category_id"
                                                        id="category_id" class="chosen-select form-control">
                                                    <option value=""><?php echo $BIZBOOK['SELECT_CATEGORY']; ?></option>
                                                    <?php
                                                    foreach (getAllCategories() as $categories_row) {
                                                        ?>
                                                        <option <?php if ($_SESSION['category_id'] == $categories_row['category_id']) {
                                                            echo "selected";
                                                        } ?>
                                                            value="<?php echo $categories_row['category_id']; ?>"><?php echo $categories_row['category_name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--FILED END-->
                                    <!--FILED START-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select data-placeholder="Select Sub Category" name="sub_category_id[]"
                                                        id="sub_category_id" multiple class="chosen-select form-control">
                                                    <option value=""><?php echo $BIZBOOK['SELECT_SUB_CATEGORY']; ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--FILED END-->
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="login-main add-list">
                        <div class="log-bor">&nbsp;</div>
                        <span class="steps">Step 3</span>
                        <div class="log">
                           <div class="login add-list-off">
                              <h4>Service Locations</h4>
                              <span class="add-list-add-btn loction-add-off" title="add new offer">+</span>
                              <span class="add-list-rem-btn location-rem-btn" title="remove offer">-</span>
                              <div class="add-list-location">
                              <ul>
                                 
                                    <!--FILED START-->
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
                                    <!--FILED END-->
                                 
                              </ul>
                                </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="login-main add-list">
                        <div class="log-bor">&nbsp;</div>
                        <span class="steps">Step 4</span>
                        <div class="log add-list-map">
                           <div class="login add-list-map">
                              <h4>Work Hours</h4>
                              <?php 
                                 $si = 1;
                                 foreach(getAllAvailTime() as $row) {?>
                                 <ul>                    
                                 <li>
                                    <div class="col-md-12">
                                          <div class="form-group chbox">
                                             <input type="checkbox" name="days[<?php echo  $row['avail_time_name']?>][day]" value="<?php echo  $row['avail_time_name']?>" class="feature_check" id="<?php echo  $row['avail_time_name'].$si ;?>" />
                                             <label for="<?php echo  $row['avail_time_name'].$si ;?>"><?php echo  $row['avail_time_name']?></label>
                                             <div class="<?php echo  $row['avail_time_name']?>">
                                                <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                             </div>
                                          </div>
                                    </div>
                                 </li>                            
                                 </ul>
                                 <?php $si++;
                                 } ?>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="login-main add-list">
                        <div class="log-bor">&nbsp;</div>
                        <span class="steps">Step 5</span>
                        <div class="log">
                           <div class="login add-lis-oth">
                              <h4>Other informations</h4>
                              <!-- <span class="add-list-add-btn lis-add-oad" title="add new offer">+</span>
                              <span class="add-list-rem-btn lis-add-ore" title="remove offer">-</span> -->
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
                                 <!--                                        <div class="col-md-6">-->
                                 <!--                                            <button type="submit" class="btn btn-primary">Previous</button>-->
                                 <!--                                        </div>-->
                                 <div class="col-md-12">
                                    <button type="submit" name="listing_submit" class="btn btn-primary">
                                    Submit
                                    Listing
                                    </button>
                                 </div>
                                 <div class="col-md-12">
                                    <a href="profile.php" class="skip">Go to Dashboard >></a>
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
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/select-opt.js"></script>
<script src="js/admin-custom.js"></script>
<script>
   function getSubCategory(val) {
   
       $.ajax({
   
           type: "POST",
   
           url: "../sub_category_process.php",
   
           data: 'category_id=' + val,
   
           success: function (data) {
   
               $("#sub_category_id").html(data);
   
               $('#sub_category_id').trigger("chosen:updated");
   
           }
   
       });
   
   }
   
</script>
<script src="ckeditor/ckeditor.js"></script>
<script>
   CKEDITOR.replace('listing_description');
   
</script>
<script>
   function getCities(val) {
   
       $.ajax({
   
           type: "POST",
   
           url: "../city_process.php",
   
           data: 'country_id=' + val,
   
           success: function (data) {
   
               $("#city_id").html(data);
   
               $('#city_id').trigger("chosen:updated");
   
           }
   
       });
   
   }
   
</script>

<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').click(function() {
            var inputValue = $(this).attr("value");
            $("." + inputValue).toggle();
            var currentUl = $(this).closest("ul");
            var currentLi = currentUl.closest("li");
            if (currentUl.children("li").length > 1) {
                currentUl.find("li[class=removeable").remove();
            }
        });
    });
</script>
</body>
</html>