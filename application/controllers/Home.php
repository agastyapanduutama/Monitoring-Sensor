<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_home', 'home');
        
    }
    

    public function index()
    {

        $suhu       = $this->home->getData();
        $Sensor     = $this->home->getSensor();
        $Pompa      = $this->home->getPompa();
        $Lampu      = $this->home->getLampu();
        
        $data = array(
            'list'      => $suhu, 
            'sensor'    => $Sensor,
            'pompa'     => $Pompa,
            'lampu'     => $Lampu,
            'konten'    => 'v_home'
        );

        $this->load->view('templates/template', $data, FALSE);
        
    }

    public function kipas()
    {
        $kipas = $this->db->from('t_sensor')
                           ->order_by('id', 'DESC')
                           ->limit(10)                  
                           ->get()->result();   

        $data = array(
            'list' => $kipas , 
            'konten' => 'v_kipas'
        );

        $this->load->view('templates/template', $data, FALSE);
        
    }

    public function lampu()
    {
        $lampu = $this->db->from('t_lampu')
                           ->order_by('id', 'DESC')
                           ->limit(10)                  
                           ->get()->result();
    
        $data = array(
            'list' => $lampu ,
            'konten' => 'v_lampu'
        );

        $this->load->view('templates/template', $data, FALSE);
        
    }

    public function pompa()
    {
        $pompa = $this->db->from('t_pompa')
                           ->order_by('id', 'DESC')
                           ->limit(10)                  
                           ->get()->result();
        

        $data = array(
            'list' => $pompa ,
            'konten' => 'v_pompa'
        );

        $this->load->view('templates/template', $data, FALSE);
        
    }

}

/* End of file Home.php */
