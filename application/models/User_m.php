<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function login($post)
    {
        $this->db->select();
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->select();
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function list()
    {
        $this->db->select();
        $this->db->from('user');
        $query = $this->db->get();
        return $query;
    }

    public function save($post)
    {
        $data = [
            'username' => $post['username'],
            'name' => $post['name'],
            'address' => $post['address'],
            'level' => $post['level'],
            'password' => sha1($post['password'])
        ];

        $this->db->insert('user', $data);
    }

    public function update($post)
    {
        $params['username'] = $post['username'];
        $params['name'] = $post['name'];
        $params['address'] = $post['address'];
        $params['level'] = $post['level'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }

        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function cek_data($username)
    {
        $this->db->select();
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
}
