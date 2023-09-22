<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expired extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Expired_model");

        if ($this->session->userdata('login') != '') {
            redirect(base_url() . 'dashboard');
        }
    }
    // view page
    public function index()
    {
        $this->load->view('homepage/header');
        $this->load->view('homepage/expired_art');
        $this->load->view('homepage/footer');
    }
    public function fetchorder()
    {
        $userid = $this->input->get('userid');
        // var_dump($userid);
        $data = $this->Expired_model->get_expired($userid);
        echo json_encode($data);
    }
}
