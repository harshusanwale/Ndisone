<?php

include "header.php";



include "facebook_config.php"; //Facebook Config File



include "google_config.php"; //Facebook Config File



if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
//if ( ($_SESSION['user_name'] == null ) || empty($_SESSION['user_name'])) {

    header("Location: dashboard");
}

?>



<!-- START -->
<section class="<?php if ($footer_row['admin_language'] == 2) {
    echo "lg-arb";
    } ?> login-reg">
    <div class="container">

        <div class="row">
            <div class="login-main add-list">

                <div class="log">
                    <div class="login">
                        <h4><?php echo $BIZBOOK['REGISTERETATION DETAILS']; ?></h4>
                        <?php include "page_level_message.php"; ?>
                        <?php

                        $user_details_row = getUser($_SESSION['user_id']);


                        //echo"<pre>"; print_r($user_details_row);die;
                        ?>
                        <form action="register_update_sc_form.php" id="register_update_stap2" name="register_update_stap2" method="post" enctype="multipart/form-data">




                            <input type="hidden" autocomplete="off" name="trap_box" id="trap_box" class="validate">

                            <input type="hidden" autocomplete="off" name="mode_path" value="XeFrOnT_MoDeX_PATHXHU" id="mode_path" class="validate">


                            <div class="row">
                                <div class="col-md-12">Question: Are you a Sole Trader or working under Agency?
                                    <div class="form-group">
                                        <select name="ask_ques" id="ask_ques" class="form-control" required="required">
                                            <option value="">Select</option>
                                            <option value="Yes">Sole Trader</option>
                                            <option value="No">Under Agency</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <button name="register_2_submit" type="submit"
                                            class="btn btn-primary"><?php echo $BIZBOOK['NEXT']; ?></button>
                                </div>
                                <!-- <div class="col-md-12">
                                    <a href="edit-listing-step-2?row=<?php echo $_GET['row']; ?>"
                                       class="skip"><?php echo $BIZBOOK['SKIP_THIS']; ?>>></a>
                                </div> -->
                                <!-- <div class="col-md-12">
                                    <a href="dashboard" class="skip"><?php echo $BIZBOOK['GO_TO_USER_DASHBOARD']; ?>
                                        >></a>
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

$(document).ready(function () {
    $('#register_update_stap2').validate({

        rules: {
            ask_ques: {required: true}
        },
        messages: {
            ask_ques: {required: "Select Your Answer"}
        },
        submitHandler: function (form) { // for demo
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
