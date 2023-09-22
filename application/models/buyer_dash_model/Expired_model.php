<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expired_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_expired()
    {
        $this->db->select('*');
        $this->db->from('artproduct');
        $this->db->where('Status', 'available');

        $this->db->where('CONCAT(EndDate, " ", EndTime) <= NOW()', NULL, FALSE);

        // Execute the query
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // Return the result as an array of objects
            return $query->result();
        } else {
            // Return an empty array if no results are found
            return array();
        }
    }
}
