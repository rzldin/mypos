<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select();
        $this->db->from('supplier');
        if ($id != null) {
            $this->db->where('supplier_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function save($post)
    {
        $data = [
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'desc' => $this->input->post('desc')
        ];

        $this->db->insert('supplier', $data);
    }

    public function update($post)
    {
        $data = [
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'desc' => $this->input->post('desc'),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db->where('supplier_id', $this->input->post('supplier_id'));
        $this->db->update('supplier', $data);
    }

    public function cek_data($name)
    {
        $this->db->select();
        $this->db->from('supplier');
        $this->db->where('name', $name);
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }
}
