<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function list_notif()
    {
        $this->load->view('notifikasi/list_notifikasi_view');
    }
}
