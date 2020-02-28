<?php
/*Print out all the files*/
	$contact_name = $_POST['contact_name'];
	$contact_email = $_POST['contact_email'];
	$contact_text = $_POST['contact_text'];
/*QR code generator*/
	$messageToEncode = $contact_name.', 感謝您對本公司的愛用
					   Email: '.$contact_email.'					 
					   反應內容
					   '.$contact_text.' 
					   Thank You';
/*Database connect*/
	// Connect to the database page
	$conn = mysqli_connect("localhost","root","c49e04013d5f","Page");

	$sql ="INSERT INTO Page (contact_name,contact_email,contact_text) VALUES ('$contact_name','$contact_email','$contact_text')";

	if (!mysqli_query($conn, $sql)) {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
/*PHPmailer*/
	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require 'vendor/autoload.php';

	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
		//Server settings
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = "smtp.gmail.com";             		  //Gamil的SMTP主機
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'eclipse302115@gmail.com';                 // SMTP username
		$mail->Password = 'aA739215';                         // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to
		$mail->CharSet = "utf-8";
		
		//Recipients
		$mail->setFrom('eclipse302115@gmail.com', 'Arranger');
		$mail->addAddress($contact_email); 					          // Name is optional
		//Attachments
		//$mail->addStringAttachment(file_get_contents($img), 'qr.png');    // Optional name
		//Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = '您的反應資訊';
		$mail->Body    = $messageToEncode;

		$mail->send();
		echo ("<p><br>Message has been sent</p>");
		} catch (Exception $e) {
		echo '<br>Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
?>
