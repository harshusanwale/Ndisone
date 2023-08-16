<?php
if (!isset($_COOKIE['user_id'])) {
    echo "'user_id' is not Created!";
    unset($_COOKIE['user_id']);
   // die;
}else{
$regpage = $_COOKIE['reg_status'];
$pageno = 1;
if($pageno == $regpage){
    include "header.php"; 
if (isset($_GET['q'])) {
    $verification_link = $_GET['q'];
} else {
    $redirect_url = $webpage_full_link . 'login';  //Redirect Url
    header("Location: $redirect_url");  //Redirect When No Listing Found in Table
    exit();
}
$activation = mysqli_query($conn, "SELECT * FROM " . TBL . "users  WHERE verification_link = '$verification_link'");
if (mysqli_num_rows($activation) > 0) {
    $activation_row = mysqli_fetch_array($activation);
    if ($verification_link == $activation_row['verification_link']) {
        $user_name = $activation_row['first_name'];
        $mobile_number = $activation_row['mobile_number'];
    } else {
        $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
        $_SESSION['login_status_msg'] = 1;
        header('Location: login');
        exit();
    }
} else {
    $_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG'];
    $_SESSION['login_status_msg'] = 1;
    header('Location: login');
    exit();
}

?>
<style>
    .templ-acti {
        background: #1a1452;
        /* border: 1px solid #40de4d; */
        padding: 35px 100px;
        margin-top: 40px;
        float: left;
        width: 100%;
        border-radius: 5px;
    }
    .cre-dup-form-show {
        display: block;
    }
</style>
<!-- START -->
<!-- START -->
<!--PRICING DETAILS-->
<section class="<?php if ($footer_row['admin_language'] == 2) {
                    echo "lg-arb";
                } ?> login-reg">
    <div class="container">
        <div class="row">
            <div class="login-main">
                <!--<div class="log-bor">&nbsp;</div>-->
                <div class="user-act-code">
                    <div class="login">
                        <?php //include "page_level_message.php"; ?>
                        <h4><?php echo $BIZBOOK['ACTIVATE_VERIFY_YOUR_EMAIL']; ?></h4>
                        <p><b>Hi <?php echo $user_name; ?>,</b></p>
                        <!-- <p><b>2 - Step verication</b></p> -->
                        <p><?php //echo $BIZBOOK['ACTIVATE_TEXT'];
                            ?></p>
                        <div class="biz-updates">
                            <div class="templ-acti">
                                <form name="verification_form" id="verification_form" method="post" action="activation_check.php" class="cre-dup-form cre-dup-form-show">
                                    <input type="hidden" name="verification_link" value="<?php echo $activation_row['verification_link']; ?>">
                                    <ul>
                                        <li>
                                            <div class="mb-2">  <img src="images/icon/email-verif.png" width="75"></div>
                                            <input autocomplete="off" type="text" name="verification_code" placeholder="<?php echo "Enter your email verification code"; ?>" required>
                                            <!-- <p>Enter your email verification code </p> -->
                                            <a href="resend_verification_code?resend=true&&q=<?php echo $verification_link; ?>">Resend Code? click here</a>
                                            <!-- <button type="submit" name="verification_submit" class="btn btn-primary"><?php echo $BIZBOOK['SUBMIT']; ?></button> -->
                                        </li>
                                    </ul>
                                <!-- </form> -->
                            </div>
                        </div>
                        <div class="biz-updates">
                            <div class="templ-acti"><br><br>
                                <!-- <form name="verification_form" id="verification_form" method="post" action="#" class="cre-dup-form cre-dup-form-show"> -->
                                    <!-- <input type="hidden" name="verification_link" value="<?php echo $activation_row['verification_link']; ?>"> -->
                                    <ul>
                                        <li>
                                            <div class="mb-2">  <img src="images/icon/mobile-veri.png" width="75"></div>
                                            <input autocomplete="off" type="text" name="verification_code" placeholder="<?php echo "Enter Verification Code"; ?>" required>
                                            <a href="resend_verification_code?resend=true&&q=<?php echo $verification_link; ?>">Resend Code? click here</a>
                                            <p> A verification code has been sent to +61 <?php echo $mobile_number; ?></p>
                                            <p>Please enter it to verify your mobile number </p>
                                            <button type="submit" name="verification_submit" class="btn btn-primary"><?php echo $BIZBOOK['SUBMIT']; ?></button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END PRICING DETAILS-->
<?php
include "footer.php";
}else{
    $redirect_url = $webpage_full_link . 'activate-congratu';  //Redirect Url
    header("Location: $redirect_url");  //Redirect When No Listing Found in Table
    exit();   
}}?>
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
</body>
</html>