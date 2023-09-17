<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_sold extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("seller_dash_model/My_sold_model");


        if ($this->session->userdata('login') != '') {
            redirect(base_url() . 'dashboard');
        }
    }

    public function index()
    {
        $this->load->view('seller_dashboard/header');
        $this->load->view('seller_dashboard/sold_art');
        $this->load->view('homepage/footer');
    }
    public function fetch()
    {
        $userid = $this->input->get('userid');
        $data = $this->My_sold_model->getall_artproduct($userid);
        echo json_encode($data);
    }
}
