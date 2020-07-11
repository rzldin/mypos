<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('unit_m');
        check_not_login();
    }

    public function index()
    {
        $data['unit'] = $this->unit_m->get()->result();
        $this->template->load('template', 'product/unit/unit_data', $data);
    }

    public function cek_unit()
    {
        $name = $this->input->post('data');
        $cek_data = $this->unit_m->cek_data($name)->row_array();
        $return_data = ($cek_data) ? "ADA" : "TIDAK ADA";

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    public function save()
    {
        $post = $this->input->post();
        $this->unit_m->save($post);
        $this->session->set_flashdata('pesan', 'Data Unit berhasil di tambah.');
        redirect('unit');
    }

    public function edit()
    {
        $id = $this->input->post('unit_id');
        $data = $this->unit_m->get($id)->row_array();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->unit_m->update($post);

        $this->session->set_flashdata('pesan', 'Data Unit berhasil diupdate.');
        redirect('unit');
    }

    public function delete()
    {
        $id = $this->input->post('unit_id');
        $this->unit_m->delete($id);

        $this->session->set_flashdata('pesan', 'Data Unit berhasil di hapus!');
        redirect('unit');
    }
}
