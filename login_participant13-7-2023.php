<?php
include "header.php";

if(!isset($_COOKIE['user_id'])) {
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





    if (isset($_POST['register_submit'])  ) {
//echo "<pre>"; print_r($_POST); die;
        $upqry = "UPDATE " . TBL . "users SET
                      w_n_services = '".$_POST['w_n_services']."',
                      p_age_range = '".$_POST['p_age_range']."',
                      n_p_managed = '".$_POST['n_p_managed']."',
                      service_location = '".$_POST['service_location']."',
                      relation_w_p = '".$_POST['relation_w_p']."',
                      p_first_name = '".$_POST['p_first_name']."',
                      p_last_name = '".$_POST['p_last_name']."',
                      age_range = '".$_POST['age_range']."',
                      p_contact_method = '".$_POST['p_contact_method']."',
                      p_identify_as = '".$_POST['p_identify_as']."',
                      language_spoken = '".$_POST['language_spoken']."',
                      interpreter_r = '".$_POST['interpreter_r']."',
                      ndis_number = '".$_POST['ndis_number']."'
                      WHERE user_id = $user_id";
          $upres = mysqli_query($conn,$upqry);
       //now add the three
          $_SESSION['user_code'] = $login_row['user_code'];
          $_SESSION['user_name'] = $login_row['first_name'];
          $_SESSION['user_id'] = $user_id;

         //header("Location: login");



    }

    if (isset($_POST['register_skip'])  ) {
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
                                <input type="hidden" autocomplete="off" name="src" id="src"
                                       value="<?php echo $_GET['src'] ?>">
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <input type="email" autocomplete="off" name="email_id" id="email_id"
                                       class="form-control" placeholder="<?php echo $BIZBOOK['ENTER_EMAIL_STAR']; ?>"
                                       pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                       title="Enter email address" value="" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="<?php echo $BIZBOOK['ENTER_PASSWORD_STAR']; ?>" required
                                       value="">
                            </div>
                            <button type="submit" name="login_submit" value="submit"
                                    class="btn btn-primary"><?php echo $BIZBOOK['SIGN_IN']; ?>
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
                        <div class="form-group col-sm-12">
                            <select required name="w_n_services" id="w_n_services" class="form-control ca-check-plan2">
                            <option value="" ><?php echo "Who needs services !"; ?></option>
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
                            <div class="form-group col-sm-6">
                            <input  type="text"  autocomplete="off" name="p_first_name" id="p_first_name" class="form-control c_p_first_name" placeholder="<?php echo "Participant First Name"; ?>" value="">
                            </div>
                            <div class="form-group col-sm-6">
                            <input  type="text"  autocomplete="off" name="p_last_name" id="p_last_name" class="form-control c_p_last_name" placeholder="<?php echo "Participant Last Name"; ?>" value="">
                            </div>
</div>
                        </div>



                        <div class="form-group ca-sh-plan_user_info" style="display:none">
<div class="row form-group">
                                <div class="form-group col-sm-6">
                                    <input readonly type="text"  autocomplete="off"
                                           name="d_first_name" id="d_first_name" class="form-control" placeholder="First Name" value="<?php echo $first_name; ?>">
                                </div>
                                <div  class="form-group col-sm-6">
                                    <input readonly type="text"  autocomplete="off"
                                           name="d_last_name" id="d_last_name" class="form-control" placeholder="Last Name" value="<?php echo $last_name; ?>">
                                </div>
</div>
<div class="row form-group">
                                <div class="form-group col-sm-6">
                                    <input readonly type="text"  autocomplete="off"
                                           name="d_email_id" id="d_email_id" class="form-control"
                                           placeholder="<?php echo $BIZBOOK['EMAIL_ID_STAR']; ?>" value="<?php echo $email_id; ?>">
                                </div>

                                <div class="form-group col-sm-6">
                                    <input readonly type="text"  autocomplete="off"
                                           name="d_mobile_number" id="d_mobile_number" class="form-control" placeholder="<?php echo $BIZBOOK['PHONE']; ?>" value="<?php echo $mobile_number; ?>">
                                </div>
</div>
                        </div>

                        <div class="row form-group">
                        <div class="form-group col-sm-6">
                            <select required name="n_p_managed" id="n_p_managed" class="form-control">
                                <option value="" ><?php echo "How is your NDIS plan managed?"; ?></option>
                                <option value="Self managed"><?php echo "Self managed"; ?></option>
                                <option value="Plan managed"><?php echo "Plan managed"; ?></option>
                                <option value="Agency managed"><?php echo "Agency managed"; ?></option>
                                <option value="Waiting for approval"><?php echo "Waiting for approval"; ?></option>
                                <option value="Not with NDIS"><?php echo "Not with NDIS"; ?></option>
                                <option value="Unsure"><?php echo "Unsure"; ?></option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <input required type="text"  autocomplete="off"
                                   name="service_location" id="service_location" class="form-control"
                                   placeholder="Enter Your Service location">
                        </div>
</div>






                        <div class="row form-group">
                        <div class="form-group col-sm-6 ca-sh-plan_participant_detail_relation" style="display:none">
                            <select name="relation_w_p" id="relation_w_p" class="form-control c_relation_w_p">
                            <option value="" ><?php echo "Relationship with the participant"; ?></option>
                            <option value="Parent"><?php echo "Parent"; ?></option>
                            <option value="Child"><?php echo "Child"; ?></option>
                            <option value="Partner"><?php echo "Partner"; ?></option>
                            <option value="Relative"><?php echo "Relative"; ?></option>
                            <option value="Other"><?php echo "Other"; ?></option>
                            </select>
                        </div>


                        <div class="form-group col-sm-6 ca-sh-plan_participant_detail_relation" style="display:none">
                        <select  name="age_range" id="age_range" class="form-control c_age_range">
                            <option value="" ><?php echo "Age Range"; ?></option>
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
            <select required name="p_contact_method" id="p_contact_method" class="form-control">
            <option value="" ><?php echo "Prefer Contact Method"; ?></option>
            <option value="Phone Call"><?php echo "Phone Call"; ?></option>
            <option value="SMS"><?php echo "SMS"; ?></option>
            <option value="Email"><?php echo "Email"; ?></option>
            <option value="Any"><?php echo "Any"; ?></option>
            </select>
        </div>

        <div class="form-group col-sm-6">
            <select required name="p_identify_as" id="p_identify_as" class="form-control">
            <option value="" ><?php echo "Participant Identify as"; ?></option>
            <option value="Male ( He/Him)"><?php echo "Male ( He/Him)"; ?></option>
            <option value="Femate ( She/Her)"><?php echo "Femate ( She/Her)"; ?></option>
            <option value="Non-binary ( they/them)"><?php echo "Non-binary ( they/them)"; ?></option>
            <option value="Other"><?php echo "Other"; ?></option>
            <option value="Prefer not to say"><?php echo "Prefer not to say"; ?></option>
            </select>
        </div>
</div>


<div class="row form-group">
        <div class="form-group col-sm-6">
            <input required type="text"  autocomplete="off"
                name="language_spoken" id="language_spoken" class="form-control"
                placeholder="<?php echo "What language is spoken at home?"; ?>" value="">
        </div>
        <div class="form-group col-sm-6">
            <select required name="interpreter_r" id="interpreter_r" class="form-control">
            <option value="" ><?php echo "Is an interpreter required?"; ?></option>
            <option value="yes"><?php echo "Yes"; ?></option>
            <option value="no"><?php echo "No"; ?></option>
            </select>
        </div>

</div>

<div class="row form-group">
    <div class="form-group col-sm-6">
        <input required type="text"  autocomplete="off" name="ndis_number" id="ndis_number" class="form-control"
            placeholder="<?php echo "NDIS Number(if applicable)"; ?>" value="" >
    </div>
    <div class="form-group col-sm-6">
                        <select required name="p_age_range" id="p_age_range" class="form-control">
                            <option value="" ><?php echo "Participant Age Range"; ?></option>
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
    <button type="submit" name="register_submit"  class="btn btn-primary"><?php echo "Enter"; ?></button>
    </div>
    <div class="form-group col-sm-6">
    <!--<a href="login_check" class="btn btn-primary">Skip!  I will enter later </a> -->
    <button type="submit" id = "btnSubmit" name="register_skip"  class="btn btn-primary"><?php echo "Skip!  I will enter later"; ?></button>
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
                                <input type="email" autocomplete="off" name="email_id" id="email_id"
                                       class="form-control" placeholder="<?php echo $BIZBOOK['ENTER_EMAIL_STAR']; ?>"
                                       pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                       title="<?php echo $BIZBOOK['LEAD-INVALID-EMAIL-TITLE']; ?>" required>
                            </div>
                            <button type="submit" name="forgot_submit"
                                    class="btn btn-primary"><?php echo $BIZBOOK['SUBMIT']; ?></button>
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
                                <input type="text" class="form-control"
                                       placeholder="<?php echo $BIZBOOK['LEAD-NAME-PLACEHOLDER']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"
                                       placeholder="<?php echo $BIZBOOK['ENTER_EMAIL_STAR']; ?>"
                                       pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                       title="<?php echo $BIZBOOK['LEAD-INVALID-EMAIL-TITLE']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       placeholder="<?php echo $BIZBOOK['LEAD-MOBILE-PLACEHOLDER']; ?>"
                                       pattern="[7-9]{1}[0-9]{9}"
                                       title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3"
                                          placeholder="<?php echo $BIZBOOK['LEAD-MESSAGE-PLACEHOLDER']; ?>"></textarea>
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
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">var webpage_full_link = '<?php echo $webpage_full_link;?>';</script>
<script type="text/javascript">var login_url = '<?php echo $LOGIN_URL;?>';</script>
<script src="js/custom.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/custom_validation.js"></script>

<script>
    /*
    $(".ca-check-plan2").on('change', function () {
    if ($(this).val() == "") {
        $('.ca-sh-plan2').slideUp();
        $('.ca-sh-plan_user_info').slideUp();
        $('.ca-sh-plan_participant_detail').slideUp();
    }
    if ($(this).val() == "My Client") {
        $('.ca-sh-plan2').slideDown();
    }
    else {
        $('.ca-sh-plan2').slideUp();
    }

if ($(this).val() == "Myself") {
        $('.ca-sh-plan_user_info').slideDown();
        $('.ca-sh-plan_participant_detail').slideUp();

    }
if ($(this).val() == "Someone I care for") {
        $('.ca-sh-plan_user_info').slideUp();
        $('.ca-sh-plan_participant_detail').slideDown();
    }

});
*/

$(document).ready(function() {
    $("#btnSubmit").click(function(){
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


        $('.ca-sh-plan2').slideUp();   //text
        $('.ca-sh-plan_user_info').slideUp();  // 4 filed
        $('.ca-sh-plan_user_info_age').slideUp();  //age dd
        $('.ca-sh-plan_participant_detail').slideUp(); //first name last name
        $('.ca-sh-plan_participant_detail_relation').slideUp(); //relation

$(".ca-check-plan2").on('change', function () {
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
        $('.c_p_first_name').removeAttr('required');
        $('.c_p_last_name').removeAttr('required');
        $('.c_relation_w_p').removeAttr('required');


    }

    if ($(this).val() == "My Client") {
        $('.ca-sh-plan2').slideDown();
        $('.ca-sh-plan_user_info').slideUp();
        //$('.ca-sh-plan_user_info_age').slideDown();
        $('.ca-sh-plan_participant_detail').slideDown();
        $('.ca-sh-plan_participant_detail_relation').slideDown();
        $('.c_age_range').attr('required','required');
        $('.c_p_first_name').attr('required','required');
        $('.c_p_last_name').attr('required','required');

        $('.c_relation_w_p').attr('required','required');
    }
    if ($(this).val() == "Someone I care for") {
        $('.ca-sh-plan2').slideUp();
        $('.ca-sh-plan_user_info').slideUp();
        //$('.ca-sh-plan_user_info_age').slideDown();
        $('.ca-sh-plan_participant_detail').slideDown();
        $('.ca-sh-plan_participant_detail_relation').slideDown();
        $('.c_age_range').attr('required','required');
        $('.c_p_first_name').attr('required','required');
        $('.c_p_last_name').attr('required','required');

        $('.c_relation_w_p').attr('required','required');

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
        <input type="file" name="inputText"/>
        <input type="submit" name="SubmitButton"/>
    </form>
    <?php
}
?>
</body>
</html>