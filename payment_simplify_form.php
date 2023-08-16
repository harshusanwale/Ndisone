<?php

// if (!isset($_COOKIE['user_id'])) {
//     echo "'user_id' is not Created!";
//     unset($_COOKIE['user_id']);
//    // die;
// }else{
// $regpage = $_COOKIE['reg_status'];
// $pageno = 5;
// if($pageno == $regpage){
include "header.php";



// if (file_exists('config/user_authentication.php')) {
//     include('config/user_authentication.php');
// }
// include "dashboard_left_pane.php";
?>
<!--CENTER SECTION-->

<section class="lg-arb login-reg">

    <div class="container">

        <div class="row">

            <div class="login-main">

                <div class="log-bor">&nbsp;</div>

                <div class="log log-1">

                    <div class="ud-pay-op">

                    <span>
                    <?php 
                    if($user_details_row['user_type'] == 'Support coordinator' || $user_details_row['user_type'] == 'Support Worker'){
                        $date1 = new DateTime($user_details_row['user_cdt']); 
                        $date2 = new DateTime(date('Y-m-d H:i:s'));
                        $interval = $date1->diff($date2);
                        if($interval->y >=2)
                        {                        
                        $_SESSION['custom_plan_price']  = $user_plan_type['plan_type_price'];
                        }
                        else{
                        $_SESSION['custom_plan_price'] = 2;
                        }

                    $user_details_row = getUser($_SESSION['user_id']); 
                    //$user_details_row = getUser($_COOKIE['user_id']); 

                    echo "Hello ";  echo $user_details_row['first_name'] ." ". $user_details_row['last_name'] .",<br>";
                    echo "A $".$_SESSION['custom_plan_price'] ." payment is taken to confirm the legitimate subscription. You will be sent a reminder to pay the regular subscription plan after two years if you decide to continue.";
                    }
                    ?>
                    </span>


                        <h4><?php echo $BIZBOOK['DB-PAYMENTS-HEADING']; ?></h4>
                        <ul>                          
                            <?php //if ($footer_row['admin_stripe_status'] == "Active") { ?>
                                <li>
                                    <div class="pay-full">
                                        <div class="rbbox">
                                            <input type="radio" id="paymentstripe" name="payment" <?php if ($footer_row['admin_cod_status'] != "Active" && $footer_row['admin_paypal_status'] != "Active") {
                                                                                                        echo "checked='checked'";
                                                                                                    } ?>>
                                            <label for="paymentstripe">Simplify Payment Gateway</label>
                                            <div class="pay-note">
                                                <span><i class="material-icons">star</i> <?php echo $BIZBOOK['DB-PAYMENTS-SiMPliFY-PAYMENT-GATEWAY-P-1']; ?></span>
                                                <span><i class="material-icons">star</i><?php echo $BIZBOOK['DB-PAYMENTS-WHAT-IS-SIMPLIFY']; ?></span>
                                                <form name="simply_dash_form" id="simply_dash_form" method="post" action="simplify_bypass_submit.php">
                                                    <input type="hidden" readonly="readonly" class="form-control" name="stripe_dash_user_id" value="<?php echo $_SESSION['user_id']; ?>" placeholder="<?php echo $BIZBOOK['FULL_NAME'];  ?> *" required>

                                                    <h4><?php echo $BIZBOOK['DB-PAYMENTS-BILLING-DETAILS'];  ?></h4>
                                                    <ul>
                                                        <li>
                                                            <!--                                                    FILED START-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" value="<?php echo $user_details_row['first_name']; ?>" placeholder="<?php echo $BIZBOOK['FULL_NAME'];  ?> *" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="user_country" class="form-control" value="<?php echo 'AU'; //echo $user_details_row['user_country']; ?>" placeholder="<?php echo $BIZBOOK['COUNTRY'];  ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--                                                    FILED END-->
                                                            <!--                                                    FILED START-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="user_state" class="form-control" value="<?php echo $user_details_row['user_state']; ?>" placeholder="<?php echo $BIZBOOK['STATE'];  ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="user_city" class="form-control" value="<?php echo $user_details_row['user_city']; ?>" placeholder="<?php echo $BIZBOOK['CITY'];  ?> *" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--                                                    FILED END-->
                                                            <!--                                                    FILED START-->
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input type="text" name="user_address" class="form-control" value="<?php echo $user_details_row['user_address']; ?>" placeholder="<?php echo $BIZBOOK['VILLAGE_STREET_NAME'];  ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--                                                    FILED END-->
                                                            <!--                                                    FILED START-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="user_zip_code" onkeypress="return isNumber(event)" class="form-control" value="<?php echo $user_details_row['user_zip_code']; ?>" placeholder="<?php echo $BIZBOOK['POSTCODE_ZIP'];  ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="user_contact_name" value="<?php echo $user_details_row['user_contact_name']; ?>" placeholder="<?php echo $BIZBOOK['CONTACT_PERSON'];  ?> *" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--                                                    FILED END-->
                                                            <!--                                                    FILED START-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="user_contact_mobile" onkeypress="return isNumber(event)" value="<?php echo $user_details_row['user_contact_mobile']; ?>" placeholder="<?php echo $BIZBOOK['CONTACT_PHONE_NUMBER'];  ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="user_contact_email" value="<?php echo $user_details_row['user_contact_email']; ?>" placeholder="<?php echo $BIZBOOK['CONTACT_EMAIL_ID'];  ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--                                                    FILED END-->
                                                        </li>
                                                    </ul>
                                                    <button type="submit" name="sim_dash_form_submit" class="db-pro-bot-btn" id="update">
                                                        <?php echo $BIZBOOK['DB-PAYMENTS-START-PAYMENT']; ?>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php //} ?>
                        </ul>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<?php 
// }else{
//     $redirect_url = $webpage_full_link . 'stripe_payment';  //Redirect Url
//     header("Location: $redirect_url");  //Redirect When No Listing Found in Table
//     exit();   
//     }}?>
<script src="js/jquery.min.js"></script>
<script>
   $(document).on('click','#update', function() {

   $.ajax({
      type: "POST",
      url: "regstatusupdate.php",
    });
}); 
</script>