


<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_art extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("seller_dash_model/My_art_model");


        if ($this->session->userdata('login') != '') {
            redirect(base_url() . 'dashboard');
        }
    }

    public function index()
    {
        $this->load->view('seller_dashboard/header');
        $this->load->view('seller_dashboard/avvilable_art');
        $this->load->view('homepage/footer');
    }
    public function store_art()
    {
        $userid = $this->input->post('userid');
        $title = $this->input->post('title');


        $image = $_FILES['image'];
        $image_path = 'uploads/' . $image['name'];
        move_uploaded_file($image['tmp_name'], $image_path);


        $data = array(
            'User_id' => $userid,
            'Title' => $title,
            'Image' => $image_path,
            'Size' => $this->input->post('Size'),
            'Status' => 'available',
            'Shipping_status' => 'processing',
            'Classification' => $this->input->post('Classification'),
            'Artist' => $this->input->post('Artist'),
            'ArtType' => $this->input->post('ArtType'),
            'ArtMedium' => $this->input->post('ArtMedium'),
            'Dimension' => $this->input->post('Dimension'),
            'Price' => $this->input->post('Price'),
            'ArtProduce' => $this->input->post('ProduceDate'),
            'Description' => $this->input->post('Description'),
            'StartDate' => $this->input->post('StartDate'),
            'StartTime' => $this->input->post('StartTime'),
            'EndDate' => $this->input->post('EndDate'),
            'EndTime' => $this->input->post('EndTime'),
        );


        $inserted_id = $this->My_art_model->insert_art($data);

        $response = array();
        if ($inserted_id) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        echo json_encode($response);
    }
    public function fetch()
    {
        $userid = $this->input->get('userid');
        $data = $this->My_art_model->getall_artproduct($userid);
        echo json_encode($data);
    }
    public function del()
    {
        $del_id = $this->input->post('del_id');

        $image_path = $this->My_art_model->delete_artproducrt($del_id);
        // var_dump($image_path);
        if ($image_path) {
            // Delete the file from the 'uploads' folder
            unlink($image_path);
        }
        $response['success'] = true;
        echo json_encode($response);
    }
    public function edit()
    {
        $edit_id = $this->input->post('edit_id');

        $data = $this->My_art_model->edit_art_product($edit_id);

        echo json_encode($data);
    }
    public function update_art_product()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $oldfile = $this->input->post('old_image'); // Existing image path
        $newfile = $_FILES['new_image']['name'];

        // Check if a new image is uploaded
        if (!empty($newfile)) {
            $image = $_FILES['new_image'];
            $image_path = 'uploads/' . $image['name']; // Corrected path

            // Move the new image to the specified path
            if (move_uploaded_file($image['tmp_name'], $image_path)) {
                // New image uploaded successfully
                $update_file = $image_path;

                // Remove the old image if it exists
                if (file_exists($oldfile)) {
                    unlink($oldfile);
                }
            } else {
                // Handle the upload error here
                $response['success'] = false;
                $response['message'] = 'Image upload failed.';
                echo json_encode($response);
                return;
            }
        } else {
            // No new image uploaded, keep the existing one
            $update_file = $oldfile;
        }
        $data = array(
            'User_id' => $this->input->post('user_id'),
            'Title' => $title,
            'Image' => $update_file,
            'Status' => 'available',
            'Shipping_status' => 'processing',
            'Size' => $this->input->post('Size'),
            'Classification' => $this->input->post('Classification'),
            'Artist' => $this->input->post('Artist'),
            'ArtType' => $this->input->post('ArtType'),
            'ArtMedium' => $this->input->post('ArtMedium'),
            'Dimension' => $this->input->post('Dimension'),
            'Price' => $this->input->post('Price'),
            'ArtProduce' => $this->input->post('ProduceDate'),
            'Description' => $this->input->post('Description'),
            'StartDate' => $this->input->post('StartDate'),
            'StartTime' => $this->input->post('StartTime'),
            'EndDate' => $this->input->post('EndDate'),
            'EndTime' => $this->input->post('EndTime'),
        );

        $update_result = $this->My_art_model->update_art($id, $data);

        if ($update_result) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        echo json_encode($response);
    }
}
