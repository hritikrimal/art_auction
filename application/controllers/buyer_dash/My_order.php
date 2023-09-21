<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("buyer_dash_model/My_order_model");

        if ($this->session->userdata('login') != '') {
            redirect(base_url() . 'dashboard');
        }
    }
    // view page
    public function index()
    {

        $this->load->view('buyer_dashboard/header');
        $this->load->view('buyer_dashboard/myorder');
        $this->load->view('homepage/footer');
    }
    public function fetchorder()
    {
        $userid = $this->input->get('userid');
        // var_dump($userid);
        $data = $this->My_order_model->get_orders_and_related_artproducts($userid);
        echo json_encode($data);
    }
}
