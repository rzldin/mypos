<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['sale_m', 'laporan_m']);
        check_not_login();
    }

    public function sale_report()
    {
        $data['sale'] = $this->sale_m->get_sale()->result();
        $this->template->load('template', 'reports/sale_report', $data);
    }

    public function stock_report()
    {
        $this->template->load('template', 'reports/stock_report');
    }

    public function detail()
    {
        $sale_id = $this->input->post('sale_id');
        $data = $this->sale_m->get_sale_detail($sale_id)->row_array();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function print_report($sale_id)
    {
        $data['report'] = $this->sale_m->get_sale_detail($sale_id)->row_array();
        $html = $this->load->view('reports/print_data', $data, true);
        $this->fungsi->PdfGenerator($html, 'Laporan-' . $data['report']->invoice, 'A4', 'landscape');
    }

    public function report_sale()
    {
        $this->template->load('template', 'reports/laporan_penjualan');
    }

    public function print_laporan_penjualan()
    {
        $s = date('Y-m-d', strtotime($_GET['ts']));
        $e = date('Y-m-d', strtotime($_GET['te']));
        $data['s']             = $s;
        $data['e']             = $e;
        $data['detailLaporan'] = $this->laporan_m->print_laporan($s,$e)->result();
        $this->load->view('reports/print_laporan_penjualan', $data);
    }
}
