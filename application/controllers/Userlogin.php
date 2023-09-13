

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userlogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Userlogin_models");
    }
    // view page
    public function index()
    {

        $this->load->view('homepage/header');
        $this->load->view('homepage/userlogreg');
        $this->load->view('homepage/footer');
    }
    public function register()
    {


        $this->form_validation->set_rules("usernames", "User Name", "required");
        $this->form_validation->set_rules("usertype", "User Type", "required");
        $this->form_validation->set_rules("firstname", "First Name", "required");
        $this->form_validation->set_rules("lastname", "Last Name", "required");
        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("address", "Address", "required");
        $this->form_validation->set_rules("passwords", "Passwords", "required");
        $this->form_validation->set_rules("repasswords", "repasswords", "required|matches[passwords]");

        if ($this->form_validation->run() == true) {

            $object = array();
            $object['username'] = $this->input->post('usernames');
            $object['usertype'] = $this->input->post('usertype');
            $object['firstname'] = $this->input->post('firstname');
            $object['lastname'] = $this->input->post('lastname');
            $object['email'] = $this->input->post('email');
            $object['address'] = $this->input->post('address');
            $object['password'] = $this->input->post('passwords');
            $object['status'] = "passive";


            // Set the time zone to Nepal
            date_default_timezone_set('Asia/Kathmandu');

            // Get the current timestamp in Nepal's time zone
            $object['CreationDate'] = date('Y-m-d H:i:s');
            $this->Userlogin_models->insert($object);

            $response['success'] = true;
            $response['success'] = $object;
        } else {
            $response['success'] = false;
            $response['message'] =  strip_tags('Error');
        }
        echo json_encode($response);
    }
    public function login()
    {
        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("password", "Password", "required");

        $response = array(); // Initialize the response array

        if ($this->form_validation->run() == true) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->Userlogin_models->getuser($username, $password);


            if ($user) {
                if ($user->status == 'active') {
                    //session
                    $this->session->set_userdata('usertype', $user->usertype);
                    $this->session->set_userdata('status', $user->status);
                    $this->session->set_userdata('firstname', $user->firstname);
                    $this->session->set_userdata('lastname', $user->lastname);
                    // Check the user's art type
                    if ($user->usertype == 'admin') {
                        $response['url'] = base_url('admin_dash/Admin_dashboard');
                    } elseif ($user->usertype == 'Buyer') {
                        $response['url'] = base_url('Buyer_dashboard');
                    } elseif ($user->usertype == 'Seller') {
                        $response['url'] = base_url('Seller_dashboard');
                    } else {
                        $response['success'] = false;
                        $response['message'] = "Invalid user type";
                    }

                    $response['success'] = true;
                } else {
                    $response['success'] = false;
                    $response['message'] = "Verification is processing";
                }
            } else {
                $response['success'] = false;
                $response['message'] = "Invalid username or password";
            }
        } else {
            $response['success'] = false;
            $response['message'] = "Invalid username or password";
        }

        echo json_encode($response);
    }
}
