<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sold extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Sold_model");

        if ($this->session->userdata('login') != '') {
            redirect(base_url() . 'dashboard');
        }
    }
    // view page
    public function index()
    {
        $this->load->view('homepage/header');
        $this->load->view('homepage/sold_art');
        $this->load->view('homepage/footer');
    }
    public function fetchorder()
    {
        $userid = $this->input->get('userid');
        // var_dump($userid);
        $data = $this->Sold_model->get_sold($userid);
        echo json_encode($data);
    }
}
