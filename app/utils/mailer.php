<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

class Mailer
{

    public function __construct($address)
    {
        $this->mail = new PHPMailer(true);
        $this->ownEmail = $address;

        try {
            //Server settings
            $this->mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $this->mail->isSMTP();                                            // Set mailer to use SMTP
            // $this->mail->Host       = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
            $this->mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers (backup server is optional)
            $this->mail->SMTPAuth   = true;                             // Enable SMTP authentication
            $this->mail->Username   = 'interservetestmail@gmail.com';                     // SMTP username
            $this->mail->Password   = 'Udealor1';                               // SMTP password
            $this->mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
            $this->mail->Port       = 465;                                    // TCP port to connect to

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }


    /**
     * Sends email to the given email address
     * 
     * @param email The recipents email address
     * @param subject The subject of the mail
     * @param bodyCallback The body of the mail
     * @param attachments (optional) an array of any attachment(file) to be sent along in the mail
     */
    public function sendOut($fullname, $email, $subject, $bodyCallback, $attachments = [])
    {
        try {
            //Recipients
            $this->mail->setFrom('no-reply@interserveconstruction.com', 'Interserve Construction');
            $this->mail->addAddress($email, $fullname);     // Add a recipient
            // $this->mail->addAddress('ellen@example.com');               // Name is optional
            // $this->mail->addReplyTo('support@interserveconstruction.com', 'Lead Support');
            $this->mail->addReplyTo('no-reply@interserveconstruction.com', 'Lead Support');
            // $this->mail->addCC('cc@example.com');
            // $this->mail->addBCC('bcc@.com');

            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $subject;
            // $this->mail->Body    = "<h1>Hello, {$fullname}!</h1> <br/><br/>Thank you for considering to entrust your project to us. We are most excited to help you walk through the process of planning and executing your project. <br/>Expect to hear from the team in 24 hours or less.<br/><br/><br/><br/>Best Regards,<br/> Steve";
            $this->mail->Body    = "Hello, Nwagbara!<br/><h3>You have one new quotation request!</h3><br/>Name: {$fullname}<br/>Service: Electrical/Electronic<br/>Description: Testing the mailing list<br/>";
            $this->mail->AltBody = 'Testing the body in plain text for non-HTML mail clients';

            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    /**
     * Sends email to the given email address
     * 
     * @param email The sender email address
     * @param subject The subject of the mail
     * @param body The body of the mail
     * @param attachments (optional) an array of any attachment(file) to be sent along in the mail
     */
    public function sendIn($email, $subject, $body, $attachments = [])
    { }
}


$t = new Mailer("interservetestmail@gamil.com");
$t->sendOut("Nwakasi Stephen", "mrcipher06@gmail.com", "Testing Mailing List", "test body");