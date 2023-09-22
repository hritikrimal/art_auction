
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_report_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_orders()
    {
        $this->db->select('order.id AS order_id, order.*, artproduct.*, user.*');
        $this->db->from('order');

        // Join 'artproduct' table based on the product_id
        $this->db->join('artproduct', 'artproduct.id = order.product_id', 'inner');

        // Join 'user' table based on the user_id
        $this->db->join('user', 'user.id = order.user_id', 'inner');

        // Add a where condition to filter by artproduct.Status = 'available'
        $this->db->where('order.Status', 'delivered');
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
