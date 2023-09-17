
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_art_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_art($data)
    {
        $this->db->insert('artproduct', $data);
        $insertId = $this->db->insert_id();
        return $insertId;
    }
    public function getall_artproduct($userid)
    {
        $this->db->select('*');
        $this->db->from('artproduct');
        $this->db->where('User_id', $userid);
        $this->db->where('Status', 'available');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function delete_artproducrt($id)
    {
        // Retrieve the 'Image' value before deletion
        $query = $this->db->select('Image')
            ->from('artproduct')
            ->where('id', $id)
            ->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $imagePath = $row->Image;

            // Delete the record from the database
            $this->db->where('id', $id);
            $this->db->delete('artproduct');

            // Return the 'Image' value
            return $imagePath;
        } else {
            return null;
        }
    }
    public function edit_art_product($edit_id)
    {
        $this->db->select('*');
        $this->db->from('artproduct');
        $this->db->where('id', $edit_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_art($id, $data)
    {
        // Update the art record in the database
        $this->db->where('id', $id);
        return $this->db->update('artproduct', $data);
    }
}
