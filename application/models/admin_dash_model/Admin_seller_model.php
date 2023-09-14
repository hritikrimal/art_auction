
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_seller_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_seller()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('usertype', 'Seller'); // Add the where condition
        $query = $this->db->get();
        return $query->result();
    }
    public function update_user_status($user_id)
    {
        $data = array('status' => 'active');
        $this->db->where('id', $user_id);
        $this->db->update('user', $data);

        // Check if the update was successful
        return $this->db->affected_rows() > 0;
    }
}
