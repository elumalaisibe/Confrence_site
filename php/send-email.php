<?php

$papertitle = $_POST["papertitle"];
$authorfullname = $_POST["authorfullname"];
$authormobile = $_POST["authormobile"];
$authoremail = $_POST["authoremail"];
$authorinstitution = $_POST["authorinstitution"];
$authorcategory = $_POST["authorcategory"];
$upfile = $_POST["upfile"];

// Create the email body using HEREDOC syntax
$emailBody = <<<EOT
<h1>Paper Submission Details</h1>
<p><strong>Title:</strong> $papertitle</p>
<p><strong>Author:</strong> $authorfullname</p>
<p><strong>Mobile:</strong> $authormobile</p>
<p><strong>Email:</strong> $authoremail</p>
<p><strong>Institution:</strong> $authorinstitution</p>
<p><strong>Category:</strong> $authorcategory</p>
<p><strong>Uploaded File:</strong> $upfile</p>
EOT;

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'smtp.gmail.com';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = 'sakthijbit@gmail.com';
$mail->Password = 'sakthI007';

$mail-> setForm($authoremail, $authorfullname);
$mail->addAddress("sakthi@example.com", "sakthi");

$mail->Subject = $papertitle;

$mail->isHTML(true); // Set email format to HTML
$mail->Body = $emailBody;

$mail->send();

header("Location: sent.html");

?>