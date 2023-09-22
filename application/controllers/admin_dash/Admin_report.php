
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_dash_model/Admin_report_model");

        if ($this->session->userdata('usertype') == '') {
            redirect(base_url() . 'Userlogin');
        }
    }
    // view page
    public function index()
    {

        $this->load->view('admin_dashboard/header');
        $this->load->view('admin_dashboard/report');
        $this->load->view('homepage/footer');
    }
    public function fetch()
    {

        // var_dump("hi");
        $data = $this->Admin_report_model->get_orders();
        echo json_encode($data);
    }
}
