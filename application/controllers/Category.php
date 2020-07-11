<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_m');
        check_not_login();
    }

    public function index()
    {
        $data['category'] = $this->category_m->get()->result();
        $this->template->load('template', 'product/category/category_data', $data);
    }

    public function cek_category()
    {
        $name = $this->input->post('data');
        $cek_data = $this->category_m->cek_data($name)->row_array();
        $return_data = ($cek_data) ? "ADA" : "TIDAK ADA";

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    public function save()
    {
        $post = $this->input->post();
        $this->category_m->save($post);
        $this->session->set_flashdata('pesan', 'Data Categories berhasil di tambah.');
        redirect('category');
    }

    public function edit()
    {
        $id = $this->input->post('category_id');
        $data = $this->category_m->get($id)->row_array();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->category_m->update($post);

        $this->session->set_flashdata('pesan', 'Data Categories berhasil diupdate.');
        redirect('category');
    }

    public function delete()
    {
        $id = $this->input->post('category_id');
        $this->category_m->delete($id);

        $this->session->set_flashdata('pesan', 'Data Categories berhasil di hapus!');
        redirect('category');
    }
}
