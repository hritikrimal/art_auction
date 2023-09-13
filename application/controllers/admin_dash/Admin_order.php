
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('usertype') == '') {
            redirect(base_url() . 'Userlogin');
        }
    }
    // view page
    public function index()
    {

        $this->load->view('admin_dashboard/header');
        $this->load->view('admin_dashboard/order');
        $this->load->view('homepage/footer');
    }
}
