<?php
require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


//Email body
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $emaill = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];

    $mail = new PHPMailer();
    //Set mailer to use smtp
    $mail->isSMTP();
    //Define smtp host
    $mail->Host = "smtp.gmail.com";
    //Enable smtp authentication
    $mail->SMTPAuth = true;
    //Set smtp encryption type (ssl/tls)
    $mail->SMTPSecure = "tls";
    //Port to connect smtp
    $mail->Port = "587";
    //Set gmail username
    $mail->Username = "myemail";
    //Set gmail password
    $mail->Password = "myemail";
    //Email subject
    $mail->Subject = "$emaill";
    //Set sender email
    $mail->setFrom("$emaill");
    //Enable HTML
    $mail->isHTML(true);
    //Attachment
    $mail->addAttachment('img/attachment.png');


    $mail->Body = "
    <p>The name: $name</p>
    <p>The email: $emaill</p>
    <p>The phone: $phone</p>
    <h1>The Message: $msg</h1>
    ";
    $mail->addAddress('email@gmail.com');
    //Finally send email
    if ($mail->send()) {
        echo "Email Sent..!";
    }

    $mail->smtpClose();
} ?>


<form method="post" class="contactform">
<div class="sendDiv">
<p>Send Message</p>
</div>
<div class="px-4">
<div class="d-flex justify-content-between">
        <input type="text" placeholder="Name" name="name">
        <input type="email" placeholder="Email" name="email">
    </div>
    <input type="tel" name="phone" placeholder="Phone" class="w-100">
    <textarea name="msg" placeholder="Message" rows="6"></textarea>
    <button type="submit">send message</button>
</div>

</form>