<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['user_m', 'item_m', 'supplier_m', 'customer_m', 'sale_m']);
	}

	public function index()
	{
		$data['product'] = $this->sale_m->sale_detail()->result();
		$data['item'] = $this->item_m->get()->result();
		$data['supplier'] = $this->supplier_m->get()->result();
		$data['user'] = $this->user_m->list()->result();
		$data['customer'] = $this->customer_m->get()->result();
		// var_dump($data['product']);
		$this->template->load('template', 'dashboard', $data);
	}
}
