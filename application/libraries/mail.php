<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

defined('BASEPATH') OR exit('No direct script access allowed');

class mail {

    private $mail;

    public function __construct()
    {
        require_once(APPPATH . 'libraries/PHPMailer/src/Exception.php');
        require_once(APPPATH . 'libraries/PHPMailer/src/PHPMailer.php');
        require_once(APPPATH . 'libraries/PHPMailer/src/SMTP.php');
        
        $this->mail = new PHPMailer(true);
    }

    public function send($to, $subject, $message, $from_email = '', $from_name = 'Website Name')
    {
        try {
            
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';  
            $this->mail->SMTPAuth = true;
            $this->mail->Username = '';
            $this->mail->Password = ''; 
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $this->mail->Port = 587; 

         
            $this->mail->setFrom($from_email, $from_name);
            $this->mail->addAddress($to);

         
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $message;

          
            return $this->mail->send();
        } catch (Exception $e) {
            log_message('error', 'Email tidak dapat dikirim. Error: ' . $this->mail->ErrorInfo);
            return false;
        }
    }
}
