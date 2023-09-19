



<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avilable_art extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("buyer_dash_model/Avilable_art_model");

        if ($this->session->userdata('login') != '') {
            redirect(base_url() . 'dashboard');
        }
    }
    // view page
    public function index()
    {

        $this->load->view('buyer_dashboard/header');
        $this->load->view('buyer_dashboard/avilable');
        $this->load->view('homepage/footer');
    }
    public function fetch()
    {
        $userid = $this->input->get('userid');
        $data = $this->Avilable_art_model->getall_artproduct($userid);
        echo json_encode($data);
    }
}
