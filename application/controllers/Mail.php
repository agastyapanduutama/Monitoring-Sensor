<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mail', 'mail');
        $this->load->model('M_home', 'home');
        
    }
    

    public function index()
    {   
        
        $awal  = $this->home->getLampu();
        $akhir = $this->db->get('t_last')->row();
        
        if ($awal->id > $akhir->last_id) {
            
            $data = array(
                'id' => $awal->id, 
            );
            $this->db->update('t_last', $data);
            $this->sendMail("Aplikasi aman");
            
        }else{
            $this->sendMail("Aplikasi ga aman");
        }
    }
    
    public function success()
    {
        echo "succcess";
    }

    public function failed()
    {
        echo "failed";
    }

    public function sendMail($text)
    {
        // Kirim Email
        // Enable less secure in gmail
        $mail = array(
            'subjek'        => "test",
            'isi_surat'     => "test",
            'host'          => "smtp.gmail.com",
            'smtp_secure'   => "ssl",
            'port'          => "465",
            'email'         => "YOUR_EMAIL_HERE",
            'password'      => "YOUR_PASSWORD_HERE",
        );

        // $this->req->print($mail);
        $email = $this->mail->sendMail($mail);

        // var_dump($email);


        // Hasil Pengiriman
        if (!$email->send()) {
            $this->session->set_flashdata('failed', 'Terjadi Kesalahan / Email tidak Terdaftar');
            redirect(base_url('Mail/failed'), 'refresh');
        } else {
            $this->session->set_flashdata('success', 'Email Berhasil Terkirim');
            redirect(base_url('Mail/success'), 'refresh');
        }
    }

}

/* End of file Mail.php */
