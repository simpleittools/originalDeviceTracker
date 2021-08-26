<?php
	$uname = find_user_by_username($username);
	$fullname = $uname['FirstName'] . " " . $uname['LastName'];
?>
<?php
	use PHPMailer\PHPMailer\PHPMailer;
	require "includes/vendor/phpmailer/src/PHPMailer.php";
	require "includes/vendor/phpmailer/src/Exception.php";
	require "includes/vendor/phpmailer/src/SMTP.php";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = $fullname;
		$email = $uname['email'];
		$title = trim(filter_input(INPUT_POST,"title",FILTER_SANITIZE_STRING));
		$category = trim(filter_input(INPUT_POST,"category",FILTER_SANITIZE_STRING));
		$description = trim(filter_input(INPUT_POST,"description"/*,FILTER_SANITIZE_SPECIAL_CHARS*/));
		
	//	if ($name =="" || $email == "" || $category == "" || $title == ""){
	//		$error_message = "Please fill in the required fields: Name, Email, Category, and Title";
	//	}
		//Spam Honeypot
		if (!isset($error_message) && $_POST["address"] != "") {
			$error_message = "Bad form input";
		}
		//checks for valid email address
		if (!isset($error_message) && !PHPMailer::validateAddress($email)){
			$error_message = "Invalid Email Address";
		}
		if (!isset($error_message)) {
			$email_body = "";
			$email_body .= "Name: " . $name . "<br>";
			$email_body .= "Email: " . $email . "<br>";
			$email_body .= "Title: " . $title . "<br>";
			$email_body .= "<br>Feedback <br>";
			$email_body .= "Category: " . $category . "<br>";
			$email_body .= $description . "<br>";
			$email_body .= $date_info;
			
			
			//sends the email
		    $mail = new PHPMailer;
		    //use SMTP
		    $mail->isSMTP();
		  	$mail->SMTPDebug = 0;
		    $mail->Host = 'mail.ryanandjoe.com';
		    $mail->Port = 587;
		    $mail->SMTPSecure = 'tls';
		    $mail->SMTPAuth = true;
		    $mail->Username = "notifications@ryanandjoe.com";
		    $mail->Password="97fb95Vl6";
		    $mail->CharSet = 'utf-8';
		    //It's important not to use the submitter's address as the from address as it's forgery,
		    //which will cause your messages to fail SPF checks.
		    //Use an address in your own domain as the from address, put the submitter's address in a reply-to
		    $mail->setFrom('notifications@ryanandjoe.com', $name);
		    $mail->addReplyTo($email, $name);
		    $mail->addAddress('ryan@ryanandjoe.com');
		    $mail->isHTML(true);
		    $mail->Subject = 'Device Tracker Feedback from ' . $name;
		    $mail->Body = $email_body;
		   // $mail->addAttachment('PDFreports/test4.pdf', 'test pdf.pdf'); /*This will allow an attachment to be added. I probably won't use this on this page, but i want it documented.*/
		    if ($mail->send()) {
		    	header("location:support.php?status=thanks");
		    	exit;
		    }
	        $error_message = "Mailer Error: " . $mail->ErrorInfo;
	    }
	}