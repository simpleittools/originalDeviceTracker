<?php $page_title = "Feedback";?>
<?php include("header.php"); ?>
<?php confirm_logged_in(); ?>
<!--Define full page variables-->
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
		    	header("location:feedback.php?status=thanks");
		    	exit;
		    }
	        $error_message = "Mailer Error: " . $mail->ErrorInfo;
	    }
	}

//$pageTitle = "Suggest a Media Item";
//$section = "suggest";
?>


	<div class="container"id="page">
		
		<?php if (isset($_GET["status"]) && $_GET["status"] == "thanks"){
			echo "<p>Thanks for the email! I will check out your feedback shortly!</p>";
		} else {
			if (isset($error_message)){
				echo '<p class="message">'.$error_message.'</p>';
			} else { 
				echo '<p>Please let me know of any bugs or additional features needed.</p>';
			}
		?>
	    <form action="feedback.php" method="post">
	    	<label for="title">Title:</label>
				<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="title" value="" />
			<label for="category">Select Feedback Type:</label>
			<select name="category" id="category" class='form-control'>
				<option value="bug">Bug Fix Report</option>
				<option value="change">Change Request</option>
				<option value="feature">Feature Request</option>
			</select>
			
			<label for="desciption">Description:(Do NOT use Insert Image.)</label>
			
	      		<textarea name="description" id="description" class="form-control description"></textarea>
	      	
	    	<input class="btn btn-primary"type="submit" name="submit" value="Send Feedback" />
	    	<a class="btn btn-danger" href="device_search.php">Cancel</a>

	    </form>


	</div>
	<?php } ?>
</div>
<!--Changes enter to tab-->
<script type="text/javascript"> 
	function tabE(obj,e){ 
		var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
		if(e.keyCode==13){ 
			var ele = document.forms[0].elements; 
			for(var i=0;i<ele.length;i++){ 
				var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
				if(obj==ele[i]){ele[q].focus();break} 
			} 
			return false; 
		} 
	}
</script>
<script src="includes/vendor/summernote/dist/summernote-bs4.js"></script>
<script>
	$(document).ready(function() {
        $('textarea').summernote();
    });
</script>
<!--creates Rich Text Editor for email
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script>
	ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
    	
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>-->
<?php include("footer.php"); ?>