


<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seller_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != '') {
            redirect(base_url() . 'dashboard');
        }
    }
    // view page
    public function index()
    {

        $this->load->view('seller_dashboard/header');
        $this->load->view('seller_dashboard/sellerdash');
        $this->load->view('homepage/footer');
    }
}
