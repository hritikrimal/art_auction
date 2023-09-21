<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_order_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_orders_and_related_artproducts($userid)
    {
        $this->db->select('order.*, artproduct.*');
        $this->db->from('order');
        $this->db->where('order.user_id', $userid);
        $this->db->where('order.status', 'processing');

        // Join 'artproduct' table based on the product_id
        $this->db->join('artproduct', 'artproduct.id = order.product_id', 'inner');

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
