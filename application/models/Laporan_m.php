<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{

    function print_laporan($s,$e)
    {
        return $this->db->query("SELECT a.*, b.name as customer FROM t_sale a LEFT JOIN customer b ON a.customer_id=b.customer_id  WHERE a.date between '".$s."' and '".$e."' GROUP BY  a.invoice ORDER BY a.sale_id asc");
    }

    
}
