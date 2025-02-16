<?php
namespace TourDeMaroc\App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class SendMail
{
    public static function SendMail($emailDestination, $body)
    {

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'essadeq.billouche.oa@gmail.com';
            $mail->Password = 'your-email-password';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Email Headers
            $mail->setFrom('noreply@yourwebsite.com', 'Tour De Maroc');
            $mail->addAddress($emailDestination);

            // Email Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = $body;

            // Send Email
            $mail->send();
            echo 'Password reset email sent!';
            return true;
        } catch (Exception $e) {
            echo "Error sending email: {$mail->ErrorInfo}";
        }
    }

}
