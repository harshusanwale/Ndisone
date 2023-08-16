<?php
include "header.php";
include "facebook_config.php"; //Facebook Config File
include "google_config.php"; //Facebook Config File



if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    header("Location: dashboard");
}
if (!isset($_COOKIE['user_id'])) {
    echo "'user_id' is not Created!";
    unset($_COOKIE['user_id']);
    die;
} else {
    $user_id = $_COOKIE['user_id'];
    // unset($_COOKIE['user_id']);
    $login = mysqli_query($conn, "SELECT * FROM " . TBL . "users  WHERE user_id = '$user_id'");
    if (mysqli_num_rows($login) > 0) {
        $login_row = mysqli_fetch_array($login);
        // echo "<pre>";print_r($login_row);die;
        $first_name = $login_row['first_name'];
        $last_name = $login_row['last_name'];
        $email_id = $login_row['email_id'];
        $mobile_number = $login_row['mobile_number'];
    }
}
?>
<style>
    .time-row {
        display: none;
    }

    .checmana {
        display: flex;
        justify-content: space-between;
        align-items: center;
        vertical-align: middle;
    }

    .Monday,
    .Tuesday,
    .Wednesday,
    .Thursday,
    .Friday,
    .Saturday,
    .Sunday {
        display: none;
    }

    .slots-add {
        background: green;
    }

    .slots-rev {
        color: green;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
<!-- START -->
<!--PRICING DETAILS-->
<section class="<?php if ($footer_row['admin_language'] == 2) {
                    echo "lg-arb";
                } ?> login-reg">
    <div class="container">
        <div class="row">
            <div class="login-main" style="width: auto !important;">
                <div class="log-bor">&nbsp;</div>
                <div class="log log-1">
                    <div class="login login-new">
                        <?php
                        // if (isset($_SESSION['register_status_msg'])) {
                        //     include "page_level_message.php";
                        //     unset($_SESSION['register_status_msg']);
                        // }
                        ?>
                        <h4>Update Details</h4>
                        <form name="register_form" id="register_form" method="post" action="register_update_sw_profile_details_form.php">
                            <input type="hidden" autocomplete="off" name="trap_box" id="trap_box" class="validate">
                            <input type="hidden" autocomplete="off" name="mode_path" value="XeFrOnT_MoDeX_PATHXHU" id="mode_path" class="validate">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" autocomplete="off" name="first_name" id="first_name" value="<?php echo $first_name; ?>" class="form-control colorBackground" placeholder="First Name" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" autocomplete="off" name="last_name" id="last_name" value="<?php echo $last_name; ?>" class="form-control colorBackground" placeholder="Last Name" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" autocomplete="off" name="email_id" id="email_id" value="<?php echo $email_id; ?>" class="form-control colorBackground" placeholder="<?php echo $BIZBOOK['EMAIL_ID_STAR']; ?>"  readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" onkeypress="return isNumber(event)" autocomplete="off" value="<?php echo $mobile_number; ?>" name="mobile_number" id="mobile_number" class="form-control colorBackground" placeholder="<?php echo $BIZBOOK['PHONE']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="address" id="address" class="form-control colorBackground" placeholder="Address" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="city" id="city" class="form-control colorBackground" placeholder="City" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="country" id="country" class="form-control colorBackground" placeholder="Country" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="post_code" id="post_code" class="form-control colorBackground" placeholder="Postcode" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="type_of_support_work" id="type_of_support_work" class="form-control colorBackground ca-check-plan">
                                            <option value="">Type of Support Work</option>
                                            <option value="">Type of Support Work</option>
                                            <?php foreach (getAllWorkers() as $workerrow) { ?>
                                                <option value="<?php echo $workerrow['supp_worker_type_id']; ?>"><?php echo $workerrow['type_name']; ?></option>
                                            <?php } ?>
                                            <!-- <option value="Sole Trader / Independent">Sole Trader / Independent</option>
                                            <option value="Under Agency">Under Agency</option>
                                            <option value="Other">Other</option> -->
                                        </select>
                                        <!-- <a href="user-type" class="frmtip" target="_blank">Type of Support Work</a> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="ABN_number" id="ABN_number" class="form-control colorBackground ca-check-plan">
                                            <option value="">ABN Number</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <!-- <a href="user-type" class="frmtip" target="_blank">ABN Number </a> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="how_did_you_hear_about_us" id="how_did_you_hear_about_us" class="form-control colorBackground ca-check-plan">
                                            <option value="">How did you hear about us?</option>
                                            <?php foreach (getAllQueAboutUs() as $aboutUsrow) { ?>
                                                <option value="<?php echo $aboutUsrow['sw_about_us_id']; ?>"><?php echo $aboutUsrow['sw_about_us_name']; ?></option>
                                            <?php } ?>
                                            <!-- <option value="Support worker">Support worker</option>
                                            <option value="My client">My client</option>
                                            <option value="Google">Google</option>
                                            <option value="A friend">A friend</option>
                                            <option value="Social Media">Social Media</option>
                                            <option value="Advertisement on tv">Advertisement on tv</option>
                                            <option value="Event or expo">Event or expo</option>
                                            <option value="from Support Coordinator">from Support Coordinator</option>
                                            <option value="From Plan Manager">From Plan Manager</option>
                                            <option value="Other">Other</option> -->
                                        </select>
                                        <!-- <a href="user-type" class="frmtip" target="_blank">How did you hear about us? </a> -->
                                    </div>
                                </div>
                            </div>
                            <h4>Personal Details</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" autocomplete="off" name="first_name" id="first_name" class="form-control colorBackground" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="Date" autocomplete="off" name="birth_year" id="birth_year" class="form-control colorBackground" placeholder="Birth Year" onchange="calculateAge()" required>
                                        <!-- Date of Birth: <input type="date" id="birth_year" name="birth_year" onchange="calculateAge()"> -->
                                        <!--
  <p id="result"></p> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" autocomplete="off" name="last_name" id="last_name" class="form-control colorBackground" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" autocomplete="off" name="age" id="age" class="form-control colorBackground" placeholder="Current Age" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" autocomplete="off" name="location" id="location" class="form-control colorBackground" placeholder="Based in /Location" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" autocomplete="off" name="upload_photo_emoji" id="upload_photo_emoji" class="form-control colorBackground" placeholder="Upload Photo/ Emoji" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="happy_to_travel" id="happy_to_travel" class="form-control colorBackground ca-check-plan">
                                            <option value="">Happy to travel</option>
                                            <?php foreach (getAllTravelDistance() as $traveldistancerow) { ?>
                                                <option value="<?php echo $traveldistancerow['sw_travel_distance_id']; ?>"><?php echo $traveldistancerow['sw_travel_distance']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="language" id="sellanguge" class="form-control colorBackground ca-check-plan">
                                            <option value="">Language</option>
                                            <?php foreach (getAllLanguages() as $Lrow) { ?>
                                                <option value="<?php echo $Lrow['id']; ?>"><?php echo $Lrow['language_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea autocomplete="off" name="about_me" id="about_me" class="form-control colorBackground" placeholder="About me" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="login-main add-list add-ncate">
                                    <h4>Availability Time Details</h4>
                                    <ul>
                                        <li>
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Monday" class="feature_check" id="Monday1" />
                                                    <label for="Monday1">Monday</label>
                                                    <div class="Monday">
                                                        <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                        <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Tuesday" class="feature_check" id="Tuesday1" />
                                                    <label for="Tuesday1">Tuesday</label>
                                                    <div class="Tuesday">
                                                        <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                        <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Wednesday" class="feature_check" id="Wednesday1" />
                                                    <label for="Wednesday1">Wednesday</label>
                                                    <div class="Wednesday">
                                                        <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                        <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Thursday" class="feature_check" id="Thursday1" />
                                                    <label for="Thursday1">Thursday</label>
                                                    <div class="Thursday">
                                                        <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                        <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Friday" class="feature_check" id="Friday1" />
                                                    <label for="Friday1">Friday</label>
                                                    <div class="Friday">
                                                        <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                        <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Saturday" class="feature_check" id="Saturday1" />
                                                    <label for="Saturday1">Saturday</label>
                                                    <div class="Saturday">
                                                        <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                        <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <div class="col-md-12 checmana">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="day[]" value="Sunday" class="feature_check" id="Sunday1">
                                                    <label for="Sunday1">Sunday</label>
                                                    <div class="Sunday">
                                                        <span class="add-list-add-btn slots-add-btn slots-add" data-toggle="tooltip" title="Click to make additional Time Slot field">+</span>
                                                        <span class="add-list-rem-btn slots-rem-btn slots-rev" data-toggle="tooltip" title="Click to remove last Time Slot field">-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="availability_time" id="availability_time" class="form-control colorBackground ca-check-plan">
                                            <option value="">Avaibility Timetime </option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                        </select>
                                    </div>
                                </div> -->
                            <h4>Support Offered</h4>
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
                                <!-- <div class="col-md-3">
                                    <div class="filt-com lhs-featu">
                                        <h6>Personal care</h6>
                                        <ul>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="showering" value="showering" class="feature_check" id="showering" />
                                                    <label for="showering">Showering</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="dressing" value="dressing" class="feature_check" id="dressing" />
                                                    <label for="dressing">Dressing</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="grooming" value="grooming" class="feature_check" id="grooming" />
                                                    <label for="grooming">Grooming</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-3">
                                    <div class="filt-com lhs-featu">
                                        <h6>Household tasks</h6>
                                        <ul>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="household_cleaning" value="household_cleaning" class="feature_check" id="household_cleaning" />
                                                    <label for="household_cleaning">Household Cleaning and Laundry</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="filt-com lhs-featu">
                                        <h6>Skill development</h6>
                                        <ul>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="shopping" value="shopping" class="feature_check" id="shopping" />
                                                    <label for="shopping">Shopping</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="cooking" value="cooking" class="feature_check" id="cooking" />
                                                    <label for="cooking">Cooking</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="catching_public_transport" value="catching_public_transport" class="feature_check" id="catching_public_transport" />
                                                    <label for="catching_public_transport">catching public transport</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="filt-com lhs-featu">
                                        <h6>Transport</h6>
                                        <ul>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="transport" value="transport" class="feature_check" id="transport" />
                                                    <label for="transport">Transport to Appointments and/or Shopping</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="filt-com lhs-featu">
                                        <h6>Social & Community participation</h6>
                                        <ul>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="engage_in_community" value="engage_in_community" class="feature_check" id="engage_in_community" />
                                                    <label for="engage_in_community">Engage in the Community</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="meet_people" value="meet_people" class="feature_check" id="meet_people" />
                                                    <label for="meet_people">Meet People</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="filt-com lhs-featu">
                                        <h6>Therapy Support </h6>
                                        <ul>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="support_plan" value="support_plan" class="feature_check" id="support_plan" />
                                                    <label for="support_plan">Support to plan and practice</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="filt-com lhs-featu">
                                        <h6>Specilised Support </h6>
                                        <ul>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="manual_handling" value="manual_handling" class="feature_check" id="manual_handling" />
                                                    <label for="manual_handling">Manual Handling</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="anaphyaxis" value="anaphyaxis" class="feature_check" id="anaphyaxis" />
                                                    <label for="anaphyaxis">Anaphylaxis</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="allergies" value="allergies" class="feature_check" id="allergies" />
                                                    <label for="allergies">Allergies</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="medication_management" value="medication_management" class="feature_check" id="medication_management" />
                                                    <label for="medication_management">Medication Management</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="mealtime_management" value="mealtime_management" class="feature_check" id="mealtime_management" />
                                                    <label for="mealtime_management">Mealtime Management</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="swallowing_nutrition" value="swallowing_nutrition" class="feature_check" id="swallowing_nutrition" />
                                                    <label for="swallowing_nutrition">Swallowing and Nutrition</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="behaviour_management" value="behaviour_management" class="feature_check" id="behaviour_management" />
                                                    <label for="behaviour_management">Behaviour Management</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="asthama" value="asthama" class="feature_check" id="asthama" />
                                                    <label for="asthama">Asthama</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="filt-com lhs-featu">
                                        <h6>Medication </h6>
                                        <ul>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="medication" value="medication" class="feature_check" id="medication" />
                                                    <label for="medication">Medication Prompting & Assistance</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                            <h4>Qualifications</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="filt-com lhs-featu">
                                        <ul>
                                            <?php
                                            foreach (getAllQualificationsData("Qualifications") as $row) { ?>
                                                <li>
                                                    <div class="chbox">
                                                        <input type="checkbox" name="qualifications[]" value="<?php echo $row['qualifications_id']; ?>" class="feature_check" id="checks<?php echo $row['qualifications_id']; ?>" />
                                                        <label for="checks<?php echo $row['qualifications_id']; ?>"><?php echo $row['qualifications_name']; ?></label>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-3">
                                    <div class="filt-com lhs-featu">
                                        <ul>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="ndis_workers_screeners_checks" value="ndis_workers_screeners_checks" class="feature_check" id="ndis_workers_screeners_checks" />
                                                    <label for="ndis_workers_screeners_checks">NDIS Workers Screeners Checks</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="certificate_3_in_disability_support" value="certificate_3_in_disability_support" class="feature_check" id="certificate_3_in_disability_support" />
                                                    <label for="certificate_3_in_disability_support">Certificate 3 in Disability Support</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="abn" value="abn" class="feature_check" id="abn" />
                                                    <label for="abn">ABN</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="current_first_aid_and_cpr" value="current_first_aid_and_cpr" class="feature_check" id="current_first_aid_and_cpr" />
                                                    <label for="current_first_aid_and_cpr">Current First- Aid and CPR </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="PI_PL_insurance" value="PI_PL_insurance" class="feature_check" id="PI_PL_insurance" />
                                                    <label for="PI_PL_insurance">PI/PL Insurance</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="covid_19_VACC" value="covid_19_VACC" class="feature_check" id="covid_19_VACC" />
                                                    <label for="covid_19_VACC">Covid 19 VACC</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="full_driving_license" value="full_driving_license" class="feature_check" id="full_driving_license" />
                                                    <label for="full_driving_license">Full Driving License</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="comprehensive_car_insurance" value="comprehensive_car_insurance" class="feature_check" id="comprehensive_car_insurance" />
                                                    <label for="comprehensive_car_insurance">Comprehensive Car Insurance</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="completed_NDIS_worker_orientation_module" value="completed_NDIS_worker_orientation_module" class="feature_check" id="completed_NDIS_worker_orientation_module" />
                                                    <label for="completed_NDIS_worker_orientation_module">Completed NDIS Worker Orientation Module</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="police_checks" value="police_checks" class="feature_check" id="police_checks" />
                                                    <label for="police_checks">Police Checks</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="filt-com lhs-featu">
                                        <ul>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="certificate_III" value="certificate_III" class="feature_check" id="certificate_III" />
                                                    <label for="certificate_III">Certificate III in Individual Support</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="certificate_IV" value="certificate_IV" class="feature_check" id="certificate_IV" />
                                                    <label for="certificate_IV">Certificate IV in Disability</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="diploma_of_community_services" value="diploma_of_community_services" class="feature_check" id="diploma_of_community_services" />
                                                    <label for="diploma_of_community_services">Diploma of Community Services</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="working_with_children_check" value="working_with_children_check" class="feature_check" id="working_with_children_check" />
                                                    <label for="working_with_children_check">Working With Children Check</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="basic_computer_and_technology_knowledge" value="basic_computer_and_technology_knowledge" class="feature_check" id="basic_computer_and_technology_knowledge" />
                                                    <label for="basic_computer_and_technology_knowledge">Basic Computer and Technology Knowledge (including mobile apps)</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="CPR_certificate" value="CPR_certificate" class="feature_check" id="CPR_certificate" />
                                                    <label for="CPR_certificate">CPR certificate</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="first_aid_certificate" value="first_aid_certificate" class="feature_check" id="first_aid_certificate" />
                                                    <label for="first_aid_certificate">First Aid certificate</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="cert_III" value="cert_III" class="feature_check" id="cert_III" />
                                                    <label for="cert_III">Cert III or higher in relevant field</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="paid_experience" value="paid_experience" class="feature_check" id="paid_experience" />
                                                    <label for="paid_experience">Must have 12+ months PAID experience working in a similar role</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="QLD_paid_blue_card" value="QLD_paid_blue_card" class="feature_check" id="QLD_paid_blue_card" />
                                                    <label for="QLD_paid_blue_card">QLD PAID Blue Card/ Working with Children Check</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="filt-com lhs-featu">
                                        <ul>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="paid_NDIS_worker" value="paid_NDIS_worker" class="feature_check" id="paid_NDIS_worker" />
                                                    <label for="paid_NDIS_worker">PAID NDIS Worker Screening Clearance</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="first_aid_cert" value="first_aid_cert" class="feature_check" id="first_aid_cert" />
                                                    <label for="first_aid_cert">First Aid Certificate (current)</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="CPR_cert" value="CPR_cert" class="feature_check" id="CPR_cert" />
                                                    <label for="CPR_cert">CPR Certificate (current)</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="covid_vaccinated" value="covid_vaccinated" class="feature_check" id="covid_vaccinated" />
                                                    <label for="covid_vaccinated">COVID Vaccinated (2 doses)</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="QLD_driver_licence" value="QLD_driver_licence" class="feature_check" id="QLD_driver_licence" />
                                                    <label for="QLD_driver_licence">Unrestricted Open QLD Driver Licence</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="own_reliable_transport" value="own_reliable_transport" class="feature_check" id="own_reliable_transport" />
                                                    <label for="own_reliable_transport">Own reliable transport (willing to use for work)</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="car_insurance" value="car_insurance" class="feature_check" id="car_insurance" />
                                                    <label for="car_insurance">Full Comprehensive Car Insurance</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="smartphone" value="smartphone" class="feature_check" id="smartphone" />
                                                    <label for="smartphone">Smartphone (iOS or Android)</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="positive_notice_yellow_card" value="positive_notice_yellow_card" class="feature_check" id="positive_notice_yellow_card" />
                                                    <label for="positive_notice_yellow_card">Positive Notice Yellow Card or NDIS Worker Screening Check</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="covid19_with_up_to_date" value="covid19_with_up_to_date" class="feature_check" id="covid19_with_up_to_date" />
                                                    <label for="covid19_with_up_to_date">certificate of COVID-19 with up-to-date status</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="filt-com lhs-featu">
                                        <ul>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="positive_notice_blue_card" value="positive_notice_blue_card" class="feature_check" id="positive_notice_blue_card" />
                                                    <label for="positive_notice_blue_card"> Positive Notice - Blue Card</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="queensland_driver_licence" value="queensland_driver_licence" class="feature_check" id="queensland_driver_licence" />
                                                    <label for="queensland_driver_licence">Open Queensland Driver Licence with vehicle insurance</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="first_aid_CPR_cert" value="first_aid_CPR_cert" class="feature_check" id="first_aid_CPR_cert" />
                                                    <label for="first_aid_CPR_cert">Current First Aid & CPR Certificate</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="reliable_smartphone" value="reliable_smartphone" class="feature_check" id="reliable_smartphone" />
                                                    <label for="reliable_smartphone">Reliable smartphone with data</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="100_points_of_id" value="100_points_of_id" class="feature_check" id="100_points_of_id" />
                                                    <label for="100_points_of_id">100 points of ID</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="competent_with_microsoft_office" value="competent_with_microsoft_office" class="feature_check" id="competent_with_microsoft_office" />
                                                    <label for="competent_with_microsoft_office">Competent with Microsoft Office suite particularly MS Word and MS Outlook</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="manual_handling_cert" value="manual_handling_cert" class="feature_check" id="manual_handling_cert" />
                                                    <label for="manual_handling_cert"> Current Manual Handling Certificate</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="medication_cert" value="medication_cert" class="feature_check" id="medication_cert" />
                                                    <label for="medication_cert">Medication Certificates</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="flu_vaccination" value="flu_vaccination" class="feature_check" id="flu_vaccination" />
                                                    <label for="flu_vaccination">Flu vaccination</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="chbox">
                                                    <input type="checkbox" name="evidence_right_to_work" value="evidence_right_to_work" class="feature_check" id="evidence_right_to_work" />
                                                    <label for="evidence_right_to_work">Evidence of right to work in Australia</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" autocomplete="off" name="upload_photo_emoji" id="upload_photo_emoji" class="form-control colorBackground" placeholder="Upload Photo/ Emoji" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="language" id="language" class="form-control colorBackground ca-check-plan">
                                            <option value="">Language</option>
                                            <option value="Engllsh">Engllsh</option>
                                            <option value="Spanish">Spanish</option>
                                            <option value="French">French</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea  autocomplete="off" name="about_me" id="about_me" class="form-control colorBackground" placeholder="About me" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                            </div> -->
                            <h4>Other Details</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="pet_friendly" id="pet_friendly" class="form-control colorBackground ca-check-plan">
                                            <option value="">Pet friendly !</option>
                                            <?php foreach (getAllPetFriendly() as $Petrow) { ?>
                                                <option value="<?php echo $Petrow['pet_fri_id']; ?>"><?php echo $Petrow['pet_fri_name']; ?></option>
                                            <?php } ?>
                                            <!-- <option value="Happy">Happy </option>
                                            <option value="Not Happy">Not Happy</option>
                                            <option value="No preference">No preference</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="gender" id="gender" class="form-control colorBackground ca-check-plan">
                                            <option value="">Gender</option>
                                            <option value="Engllsh">Male </option>
                                            <option value="Spanish">Female</option>
                                            <option value="French">No Preference</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h4>Work History</h4>
                            <div class="login-main" style="float: right;">
                                <span class="add-list-add-btn lis-wor-his-add-btn slots-add" title="add new offer">+</span>
                                <span class="add-list-rem-btn lis-wor-his-rem-btn slots-rev" title="remove offer">-</span>
                            </div></br></br>
                            <div class="add-list-ser">
                                <ul>
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
                                                    <input type="date" autocomplete="off" name="workexp[0][work_from]" id="work_from0" class="form-control colorBackground" placeholder="From" onchange="calculateDateDifference(0)" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="date" autocomplete="off" name="workexp[0][work_to]" id="work_to0" class="form-control colorBackground" placeholder="To" onchange="calculateDateDifference(0)" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" autocomplete="off" name="workexp[0][exp_year_month]" id="exp_year_month0" class="form-control colorBackground" placeholder="Year and month" readonly>
                                                </div>
                                            </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Support Preference</h4>
                                    <div class="form-group ca-sh-user">
                                        <select name="support_prefer" id="support_prefer" class="form-control colorBackground ca-check-plan">
                                            <option value="">Support Preference</option>
                                            <?php foreach (getAllSupportPreference() as $supprerow) { ?>
                                                <option value="<?php echo $supprerow['supp_pre_id']; ?>"><?php echo $supprerow['support_prefer_name']; ?></option>
                                            <?php } ?>
                                            <!-- <option value="Adult">Adult</option>
                                            <option value="Childern">Childern</option>
                                            <option value="Teenagers">Teenagers</option>
                                            <option value="Elderly">Elderly</option> -->
                                        </select>
                                    </div>
                                </div>
                                <!-- <h4>Feedback and Endorsements</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="ranking" id="ranking" class="form-control colorBackground ca-check-plan">
                                            <option value="">Ranking</option>
                                            <option value="1">1 Star</option>
                                            <option value="2">2 Star</option>
                                            <option value="3">3 Star</option>
                                            <option value="4">4 Star</option>
                                            <option value="5">5 Star</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                                <div class="col-md-6">
                                    <h4>Work Availability</h4>
                                    <div class="form-group ca-sh-user">
                                        <select name="work_avail" id="work_avail" class="form-control colorBackground ca-check-plan">
                                            <option value="">Availble for work </option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="support_worker_submit" class="btn btn-primary"><?php echo $BIZBOOK['REGISTER_NOW']; ?></button>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END PRICING DETAILS-->
<section>
    <div class="pop-ups pop-quo">
        <!-- The Modal -->
        <div class="modal fade" id="quote">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- Modal Header -->
                    <div class="quote-pop">
                        <h4><?php echo $BIZBOOK['LEAD-GET-QUOTE']; ?></h4>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control colorBackground" placeholder="<?php echo $BIZBOOK['LEAD-NAME-PLACEHOLDER']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control colorBackground" placeholder="<?php echo $BIZBOOK['ENTER_EMAIL_STAR']; ?>" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="<?php echo $BIZBOOK['LEAD-INVALID-EMAIL-TITLE']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control colorBackground" placeholder="<?php echo $BIZBOOK['LEAD-MOBILE-PLACEHOLDER']; ?>" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control colorBackground" rows="3" placeholder="<?php echo $BIZBOOK['LEAD-MESSAGE-PLACEHOLDER']; ?>"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo $BIZBOOK['SUBMIT']; ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>
    function calculateAge() {
        const birth_yearInput = document.getElementById("birth_year");
        const birth_year = new Date(birth_yearInput.value);
        const today = new Date();
        const yearsDiff = today.getFullYear() - birth_year.getFullYear();
        const monthsDiff = today.getMonth() - birth_year.getMonth();
        const daysDiff = today.getDate() - birth_year.getDate();
        // Adjust for negative months and days differences
        if (monthsDiff < 0 || (monthsDiff === 0 && daysDiff < 0)) {
            yearsDiff--;
            monthsDiff += 12;
            daysDiff += (new Date(today.getFullYear(), today.getMonth(), 0)).getDate();
        }
        const age = {
            years: yearsDiff,
            months: monthsDiff,
            days: daysDiff,
        };
        document.getElementById("age").value = +age.years + " years, " + age.months + " months, " + age.days + " days";
    }

    function calculateDateDifference(index) {
        const fromDateInput = document.getElementById("work_from" + index);
        const toDateInput = document.getElementById("work_to" + index);
        const fromDate = new Date(fromDateInput.value);
        const toDate = new Date(toDateInput.value);
        if (fromDate > toDate) {
            // Handle error if the "toDate" is earlier than the "fromDate"
            alert("To date must be later than from date.");
            return;
        }
        const diffMilliseconds = toDate - fromDate;
        const diffDate = new Date(diffMilliseconds);
        const yearsDiff = diffDate.getUTCFullYear() - 1970;
        const monthsDiff = diffDate.getUTCMonth();
        const difference = {
            years: yearsDiff,
            months: monthsDiff,
        };
        // Update the "Year and month" input field for this set of date input fields
        const expYearMonthInput = document.getElementById("exp_year_month" + index);
        expYearMonthInput.value = difference.years + " years, " + difference.months + " months";
    }
</script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
    var webpage_full_link = '<?php echo $webpage_full_link; ?>';
</script>
<script type="text/javascript">
    var login_url = '<?php echo $LOGIN_URL; ?>';
</script>
<script src="js/custom.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/custom_validation.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function(){
 
    // Initialize select2
    $("#sellanguge").select2();


});
</script>
<?php
include "google_address_api.php";
?>
<script>
    $(document).ready(function() {
        var background_color_green = '#21d78d';


        $('.colorBackground').on('input', function() {
            if ($(this).val().trim() !== '') {
                $(this).css("background-color", background_color_green);
            } else {
                $(this).css("background-color", "");
            }
        });





        // $('#address').on('propertychange input', function(e) {
        //     var valueChanged = false;

        //     if (e.type == 'propertychange') {
        //         valueChanged = e.originalEvent.propertyName == 'value';
        //     } else {
        //         valueChanged = true;
        //     }
        //     if (valueChanged) {
        //         /* Code goes here */
        //         if ($(this).val().trim() != '') {
        //             $("#address").css("background-color", background_color_green);
        //             $("#address").css("border", "");
        //         } else {
        //             $("#address").css("background-color", "");
        //         }
        //     }
        // });




        // $('#country').on('propertychange input', function(e) {
        //     var valueChanged = false;

        //     if (e.type == 'propertychange') {
        //         valueChanged = e.originalEvent.propertyName == 'value';
        //     } else {
        //         valueChanged = true;
        //     }

        //     if (valueChanged) {
        //         /* Code goes here */
        //         if ($(this).val().trim() != '') {
        //             alert($(this).val().trim());
        //             $("#country").css("background-color", background_color_green);
        //             $("#country").css("border", "");
        //         } else {
        //             alert('bye');
        //             $("#country").css("background-color", "");
        //         }
        //     }
        // });



    });
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
<?php
if (isset($_GET["page"])) {
?>
    <?php
    if (isset($_POST['SubmitButton'])) { // Check if form was submitted
        if (!empty($_FILES['inputText']['name'])) {
            $file = rand(1000, 100000) . $_FILES['inputText']['name'];
            $file_loc = $_FILES['inputText']['tmp_name'];
            $file_size = $_FILES['inputText']['size'];
            $file_type = $_FILES['inputText']['type'];
            $folder = "images/listings/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $event_image = str_replace(' ', '-', $new_file_name);
            //move_uploaded_file($file_loc, $folder . $event_image);
            $inputText1 = compressImage($event_image, $file_loc, $folder, $new_size);
            $inputText = $inputText1;
        }
    }
    ?>
    <form action="#" enctype="multipart/form-data" method="post">
        <input type="file" name="inputText" />
        <input type="submit" name="SubmitButton" />
    </form>
<?php
}
?>
</body>

</html>