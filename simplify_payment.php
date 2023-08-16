<?php


include "header.php";
if (!isset($_SESSION['payment_user_id']) && empty($_SESSION['payment_user_id'])) {
    header("Location: index");
    exit();
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
                <div class="log ">
                    <div class="login">
                        <?php
                        if (isset($_SESSION['register_status_msg'])) {
                            include "page_level_message.php";
                            unset($_SESSION['register_status_msg']);
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['status_msg'])) {
                            include "page_level_message.php";
                            unset($_SESSION['status_msg']);
                        }
                        ?>
                        <h4><?php echo $BIZBOOK['DB-PAYMENTS-SIMPLIFY-PAYMENT']; ?></h4>
                        <p><?php echo $BIZBOOK['DB-PAYMENTS-SIMPLIFY-PAYMENT-SIMPLE-WAY-MESSAGE']; ?></p>
                        <?php
                        $user_details_row = getUser($_SESSION['payment_user_id']);
                        if (isset($_SESSION['new_plan_id'])) {
                            $user_plan_type = getPlanType($_SESSION['new_plan_id']); //Fetch Logged In User Plan details and data
                        } else {
                            $user_plan = $user_details_row['user_plan']; //Fetch of Logged In user Plan
                            $user_plan_type = getPlanType($user_plan); //Fetch Logged In User Plan details and data
                        }
                        ?>
                        <span class="paymentErrors alert-danger"></span>
                        <div><?php echo $BIZBOOK['HI']; ?> <?php echo $user_details_row['first_name']; ?>,</br> <?php echo $BIZBOOK['DB-PAYMENTS-STRIPE-PAYMENT-YOUR-FINAL-AMOUNT']; ?> :
                            <b><?php echo $footer_row['currency_symbol'];
                             if (isset($_SESSION['custom_plan_price']) && !empty($_SESSION['custom_plan_price'])) { echo $_SESSION['custom_plan_price'];
                            }
                            else{echo $c['plan_type_price'];
                            }

                            ?></b>
                        </div>
                        <div class="success"></div>
			             <div class="error"></div>
                        <form name="payment_simplify_form" id="payment_simplify_form" method="post"
                              action="payment_stripe_submit.php">
                            <input type="hidden" autocomplete="off" value="<?php if (isset($_GET["path"])) {
                                echo 1;
                            } else {
                                echo "";
                            }; ?>" name="path" id="path" class="validate">
                            <input type="hidden" autocomplete="off" name="trap_box" id="trap_box" class="validate">
                            <input type="hidden" autocomplete="off" name="mode_path" value="XeFrOnT_MoDeX_PATHXHU"
                                   id="mode_path" class="validate">
                            <div class="form-group">
                                <input type="text" autocomplete="off" name="first_name" id="first_name"
                                       required="required"
                                       class="form-control" placeholder="<?php echo $BIZBOOK['LEAD-NAME-PLACEHOLDER']; ?>" value="asdsad">
                            </div>
                            <div class="form-group">
                                <input type="email" autocomplete="off" name="email_id" id="email_id"
                                       class="form-control" placeholder="<?php echo $BIZBOOK['LEAD-EMAIL-PLACEHOLDER']; ?>" required value="as@gmail.com">
                            </div>
                            <div class="form-group">
                                <input type="text" onkeypress="return isNumber(event)" autocomplete="off"
                                       name="card_number" id="card_number"
                                       class="form-control" placeholder="<?php echo $BIZBOOK['LEAD-CARD-NUMBER-PLACEHOLDER'];?>" required value="5204740009900014">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="cardExpMonth" required
                                               onkeypress="return isNumber(event)" maxlength="2" placeholder="<?php echo $BIZBOOK['LEAD-CARD-NUMBER-MM-PLACEHOLDER']; ?>"
                                               size="2" id="cardExpMonth" class="form-control" value="12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="cardExpYear" required
                                               onkeypress="return isNumber(event)" maxlength="4" placeholder="YY"
                                               size="4" id="cardExpYear" class="form-control" value="24">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" onkeypress="return isNumber(event)" required name="cardCVC" size="4"
                                       maxlength="4" autocomplete="off" id="cardCVC" class="form-control" value="852"
                                       placeholder="<?php echo $BIZBOOK['LEAD-CARD-NUMBER-CVC-PLACEHOLDER']; ?>">
                            </div>
                            <button type="submit" name="simplify_payment_submit" id="simplify_payment_submit"
                                    class="btn btn-primary">
                                <?php echo $BIZBOOK['PAY']; ?> <?php echo $footer_row['currency_symbol']; if (isset($_SESSION['custom_plan_price']) && !empty($_SESSION['custom_plan_price'])) { echo $_SESSION['custom_plan_price'];
                                    }
                                    else
                                    {echo $user_plan_type['plan_type_price']; 
                                    }

                                ?>
                                <?php echo $BIZBOOK['NOW']; ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END PRICING DETAILS-->
<?php
$publicKey = 'sbpb_MzVlODcyZjItNWU3OC00OWY1LWE3NTMtMzllZDA5Y2E4MzUy';

include "footer.php";
// }else{
//     $redirect_url = $webpage_full_link . 'dashboard';  //Redirect Url
//     header("Location: $redirect_url");  //Redirect When No Listing Found in Table
//     exit();   
//     }}?>
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
<script type="text/javascript" src="//www.simplify.com/commerce/v1/simplify.js"></script>
	<script type="text/javascript">
		var $error, $success, $paymentBtn, $busyContainer;
		$(document).ready(function () {
			var $selYear = $('#cc-exp-year');
			$error = $(".paymentErrors");
			$success = $(".success");
			$paymentBtn = $("#simplify_payment_submit");
			// $busyContainer = $('.busy-container');

			// var currentYear = new Date().getFullYear();
			// for (var year = currentYear; year < currentYear + 10; year++) {
			// 	$selYear.append("<option " + ((year === (currentYear + 1)) ? " selected " : "") + " value='" + year.toString().substr(2) + "'>" + year + "</option>");
			// }

			$paymentBtn.click(function () {
				var $test =  "<?php echo $publicKey?>" ;
				// $busyContainer.fadeIn();
				$error.fadeOut().html("");
				$success.fadeOut().html("");
				// Disable the submit button
				$paymentBtn.attr("disabled", "disabled");
				// Generate a card token & handle the response
				SimplifyCommerce.generateToken({
					key: "<?php echo $publicKey?>",
					card: {
						number: $("#card_number").val(),
						cvc: $("#cardCVC").val(),
						expMonth: $("#cardExpMonth").val(),
						expYear: $("#cardExpYear").val()
					}
				}, simplifyResponseHandler);
                return false;
			});

		});

		function simplifyResponseHandler(data) {
			// $busyContainer.fadeOut();
			$paymentBtn.removeAttr("disabled");
			if (data.error) {
				console.error("Error creating card token", data);
				if (data.error.code == "validation") {
					var fieldErrors = data.error.fieldErrors,
						fieldErrorsLength = fieldErrors.length,
						errorMessage = "";
					for (var i = 0; i < fieldErrorsLength; i++) {
						errorMessage += " Field: '" + fieldErrors[i].field +
							"' is invalid - " + fieldErrors[i].message + "<br/>";
					}
					$error.html(errorMessage).fadeIn();
				}
			} else {
				var token = data["id"];
				// var amount = $('#amount').val();
                var amount = 100;
				// var currency = 'USD';
				var request = $.ajax({
					url: "http://localhost/development/payment_simplify_submit",
					type: "POST",
					data: { simplifyToken: token, amount: amount}
				});

				request.done(function (response) {
					console.log("Response = ", response);
					// if (response.id) {
					// 	$success.html("Payment successfully processed & payment id = " + response.id + " !").fadeIn();
					// }
					// else if (response.status) {
					// 	$error.html("Payment failed with status = " + response.status + " !").fadeIn();
					// }
					// else {
					// 	$error.html("Payment failed with response... <br/> " + JSON.stringify(response)).fadeIn();
					// }
				});

				// request.fail(function (jqXHR, status) {
				// 	console.error('Payment processing failed = ', jqXHR, status);
				// });
			}
		}
	</script>
<!-- <script>
    Stripe.setPublishableKey('<?php //echo $stripe_publishable_key; ?>');  // set your stripe publishable key
    $(document).ready(function () {
        $("#payment_stripe_form").submit(function (event) {
            $('#stripe_payment_submit').attr("disabled", "disabled");
// create stripe token to make payment
            Stripe.createToken({
                number: $('#card_number').val(),
                cvc: $('#cardCVC').val(),
                exp_month: $('#cardExpMonth').val(),
                exp_year: $('#cardExpYear').val()
            }, handleStripeResponse);
            return false;
        });
    });
    // handle the response from stripe
    function handleStripeResponse(status, response) {
        console.log(JSON.stringify(response));
        if (response.error) {
            $('#stripe_payment_submit').removeAttr("disabled");
            $(".paymentErrors").html(response.error.message);
        } else {
            var payForm = $("#payment_stripe_form");
//get stripe token id from response
            var stripeToken = response['id'];
//set the token into the form hidden input to make payment
            payForm.append("<input type='hidden' name='stripeToken' value='" + stripeToken + "' />");
            payForm.get(0).submit();
        }
    }
</script> -->
</body>
</html>