<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
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

        $this->load->view('homepage/header');
        $this->load->view('homepage/about');
        $this->load->view('homepage/footer');
    }
}
