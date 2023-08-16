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
    // $user_id = $_COOKIE['user_id'];
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
<style>
input, select {
  padding: 5px;
  border: 1px solid #ccc;
}
.colorBackground.empty {
  background-color: white;
}

/* CSS for non-empty input fields */
.colorBackground.has-value {
  background-color: #66ff99;
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
                                        <input type="text" autocomplete="off" name="first_name" id="first_name" value="<?php echo $first_name; ?>" class="form-control colorBackground" placeholder="First Name" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" autocomplete="off" name="last_name" id="last_name" value="<?php echo $last_name; ?>" class="form-control colorBackground" placeholder="Last Name" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" autocomplete="off" name="email_id" id="email_id" value="<?php echo $email_id; ?>" class="form-control colorBackground" placeholder="<?php echo $BIZBOOK['EMAIL_ID_STAR']; ?>"  >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" onkeypress="return isNumber(event)" autocomplete="off" value="<?php echo $mobile_number; ?>" name="mobile_number" id="mobile_number" class="form-control colorBackground" placeholder="<?php echo $BIZBOOK['PHONE']; ?>" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="address" value="<?php echo $first_name; ?>" id="address" class="form-control colorBackground" placeholder="Address" required>
                                    </div>
                                </div>
                            </div>
                                <h4>Personal Details</h4>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="Date" autocomplete="off" name="birth_year" id="birth_year" class="form-control colorBackground" placeholder="Birth Year" onchange="calculateAge()" required>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" autocomplete="off" name="age" id="age" class="form-control colorBackground" placeholder="Current Age">
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
                                        <select name="language" id="language" class="form-control colorBackground ca-check-plan">
                                            <option value="">Language</option>
                                            <?php foreach (getAllLanguages() as $Lrow) { ?>
                                                <option value="<?php echo $Lrow['id']; ?>"><?php echo $Lrow['language_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="pet_friendly" id="pet_friendly" class="form-control colorBackground ca-check-plan">
                                            <option value="">Pet friendly !</option>
                                            <?php foreach (getAllPetFriendly() as $Petrow) { ?>
                                                <option value="<?php echo $Petrow['pet_fri_id']; ?>"><?php echo $Petrow['pet_fri_name']; ?></option>
                                            <?php } ?>

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
                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="ABN_number" id="ABN_number" class="form-control colorBackground ca-check-plan">
                                            <option value="">ABN Number</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="type_of_support_work" id="type_of_support_work" class="form-control colorBackground ca-check-plan">
                                            <option value="">Type of Support Work</option>

                                            <?php foreach (getAllWorkers() as $workerrow) { ?>
                                                <option value="<?php echo $workerrow['supp_worker_type_id']; ?>"><?php echo $workerrow['type_name']; ?></option>
                                            <?php } ?>

                                        </select>
                                        <!-- <a href="user-type" class="frmtip" target="_blank">Type of Support Work</a> -->
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="how_did_you_hear_about_us" id="how_did_you_hear_about_us" class="form-control colorBackground ca-check-plan">
                                            <option value="">How did you hear about us?</option>
                                            <?php foreach (getAllQueAboutUs() as $aboutUsrow) { ?>
                                                <option value="<?php echo $aboutUsrow['sw_about_us_id']; ?>"><?php echo $aboutUsrow['sw_about_us_name']; ?></option>
                                            <?php } ?>

                                        </select>

                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <h4>Support Preference</h4>
                                    <div class="form-group ca-sh-user">
                                        <select name="support_prefer" id="support_prefer" class="form-control colorBackground ca-check-plan">
                                            <option value="">Support Preference</option>
                                            <?php foreach (getAllSupportPreference() as $supprerow) { ?>
                                                <option value="<?php echo $supprerow['supp_pre_id']; ?>"><?php echo $supprerow['support_prefer_name']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>

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

                                <!-- <div class="col-md-6">
                                    <div class="form-group ca-sh-user">
                                        <select name="language" id="sellanguge" class="form-control select2 colorBackground ca-check-plan">
                                            <option value="">Language</option>
                                            <?php foreach (getAllLanguages() as $Lrow) { ?>
                                                <option value="<?php echo $Lrow['id']; ?>"><?php echo $Lrow['language_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea autocomplete="off" name="about_me" id="about_me" class="form-control colorBackground" placeholder="About me" cols="30" rows="3"></textarea>
                                    </div>
                                </div>


                            </div>




                            <h4>Support Offered</h4>
                            <div class="row">
                            <?php foreach (getAllSupportOffer() as $sorow) { ?>
                            <div class="col-md-6">

                                    <ul>
                                        <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="showering[]" value="<?php echo $sorow['supp_offer_id']; ?>" class="feature_check" id="suppOffr<?php echo $sorow['supp_offer_id']; ?>"/>
                                            <label for="suppOffr<?php echo $sorow['supp_offer_id']; ?>"><h6><?php echo $sorow['offer_title']; ?></h6></label>
                                        </div>
                                        </li>
                                        <li>
                                        <span><small><?php echo $sorow['offer_name']; ?></small></span>
                                        </li>
                                    </ul>
                                </div>

                            <?php } ?>

                            </div>



                            <h4>Qualifications</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="filt-com lhs-featu">
                                    <h4>Qualifications</h4>
                                        <ul>
                                            <?php
                                            foreach (getAllQualificationsData("Qualifications") as $row) { ?>
                                            <li>
                                            <div class="chbox">
                                                <input type="checkbox" name="qualifications[]" value="<?php echo $row['qualifications_id']; ?>" class="feature_check" id="checks<?php echo $row['qualifications_id']; ?>"/>
                                                <label for="checks<?php echo $row['qualifications_id']; ?>"><?php echo $row['qualifications_name']; ?></label>
                                            </div>
                                            </li>
                                            <?php } ?>
                                            <li>
                                            <input type="text" autocomplete="off" name="other_qualifications" id="other_qualifications" class="form-control colorBackground error" placeholder="Other Qualifications" >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="filt-com lhs-featu">
                                    <h4>Certificates</h4>

                                        <ul>
                                            <?php
                                            foreach (getAllQualificationsData("Certificates") as $row) { ?>
                                            <li>
                                            <div class="chbox">
                                                <input type="checkbox" name="certificates[]" value="<?php echo $row['qualifications_id']; ?>" class="feature_check" id="checks<?php echo $row['qualifications_id']; ?>"/>
                                                <label for="checks<?php echo $row['qualifications_id']; ?>"><?php echo $row['qualifications_name']; ?></label>
                                            </div>
                                            </li>
                                            <?php } ?>
                                            <li>
                                            <input type="text" autocomplete="off" name="other_certificates" id="other_certificates" class="form-control colorBackground error" placeholder="Other Certificates" >
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="filt-com lhs-featu">
                                    <h4>Skills</h4>
                                        <ul>
                                            <?php
                                            foreach (getAllQualificationsData("Skills") as $row) { ?>
                                            <li>
                                            <div class="chbox">
                                                <input type="checkbox" name="skills[]" value="<?php echo $row['qualifications_id']; ?>" class="feature_check" id="checks<?php echo $row['qualifications_id']; ?>"/>
                                                <label for="checks<?php echo $row['qualifications_id']; ?>"><?php echo $row['qualifications_name']; ?></label>
                                            </div>
                                            </li>
                                            <?php } ?>
                                            <li>
                                            <input type="text" autocomplete="off" name="other_skills" id="other_skills" class="form-control colorBackground error" placeholder="Other Skills">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="login-main add-list add-ncate">
                                    <h4>Availability Time Details</h4>
                                    <ul>
                                        <li>
                                            <div class="col-md-12">
                                                <div class="form-group chbox">
                                                    <input type="checkbox" name="days[Monday][day]" value="Monday" class="feature_check" id="Monday1" />
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
                                                    <input type="checkbox" name="days[Tuesday][day]" value="Tuesday" class="feature_check" id="Tuesday1" />
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
                                                    <input type="checkbox" name="days[Wednesday][day]" value="Wednesday" class="feature_check" id="Wednesday1" />
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
                                                    <input type="checkbox" name="days[Thursday][day]" value="Thursday" class="feature_check" id="Thursday1" />
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
                                                    <input type="checkbox" name="days[Friday][day]" value="Friday" class="feature_check" id="Friday1" />
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
                                                    <input type="checkbox" name="days[Saturday][day]" value="Saturday" class="feature_check" id="Saturday1" />
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
                                                    <input type="checkbox" name="days[Sunday][day]" value="Sunday" class="feature_check" id="Sunday1">
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
                                                    <input type="text" autocomplete="off" name="workexp[0][position]" id="position" class="form-control colorBackground" placeholder="Position" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" autocomplete="off" name="workexp[0][company_name]" id="company_name" class="form-control colorBackground" placeholder="Company's name" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="date" autocomplete="off" name="workexp[0][work_from]" id="work_from0" class="form-control colorBackground" placeholder="From" onchange="calculateDateDifference(0)" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="date" autocomplete="off" name="workexp[0][work_to]" id="work_to0" class="form-control colorBackground" placeholder="To" onchange="calculateDateDifference(0)">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" autocomplete="off" name="workexp[0][exp_year_month]" id="exp_year_month0" class="form-control colorBackground" placeholder="Year and month" >
                                                </div>
                                            </div>
                                    </li>
                                </ul>
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
const customInputs = document.querySelectorAll('.colorBackground');

function handleInputChange(event) {
  const inputField = event.target;
  if (inputField.value.trim() === '') {
    inputField.classList.add('empty');
    inputField.classList.remove('has-value');
  } else {
    inputField.classList.add('has-value');
    inputField.classList.remove('empty');
  }
}

customInputs.forEach(input => {
  input.addEventListener('input', handleInputChange);
  // Check initial values on page load
  if (input.value.trim() === '') {
    input.classList.add('empty');
  } else {
    input.classList.add('has-value');
  }
});

const workAvailSelect = document.getElementById('work_avail');

function handleSelectChange() {
  if (workAvailSelect.value.trim() === '') {
    workAvailSelect.classList.add('empty');
  } else {
    workAvailSelect.classList.remove('empty');
  }
}

workAvailSelect.addEventListener('change', handleSelectChange);
// Check initial value on page load
if (workAvailSelect.value.trim() === '') {
  workAvailSelect.classList.add('empty');
}


</script>
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


            // $('.colorBackground').on('input', function() {
            //     if ($(this).val().trim() !== '') {
            //         $(this).css("background-color", background_color_green);
            //     } else {
            //         $(this).css("background-color", "");
            //     }
            // });





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