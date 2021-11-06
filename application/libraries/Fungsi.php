<?php

class Fungsi
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    function PdfGenerator($html, $filename, $papper, $orientation)
    {
        $dompdf = new  Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($papper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        ob_end_clean(); 
        // Output the generated PDF to Browser
        $dompdf->stream($filename, ['Attachment' => 0]);
    }
}
