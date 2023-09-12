
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model("Register_models");
    }
    // view page
    public function index()
    {

        $this->load->view('homepage/header');
        $this->load->view('homepage/home_index');
        $this->load->view('homepage/footer');
    }
}
