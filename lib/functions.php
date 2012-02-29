<?php

// File Location: /lib/functions.php

/** 
 * Common utility functions
 *
 * @author Abdullah Yahya <abdullah747@gmail.com>
 *
 */

// catch page error
function catchErr($sMsg) {
    global $ERRORS;
	
    array_push($ERRORS, $sMsg);
}

//display errors
function displayErr() {
	global $ERRORS;
	
	if (sizeof($ERRORS)) {
		echo '<ul class="error">';
		foreach($ERRORS as $error)
			echo "<li>$error</li>";
		echo '</ul>';
	}
}	

// catch messages
function catchMsg($sMsg) {
    global $MESSAGES;
	
    array_push($MESSAGES, $sMsg);
}

//display messages
function displayMsg() {
	global $MESSAGES;
	
	if (sizeof($MESSAGES)) {
		echo '<ul class="message">';
		foreach($MESSAGES as $msg)
			echo "<li>$msg</li>";
		echo '</ul>';
	}
}

// cleans a string
function clean($sStr) {
    $return = stripslashes($sStr);
	$return = trim($return);
    $return = htmlentities($return);
	
    return $return;
}

// add links to a string
function addLinks($sStr) {
    $return = preg_replace("/((http(s?):\/\/)|(www\.))([\w\.]+)([\w|\/]+)/i", "<a href=\"http$3://$4$5$6\" target=\"_blank\">$4$5$6</a>", $sStr);
    $return = preg_replace("/([\w|\.|\-|_]+)(@)([\w\.]+)([\w]+)/i", "<a href=\"mailto:$0\">$0</a>", $return);
	
    return $return;
}

// formats a string
function format($sStr) {
    $return = clean($sStr);
    $return = nl2br($return);
    $return = addLinks($return);
	
    return $return;
}

// check email valid
function isEmailValid($sEmail) {
	$return = TRUE;
	
    $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
	
	if (!preg_match($regex_email, $sEmail)) {
		$return = FALSE;
	}
	
	return $return;
}

// check phone valid
function isPhoneValid($sPhone) {
	$return = TRUE;
	
    $regex_USphone = "/(\d)?(\s|-)?(\()?(\d){3}(\))?(\s|-){1}(\d){3}(\s|-){1}(\d){4}/";
	
	if (!preg_match($regex_USphone, $sPhone)) {
		$return = FALSE;
	}
	
	return $return;
}
?>