<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select();
        $this->db->from('p_category');
        if ($id != null) {
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function save($post)
    {
        $data['name'] = $this->input->post('name');

        $this->db->insert('p_category', $data);
    }

    public function update($post)
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db->where('category_id', $this->input->post('category_id'));
        $this->db->update('p_category', $data);
    }

    public function cek_data($name)
    {
        $this->db->select();
        $this->db->from('p_category');
        $this->db->where('name', $name);
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('p_category');
    }
}
