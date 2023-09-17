<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_sold_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getall_artproduct($userid)
    {
        $this->db->select('*');
        $this->db->from('artproduct');
        $this->db->where('User_id', $userid);
        $this->db->where('Status', 'sold');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}
