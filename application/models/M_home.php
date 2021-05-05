<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

    public function getSensor()
    {
        $this->db->select('*');
        $this->db->from('t_sensor');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function getPompa()
    {
        $this->db->select('*');
        $this->db->from('t_pompa'); 
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function getLampu()
    {
        $this->db->select('*');
        $this->db->from('t_lampu');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function getData()
    {
        $this->db->from('t_sensor');
        $this->db->order_by('id', 'desc');
        $this->db->limit(10);
        return $this->db->get()->result();
    }

}

/* End of file M_home.php */
