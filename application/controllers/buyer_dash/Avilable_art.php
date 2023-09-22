



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

    public function fetch_order()
    {
        $userid = $this->input->get('userid');
        $datas = $this->Avilable_art_model->getall_artorder($userid);
        echo json_encode($datas);
    }
    public function view()
    {
        $edit_id = $this->input->post('product_id');

        $data = $this->Avilable_art_model->view_art_product($edit_id);

        echo json_encode($data);
    }

    public function insert_order()
    {

        $data = array(
            'user_id' => $this->input->post('user_id'),
            'product_id' => $this->input->post('product_id'),
            'bid_amount' => $this->input->post('bid_amount'),
            'status' => 'processing',
        );
        $product = $this->Avilable_art_model->insert_order_detail($data);

        $response = array();
        if ($product) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        echo json_encode($response);
    }
}
