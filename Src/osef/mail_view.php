<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Send email via Gmail SMTP server in PHP</title>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<meta name="robots" content="noindex, nofollow">
	<style>
		@import url(https://fonts.googleapis.com/css?family=Lato:Light,Regular,Bold);

#main {
  margin: 25px 100px;
  font-family: Lato, sans-serif;
}

#container {
  width:580px;
  padding: 0px 40px 0px;
  margin-top: 70px;
  margin: 0% 25%;
  float: left;
  border-radius: 5px;
  border: 2px solid #ccc;
}

h1 {
  text-align:center;
  font-size: 2em;
  margin-top: 40px;
  margin-bottom: 40px;
}

h2 {
  background-color: #DDEFEF;
  border-radius: 10px 10px 0 0;
  margin: -1px -40px -10px;
  padding: 30px 40px;
  color: black;
  font-weight: bolder;
  font-size: 1.5em;
  text-align:center;
}

hr {
  border: 0;
  border-bottom: 1px solid #ccc;
  margin: 10px -40px;
  margin-bottom: 30px;
}

input[type=text],input[type=email],input[type=password]{
  width: 99.5%;
  padding: 10px;
  padding-left: 5px;
  margin-top: 8px;
  border: 1px solid #ccc;
  font-size: 16px;
}

input[type=submit]{
  width: 100%;
  background-color:#2ba142;
  color: white;
  border: 2px solid #FFCB00;
  padding: 10px;
  font-size:20px;
  cursor:pointer;
  border-radius: 5px;
  margin-bottom: 40px;
}

textarea {
  width: 99.5%;
  padding: 10px 5px;
  margin: 8px 5px;
  border: 1px solid #ccc;
  font-size: 16px;
}

#info_msg {
  margin: 0 35%;
  clear: both;
}
	</style>
</head>
<body>
	<div id="main">
		<h1>Send email via Gmail SMTP server in PHP</h1>
		<div id="container">
			<h2>Gmail SMTP</h2>
			<hr/>
			<form action="mail_view.php" method="post">
				<input type="text" placeholder="To : Email Id " name="receiver_email" value="michael.franiatte@gmail.com"/>
				<input type="text" placeholder="Subject : " name="subject" value="Gmail SMTP Test"/>
				<textarea rows="4" cols="50" placeholder="Enter Your Message..." name="message">Test Gmail SMTP <?php echo date("m/d/Y");?></textarea>
				<input type="submit" value="Send" name="send"/>
			</form>
		</div>
	</div>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if(isset($_POST['send']))
{
	try {
		$sender_name = "smtp tester";
		$sender_email = "noreply@mailer.org";
		//
		$username = "michael.franiatte@gmail.com";
		$password = "password.michael.franiatte@gmail.com";
		//
		$receiver_email = $_POST['receiver_email'];
		$message = $_POST['message'];
		$subject = $_POST['subject'];
		
		$mail = new PHPMailer(true);
		$mail->isSMTP();
		// $mail->SMTPDebug = 2;
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
	
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		
		$mail->setFrom($sender_email, $sender_name);
		$mail->Username = $username;
		$mail->Password = $password;
	
		$mail->Subject = $subject;
		$mail->msgHTML($message);
		$mail->addAddress($receiver_email);
		if (!$mail->send()) {
			$error = "Mailer Error: " . $mail->ErrorInfo;
			echo '<p id="info_msg">'.$error.'</p>';
		}
		else {
			echo '<p id="info_msg">Message sent!</p>';
		}
	}
	catch (Exception $e) {
		echo $e;
	}
}
else{
	echo '<p id="info_msg">Please enter valid data</p>';
}
?>
</body>
</html>