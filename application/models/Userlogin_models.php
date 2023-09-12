<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userlogin_models extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert($object)
    {
        $reg = $this->db->insert('user', $object);
        return $reg;
    }
    public function getuser($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('Password', $password);
        return $this->db->get('user')->row();
    }
}
