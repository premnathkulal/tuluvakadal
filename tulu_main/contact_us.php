<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	
</head>

<body>	
	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="img/img-01.png" alt="IMG">
			</div>

			<form class="contact1-form validate-form" method="POST">
				<span class="contact1-form-title">
					Get in touch
				</span>
				
				<div class="wrap-input1 validate-input" >
					<input class="input1" type="text" name="name" placeholder="Name">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" >
					<input class="input1" type="text" name="from_email" placeholder="Email">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" >
					<textarea class="input1" name="message" placeholder="Message"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" name="send">
						<span>
							Send
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
				<br><center><a href="../" >Cancel</a></center>
			</form>
		</div>
	</div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
</body>

	<?php
			if(isset($_POST['send'])){
					error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
					require_once "phpmailer/class.phpmailer.php";

					$message = '<html><body>';
					$message .= 'USER COMPLAINTS<br><hr>';
					$message .= 'From : '.$_POST['from_email'].'<br>';
					$message .= 'sir,<br>';
					$message .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$_POST['message'];
					$message .= '<br><hr>This Mail Sent from Tuluvakadal User';
					$message .= "</body></html>";
					// creating the phpmailer object
					$mail = new PHPMailer(true);
					// telling the class to use SMTP
					$mail->IsSMTP();
					// enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
					$mail->SMTPDebug = 0;
					// enable SMTP authentication
					$mail->SMTPAuth = true;
					// sets the prefix to the server
					$mail->SMTPSecure = 'ssl';
					// sets GMAIL as the SMTP server
					$mail->Host = 'smtp.gmail.com';
					// set the SMTP port for the GMAIL server
					$mail->Port = 465;
					// your gmail address
					$mail->Username = 'pkctech1999@gmail.com';
					// your password must be enclosed in single quotes
					$mail->Password = 'Premnathisgreat123@';
					// add a subject line
					$mail->Subject = 'complaints - www.tuluvakadal.tk ';
					// Sender email address and name
					$mail->SetFrom($_POST['from_email'], $_POST['name']);
					// reciever address, person you want to send
					$mail->AddAddress('premnathkulal1998@gmail.com');
					// if your send to multiple person add this line again
					//$mail->AddAddress('tosend@domain.com');
					// if you want to send a carbon copy
					//$mail->AddCC('tosend@domain.com');
					// if you want to send a blind carbon copy
					//$mail->AddBCC('tosend@domain.com');
					// add message body
					$mail->MsgHTML($message);
					// add attachment if any
					//$mail->AddAttachment('time.png');
					try {
						// send mail
						$mail->Send();
					?>
						<script>
							if(swal("Thank You!", ", Your Message was sent!", "success")){
							}else{ 
								setTimeout('window.location="../"', 3000);   
							}
						</script>
					<?php
					} catch (phpmailerException $e) {
						$msg = $e->getMessage();
					?>
						<script>
							swal("Sorry!", ", There is a problem to sent this message!", "error");
						</script>
					<?php
					} catch (Exception $e) {
						$msg = $e->getMessage();
					?>
						<script>
							swal("Sorry!", ", There is a problem to sent this message!", "error");
						</script>
					<?php
					}
			}
	?>
</html>
