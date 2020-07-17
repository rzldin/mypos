<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['supplier_m', 'customer_m', 'sale_m', 'item_m']);
        check_not_login();
    }

    public function index()
    {
        $data['customer'] = $this->customer_m->get()->result();
        $data['item'] = $this->item_m->get()->result();
        $data['cart'] = $this->sale_m->get_cart();
        $data['invoice'] = $this->sale_m->invoice_no();
        // var_dump($data['cart']);
        // die();
        $this->template->load('template', 'transaction/sales/sales_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, true);

        if (isset($_POST['add_cart'])) {

            $item_id = $this->input->post('item_id');
            $cek_cart = $this->sale_m->get_cart(['t_cart.item_id' => $item_id]);
            if ($cek_cart->num_rows() > 0) {
                $this->sale_m->update_cart_qty($post);
            } else {
                $this->sale_m->add_cart($post);
            }

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    public function edit()
    {
        $id = $this->input->post('cart_id');
        $data = $this->sale_m->get($id)->row_array();
        header('Content-Type: application/json');
        echo json_encode($data);
        //var_dump($data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->sale_m->update_cart($post);
        $this->session->set_flashdata('pesan', 'Cart berhasil diupdate.');
        redirect('sales');
    }

    public function cart_data()
    {
        $cart = $this->sale_m->get_cart();
        $data['cart'] = $cart;
        $this->load->view('transaction/sales/cart_data', $data);
    }

    public function cart_del()
    {
        $cart_id = $this->input->post('cart_id');
        $this->sale_m->del_cart(['cart_id' => $cart_id]);

        $this->session->set_flashdata('pesan', 'Cart berhasil di hapus!');
        redirect('sales');
    }
}
