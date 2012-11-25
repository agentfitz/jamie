<?php
// if both logged in and not logged in users can send this AJAX request,
// add both of these actions, otherwise add only the appropriate one
add_action( 'wp_ajax_nopriv_contact_form', 'HandleContact' );
add_action( 'wp_ajax_contact_form', 'HandleContact' );

//Ajax contact form handler
function HandleContact(){
	//Include refrence to PHP mailer script
	require_once('class.phpmailer.php');
	
	//Check for correct user input
	if(!array_key_exists('name', $_POST) ||
	   !array_key_exists('email', $_POST)||
	   !array_key_exists('comment', $_POST))
	{
		echo 'Missing post value!';
		die();
	}
	
	$erros = array();
	$emailReg = "/^\w+([\-\.]\w+)*@([a-z0-9]+(\-+[a-z0-9]+)?\.)+[a-z]{2,5}$/i";
	
	//Read SMTP settings
	$User    = opt('contact_mail_user');
	$Pass    = opt('contact_mail_pass');
	$Host    = opt('contact_mail_host');
	$Port    = opt('contact_mail_port');
	$Sec     = opt('contact_mail_sec');
	$Auth    = opt('contact_mail_auth');
	$To      = opt('contact_mailto');
	$Subject = opt('contact_email_subject');
	$Body    = opt('contact_email_template');
	
	if(!preg_match($emailReg, $To))
		$erros[] = 'Receiver email address is invalid';
	
	if(strlen($Subject) < 1)
		$erros[] = 'Email subject is empty';
	
	if(strlen($Body) < 1)
		$erros[] = 'Body Template is empty';
	
	if(strlen($Host) < 1)
		$erros[] = 'Host address is empty';
	
	if(strlen($Port) < 1 || !is_numeric($Port))
		$erros[] = 'Port number is invalid';
	
	if($Sec != "" && $Sec != "tls" && $Sec != "ssl")
		$erros[] = 'Security parameter is invalid';
	
	//We have error in settings
	if(count($erros))
	{
		echo "Error In Settings:\r\n" . implode("\r\n", $erros);
		die();
	}
	
	//Read form data
	$Name = trim($_POST['name']);
	$From = trim($_POST['email']);
	$Msg  = trim($_POST['comment']);
	
	//Check for name length
	if(strlen($Name) < 1)
		$erros[] = 'Name is less than one char!';
	
	//Check email address
	if(!preg_match($emailReg, $From))
		$erros[] = 'Invalid email address!';

	//Check for message length
	if(strlen($Msg) < 1)
		$erros[] = 'Message is less than one char!';
	
	//We have error in our form
	if(count($erros))
	{
		echo "Error In Form:\r\n" . implode("\r\n", $erros);
		die();
	}
	
	$Body = preg_replace("/\[Name\]/", $Name, $Body);
	$Body = preg_replace("/\[Sender\]/", $From, $Body);
	$Body = preg_replace("/\[Message\]/", $Msg, $Body);
	$BodyHtml = preg_replace("/\n/", "<br/>", $Body);
	
	//Convert port number to numeric value
	$Port = intval($Port);
	
	//Convert Auth value
	if($Auth == "1")
		$Auth = true;
	else
		$Auth = false;
	
	//Php mailer settings
	$mail             = new PHPMailer();
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = $Host;    // SMTP server
	$mail->Port       = $Port;    // set the SMTP port
	$mail->SMTPSecure = $Sec;     // Security
	$mail->SMTPAuth   = $Auth;    // enable SMTP authentication
	$mail->Username   = $User;    // SMTP account username
	$mail->Password   = $Pass;    // SMTP account password
	$mail->SetFrom($From, $Name);
	$mail->AddReplyTo($From,$Name);
	$mail->AddAddress($To);
	$mail->Subject    = $Subject;
	$mail->AltBody    = $Body; // optional
	$mail->MsgHTML($BodyHtml);
	
	if(!$mail->Send()) {
	  echo "Error: " . $mail->ErrorInfo;
	} else {
	  echo 'OK';
	}

	die();
}//End of HandleContact

?>