<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer extends Controller
{
    public function email($email = null,$subject = null,$body = null){
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);
        try {
            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';//'mail.jetnetixsolutions.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'freelancerebad@gmail.com';
            $mail->Password = 'boex opkf hmyr uusk';
            $mail->SMTPSecure = 'TLS';
            $mail->Port = 587;
            $mail->setFrom('freelancerebad@gmail.com', 'Ebad uddin Ahmed');
            $mail->addReplyTo('freelancerebad@gmail.com', 'Ebad Uddin Ahmed');
            $mail->addAddress($email);
            $mail->isHTML(true);
            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);
            $mail->Subject = $subject;
            $mail->Body   = $body;
            if( !$mail->send() ) {
                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
            else {
                return back()->with("success", "Email has been sent.");
            }
        } catch (Exception $e) {
             return back()->with('error','Message could not be sent.');
        }
    }
}
