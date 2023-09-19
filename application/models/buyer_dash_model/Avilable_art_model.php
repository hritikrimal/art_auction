
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avilable_art_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getall_artproduct()
    {

        $this->db->select('*');
        $this->db->from('artproduct');
        $this->db->where('Status', 'available');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}
