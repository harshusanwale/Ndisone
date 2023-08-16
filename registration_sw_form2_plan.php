<?php
include "header.php";

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
            <div class="login-main">
                <div class="log-bor">&nbsp;</div>
                <div class="log log-1">
                    <div class="login login-new">
                        <?php
                        if (isset($_SESSION['login_status_msg'])) {
                            include "page_level_message.php";
                            unset($_SESSION['login_status_msg']);
                        }
                        ?>
                        <h4>Choose your Plan</h4>
                        <p></p>

                        <form name="register_update_sw_form2" id="register_update_sw_form2" method="post" action="register_update_sw_form2.php">
                            <input type="hidden" autocomplete="off" name="trap_box" id="trap_box" class="validate">
                            <input type="hidden" autocomplete="off" name="mode_path" value="XeFrOnT_MoDeX_PATHXHU" id="mode_path" class="validate">

                            <div class="form-group">
                                <select name="user_plan" id="user_plan" class="form-control">
                                    <option value="" disabled="disabled"
                                        selected="selected"><?php echo $BIZBOOK['CHOOSE_YOUR_PLAN']; ?></option>
                                        <?php
                                        $plan_type = "SELECT *
                                            FROM " . TBL . "plan_type WHERE plan_type_status='Active'

                                            ORDER BY plan_type_id ASC";


                                        $rs_plan_type = mysqli_query($conn, $plan_type);

                                        $si = 1;
                                        while ($plan_type_row = mysqli_fetch_array($rs_plan_type)) {

                                            if ($plan_type_row['plan_type_duration'] >= 7) {
                                                $date_text = "/year";
                                            } else {
                                                $date_text = "/month";
                                            }

                                            ?>
                                            <option
                                                value="<?php echo $plan_type_row['plan_type_id']; ?>"><?php echo $plan_type_row['plan_type_name'];
                                                if ($plan_type_row['plan_type_price'] != 0) {
                                                    echo ' - ' . $footer_row['currency_symbol'] . '' . $plan_type_row['plan_type_price'] . $date_text;
                                                } ?></option>
                                            <?php
                                        }
                                        ?>
                                </select>
                                <a href="pricing-details" class="frmtip"
                                target="_blank"><?php echo $BIZBOOK['PLAN_DETAILS']; ?></a>
                                </div>

                            <button type="submit" name="register_sw_form2_submit" class="btn btn-primary">Choose</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END PRICING DETAILS-->

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