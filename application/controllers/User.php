<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('user_m');
    }

    public function index()
    {
        $data['user'] = $this->user_m->list()->result();
        //var_dump($data['user']);
        $this->template->load('template', 'user/user_data', $data);
    }

    public function cek_username()
    {
        $username = $this->input->post('data');
        $cek_data = $this->user_m->cek_data($username)->row_array();
        $return_data = ($cek_data) ? "ADA" : "TIDAK ADA";

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    public function save()
    {

        $post = $this->input->post();
        $this->user_m->save($post);

        $this->session->set_flashdata('pesan', 'Data User berhasil ditambah.');
        redirect('user');
    }

    public function edit()
    {
        $id = $this->input->post('user_id');
        $data = $this->user_m->get($id)->row_array();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->user_m->update($post);

        $this->session->set_flashdata('pesan', 'Data User berhasil diupdate.');
        redirect('user');
    }

    public function delete()
    {
        $id = $this->input->post('user_id');
        $this->user_m->delete($id);

        $this->session->set_flashdata('pesan', 'Data User berhasil di hapus!');
        redirect('user');
    }
}
