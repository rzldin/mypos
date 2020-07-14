<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('supplier_m');
        check_not_login();
    }

    public function stock_in_index()
    {
        $data['supplier'] = $this->supplier_m->get()->result();
        $this->template->load('template', 'transaction/stock_in/stock_form', $data);
    }

    public function stock_in_add()
    {
    }

    public function proccess()
    {
    }
}
