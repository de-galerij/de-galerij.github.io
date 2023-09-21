<?php
$email_address = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !$email_address)
   {
	echo "No arguments Provided!";
	return false;
   }

$name = $_POST['name'];
if ($email_address === FALSE) {
    echo 'Invalid email';
    exit(1);
}
$phone = $_POST['phone'];
$message = $_POST['message'];

if (empty($_POST['_gotcha'])) { // If hidden field was filled out (by spambots) don't send!
    // Create the email and send the message
    $to = 'gustavobakker@hotmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    $email_subject = "Website-contactformulier:  $name";
    $email_body = "U heeft een nieuw bericht ontvangen via het contactformulier op uw website.\n\n"."Hier zijn de details:\n\nName: $name\n\nEmail: $email_address\n\nTelefoonnummer: $phone\n\nBericht:\n$message";
    $headers = "From: noreply@de-galerij.nl\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    $headers .= "Reply-To: $email_address";
    mail($to,$email_subject,$email_body,$headers);
    return true;
}
echo "Gotcha, spambot!";
return false;
?>
