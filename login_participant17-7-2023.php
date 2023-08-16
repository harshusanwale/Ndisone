<?php
include "header.php";
if (!isset($_COOKIE['user_id'])) {
    echo "'user_id' is not Created!";
    unset($_COOKIE['user_id']);
    die;
} else {
    $user_id = $_COOKIE['user_id'];
    unset($_COOKIE['user_id']);
    $login = mysqli_query($conn, "SELECT * FROM " . TBL . "users  WHERE user_id = '$user_id'");
    if (mysqli_num_rows($login) > 0) {
        $login_row = mysqli_fetch_array($login);
        $first_name = $login_row['first_name'];
        $last_name = $login_row['last_name'];
        $email_id = $login_row['email_id'];
        $mobile_number = $login_row['mobile_number'];
    }
}
if (isset($_POST['register_submit'])) {
    $upqry = "UPDATE " . TBL . "users SET
                      w_n_services = '" . $_POST['w_n_services'] . "',
                      p_age_range = '" . $_POST['p_age_range'] . "',
                      n_p_managed = '" . $_POST['n_p_managed'] . "',
                      service_location = '" . $_POST['service_location'] . "',
                      relation_w_p = '" . $_POST['relation_w_p'] . "',
                      p_first_name = '" . $_POST['p_first_name'] . "',
                      p_last_name = '" . $_POST['p_last_name'] . "',
                      age_range = '" . $_POST['age_range'] . "',
                      p_contact_method = '" . $_POST['p_contact_method'] . "',
                      p_identify_as = '" . $_POST['p_identify_as'] . "',
                      language_spoken = '" . $_POST['language_spoken'] . "',
                      interpreter_r = '" . $_POST['interpreter_r'] . "',
                      ndis_number = '" . $_POST['ndis_number'] . "'
                      WHERE user_id = $user_id";
    $upres = mysqli_query($conn, $upqry);
    //now add the three
    $_SESSION['user_code'] = $login_row['user_code'];
    $_SESSION['user_name'] = $login_row['first_name'];
    $_SESSION['user_id'] = $user_id;
    //header("Location: login");
}
if (isset($_POST['register_skip'])) {
    $_SESSION['user_code'] = $login_row['user_code'];
    $_SESSION['user_name'] = $login_row['first_name'];
    $_SESSION['user_id'] = $user_id;
}
if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
    header("Location: dashboard");
}
?>
<!-- START -->
<!--PRICING DETAILS-->
<section class="<?php if ($footer_row['admin_language'] == 2) {
                    echo "lg-arb";
                } ?> login-reg">
    <div class="container">
        <div class="row">
            <div class="login-main" style="width:auto">
                <div class="log-bor">&nbsp;</div>
                <div class="log log-1">
                    <div class="login login-new">
                        <h4><?php echo $BIZBOOK['MEMBER_LOGIN']; ?></h4>
                        <?php
                        if (isset($_SESSION['login_status_msg'])) {
                            include "page_level_message.php";
                            unset($_SESSION['login_status_msg']);
                        }
                        ?>
                        <form id="login_form" name="login_form" method="post" action="login_check.php">
                            <?php
                            if (isset($_GET['src'])) {
                            ?>
                                <input type="hidden" autocomplete="off" name="src" id="src" value="<?php echo $_GET['src'] ?>">
                            <?php
                            }
                            ?>
                            <div class="form-group">
                                <input type="email" autocomplete="off" name="email_id" id="email_id" class="form-control" placeholder="<?php echo $BIZBOOK['ENTER_EMAIL_STAR']; ?>" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Enter email address" value="" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo $BIZBOOK['ENTER_PASSWORD_STAR']; ?>" required value="">
                            </div>
                            <button type="submit" name="login_submit" value="submit" class="btn btn-primary"><?php echo $BIZBOOK['SIGN_IN']; ?>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="log log-2">
                    <div class="login login-new">
                        <?php
                        if (isset($_SESSION['register_status_msg'])) {
                            include "page_level_message.php";
                            unset($_SESSION['register_status_msg']);
                        }
                        ?>
                        <h4>Few steps to go!</h4>
                        <p>Fill in the below information. This will help to connect with the right service provider. </p>
                        <form name="login_participant" id="login_participant" method="post" action="login_participant.php">
                            <div class="row form-group">
                                <div class="form-group col-sm-12">Who needs services !
                                    <select required name="w_n_services" id="w_n_services" class="red_message form-control ca-check-plan2">
                                        <option value="">--Select--</option>
                                        <option value="Myself"><?php echo "Myself"; ?></option>
                                        <option value="Someone I care for"><?php echo "Someone I care for"; ?></option>
                                        <option value="My Client"><?php echo "My Client"; ?></option>
                                    </select>
                                    <div class="form-group ca-sh-plan2" style="display:none">
                                        If you are Support Coordinator, you can also open your indiviual account.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ca-sh-plan_participant_detail" style="display:none">
                                <div class="row form-group">
                                    <div class="form-group col-sm-6">Participant First Name
                                        <input type="text" autocomplete="off" name="p_first_name" id="p_first_name" class="red_message form-control c_p_first_name" placeholder="<?php echo "Enter Participant First Name"; ?>" value="">
                                    </div>
                                    <div class="form-group col-sm-6">Participant Last Name
                                        <input type="text" autocomplete="off" name="p_last_name" id="p_last_name" class="red_message form-control c_p_last_name" placeholder="<?php echo "Enter Participant Last Name"; ?>" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ca-sh-plan_user_info" style="display:none">
                                <div class="row form-group">
                                    <div class="form-group col-sm-6">First Name
                                        <input style="background-color: #21d78d;" readonly type="text" autocomplete="off" name="d_first_name" id="d_first_name" class="form-control" placeholder="Enter First Name" value="<?php echo $first_name; ?>">
                                    </div>
                                    <div class="form-group col-sm-6">Last Name
                                        <input style="background-color: #21d78d;" readonly type="text" autocomplete="off" name="d_last_name" id="d_last_name" class="form-control" placeholder="Enter Last Name" value="<?php echo $last_name; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="form-group col-sm-6">Email Address
                                        <input style="background-color: #21d78d;" readonly type="text" autocomplete="off" name="d_email_id" id="d_email_id" class="form-control" placeholder="<?php echo $BIZBOOK['EMAIL_ID_STAR']; ?>" value="<?php echo $email_id; ?>">
                                    </div>
                                    <div class="form-group col-sm-6">Mobile Number
                                        <input style="background-color: #21d78d;" readonly type="text" autocomplete="off" name="d_mobile_number" id="d_mobile_number" class="form-control" placeholder="<?php echo $BIZBOOK['PHONE']; ?>" value="<?php echo $mobile_number; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-sm-6">How is your NDIS plan managed?
                                    <select required name="n_p_managed" id="n_p_managed" class="red_message form-control">
                                        <option value="">--Select--</option>
                                        <option value="Self managed"><?php echo "Self managed"; ?></option>
                                        <option value="Plan managed"><?php echo "Plan managed"; ?></option>
                                        <option value="Agency managed"><?php echo "Agency managed"; ?></option>
                                        <option value="Waiting for approval"><?php echo "Waiting for approval"; ?></option>
                                        <option value="Not with NDIS"><?php echo "Not with NDIS"; ?></option>
                                        <option value="Unsure"><?php echo "Unsure"; ?></option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">Your Service location
                                    <input required type="text" autocomplete="off" name="service_location" id="service_location" class="red_message form-control" placeholder="Enter Your Service location">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="form-group col-sm-6 ca-sh-plan_participant_detail_relation" style="display:none">Relationship with the participant
                                    <select name="relation_w_p" id="relation_w_p" class="red_message form-control c_relation_w_p">
                                        <option value="">--Select--</option>
                                        <option value="Parent"><?php echo "Parent"; ?></option>
                                        <option value="Child"><?php echo "Child"; ?></option>
                                        <option value="Partner"><?php echo "Partner"; ?></option>
                                        <option value="Relative"><?php echo "Relative"; ?></option>
                                        <option value="Other"><?php echo "Other"; ?></option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6 ca-sh-plan_participant_detail_relation" style="display:none">Age Range
                                    <select name="age_range" id="age_range" class="red_message form-control c_age_range">
                                        <option value="">--Select--</option>
                                        <option value="Early Childhood (0-7 years)"><?php echo "Early Childhood (0-7 years)"; ?></option>
                                        <option value="Children (8-16 years)"><?php echo "Children (8-16 years)"; ?></option>
                                        <option value="Young people (17-21 years)"><?php echo "Young people (17-21 years)"; ?></option>
                                        <option value="Adults (22-59 years)"><?php echo "Adults (22-59 years)"; ?></option>
                                        <option value="Mature Age (60+ years)"><?php echo "Mature Age (60+ years)"; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-sm-6">Prefer Contact Method
                                    <select required name="p_contact_method" id="p_contact_method" class="red_message form-control">
                                        <option value="">--Select--</option>
                                        <option value="Phone Call"><?php echo "Phone Call"; ?></option>
                                        <option value="SMS"><?php echo "SMS"; ?></option>
                                        <option value="Email"><?php echo "Email"; ?></option>
                                        <option value="Any"><?php echo "Any"; ?></option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">Participant Identify as
                                    <select required name="p_identify_as" id="p_identify_as" class="red_message red_message form-control">
                                        <option value="">--Select--</option>
                                        <option value="Male ( He/Him)"><?php echo "Male ( He/Him)"; ?></option>
                                        <option value="Femate ( She/Her)"><?php echo "Femate ( She/Her)"; ?></option>
                                        <option value="Non-binary ( they/them)"><?php echo "Non-binary ( they/them)"; ?></option>
                                        <option value="Other"><?php echo "Other"; ?></option>
                                        <option value="Prefer not to say"><?php echo "Prefer not to say"; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-sm-6">What language is spoken at home?
                                    <input required type="text" autocomplete="off" name="language_spoken" id="language_spoken" class="red_message form-control" placeholder="<?php echo "Enter What language is spoken at home?"; ?>" value="">
                                </div>
                                <div class="form-group col-sm-6">Is an interpreter required?
                                    <select required name="interpreter_r" id="interpreter_r" class="red_message form-control">
                                        <option value="">--Select--</option>
                                        <option value="yes"><?php echo "Yes"; ?></option>
                                        <option value="no"><?php echo "No"; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-sm-6">NDIS Number(if applicable)
                                    <input required type="text" autocomplete="off" name="ndis_number" id="ndis_number" class="red_message form-control" placeholder="<?php echo "Enter NDIS Number(if applicable)"; ?>" value="">
                                </div>
                                <div class="form-group col-sm-6">Participant Age Range
                                    <select required name="p_age_range" id="p_age_range" class="red_message form-control">
                                        <option value="">--Select--</option>
                                        <option value="Early Childhood (0-7 years)"><?php echo "Early Childhood (0-7 years)"; ?></option>
                                        <option value="Children (8-16 years)"><?php echo "Children (8-16 years)"; ?></option>
                                        <option value="Young people (17-21 years)"><?php echo "Young people (17-21 years)"; ?></option>
                                        <option value="Adults (22-59 years)"><?php echo "Adults (22-59 years)"; ?></option>
                                        <option value="Mature Age (60+ years)"><?php echo "Mature Age (60+ years)"; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-sm-6">
                                    <button type="submit" name="register_submit" class="btn btn-primary"><?php echo "Enter"; ?></button>
                                </div>
                                <div class="form-group col-sm-6">
                                    <!--<a href="login_check" class="btn btn-primary">Skip!  I will enter later </a> -->
                                    <button type="submit" id="btnSubmit" name="register_skip" class="btn btn-primary"><?php echo "Skip!  I will enter later"; ?></button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if ($footer_row['admin_google_login'] == 1 || $footer_row['admin_facebook_login'] == 1) {
                        ?>
                            <!-- SOCIAL MEDIA LOGIN -->
                            <!-- END SOCIAL MEDIA LOGIN -->
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="log log-3">
                    <div class="login login-new">
                        <?php
                        if (isset($_SESSION['forgot_status_msg'])) {
                            include "page_level_message.php";
                            unset($_SESSION['forgot_status_msg']);
                        }
                        ?>
                        <h4><?php echo $BIZBOOK['FORGOT_PASSWORD']; ?></h4>
                        <form id="forget_form" name="forget_form" method="post" action="forgot_process.php">
                            <div class="form-group">
                                <input type="email" autocomplete="off" name="email_id" id="email_id" class="form-control" placeholder="<?php echo $BIZBOOK['ENTER_EMAIL_STAR']; ?>" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="<?php echo $BIZBOOK['LEAD-INVALID-EMAIL-TITLE']; ?>" required>
                            </div>
                            <button type="submit" name="forgot_submit" class="btn btn-primary"><?php echo $BIZBOOK['SUBMIT']; ?></button>
                        </form>
                    </div>
                </div>
                <div class="log-bot">
                    <ul>
                        <li>
                            <span class="ll-1"><?php echo $BIZBOOK['LOGIN_QUESTIONMARK']; ?></span>
                        </li>
                        <li>
                            <span class="ll-2"><?php echo $BIZBOOK['CREATE_ACCOUNT_QUESTIONMARK']; ?></span>
                        </li>
                        <li>
                            <span class="ll-3"><?php echo $BIZBOOK['FORGOT_PASSWORD_QUESTIONMARK']; ?></span>
                        </li>
                    </ul>
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
                                <input type="text" class="form-control" placeholder="<?php echo $BIZBOOK['LEAD-NAME-PLACEHOLDER']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="<?php echo $BIZBOOK['ENTER_EMAIL_STAR']; ?>" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="<?php echo $BIZBOOK['LEAD-INVALID-EMAIL-TITLE']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="<?php echo $BIZBOOK['LEAD-MOBILE-PLACEHOLDER']; ?>" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="<?php echo $BIZBOOK['LEAD-MESSAGE-PLACEHOLDER']; ?>"></textarea>
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(".btn").on("click", function() {
        //  $("input, select").each(function () {
        $(".red_message").each(function() {
            // Check if the element is empty
            // and apply a style accordingly
            if ($(this).val() == "")
                $(this).css(
                    "border", "2px red solid"
                );
            else
                $(this).css(
                    "border", "2px 21d78d solid"
                );
        })
    });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
<script>
    $(document).ready(function() {
        var background_color_green = '#21d78d';

        $("#service_location").keyup(function() {
            if ($(this).val() != '') {
                $("#service_location").css("background-color", background_color_green);
                $("#service_location").css("border", "");
            } else {
                $("#service_location").css("background-color", "");
            }
        });
        //language_spoken
        $("#language_spoken").keyup(function() {
            if ($(this).val() != '') {
                $("#language_spoken").css("background-color", background_color_green);
                $("#language_spoken").css("border", "");
            } else {
                $("#language_spoken").css("background-color", "");
            }
        });
        //ndis_number
        $("#ndis_number").keyup(function() {
            if ($(this).val() != '') {
                $("#ndis_number").css("background-color", background_color_green);
                $("#ndis_number").css("border", "");
            } else {
                $("#ndis_number").css("background-color", "");
            }
        });
        $("#p_first_name").keyup(function() {
            if ($(this).val() != '') {
                $("#p_first_name").css("background-color", background_color_green);
                $("#p_first_name").css("border", "");
            } else {
                $("#p_first_name").css("background-color", "");
            }
        });
        $("#p_last_name").keyup(function() {
            if ($(this).val() != '') {
                $("#p_last_name").css("background-color", background_color_green);
                $("#p_last_name").css("border", "");
            } else {
                $("#p_last_name").css("background-color", "");
            }
        });

        $('#n_p_managed').on('change', function() {
            if ($(this).val() != '') {
                $(this).css("background", background_color_green);
                $(this).css("border", "");
            } else {
                $(this).css("background", "");
            }
            $('#n_p_managed').children().each(
                function() {
                    $(this).css({
                        'background': 'white'
                    });
                }
            );
        });
        $('#w_n_services').on('change', function() {
            if ($(this).val() != '') {
                $(this).css("background", background_color_green);
                $(this).css("border", "");
            } else {
                $(this).css("background", "");
            }
            $('#w_n_services').children().each(
                function() {
                    $(this).css({
                        'background': 'white'
                    });
                }
            );
        });
        $('#age_range').on('change', function() {
            if ($(this).val() != '') {
                $(this).css("background", background_color_green);
                $(this).css("border", "");
            } else {
                $(this).css("background", "");
            }
            $('#age_range').children().each(
                function() {
                    $(this).css({
                        'background': 'white'
                    });
                }
            );
        });
        $('#relation_w_p').on('change', function() {
            if ($(this).val() != '') {
                $(this).css("background", background_color_green);
                $(this).css("border", "");
            } else {
                $(this).css("background", "");
            }
            $('#relation_w_p').children().each(
                function() {
                    $(this).css({
                        'background': 'white'
                    });
                }
            );
        });
        $('#p_contact_method').on('change', function() {
            if ($(this).val() != '') {
                $(this).css("background", background_color_green);
                $(this).css("border", "");
            } else {
                $(this).css("background", "");
            }
            $('#p_contact_method').children().each(
                function() {
                    $(this).css({
                        'background': 'white'
                    });
                }
            );
        });
        $('#p_identify_as').on('change', function() {
            if ($(this).val() != '') {
                $(this).css("background", background_color_green);
                $(this).css("border", "");
            } else {
                $(this).css("background", "");
            }
            $('#p_identify_as').children().each(
                function() {
                    $(this).css({
                        'background': 'white'
                    });
                }
            );
        });
        $('#interpreter_r').on('change', function() {
            if ($(this).val() != '') {
                $(this).css("background", background_color_green);
                $(this).css("border", "");
            } else {
                $(this).css("background", "");
            }
            $('#interpreter_r').children().each(
                function() {
                    $(this).css({
                        'background': 'white'
                    });
                }
            );
        });
        $('#p_age_range').on('change', function() {
            if ($(this).val() != '') {
                $(this).css("background", background_color_green);
                $(this).css("border", "");
            } else {
                $(this).css("background", "");
            }
            $('#p_age_range').children().each(
                function() {
                    $(this).css({
                        'background': 'white'
                    });
                }
            );
        });
        $("#btnSubmit").click(function() {
            $('#w_n_services').removeAttr('required');
            $('#p_age_range').removeAttr('required');
            $('#n_p_managed').removeAttr('required');
            $('#service_location').removeAttr('required');
            $('.c_p_first_name').removeAttr('required');
            $('.c_p_last_name').removeAttr('required');
            $('#relation_w_p').removeAttr('required');
            $('#age_range').removeAttr('required');
            $('#p_contact_method').removeAttr('required');
            $('#p_identify_as').removeAttr('required');
            $('#language_spoken').removeAttr('required');
            $('#interpreter_r').removeAttr('required');
            $('#ndis_number').removeAttr('required');
        });
    });
    $('.ca-sh-plan2').slideUp(); //text
    $('.ca-sh-plan_user_info').slideUp(); // 4 filed
    $('.ca-sh-plan_user_info_age').slideUp(); //age dd
    $('.ca-sh-plan_participant_detail').slideUp(); //first name last name
    $('.ca-sh-plan_participant_detail_relation').slideUp(); //relation
    $(".ca-check-plan2").on('change', function() {
        if ($(this).val() == "") {
            $('.ca-sh-plan2').slideUp();
            $('.ca-sh-plan_user_info').slideUp();
            //$('.ca-sh-plan_user_info_age').slideUp();
            $('.ca-sh-plan_participant_detail').slideUp();
            $('.ca-sh-plan_participant_detail_relation').slideUp();
        }
        if ($(this).val() == "Myself") {
            $('.ca-sh-plan2').slideUp();
            $('.ca-sh-plan_user_info').slideDown();
            //$('.ca-sh-plan_user_info_age').slideUp();
            $('.ca-sh-plan_participant_detail').slideUp();
            $('.ca-sh-plan_participant_detail_relation').slideUp();
            $('.c_age_range').removeAttr('required');
            $('.c_age_range').prop('selectedIndex', 0);
            $('.c_age_range').css("background-color", "white");
            $('.c_p_first_name').removeAttr('required');
            $('.c_p_first_name').val('');
            $('.c_p_first_name').css("background-color", "white");
            $('.c_p_last_name').removeAttr('required');
            $('.c_p_last_name').val('');
            $('.c_p_last_name').css("background-color", "white");
            $('.c_relation_w_p').removeAttr('required');
            $('.c_relation_w_p').prop('selectedIndex', 0);
            $('.c_relation_w_p').css("background-color", "white");
        }
        if ($(this).val() == "My Client") {
            $('.ca-sh-plan2').slideDown();
            $('.ca-sh-plan_user_info').slideUp();
            //$('.ca-sh-plan_user_info_age').slideDown();
            $('.ca-sh-plan_participant_detail').slideDown();
            $('.ca-sh-plan_participant_detail_relation').slideDown();
            $('.c_age_range').attr('required', 'required');
            $('.c_p_first_name').attr('required', 'required');
            $('.c_p_last_name').attr('required', 'required');
            $('.c_relation_w_p').attr('required', 'required');
        }
        if ($(this).val() == "Someone I care for") {
            $('.ca-sh-plan2').slideUp();
            $('.ca-sh-plan_user_info').slideUp();
            //$('.ca-sh-plan_user_info_age').slideDown();
            $('.ca-sh-plan_participant_detail').slideDown();
            $('.ca-sh-plan_participant_detail_relation').slideDown();
            $('.c_age_range').attr('required', 'required');
            $('.c_p_first_name').attr('required', 'required');
            $('.c_p_last_name').attr('required', 'required');
            $('.c_relation_w_p').attr('required', 'required');
        }
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