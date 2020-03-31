<?php 
	// Load assets
	require_once 'vendor/autoload.php';
	require_once 'functions/functions.php';
	require_once 'functions/getresponse.php';
	// Declared Variables
	$status = false;
	$remoteIp = getIPAddress();
	// Initialize Get Response API Class
	$getresponse360 = new getResponseAPIActions(
		"ae606e7604904d038715235bd6669080","din-email.com","mt_tradeideas_master"
	);
	$financhill_camp = new getResponseAPIActions(
		"ae606e7604904d038715235bd6669080","din-email.com","financhill"
	);
	if($_POST) {
		$request_input_fields = array('email','firstname','sid','submit_form','errorRequest');
		foreach ($request_input_fields as $input_field_key) {
			if ($input_field_key === "email") {
				$email = (filter_var($_POST["email"],FILTER_VALIDATE_EMAIL) !== false  ? $_POST["email"] : null );
			} else {
				${$input_field_key} = filter_var($_POST["{$input_field_key}"],FILTER_SANITIZE_SPECIAL_CHARS);
			}
		}
		$recaptchaResp = $_POST['g-recaptcha-response'];

		// Add Contact if GET method used
		if (!empty($email) && $errorRequest === "send" && domain_exists($email) && empty($submit_form) && googleRecaptcha($recaptchaResp,$remoteIp)) {
			$getresponse360->getresponse360_AddContact($email,$sid,$firstname,$remoteIp);
			$financhill_camp->getresponse360_AddContact($email,$sid,$firstname,$remoteIp);
			$status = true;
		} else {
			header("Location: ../../?sid={$sid}&error=bademail");
		}
	} 

	if ($_GET) {
		$request_input_fields = array('email','sid','process');
		foreach ($request_input_fields as $input_field_key) {
			if ($input_field_key === "email") {
				$email = (filter_var($_GET["email"],FILTER_VALIDATE_EMAIL) !== false  ? $_GET["email"] : null );
			} else {
				${$input_field_key} = filter_var($_GET["{$input_field_key}"],FILTER_SANITIZE_SPECIAL_CHARS);
			}
		}
		// Add Contact if GET method used
		if (!empty($email) && $process === "cto") {
			$getresponse360->getresponse360_AddContact($email,$sid,"Trader",$remoteIp);
			$financhill_camp->getresponse360_AddContact($email,$sid,"Trader",$remoteIp);
			$status = true;
		} else {
			header("Location: ../../?sid={$sid}&error=bademail");
		}
	}

	if ($status) {
		header("Location: ../../wait.php?email={$email}");
	}




