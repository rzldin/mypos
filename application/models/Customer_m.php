<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select();
        $this->db->from('customer');
        if ($id != null) {
            $this->db->where('customer_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function save($post)
    {
        $data = [
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('gender'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address')
        ];

        $this->db->insert('customer', $data);
    }

    public function update($post)
    {
        $data = [
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('gender'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db->where('customer_id', $this->input->post('customer_id'));
        $this->db->update('customer', $data);
    }

    public function cek_data($name)
    {
        $this->db->select();
        $this->db->from('customer');
        $this->db->where('name', $name);
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('customer');
    }
}
