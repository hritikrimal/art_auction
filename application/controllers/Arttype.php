<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arttype extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Arttype_model");

        if ($this->session->userdata('login') != '') {
            redirect(base_url() . 'dashboard');
        }
    }
    // view page
    public function index()
    {
        $this->load->view('homepage/header');
        $this->load->view('homepage/arttype');
        $this->load->view('homepage/footer');
    }
    public function fetch()
    {
        $userid = $this->input->get('userid');
        $data = $this->Arttype_model->getall_artproduct($userid);
        echo json_encode($data);
    }
}
