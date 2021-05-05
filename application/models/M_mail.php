<?php

use PHPMailer\PHPMailer\PHPMailer;

defined('BASEPATH') OR exit('No direct script access allowed');

class M_mail extends CI_Model {

    public function sendMail($dataNa)
    {
        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';

        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = $dataNa['host']; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = $dataNa['email']; // user email
        $mail->Password = $dataNa['password']; // password email
        $mail->SMTPSecure = $dataNa['smtp_secure'];
        $mail->Port = $dataNa['port'];
        $mail->setFrom($dataNa['email'], ''); // user email

        $mail->addAddress('YOUR_EMAIL_HERE'); //email tujuan pengiriman email

        $mail->Subject = $dataNa['subjek']; //subject email
        $mail->isHTML(true);

        $mailContent = $this->load->view('v_email', $dataNa, TRUE);
        $mail->Body = $mailContent;

        // Send email
        return $mail;
    }

}

/* End of file M_mail.php */
