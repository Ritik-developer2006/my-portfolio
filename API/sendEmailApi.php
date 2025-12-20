<?php
ini_set("display_errors", 1);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
require_once '../config/env.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

loadEnv('../.env');
/**
 * Send Email using PHPMailer
 *
 * @param array|string $toEmails   Recipient email(s)
 * @param string       $subject    Email subject
 * @param string       $message    Email body (HTML)
 * @return array
 */
function sendEmail($full_name, $senderEmail, $receiverEmail, $subject, $message,  $file_path = null, $file_name = null)
{
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = getenv('MAIL_HOST');
        $mail->Port       = getenv('MAIL_PORT');
        $mail->SMTPAuth   = true;
        $mail->Username   = getenv('MAIL_USERNAME');
        $mail->Password   = getenv('MAIL_PASSWORD');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        // Actual sender (SMTP authenticated)
        $mail->setFrom('rk5771829@gmail.com', 'Website Portfolio');
        // $mail->setFrom($senderEmail, $full_name);

        // User email as reply-to
        $mail->addReplyTo($senderEmail, $full_name);

        // Receiver from user
        if (!empty($file_path) && file_exists($file_path)) {
            $mail->addAttachment($file_path, $file_name);
        }
        if (is_array($receiverEmail)) {
            foreach ($receiverEmail as $email) {
                $mail->addAddress($email);
            }
        } else {
            $mail->addAddress($receiverEmail);
        }

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = strip_tags($message);

        // Send email
        if ($mail->send()) {
            return ["status" => 1, "msg" => "Email sent successfully"];
        }

        return ["status" => 0, "msg" => $mail->ErrorInfo];
    } catch (Exception $e) {
        return ["status" => 0, "msg" => $e->getMessage()];
    }
}
