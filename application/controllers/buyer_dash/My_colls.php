<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_colls extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("buyer_dash_model/MY_collection_model");

        if ($this->session->userdata('login') != '') {
            redirect(base_url() . 'dashboard');
        }
    }
    public function index()
    {

        $this->load->view('buyer_dashboard/header');
        $this->load->view('buyer_dashboard/collection');
        $this->load->view('homepage/footer');
    }
    public function fetchorder()
    {
        $userid = $this->input->get('userid');
        // var_dump($userid);
        $data = $this->MY_collection_model->get_collection($userid);
        echo json_encode($data);
    }
}
