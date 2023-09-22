
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_dash_model/Admin_order_model");

        if ($this->session->userdata('usertype') == '') {
            redirect(base_url() . 'Userlogin');
        }
    }
    // view page
    public function index()
    {

        $this->load->view('admin_dashboard/header');
        $this->load->view('admin_dashboard/order');
        $this->load->view('homepage/footer');
    }
    public function fetch()
    {

        $data = $this->Admin_order_model->get_orders();
        echo json_encode($data);
    }
    public function insert_sold()
    {
        $order_id = $this->input->post('order_id');
        // var_dump($order_id);
        // Update the 'order' table to set the status to 'delivered'
        $result = $this->Admin_order_model->updateOrderStatus($order_id);

        // Update the 'artproduct' table to set the status to 'sold'
        if ($result) {
            $success = $this->Admin_order_model->updateArtProductStatus($result);

            // Return a response to the AJAX call
            if ($success) {
                echo json_encode(array('success' => true));
            } else {
                echo json_encode(array('success' => false));
            }
        } else {
            echo json_encode(array('success' => false));
        }
    }
}
