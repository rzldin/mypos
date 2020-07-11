<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_m');
        check_not_login();
    }

    public function index()
    {
        $data['customer'] = $this->customer_m->get()->result();
        $this->template->load('template', 'customer/customer_data', $data);
    }

    public function cek_customer()
    {
        $name = $this->input->post('data');
        $cek_data = $this->customer_m->cek_data($name)->row_array();
        $return_data = ($cek_data) ? "ADA" : "TIDAK ADA";

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    public function save()
    {
        $post = $this->input->post();
        $this->customer_m->save($post);
        $this->session->set_flashdata('pesan', 'Data customer berhasil di tambah.');
        redirect('customer');
    }

    public function edit()
    {
        $id = $this->input->post('customer_id');
        $data = $this->customer_m->get($id)->row_array();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->customer_m->update($post);

        $this->session->set_flashdata('pesan', 'Data customer berhasil diupdate.');
        redirect('customer');
    }

    public function delete()
    {
        $id = $this->input->post('customer_id');
        $this->customer_m->delete($id);

        $this->session->set_flashdata('pesan', 'Data customer berhasil di hapus!');
        redirect('customer');
    }
}
