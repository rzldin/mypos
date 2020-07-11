<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('item_m');
        check_not_login();
    }

    public function index()
    {
        //$data['item'] = $this->item_m->get()->result();
        $this->template->load('template', 'product/item/item_data');
    }

    public function cek_item()
    {
        $name = $this->input->post('data');
        $cek_data = $this->item_m->cek_data($name)->row_array();
        $return_data = ($cek_data) ? "ADA" : "TIDAK ADA";

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    public function save()
    {
        $post = $this->input->post();
        $this->item_m->save($post);
        $this->session->set_flashdata('pesan', 'Data item berhasil di tambah.');
        redirect('item');
    }

    public function edit()
    {
        $id = $this->input->post('item_id');
        $data = $this->item_m->get($id)->row_array();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->item_m->update($post);

        $this->session->set_flashdata('pesan', 'Data item berhasil diupdate.');
        redirect('item');
    }

    public function delete()
    {
        $id = $this->input->post('item_id');
        $this->item_m->delete($id);

        $this->session->set_flashdata('pesan', 'Data item berhasil di hapus!');
        redirect('item');
    }
}
