<?php

if (file_exists('config/info.php')) {
    include('config/info.php');
}

require_once('payments/simplify/lib/Simplify.php');

Simplify::$publicKey = 'sbpb_MzVlODcyZjItNWU3OC00OWY1LWE3NTMtMzllZDA5Y2E4MzUy';
Simplify::$privateKey = '8p4kynl9LfY6ncPBd6m/ObZu9NPhiKlFqC3AmaKZL+l5YFFQL0ODSXAOkNtXTToq';

if (!isset($_POST["amount"]) || !isset($_POST['simplifyToken'])) {
	echo "Please submit POST values with amount & simplifyToken params!";
	return;
}
$token = $_POST['simplifyToken'];
$payment = $_POST["amount"];

$response = array();
try {
	//$payment = Simplify_Payment::createPayment($paymentPayload);//
	// make a payment with the customer
	$payment = Simplify_Payment::createPayment(array(
		'amount' => $payment,
		'description' => 'Test payment',
		'currency' => 'AUD',
		'token' => $token,
	));
    // echo $payment;die;

	if ($payment->paymentStatus == 'APPROVED') {
		$response["id"] = $payment->{'id'};
	}
	$response["status"] = $payment->paymentStatus;
} catch (Exception $e) {
	//error handling
	if ($e instanceof Simplify_ApiException) {
		$response["reference"] = $e->getReference();
		$response["message"] = $e->getMessage();
		$response["errorCode"] = $e->getErrorCode();
	}
	if ($e instanceof Simplify_BadRequestException && $e->hasFieldErrors()) {
		$fieldErrors = '';
		foreach ($e->getFieldErrors() as $fieldError) {
			$fieldErrors = $fieldErrors . $fieldError->getFieldName()
				. ": '" . $fieldError->getMessage()
				. "' (" . $fieldError->getErrorCode()
				. ")";
		}
		$response["fieldErrors"] = $fieldErrors;
	}
	$response["error"] = $e->getMessage();
}
echo json_encode($response);
?>
s