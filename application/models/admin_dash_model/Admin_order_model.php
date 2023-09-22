<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_order_model extends CI_Model
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
        $this->db->where('artproduct.Status', 'available');

        // Order the results by order.product_id in ascending order
        $this->db->order_by('order.product_id', 'ASC');

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

    public function updateOrderStatus($order_id)
    {
        // Get the product_id before updating the status
        $this->db->select('product_id');
        $this->db->where('id', $order_id);
        $query = $this->db->get('order');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $product_id = $row->product_id;

            // Update the 'order' table to set the status to 'delivered'
            $data = array(
                'status' => 'delivered'
            );

            $this->db->where('id', $order_id);
            $this->db->update('order', $data);

            return $product_id;
        } else {
            return false; // Order not found
        }
    }
    public function updateArtProductStatus($result)
    {
        $data = array(
            'Status' => 'sold'
        );

        $this->db->where('id', $result); // Assuming 'id' is the primary key of 'artproduct' table
        return $this->db->update('artproduct', $data);
    }
}
