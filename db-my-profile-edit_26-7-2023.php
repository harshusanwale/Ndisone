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

                        <?php if(!empty($user_details_row['position'])){
                            // Assuming $user_details_row['availability_time'] contains the provided JSON data
                            $availabilityData = json_decode($user_details_row['availability_time'], true);

                            // Loop through each day of the week
                            $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                            foreach ($daysOfWeek as $day) {
                            $isChecked = isset($availabilityData[$day]);
                            $daySlots = $isChecked ? $availabilityData[$day]['day'] : "";
                            $timeSlots = $isChecked ? $availabilityData[$day]['data'] : [];

                            echo '<ul>';
                            echo '<li>';
                            echo '<div class="row">';
                            echo '<div class="col-md-12 checmana">';
                            echo '<div class="form-group chbox">';
                            echo '<input type="checkbox" name="day[]" value="' . $day . '" ' . ($isChecked ? 'checked' : '') . ' class="feature_check" id="' . $day . '1" />';
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
                            echo  '<input type="time" class="form-control" name="'.$daySlots.'['.$i.'][from]" value="' . $timeSlot['from'] . '">';
                            echo  '</div>';
                            echo  '<div class="col-md-4">';
                            echo  '<input type="time" class="form-control" name="'.$daySlots.'['.$i.'][to]" value="' . $timeSlot['to'] . '">';
                            echo  '</div>';
                            echo  '</div>';
                            echo  '</li>';
                            $i++;
                            }
                            echo '</ul>';
                            }
                        }else{?>

                            <div class="login-main add-list add-ncate">
                            <h4>Availability Time Details</h4>
                                <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Monday" class="feature_check" id="Monday1" />
                                                    <label for="Monday1">Monday</label>
                                                    <div class="Monday diBlo">
                                                    <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                    <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Tuesday" class="feature_check" id="Tuesday1" />
                                                    <label for="Tuesday1">Tuesday</label>
                                                    <div class="Tuesday diBlo">
                                                    <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                    <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <ul >
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Wednesday" class="feature_check" id="Wednesday1" />
                                                    <label for="Wednesday1">Wednesday</label>

                                                    <div class="Wednesday diBlo">
                                                    <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                    <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Thursday" class="feature_check" id="Thursday1" />
                                                    <label for="Thursday1">Thursday</label>

                                                    <div class="Thursday diBlo">
                                                    <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                    <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <ul >
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Friday" class="feature_check" id="Friday1" />
                                                    <label for="Friday1">Friday</label>

                                                    <div class="Friday diBlo">
                                                    <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                    <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12 checmana">
                                            <div class="form-group chbox">
                                                <input type="checkbox" name="day[]" value="Saturday" class="feature_check" id="Saturday1" />
                                                <label for="Saturday1">Saturday</label>

                                                    <div class="Saturday diBlo">
                                                    <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                    <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Sunday" class="feature_check" id="Sunday1" >
                                                    <label for="Sunday1">Sunday</label>

                                                    <div class="Sunday diBlo">
                                                    <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                    <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>


                        <?php }?>


<h6>Work History</h6>
<div class="login-main" style="float: right;">
    <span class="add-list-add-btn lis-wor-his-add-btn slots-add" title="add new offer">+</span>
    <span class="add-list-rem-btn lis-wor-his-rem-btn slots-rev" title="remove offer">-</span>
</div></br></br>
<div class="add-list-ser">
    <ul id="work-history-list">
        <?php if(!empty($user_details_row['position'])){
            $workHistoryData = json_decode($user_details_row['position'], true);
            // Loop through each work history entry
            foreach ($workHistoryData as $index => $entry) {
                $position = isset($entry['position']) ? $entry['position'] : '';
                $company_name = isset($entry['company_name']) ? $entry['company_name'] : '';
                $work_from = isset($entry['work_from']) ? $entry['work_from'] : '';
                $work_to = isset($entry['work_to']) ? $entry['work_to'] : '';
                $exp_year_month = isset($entry['exp_year_month']) ? $entry['exp_year_month'] : '';

                // Generate the HTML for each work history entry
                echo '<li>';
                echo '<div class="row">';
                echo '<div class="col-md-6">';
                echo '<div class="form-group">';
                echo '<input type="text" autocomplete="off" name="workexp[' . $index . '][position]" id="position' . $index . '" class="form-control colorBackground" placeholder="Position" required value="' . $position . '">';
                echo '</div>';
                echo '</div>';
                echo '<div class="col-md-6">';
                echo '<div class="form-group">';
                echo '<input type="text" autocomplete="off" name="workexp[' . $index . '][company_name]" id="company_name' . $index . '" class="form-control colorBackground" placeholder="Company\'s name" required value="' . $company_name . '">';
                echo '</div>';
                echo '</div>';
                echo '<div class="col-md-3">';
                echo '<div class="form-group">';
                echo '<input type="text" autocomplete="off" name="workexp[' . $index . '][work_from]" id="work_from' . $index . '" class="form-control colorBackground" placeholder="From" required value="' . $work_from . '">';
                echo '</div>';
                echo '</div>';
                echo '<div class="col-md-3">';
                echo '<div class="form-group">';
                echo '<input type="text" autocomplete="off" name="workexp[' . $index . '][work_to]" id="work_to' . $index . '" class="form-control colorBackground" placeholder="To" required value="' . $work_to . '">';
                echo '</div>';
                echo '</div>';
                echo '<div class="col-md-6">';
                echo '<div class="form-group">';
                echo '<input type="text" autocomplete="off" name="workexp[' . $index . '][exp_year_month]" id="exp_year_month' . $index . '" class="form-control colorBackground" placeholder="Year and month" required value="' . $exp_year_month . '">';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</li>';
            }
        }else{?>
            <li>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" autocomplete="off" name="workexp[0][position]" id="position" class="form-control colorBackground" placeholder="Position" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" autocomplete="off" name="workexp[0][company_name]" id="company_name" class="form-control colorBackground" placeholder="Company's name" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" autocomplete="off" name="workexp[0][work_from]" id="work_from" class="form-control colorBackground" placeholder="From" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" autocomplete="off" name="workexp[0][work_to]" id="work_to" class="form-control colorBackground" placeholder="To" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" autocomplete="off" name="workexp[0][exp_year_month]" id="exp_year_month" class="form-control colorBackground" placeholder="Year and month" required>
                        </div>
                    </div>
                </div>
            </li>
        <?php }?>
    </ul>
</div>



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
</script>