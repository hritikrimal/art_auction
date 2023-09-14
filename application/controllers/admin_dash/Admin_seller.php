<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_seller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_dash_model/Admin_seller_model");

        if ($this->session->userdata('usertype') == '') {
            redirect(base_url() . 'Userlogin');
        }
    }
    // view page
    public function index()
    {

        $this->load->view('admin_dashboard/header');
        $this->load->view('admin_dashboard/seller');
        $this->load->view('homepage/footer');
    }
    public function fetch()
    {
        $data = $this->Admin_seller_model->get_seller();
        // var_dump($data);
        echo json_encode($data);
    }
    public function updateStatus()
    {
        // Get the user ID from the POST data
        $user_id = $this->input->post('userId');

        // Call the model method to update the user status
        $success = $this->Admin_seller_model->update_user_status($user_id);

        // Return a response as JSON
        $response = array('success' => $success);
        echo json_encode($response);
    }
}
