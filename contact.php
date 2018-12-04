<?php
if ($_POST["submit"]) {
	if (!$_POST['name']) {
		$error = "<br />Please enter your name";
	}
	if (!$_POST['email']) {
		$error .= "<br />Please enter your email address";
	}
	if (!$_POST['phone']) {
		$error .= "<br /> Please enter your phone number";
	}
	if (!$_POST['message']) {
		$error .= "<br />Please enter a message";
	}
	if ($_POST['email'] != "" and !filter_var(
		$_POST['email'],
		FILTER_VALIDATE_EMAIL
	)) {
		$error .= "<br />Please enter a valid email address";
	}
	if ($error) {
		$result = '<div class="alert alert-danger"><strong>There were error(s)
in your form:</strong>' . $error . '</div>';
	} else {
      /* THE EMAIL WHERE YOU WANT TO RECIEVE THE CONTACT MESSAGES */
		if (mail(
			"youremailaddress.com",
			"Message from Your Website Name",
			"Name: " . $_POST['name'] . "
Email: " . $_POST['email'] . "
Phone: " . $_POST['phone'] . "
Message: " . $_POST['message']
		)) {
			$result = '<div class="alert alert-success"> <strong> Thank
you!</strong> We\'ll get back to you shortly.</div>';
		} else {
			$result = '<div class="alert alert-danger">Sorry, there was
an error sending your message. Please try again later.</div>';
		}
	}
}
?>
