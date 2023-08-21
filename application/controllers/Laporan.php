<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url', 'file'));
        $this->load->model('M_Admin');
        if ($this->session->userdata('masuk_sistem_rekam') != TRUE) {
            $url = base_url('login');
            redirect($url);
        }
    }

    public function index()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['title_web'] = 'Laporan | SIG Sawit ';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('v_laporan', $this->data);
        $this->load->view('footer_view', $this->data);
    }
    public function panen()
    {
        $data['idbo'] = $this->session->userdata('ses_id');
        $data['title_web'] = 'Laporan | SIG Sawit ';
        $tgl_awal_panen = date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_awal_panen')));
        $tgl_akhir_panen = date('Y-m-d 23:59:59', strtotime($this->input->post('tanggal_akhir_panen')));

        if ($this->session->userdata('level') == 'Ops sawit') {
            $data['panen'] = $this->M_Admin->getPanenSortTgl($tgl_awal_panen, $tgl_akhir_panen)->result();
        } elseif ($this->session->userdata('level') == 'Unit') {
            $data['panen'] = $this->M_Admin->getPanenUnitSortTgl($tgl_awal_panen, $tgl_akhir_panen)->result();
        }
        // kirim data tanggal untuk riwayat penelusuran
        $data['tgl_awal_panen'] = $this->input->post('tanggal_awal_panen');
        $data['tgl_akhir_panen'] = $this->input->post('tanggal_akhir_panen');

        $this->load->view('header_view', $data);
        $this->load->view('sidebar_view', $data);
        $this->load->view('v_laporan', $data);
        $this->load->view('footer_view', $data);
    }
    public function pemeliharaan()
    {
        $data['idbo'] = $this->session->userdata('ses_id');
        $data['title_web'] = 'Laporan | SIG Sawit ';
        $tgl_awal_pemeliharaan = date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_awal_pemeliharaan')));
        $tgl_akhir_pemeliharaan = date('Y-m-d 23:59:59', strtotime($this->input->post('tanggal_akhir_pemeliharaan')));
        if ($this->session->userdata('level') == 'Ops sawit') {
            $data['pemeliharaan'] = $this->M_Admin->getPemeliharaanSortTgl($tgl_awal_pemeliharaan, $tgl_akhir_pemeliharaan)->result();
        } elseif ($this->session->userdata('level') == 'Unit') {
            $data['pemeliharaan'] = $this->M_Admin->getPemeliharaanUnitSortTgl($tgl_awal_pemeliharaan, $tgl_akhir_pemeliharaan)->result();
        }
        // kirim data tanggal untuk riwayat penelusuran
        $data['tgl_awal_pemeliharaan'] = $this->input->post('tanggal_awal_pemeliharaan');
        $data['tgl_akhir_pemeliharaan'] = $this->input->post('tanggal_akhir_pemeliharaan');

        $this->load->view('header_view', $data);
        $this->load->view('sidebar_view', $data);
        $this->load->view('v_laporan', $data);
        $this->load->view('footer_view', $data);
    }
    public function pencurian()
    {
        $data['idbo'] = $this->session->userdata('ses_id');
        $data['title_web'] = 'Laporan | SIG Sawit ';
        $tgl_awal_pencurian = date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_awal_pencurian')));
        $tgl_akhir_pencurian = date('Y-m-d 23:59:59', strtotime($this->input->post('tanggal_akhir_pencurian')));
        if ($this->session->userdata('level') == 'Ops sawit') {
            $data['pencurian'] = $this->M_Admin->getPencurianSortTgl($tgl_awal_pencurian, $tgl_akhir_pencurian)->result();
        } elseif ($this->session->userdata('level') == 'Unit') {
            $data['pencurian'] = $this->M_Admin->getPencurianUnitSortTgl($tgl_awal_pencurian, $tgl_akhir_pencurian)->result();
        }
        // kirim data tanggal untuk riwayat penelusuran
        $data['tgl_awal_pencurian'] = $this->input->post('tanggal_awal_pencurian');
        $data['tgl_akhir_pencurian'] = $this->input->post('tanggal_akhir_pencurian');

        $this->load->view('header_view', $data);
        $this->load->view('sidebar_view', $data);
        $this->load->view('v_laporan', $data);
        $this->load->view('footer_view', $data);
    }
    public function bencana()
    {
        $data['idbo'] = $this->session->userdata('ses_id');
        $data['title_web'] = 'Laporan | SIG Sawit ';
        $tgl_awal_bencana = date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_awal_bencana')));
        $tgl_akhir_bencana = date('Y-m-d 23:59:59', strtotime($this->input->post('tanggal_akhir_bencana')));
        if ($this->session->userdata('level') == 'Ops sawit') {
            $data['bencana'] = $this->M_Admin->getBencanaSortTgl($tgl_awal_bencana, $tgl_akhir_bencana)->result();
        } elseif ($this->session->userdata('level') == 'Unit') {
            $data['bencana'] = $this->M_Admin->getBencanaUnitSortTgl($tgl_awal_bencana, $tgl_akhir_bencana)->result();
        }
        // kirim data tanggal untuk riwayat penelusuran
        $data['tgl_awal_bencana'] = $this->input->post('tanggal_awal_bencana');
        $data['tgl_akhir_bencana'] = $this->input->post('tanggal_akhir_bencana');

        $this->load->view('header_view', $data);
        $this->load->view('sidebar_view', $data);
        $this->load->view('v_laporan', $data);
        $this->load->view('footer_view', $data);
    }
}
