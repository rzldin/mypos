<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		$this->load->model('user_m');
		$data['user'] = $this->user_m->list()->result();
		//var_dump($data['user']);
		$this->template->load('template', 'dashboard', $data);
	}
}
