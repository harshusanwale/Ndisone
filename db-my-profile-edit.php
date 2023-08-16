<?php
include "header.php";
if (file_exists('config/user_authentication.php')) {
    include('config/user_authentication.php');
}
include "dashboard_left_pane.php";
?>


<style>
    .checmana{
    display: flex;
    justify-content: space-between;
    align-items: center;
    vertical-align: middle;
    }
    .dinon {
        display: block;
    }
    .diBlo {
        display: none;
    }
    .slots-add{
        background: green;
    }
    .slots-rev{
        color: green;
    }
</style>



<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #21d78d;
}

input:focus + .slider {
  box-shadow: 0 0 1px #21d78d;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>


<!--CENTER SECTION-->
<div class="ud-main">
<div class="ud-main-inn ud-no-rhs">
<div class="ud-cen">
<div class="log-bor">&nbsp;</div>
<span class="udb-inst"><?php echo $BIZBOOK['EDIT_USER_PROFILE']; ?></span>
<?php include('config/user_activation_checker.php'); ?>
<div class="ud-cen-s2 ud-pro-edit">
<h2><?php echo $BIZBOOK['PROFILE_DETAILS']; ?></h2>
<?php include "page_level_message.php"; ?>
<?php
$user_details_row = getUser($_SESSION['user_id']);
?>
    <form id="profile_update" name="profile_update" action="profile_update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $user_details_row['profile_image']; ?>" autocomplete="off" name="profile_image_old" id="profile_image_old" required class="validate">
        <input type="hidden" value="<?php echo $user_details_row['cover_image']; ?>" autocomplete="off" name="cover_photo_old" id="cover_photo_old" required class="validate">
        <input type="hidden" value="<?php echo $user_details_row['profile_id_proof']; ?>" autocomplete="off" name="profile_id_proof_old" id="profile_id_proof_old" required class="validate">
        <input type="hidden" value="<?php echo $user_details_row['password']; ?>" autocomplete="off" name="password_old" id="password_old" required class="validate">
        <input type="hidden" value="<?php echo $user_details_row['user_type']; ?>" autocomplete="off" name="hidden_user_type" id="hidden_user_type" required class="validate">
        <input type="hidden" value="<?php echo $user_details_row['accredited_provider_stamp']; ?>" autocomplete="off"
        name="acc_pro_stamp_old" id="acc_pro_stamp_old" required class="validate">

        <table class="responsive-table bordered">
            <tbody>
                <tr>
                    <td><?php echo $BIZBOOK['NAME']; ?></td>
                    <td><?php echo $user_details_row['first_name']; ?></td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['EMAIL_ID']; ?></td>
                    <td><?php echo $user_details_row['email_id']; ?></td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['PROFILE_PASSWORD']; ?></td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="password" placeholder="<?php echo $BIZBOOK['CHANGE_PASSWORD'];?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['MOBILE_NUMBER']; ?></td>
                    <td>
                        <div class="form-group">
                            <input type="text" name="mobile_number" class="form-control" value="<?php echo $user_details_row['mobile_number']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['PROFILE_PICTURE']; ?></td>
                    <td>
                        <div class="form-group">
                            <div class="fil-img-uplo">
                                <span class="dumfil"><?php echo $BIZBOOK['UPLOAD_A_FILE'];  ?></span>
                                <input type="file" name="profile_image" accept="image/*,.jpg,.jpeg,.png" class="form-control">
                            </div>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['PROFILE_PICTURE_COVER']; ?></td>
                    <td>
                        <div class="form-group">
                            <div class="fil-img-uplo">
                                <span class="dumfil"><?php echo $BIZBOOK['UPLOAD_A_FILE'];  ?></span>
                                <input type="file" name="cover_photo" accept="image/*,.jpg,.jpeg,.png" class="form-control">
                            </div>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['PROFILE_IDPROOF']; ?></td>
                    <td>
                        <div class="form-group">
                            <div class="fil-img-uplo">
                                <span class="dumfil"><?php echo $BIZBOOK['UPLOAD_A_FILE'];  ?></span>
                                <input type="file" name="profile_id_proof" accept="image/*,.jpg,.jpeg,.png" class="form-control">
                            </div>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['CITY']; ?></td>
                    <td>
                        <div class="form-group">
                            <input type="text" id="select-city" class="autocomplete form-control"
                                    name="user_city" value="<?php echo $user_details_row['user_city']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['JOIN_DATE']; ?></td>
                    <td><?php  echo dateFormatconverter($user_details_row['user_cdt']); ?></td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['VERIFIED']; ?></td>
                    <td><?php if($user_details_row['user_status']== "Active"){ echo "Yes";}else {echo "No";} ?></td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['PREMIUM_SERVICE_PROVIDER']; ?></td>
                    <td><?php if($user_details_row['user_type']== "Service provider"){ echo "Yes";}else {echo "No";} ?></td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['FACEBOOK']; ?></td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_facebook" value="<?php echo $user_details_row['user_facebook']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['TWITTER']; ?></td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_twitter" value="<?php echo $user_details_row['user_twitter']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['YOUTUBE']; ?></td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_youtube" value="<?php echo $user_details_row['user_youtube']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $BIZBOOK['USER_WEBSITE']; ?></td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_website" value="<?php echo $user_details_row['user_website']; ?>">
                        </div>
                    </td>
                </tr>
                <?php if($user_details_row['user_type'] == 'Support coordinator'){ ?>
                                <tr>
                                <td><?php echo $BIZBOOK['ACCESS METHODS']; ?></td>
                                <td>
                                    <div class="form-group">
                                    <select name="access_methods" id="access_methods" class=" form-control colorBackground" require>
                                            <option value=""><?php echo $BIZBOOK['ACCESS METHODS']; ?></option>

                                            <option <?php if ($user_details_row['access_methods'] == "We come to you") {
                                                        echo "selected";
                                                    } ?> value="We come to you">We come to you</option>
                                            <option <?php if ($user_details_row['access_methods'] == "You come to us") {
                                                        echo "selected";
                                                    } ?> value="You come to us">You come to us</option>
                                            <option <?php if ($user_details_row['access_methods'] == "Telehealth") {
                                                        echo "selected";
                                                    } ?> value="Telehealth">Telehealth</option>
                                        </select>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td><?php echo $BIZBOOK['AGE GROUPS']; ?></td>
                                <td>
                                    <div class="form-group">
                                    <select name="age_groups" id="age_groups" class=" form-control colorBackground">
                                            <option value=""><?php echo $BIZBOOK['AGE GROUPS']; ?></option>
                                            <option <?php if ($user_details_row['age_groups'] == "Early Childhood (0-7 years)") {
                                                        echo "selected";
                                                    } ?> value="Early Childhood (0-7 years)">Early Childhood (0-7 years)</option>
                                            <option <?php if ($user_details_row['age_groups'] == "Children (8-16 years)") {
                                                        echo "selected";
                                                    } ?> value="Children (8-16 years)">Children (8-16 years)</option>
                                            <option <?php if ($user_details_row['age_groups'] == "Young people (17-21 years)") {
                                                        echo "selected";
                                                    } ?> value="Young people (17-21 years)">Young people (17-21 years)</option>
                                            <option <?php if ($user_details_row['age_groups'] == "Adults (22-59 years)") {
                                                        echo "selected";
                                                    } ?> value="Adults (22-59 years)">Adults (22-59 years)</option>
                                            <option <?php if ($user_details_row['age_groups'] == "Mature Age (60+ years)") {
                                                        echo "selected";
                                                    } ?> value="Mature Age (60+ years)">Mature Age (60+ years)</option>
                                        </select>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Service Locations</td>
                                <td>
                                    <div class="form-group">
                                    <input type="text" class="form-control" name="service_location" id="user_address"
                                            value="<?php echo $user_details_row['service_location']; ?>">
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Registration number</td>
                                <td>
                                    <div class="form-group">
                                    <input type="text" autocomplete="off" id="registration_no" value="<?php echo $user_details_row['registration_no']; ?>" name="registration_no" id="registration_no" class="form-control colorBackground" placeholder="">
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Provider trading name</td>
                                <td>
                                    <div class="form-group">
                                    <input type="text" autocomplete="off" value="<?php echo $user_details_row['provider_trading_name']; ?>" name="provider_trading_name" id="provider_trading_name" class="form-control colorBackground" placeholder="">
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Registered companys name (if different)</td>
                                <td>
                                    <div class="form-group">
                                    <input type="text" autocomplete="off" value="<?php echo $user_details_row['registered_companys_name']; ?>" name="registered_companys_name" id="registered_companys_name" class="form-control colorBackground" placeholder="">
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Business contact number</td>
                                <td>
                                    <div class="form-group">
                                    <input type="text" autocomplete="off" value="<?php echo $user_details_row['business_contact_number']; ?>" name="business_contact_number" id="business_contact_number" class="form-control colorBackground" placeholder="">
                                    </div>
                                </td>
                              </tr>
                              
                              <tr>
                                <td>Business email address</td>
                                <td>
                                    <div class="form-group">
                                    <input type="text" autocomplete="off" value="<?php echo $user_details_row['business_email_address']; ?>" name="business_email_address" id="business_email_address" class="form-control colorBackground" placeholder="">
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Accredited provider stamp</td>
                                <td>
                                <div class="form-group">
                                    <div class="fil-img-uplo">
                                        <span class="dumfil"><?php echo $BIZBOOK['UPLOAD_A_FILE'];  ?></span>
                                        <input type="file" name="acc_pro_stamp" accept="image/*,.jpg,.jpeg,.png"
                                            class="form-control form-control colorBackground">
                                    </div>
                                </td>
                              </tr>

                             <?php } ?>



                <?php if($user_details_row['user_type'] == 'Participant'){ ?>
                <tr>
                    <td><?php echo "Who needs services !"; ?></td>
                    <td>
                        <div class="form-group">
                            <select name="w_n_services" id="w_n_services" class="form-control ca-check-plan2">
                                <option value="" disabled><?php echo "Who needs services !"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['w_n_services']) && $user_details_row['w_n_services'] != null && $user_details_row['w_n_services'] == 'Myself') ? 'selected="selected"' : 'disabled' ; ?> value="Myself"><?php echo "Myself"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['w_n_services']) && $user_details_row['w_n_services'] != null && $user_details_row['w_n_services'] == 'Someone I care for') ? 'selected="selected"' : 'disabled' ; ?> value="Someone I care for"><?php echo "Someone I care for"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['w_n_services']) && $user_details_row['w_n_services'] != null && $user_details_row['w_n_services'] == 'My Client') ? 'selected="selected"' : 'disabled' ; ?> value="My Client"><?php echo "My Client"; ?></option>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><?php echo "Participant Age Range"; ?></td>
                    <td>
                        <div class="form-group">
                            <select name="p_age_range" id="p_age_range" class="form-control">
                                <option value="" ><?php echo "Participant Age Range"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['p_age_range']) && $user_details_row['p_age_range'] != null && $user_details_row['p_age_range'] == 'Early Childhood (0-7 years)') ? 'selected="selected"' : '' ; ?> value="Early Childhood (0-7 years)"><?php echo "Early Childhood (0-7 years)"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['p_age_range']) && $user_details_row['p_age_range'] != null && $user_details_row['p_age_range'] == 'Children (8-16 years)') ? 'selected="selected"' : '' ; ?> value="Children (8-16 years)"><?php echo "Children (8-16 years)"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['p_age_range']) && $user_details_row['p_age_range'] != null && $user_details_row['p_age_range'] == 'Young people (17-21 years)') ? 'selected="selected"' : '' ; ?> value="Young people (17-21 years)"><?php echo "Young people (17-21 years)"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['p_age_range']) && $user_details_row['p_age_range'] != null && $user_details_row['p_age_range'] == 'Adults (22-59 years)') ? 'selected="selected"' : '' ; ?> value="Adults (22-59 years)"><?php echo "Adults (22-59 years)"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['p_age_range']) && $user_details_row['p_age_range'] != null && $user_details_row['p_age_range'] == 'Mature Age (60+ years)') ? 'selected="selected"' : '' ; ?> value="Mature Age (60+ years)"><?php echo "Mature Age (60+ years)"; ?></option>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><?php echo "How is your NDIS plan managed?"; ?></td>
                    <td>
                        <div class="form-group">
                            <select name="n_p_managed" id="n_p_managed" class="form-control">
                                <option value="" ><?php echo "How is your NDIS plan managed?"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['n_p_managed']) && $user_details_row['n_p_managed'] != null && $user_details_row['n_p_managed'] == 'Self managed') ? 'selected="selected"' : '' ; ?> value="Self managed"><?php echo "Self managed"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['n_p_managed']) && $user_details_row['n_p_managed'] != null && $user_details_row['n_p_managed'] == 'Plan managed') ? 'selected="selected"' : '' ; ?> value="Plan managed"><?php echo "Plan managed"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['n_p_managed']) && $user_details_row['n_p_managed'] != null && $user_details_row['n_p_managed'] == 'Agency managed') ? 'selected="selected"' : '' ; ?> value="Agency managed"><?php echo "Agency managed"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['n_p_managed']) && $user_details_row['n_p_managed'] != null && $user_details_row['n_p_managed'] == 'Waiting for approval') ? 'selected="selected"' : '' ; ?> value="Waiting for approval"><?php echo "Waiting for approval"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['n_p_managed']) && $user_details_row['n_p_managed'] != null && $user_details_row['n_p_managed'] == 'Not with NDIS') ? 'selected="selected"' : '' ; ?> value="Not with NDIS"><?php echo "Not with NDIS"; ?></option>
                                <option <?php echo ( !empty ($user_details_row['n_p_managed']) && $user_details_row['n_p_managed'] != null && $user_details_row['n_p_managed'] == 'Unsure') ? 'selected="selected"' : '' ; ?> value="Unsure"><?php echo "Unsure"; ?></option>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><?php echo "Your Service location"; ?></td>
                    <td>
                        <div class="form-group">
                        <input type="text"  autocomplete="off"   name="service_location" id="service_location" class="form-control"  placeholder="Enter Your Service location" value="<?php echo ( !empty ($user_details_row['service_location']) && $user_details_row['service_location'] != null ) ? $user_details_row['service_location'] : '' ; ?>">
                        </div>
                    </td>
                </tr>


                <?php if( !empty ($user_details_row['age_range']) && $user_details_row['age_range'] != null ) { ?>

                <tr>
                    <td><?php echo "Relationship with the participant"; ?></td>
                    <td>
                        <div class="form-group">
                        <select name="relation_w_p" id="relation_w_p" class="form-control">
                            <option value="" ><?php echo "Relationship with the participant"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['relation_w_p']) && $user_details_row['relation_w_p'] != null && $user_details_row['relation_w_p'] == 'Parent') ? 'selected="selected"' : '' ; ?> value="Parent"><?php echo "Parent"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['relation_w_p']) && $user_details_row['relation_w_p'] != null && $user_details_row['relation_w_p'] == 'Child') ? 'selected="selected"' : '' ; ?> value="Child"><?php echo "Child"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['relation_w_p']) && $user_details_row['relation_w_p'] != null && $user_details_row['relation_w_p'] == 'Partner') ? 'selected="selected"' : '' ; ?> value="Partner"><?php echo "Partner"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['relation_w_p']) && $user_details_row['relation_w_p'] != null && $user_details_row['relation_w_p'] == 'Relative') ? 'selected="selected"' : '' ; ?> value="Relative"><?php echo "Relative"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['relation_w_p']) && $user_details_row['relation_w_p'] != null && $user_details_row['relation_w_p'] == 'Other') ? 'selected="selected"' : '' ; ?> value="Other"><?php echo "Other"; ?></option>
                        </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo "Participant First Name"; ?></td>
                    <td>
                        <div class="form-group">
                        <input type="text"  autocomplete="off" name="p_first_name" id="p_first_name" class="form-control" placeholder="<?php echo "Participant First Name"; ?>" value="<?php echo ( !empty ($user_details_row['p_first_name']) && $user_details_row['p_first_name'] != null ) ? $user_details_row['p_first_name'] : '' ; ?>">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><?php echo "Participant Last Name"; ?></td>
                    <td>
                        <div class="form-group">
                        <input type="text"  autocomplete="off" name="p_last_name" id="p_last_name" class="form-control" placeholder="<?php echo "Participant Last Name"; ?>" value="<?php echo ( !empty ($user_details_row['p_last_name']) && $user_details_row['p_last_name'] != null ) ? $user_details_row['p_last_name'] : '' ; ?>">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><?php echo "Age Range"; ?></td>
                    <td>
                        <div class="form-group">
                        <select name="age_range" id="age_range" class="form-control">
                            <option value="" ><?php echo "Age Range"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['age_range']) && $user_details_row['age_range'] != null && $user_details_row['age_range'] == 'Early Childhood (0-7 years)') ? 'selected="selected"' : '' ; ?> value="Early Childhood (0-7 years)"><?php echo "Early Childhood (0-7 years)"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['age_range']) && $user_details_row['age_range'] != null && $user_details_row['age_range'] == 'Children (8-16 years)') ? 'selected="selected"' : '' ; ?> value="Children (8-16 years)"><?php echo "Children (8-16 years)"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['age_range']) && $user_details_row['age_range'] != null && $user_details_row['age_range'] == 'Young people (17-21 years)') ? 'selected="selected"' : '' ; ?> value="Young people (17-21 years)"><?php echo "Young people (17-21 years)"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['age_range']) && $user_details_row['age_range'] != null && $user_details_row['age_range'] == 'Adults (22-59 years)') ? 'selected="selected"' : '' ; ?> value="Adults (22-59 years)"><?php echo "Adults (22-59 years)"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['age_range']) && $user_details_row['age_range'] != null && $user_details_row['age_range'] == 'Mature Age (60+ years)') ? 'selected="selected"' : '' ; ?> value="Mature Age (60+ years)"><?php echo "Mature Age (60+ years)"; ?></option>
                        </select>
                        </div>
                    </td>
                </tr>

                <?php } ?>

                <tr>
                    <td><?php echo "Prefer Contact Method"; ?></td>
                    <td>
                        <div class="form-group">
                        <select name="p_contact_method" id="p_contact_method" class="form-control">
                            <option  value="" ><?php echo "Prefer Contact Method"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['p_contact_method']) && $user_details_row['p_contact_method'] != null && $user_details_row['p_contact_method'] == 'Phone Call') ? 'selected="selected"' : '' ; ?> value="Phone Call"><?php echo "Phone Call"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['p_contact_method']) && $user_details_row['p_contact_method'] != null && $user_details_row['p_contact_method'] == 'SMS') ? 'selected="selected"' : '' ; ?> value="SMS"><?php echo "SMS"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['p_contact_method']) && $user_details_row['p_contact_method'] != null && $user_details_row['p_contact_method'] == 'Email') ? 'selected="selected"' : '' ; ?> value="Email"><?php echo "Email"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['p_contact_method']) && $user_details_row['p_contact_method'] != null && $user_details_row['p_contact_method'] == 'Any') ? 'selected="selected"' : '' ; ?> value="Any"><?php echo "Any"; ?></option>
                        </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><?php echo "Participant Identify as"; ?></td>
                    <td>
                        <div class="form-group">
                        <select name="p_identify_as" id="p_identify_as" class="form-control">
                            <option value="" ><?php echo "Participant Identify as"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['p_identify_as']) && $user_details_row['p_identify_as'] != null && $user_details_row['p_identify_as'] == 'Male ( He/Him)') ? 'selected="selected"' : '' ; ?> value="Male ( He/Him)"><?php echo "Male ( He/Him)"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['p_identify_as']) && $user_details_row['p_identify_as'] != null && $user_details_row['p_identify_as'] == 'Femate ( She/Her)') ? 'selected="selected"' : '' ; ?> value="Femate ( She/Her)"><?php echo "Femate ( She/Her)"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['p_identify_as']) && $user_details_row['p_identify_as'] != null && $user_details_row['p_identify_as'] == 'Non-binary ( they/them)') ? 'selected="selected"' : '' ; ?> value="Non-binary ( they/them)"><?php echo "Non-binary ( they/them)"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['p_identify_as']) && $user_details_row['p_identify_as'] != null && $user_details_row['p_identify_as'] == 'Other') ? 'selected="selected"' : '' ; ?> value="Other"><?php echo "Other"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['p_identify_as']) && $user_details_row['p_identify_as'] != null && $user_details_row['p_identify_as'] == 'Prefer not to say') ? 'selected="selected"' : '' ; ?> value="Prefer not to say"><?php echo "Prefer not to say"; ?></option>
                        </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><?php echo "language is spoken at home"; ?></td>
                    <td>
                        <div class="form-group">
                        <input type="text"  autocomplete="off"
                    name="language_spoken" id="language_spoken" class="form-control"
                    placeholder="<?php echo "What language is spoken at home?"; ?>" value="<?php echo ( !empty ($user_details_row['language_spoken']) && $user_details_row['language_spoken'] != null ) ? $user_details_row['language_spoken'] : '' ; ?>">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><?php echo "Interpreter required"; ?></td>
                    <td>
                        <div class="form-group">
                        <select name="interpreter_r" id="interpreter_r" class="form-control">
                            <option value="" ><?php echo "Is an interpreter required?"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['interpreter_r']) && $user_details_row['interpreter_r'] != null && $user_details_row['interpreter_r'] == 'yes') ? 'selected="selected"' : '' ; ?> value="yes"><?php echo "Yes"; ?></option>
                            <option <?php echo ( !empty ($user_details_row['interpreter_r']) && $user_details_row['interpreter_r'] != null && $user_details_row['interpreter_r'] == 'no') ? 'selected="selected"' : '' ; ?> value="no"><?php echo "No"; ?></option>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><?php echo "NDIS Number"; ?></td>
                    <td>
                        <div class="form-group">
                        <input type="text"  autocomplete="off" name="ndis_number" id="ndis_number" class="form-control"
                    placeholder="<?php echo "NDIS Number(if applicable)"; ?>" value="<?php echo ( !empty ($user_details_row['ndis_number']) && $user_details_row['ndis_number'] != null ) ? $user_details_row['ndis_number'] : '' ; ?>" >
                        </div>
                    </td>
                </tr>





                <?php } ?>


                <?php if($user_details_row['user_type'] == 'Support Worker'){ ?>

                    <tr>
                    <td><?php echo $BIZBOOK['Birth Year']; ?>Date of Birth</td>
                    <td>
                        <div class="form-group">
                        <input type="Date" autocomplete="off" name="birth_year" id="birth_year" value="<?php echo $user_details_row['date_of_birth']; ?>" class="form-control colorBackground" placeholder="Birth Year" onchange="calculateAge()" required>
                            <!-- <input type="date" class="form-control" name="date_of_birth" value="<?php echo $user_details_row['date_of_birth']; ?>" onchange="calculateAge()" > -->
                        </div>
                    </td>



                    </tr>
                <tr>
                <td><?php echo $BIZBOOK['AGE']; ?>Age</td>
                <td>

                    <input type="text" autocomplete="off" name="age" id="age" class="form-control colorBackground" placeholder="Current Age">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>Happy to travel</td>
                    <td>
                        <div class="form-group">
                        <select name="happy_to_travel" id="happy_to_travel" class="form-control">

                        <option value="">Happy to travel</option>
                            <?php foreach (getAllTravelDistance() as $traveldistancerow) { ?>
                            <option <?php if ($user_details_row['happy_to_travel'] == $traveldistancerow['sw_travel_distance_id']) {echo "selected";} ?>
                                            value="<?php echo $traveldistancerow['sw_travel_distance_id']; ?>"><?php echo $traveldistancerow['sw_travel_distance']; ?></option>
                        <?php } ?>

                            </select>
                        </div>
                    </td>
                </tr>



                <tr>
                    <td>Language</td>
                    <td>
                    <div class="form-group ca-sh-user">
                                        <select name="language" id="language" class="form-control colorBackground ca-check-plan">
                                            <option value="">Language</option>
                                            <?php foreach (getAllLanguages() as $Lrow) { ?>
                                                <option <?php if ($user_details_row['language'] == $Lrow['id']) {echo "selected";} ?>  value="<?php echo $Lrow['id']; ?>"><?php echo $Lrow['language_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                    </td>
                </tr>


                <tr>
                    <td>Pet friendly !</td>
                    <td>
                    <div class="form-group ca-sh-user">
                                        <select name="pet_friendly" id="pet_friendly" class="form-control colorBackground ca-check-plan">
                                            <option value="">Pet friendly !</option>
                                            <?php foreach (getAllPetFriendly() as $Petrow) { ?>
                                                <option <?php if ($user_details_row['pet_friendly'] == $Petrow['pet_fri_id']) {echo "selected";} ?>
                                                 value="<?php echo $Petrow['pet_fri_id']; ?>"><?php echo $Petrow['pet_fri_name']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                    </td>
                </tr>




                <tr>
                    <td>Type of Support Work</td>
                    <td>
                    <div class="form-group ca-sh-user">
                                        <select name="type_of_support_work" id="type_of_support_work" class="form-control colorBackground ca-check-plan">
                                            <option value="">Type of Support Work</option>

                                            <?php foreach (getAllWorkers() as $workerrow) { ?>
                                                <option <?php if ($user_details_row['type_of_support_work'] == $workerrow['supp_worker_type_id']) {echo "selected";} ?>
                                                 value="<?php echo $workerrow['supp_worker_type_id']; ?>"><?php echo $workerrow['type_name']; ?></option>
                                            <?php } ?>

                                        </select>
                                        <!-- <a href="user-type" class="frmtip" target="_blank">Type of Support Work</a> -->
                                    </div>

                    </td>
                </tr>


                <tr>
                    <td>How did you hear about us?</td>
                    <td>
                    <div class="form-group ca-sh-user">
                                        <select name="how_did_you_hear_about_us" id="how_did_you_hear_about_us" class="form-control colorBackground ca-check-plan">
                                            <option value="">How did you hear about us?</option>
                                            <?php foreach (getAllQueAboutUs() as $aboutUsrow) { ?>
                                                <option <?php if ($user_details_row['how_did_you_hear_about_us'] == $aboutUsrow['sw_about_us_id']) {echo "selected";} ?>
                                                 value="<?php echo $aboutUsrow['sw_about_us_id']; ?>"><?php echo $aboutUsrow['sw_about_us_name']; ?></option>
                                            <?php } ?>

                                        </select>

                                    </div>

                    </td>
                </tr>


                <tr>
                    <td>Support Preference</td>
                    <td>
                    <div class="form-group ca-sh-user">
                                        <select name="support_prefer" id="support_prefer" class="form-control colorBackground ca-check-plan">
                                            <option value="">Support Preference</option>
                                            <?php foreach (getAllSupportPreference() as $supprerow) { ?>
                                                <option <?php if ($user_details_row['support_prefer'] == $supprerow['supp_pre_id']) {echo "selected";} ?>
                                                 value="<?php echo $supprerow['supp_pre_id']; ?>"><?php echo $supprerow['support_prefer_name']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                    </td>
                </tr>


                <tr>
                    <td>Availble for work </td>
                    <td>
                    <div class="form-group ca-sh-user">
                                        <select name="work_avail" id="work_avail" class="form-control colorBackground ca-check-plan">
                                            <option value="">Availble for work </option>
                                            <option <?php if ($user_details_row['work_avail'] == "Yes") {
                                                        echo "selected";
                                                    } ?> value="Yes">Yes</option>
                                            <option <?php if ($user_details_row['work_avail'] == "No") {
                                                        echo "selected";
                                                    } ?> value="No">No</option>
                                        </select>

<!-- <label class="switch">
  <input name ="work_avail" id="work_avail" type="checkbox" value="<?php  echo ($user_details_row['work_avail'] == "Yes") ? "Yes" : "No" ;   // echo $user_details_row['work_avail'] ;?>" <?php if ($user_details_row['work_avail'] == "Yes") {   echo "checked";   } ?>  />
  <span class="slider round"></span>
</label> -->



                                    </div>


                    </td>
                </tr>


                <tr>
                    <td>Gender</td>
                    <td>
                    <div class="form-group ca-sh-user">
                                        <select name="gender" id="gender" class="form-control colorBackground ca-check-plan">
                                            <option value="">Gender</option>
                                            <option <?php if ($user_details_row['gender'] == "Male") {
                                                        echo "selected";
                                                    } ?> value="Male">Male</option>
                                            <option <?php if ($user_details_row['gender'] == "Female") {
                                                        echo "selected";
                                                    } ?> value="Female">Female</option>
                                            <option <?php if ($user_details_row['gender'] == "No Preference") {
                                                        echo "selected";
                                                    } ?> value="No Preference">No Preference</option>
                                        </select>
                                    </div>

                    </td>
                </tr>


                <tr>
                    <td>ABN Number</td>
                    <td>
                    <div class="form-group ca-sh-user">
                                        <select name="ABN_number" id="ABN_number" class="form-control colorBackground ca-check-plan">
                                            <option value="">ABN Number</option>
                                            <option <?php if ($user_details_row['ABN_number'] == "Yes") {
                                                        echo "selected";
                                                    } ?> value="Yes">Yes</option>
                                            <option <?php if ($user_details_row['ABN_number'] == "No") {
                                                        echo "selected";
                                                    } ?> value="No">No</option>
                                        </select>

                                    </div>

                    </td>
                </tr>


                <tr>
                    <td>

                    <?php if(!empty($user_details_row['position'])){
                        // Assuming $user_details_row['availability_time'] contains the provided JSON data
                        $availabilityData = json_decode($user_details_row['availability_time'], true);

                        // Loop through each day of the week
                        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        foreach ($daysOfWeek as $day) {
                        $isChecked = isset($availabilityData[$day]);
                        $daySlots = $isChecked ? $availabilityData[$day]['day'] : "";
                        $timeSlots = $isChecked ? $availabilityData[$day]['data'] : [];

                        echo '<ul class="custom-plus">';
                        echo '<li>';
                        echo '<div class="row">';
                        echo '<div class="col-md-12 checmana">';
                        echo '<div class="form-group chbox">';
                        echo '<input type="checkbox" name="days[' . $day . '][day]" value="' . $day . '" ' . ($isChecked ? 'checked' : '') . ' class="feature_check" id="' . $day . '1" />';
                        echo '<label for="' . $day . '1">' . $day . '</label>';
                        echo '<div class="' . ($isChecked ? 'dinon':'diBlo') . ' '.$day.'">';
                        echo '<span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to add an additional Time Slot field">+</span>';
                        echo '<span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove this Time Slot field">-</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                        $i = 0;
                        foreach ($timeSlots as $timeSlot) {
                        echo  '<li class="removeable">';
                        echo  '<div class="row">';
                        echo  '<div class="col-md-2">';
                        echo  '</div>';
                        echo  '<div class="col-md-4">';
                        echo  '<input type="time" class="form-control" name="days['.$daySlots.'][data]['.$i.'][from]" value="' . $timeSlot['from'] . '">';
                        echo  '</div>';
                        echo  '<div class="col-md-4">';
                        echo  '<input type="time" class="form-control" name="days['.$daySlots.'][data]['.$i.'][to]" value="' . $timeSlot['to'] . '">';
                        echo  '</div>';
                        echo  '</div>';
                        echo  '</li>';
                        $i++;
                        }
                        echo '</ul>';
                        }
                    } ?>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h6>Work History</h6>
                            <div class="login-main" style="float: right;">
                                <span class="add-list-add-btn lis-wor-his-add-btn slots-add" title="add new offer">+</span>
                                <span class="add-list-rem-btn lis-wor-his-rem-btn slots-rev" title="remove offer">-</span>
                            </div><br><br>
                            <div class="add-list-ser">
                                <ul id="work-history-list">
                                    <?php
                                    if (!empty($user_details_row['position'])) {
                                        $workHistoryData = json_decode($user_details_row['position'], true);
                                        // Loop through each work history entry
                                        foreach ($workHistoryData as $index => $entry) {
                                            $position = isset($entry['position']) ? $entry['position'] : '';
                                            $company_name = isset($entry['company_name']) ? $entry['company_name'] : '';
                                            $work_from = isset($entry['work_from']) ? $entry['work_from'] : '';
                                            $work_to = isset($entry['work_to']) ? $entry['work_to'] : '';
                                            $exp_year_month = isset($entry['exp_year_month']) ? $entry['exp_year_month'] : '';
                                            ?>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" autocomplete="off" name="workexp[<?php echo $index; ?>][position]" id="position<?php echo $index; ?>" class="form-control colorBackground" placeholder="Position" required value="<?php echo $position; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" autocomplete="off" name="workexp[<?php echo $index; ?>][company_name]" id="company_name<?php echo $index; ?>" class="form-control colorBackground" placeholder="Company's name" required value="<?php echo $company_name; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <input type="date" autocomplete="off" name="workexp[<?php echo $index; ?>][work_from]" id="work_from<?php echo $index; ?>" class="form-control colorBackground" onchange="calculateDateDifference(<?php echo $index; ?>)" placeholder="From" required value="<?php echo $work_from; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <input type="date" autocomplete="off" name="workexp[<?php echo $index; ?>][work_to]" id="work_to<?php echo $index; ?>" class="form-control colorBackground" onchange="calculateDateDifference(<?php echo $index; ?>)" placeholder="To" required value="<?php echo $work_to; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" autocomplete="off" name="workexp[<?php echo $index; ?>][exp_year_month]" id="exp_year_month<?php echo $index; ?>" class="form-control colorBackground" placeholder="Year and month" required value="<?php echo $exp_year_month; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                    <?php
                                        }
                                    } ?>
                                </ul>
                            </div>
                        </td>
                    </tr>





                    <tr>
                <td>
                <?php if(!empty($user_details_row['qualifications'])){





                    ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="filt-com lhs-featu">
                                <h4>Qualifications</h4>
                                <ul>
                                    <?php
                                    // Array of qualification IDs that are already checked
                                    $jsonisCheckedIds = json_decode($user_details_row['qualifications'], true);
                                    // echo"<pre>"; print_r($jsonisCheckedIds["ids"]);die;
                                    if (!empty($jsonisCheckedIds["ids"])) {
                                        $isCheckedIds = $jsonisCheckedIds["ids"];
                                    }else{
                                    $isCheckedIds = ["0"];
                                    }
                                    foreach (getAllQualificationsData("Qualifications") as $row) {
                                    $qualificationId = $row['qualifications_id'];
                                    $isChecked = in_array($qualificationId, $isCheckedIds);
                                    ?>
                                    <li>
                                        <div class="chbox">
                                        <input type="checkbox" name="qualifications[ids][]" value="<?php echo $qualificationId; ?>" class="feature_check" id="checks<?php echo $qualificationId; ?>" <?php echo $isChecked ? 'checked' : ''; ?> />
                                        <label for="checks<?php echo $qualificationId; ?>"><?php echo $row['qualifications_name']; ?></label>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    <li>
                                    <input type="text" autocomplete="off" name="qualifications[other_qualifications]" value="<?php echo $jsonisCheckedIds['other_qualifications']; ?>" id="other_qualifications" class="form-control colorBackground error" placeholder="Other Qualifications">
                                    </li>
                                </ul>
                                </div>
                            </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="filt-com lhs-featu">
                                <h4>Certificates</h4>
                                <ul>
                                    <?php
                                    // Array of qualification IDs that are already checked
                                    $jsonisCheckedCerIds = json_decode($user_details_row['certificates'], true);
                                    if (!empty($jsonisCheckedCerIds["ids"])) {
                                        $isCheckedCerIds = $jsonisCheckedCerIds["ids"];
                                    }else{
                                    $isCheckedCerIds = ["0"];
                                    }
                                    foreach (getAllQualificationsData("certificates") as $row) {
                                    $certificatesID = $row['qualifications_id'];
                                    $isCheckedCer = in_array($certificatesID, $isCheckedCerIds);
                                    ?>
                                    <li>
                                        <div class="chbox">
                                        <input type="checkbox" name="certificates[ids][]" value="<?php echo $certificatesID; ?>" class="feature_check" id="checks<?php echo $certificatesID; ?>" <?php echo $isCheckedCer ? 'checked' : ''; ?> />
                                        <label for="checks<?php echo $certificatesID; ?>"><?php echo $row['qualifications_name']; ?></label>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    <li>
                                    <input type="text" autocomplete="off" name="certificates[other_certificates]" value="<?php echo $jsonisCheckedCerIds['other_certificates']; ?>" id="other_certificates" class="form-control colorBackground error" placeholder="Other Certificates">
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="filt-com lhs-featu">
                                <h4>Skills</h4>
                                <ul>
                                    <?php
                                    // Array of qualification IDs that are already checked
                                    $jsonisCheckedSkiIds = json_decode($user_details_row['skills'], true);
                                    if (!empty($jsonisCheckedSkiIds["ids"])) {
                                        $isCheckedSkiIds = $jsonisCheckedSkiIds["ids"];
                                    }else{
                                        $isCheckedSkiIds = ["0"];
                                    }
                                    foreach (getAllQualificationsData("skills") as $row) {
                                    $skillID = $row['qualifications_id'];
                                    $isCheckedCer = in_array($skillID, $isCheckedSkiIds);
                                    ?>
                                    <li>
                                        <div class="chbox">
                                        <input type="checkbox" name="skills[ids][]" value="<?php echo $skillID; ?>" class="feature_check" id="checks<?php echo $skillID; ?>" <?php echo $isCheckedCer ? 'checked' : ''; ?> />
                                        <label for="checks<?php echo $skillID; ?>"><?php echo $row['qualifications_name']; ?></label>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    <li>
                                    <input type="text" autocomplete="off" name="skills[other_skills]" value="<?php echo $jsonisCheckedSkiIds['other_skills']; ?>" id="other_skills" class="form-control colorBackground error" placeholder="Other Certificates">
                                    </li>
                                </ul>
                                </div>
                            </div>

                        </div>


                            </div>
                        </div>

                                    </td></tr>
                                    <tr><td>



                                    <div class="row">
                            <div class="col-md-6">
                                <div class="filt-com lhs-featu">
                                <h4>Support Offered</h4>
                                <ul>
                                    <?php
                                    // Array of qualification IDs that are already checked
                                    $jsonisCheckedShowIds = json_decode($user_details_row['showering'], true);
                                    if (!empty($jsonisCheckedShowIds)) {
                                        $isCheckedShowIds = $jsonisCheckedShowIds;
                                    }else{
                                    $isCheckedShowIds = ["0"];
                                    }
                                    foreach (getAllSupportOffer() as $sorow) {
                                    $showringID = $sorow['supp_offer_id'];
                                    $isCheckedShow = in_array($showringID, $isCheckedShowIds);
                                    ?>
                                    <li>
                                        <div class="chbox">

                                        <input type="checkbox" name="showering[]" value="<?php echo $showringID; ?>" class="feature_check" id="suppOffr<?php echo $showringID; ?>" <?php echo $isCheckedShow ? 'checked' : ''; ?> />
                                        <label for="suppOffr<?php echo $showringID; ?>"><?php echo $sorow['offer_title']; ?></label>
                                        </div>
                                        <span><?php echo $sorow['offer_name']; ?></span>
                                    </li>
                                    <?php } ?>

                                </ul>
                                </div>
                            </div>

                        </div>


                            </div>
                        </div>


                                    <!-- <h4>Support Offered</h4>
                            <div class="row">
                                <?php foreach (getAllSupportOffer() as $sorow) { ?>
                                    <div class="col-md-4">
                                        <div class="filt-com lhs-featu">
                                            <div class="chbox">
                                                <input type="checkbox" name="showering[]" value="<?php echo $sorow['supp_offer_id']; ?>" class="feature_check" id="suppOffr<?php echo $sorow['supp_offer_id']; ?>" />
                                                <label for="suppOffr<?php echo $sorow['supp_offer_id']; ?>">
                                                    <h6><b><?php echo $sorow['offer_title']; ?></b></h6>
                                                </label>
                                            </div>
                                            <span><small><?php echo $sorow['offer_name']; ?></small></span>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div> -->




                  <?php  }?>
                </td>
                    </tr>

                <?php }?>



                <tr>
                    <td>
                        <button type="submit" name="profile_update_submit" class="db-pro-bot-btn"><?php echo $BIZBOOK['SAVE_CHANGES']; ?></button>
                        <a href="db-payment" class="db-pro-bot-btn"><?php echo $BIZBOOK['UPGRADE']; ?></a>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
</div>

<?php
include "dashboard_right_pane.php";
?>

<script>
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
        var currentUl = $(this).closest("ul");
        var currentLi = currentUl.closest("li");
        if (currentUl.children("li").length > 1) {
            currentUl.find("li[class=removeable").remove();
        }
    });
});


function calculateAgeFromDOB(dateOfBirth) {
  const birthDate = new Date(dateOfBirth);
  const today = new Date();

  let age = today.getFullYear() - birthDate.getFullYear();
  const monthsDiff = today.getMonth() - birthDate.getMonth();
  const daysDiff = today.getDate() - birthDate.getDate();

  // Adjust for negative months and days differences
  if (monthsDiff < 0 || (monthsDiff === 0 && daysDiff < 0)) {
    age--;
  }

  return age;
}

function calculateAge() {
  const dateOfBirth = document.getElementById("birth_year");
  const age = calculateAgeFromDOB(dateOfBirth.value);
  document.getElementById("age").classList.add('has-value');
  document.getElementById("age").value = age + " years";
}

window.onload = function() {
  const dateOfBirth = document.getElementById("birth_year");
  calculateAge(); // Calculate and display age on page load
  dateOfBirth.addEventListener("change", calculateAge); // Calculate and display age when date of birth changes
};
</script>
<?php include "google_address_api.php";?>
<script src="js/jquery.min.js"></script>
