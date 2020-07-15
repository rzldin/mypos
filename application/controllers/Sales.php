<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
    }

    public function index()
    {
        $this->template->load('template', 'transaction/sales/sales_form');
    }
}
