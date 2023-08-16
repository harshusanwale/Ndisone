<?php
include "header.php";

include "facebook_config.php"; //Facebook Config File

include "google_config.php"; //Facebook Config File

if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {

    header("Location: dashboard");
}

?>

<!-- START -->

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

                        <h4>REGISTRATION DETAILS</h4>
                        <?php

                        $user_details_row = getUser($_SESSION['user_id']);

                        ?>
                        <form action="support_coordinator_submit.php" id="register_update_stap2" name="register_update_stap2" method="post" enctype="multipart/form-data">




                            <input type="hidden" autocomplete="off" name="trap_box" id="trap_box" class="validate">

                            <input type="hidden" autocomplete="off" name="mode_path" value="XeFrOnT_MoDeX_PATHXHU" id="mode_path" class="validate ">
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
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
                                </div>
                            </div>
                            <!--FILED END-->
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
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
                                </div>
                            </div>
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <select name="service_locations" id="service_locations" class=" form-control colorBackground" autocomplete="off">
                                            <option value="">Service Locations</option>
                                            <?php
                                            foreach (getAllLocations() as $locations_row) {
                                            ?>
                                                <option <?php if ($user_details_row['service_locations'] == $locations_row['id']) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $locations_row['location_id']; ?>"><?php echo $locations_row['locations']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->

                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" id="registration_no" value="<?php echo $user_details_row['registration_no']; ?>" name="registration_no" id="registration_no" class="form-control colorBackground" placeholder="<?php echo $BIZBOOK['REGISTRATION NUMBER']; ?>">
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" value="<?php echo $user_details_row['provider_trading_name']; ?>" name="provider_trading_name" id="provider_trading_name" class="form-control colorBackground" placeholder="Provider Trading Name">
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" value="<?php echo $user_details_row['registered_companys_name']; ?>" name="registered_companys_name" id="registered_companys_name" class="form-control colorBackground" placeholder="registered_companys_name (if different)">
                                </div>
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" value="<?php echo $user_details_row['registration_no']; ?>" name="registration_no" id="registration_no" class="form-control" placeholder="Business Address">
                                </div>
                                </div>
                            </div> -->

                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" value="<?php echo $user_details_row['business_contact_number']; ?>" name="business_contact_number" id="business_contact_number" class="form-control colorBackground" placeholder="Business Contact Number">
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" value="<?php echo $user_details_row['business_email_address']; ?>" name="business_email_address" id="business_email_address" class="form-control colorBackground" placeholder="Business Email Address">
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" value="<?php echo $user_details_row['website']; ?>" name="website" id="website" class="form-control colorBackground" placeholder="Website">
                                </div>
                                </div>
                            </div>
                            <!--FILED END-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="fil-img-uplo">
                                            <span class="dumfil">Accredited Provider STAMP</span>
                                            <input type="file" name="accredited_provider_stamp" id="accredited_provider_stamp" accept="image/*,.jpg,.jpeg,.png" class="form-control colorBackground">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <button name="register_sc_2_submit" type="submit" class="btn btn-primary"><?php echo $BIZBOOK['NEXT']; ?></button>
                                </div>
                                <!-- <div class="col-md-12">
                                    <a href="edit-listing-step-2?row=<?php echo $_GET['row']; ?>"
                                       class="skip"><?php echo $BIZBOOK['SKIP_THIS']; ?>>></a>
                                </div> -->
                                <!-- <div class="col-md-12">
                                    <a href="dashboard" class="skip"><?php echo $BIZBOOK['GO_TO_USER_DASHBOARD']; ?>>></a>
                                </div> -->
                            </div>
                            <!--FILED END-->
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!--PRICING DETAILS-->



<?php

include "footer.php";

?>

<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

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
    function getSubCategory(val) {

        $.ajax({
            type: "POST",
            url: "sub_category_process.php",
            data: 'category_id=' + val,
            success: function(data) {
                $("#sub_category_id").html(data);
                $('#sub_category_id').trigger("chosen:updated");
            }
        });
    }

    function getLocationCity(val) {
        $.ajax({
            type: "POST",
            url: "sub_category_process.php",
            data: 'category_id=' + val,
            success: function(data) {
                $("#sub_category_id").html(data);
                $('#sub_category_id').trigger("chosen:updated");
            }
        });
    }

    $(document).ready(function() {
        var background_color_green = '#21d78d';
        $('.colorBackground').on('change', function() {
        if ($(this).val() != '') {
            $(this).css("background", background_color_green);
            $(this).css("border", "");
        } else {

            $(this).css("background", "");
        }
        $('.colorBackground').children().each(
            function() {
                $(this).css({
                    'background': 'white'
                });
            }
        );
        });
        $('#register_update_stap2').validate({

            rules: {
                access_methods: {
                    required: true
                },
                age_groups: {
                    required: true
                },
                // service_locations: {
                //     required: true
                // },
                registration_no: {
                    required: true
                },
                accredited_provider_stamp: {
                    required: true
                },
                provider_trading_name: {
                    required: true
                },
                registered_companys_name: {
                    required: true
                },
                business_contact_number: {
                    required: true
                },
                business_email_address: {
                    required: true
                },
                website: {
                    required: true
                }
            },
            messages: {

                access_methods: {
                    required: "Access Methods is Required"
                },
                age_groups: {
                    required: "Age Groups Type is Required"
                },
                // service_locations: {
                //     required: "Service Locations is Required"
                // },
                registration_no: {
                    required: "Registration Noumber is Required"
                },
                accredited_provider_stamp: {
                    required: "STAMP is Required"
                },
                provider_trading_name: {
                    required: "Provider Trading Name is Required"
                },
                registered_companys_name: {
                    required: "Registered Companys Name is Required"
                },
                business_contact_number: {
                    required: "Business Contact Number is Required"
                },
                business_email_address: {
                    required: "Business Email Address is Required"
                },
                Website: {
                    required: "Website is Required"
                }

            },
            submitHandler: function(form) { // for demo
                form.submit();
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