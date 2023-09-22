<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arttype_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getall_artproduct($userid)
    {
        // Subquery to select all product_id values from the 'order' table for the given user
        $subquery = $this->db->select('product_id')
            ->from('order')
            ->where('user_id', $userid)
            ->get_compiled_select();

        $this->db->select('*');
        $this->db->from('artproduct');

        // Add conditions based on whether the subquery is null or not
        if (!empty($subquery)) {
            // Select only those rows where id is not in the subquery result
            $this->db->where("id NOT IN ($subquery)", NULL, FALSE);
        }

        $this->db->where('Status', 'available');
        $this->db->where('CONCAT(EndDate, " ", EndTime) >= NOW()', NULL, FALSE);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}
