<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opssawit extends CI_Controller
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
        $this->data['title_web'] = 'Peta | SIG Sawit';
        $this->data['unit'] = $this->M_Admin->get_table_maps('tbl_unit');
        $this->data['daftar_unit'] =  $this->db->query("SELECT * FROM tbl_unit ORDER BY id_unit ASC")->result_array();
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('opssawit/v_peta', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function pencarian()
    {
        $keyword = $this->input->post('keyword');
        $data = array(
            'title_web' => 'Pencarian Unit | SIG Sawit',
            'keyword' =>  $keyword,
            'idbo' => $this->session->userdata('ses_id'),
            'unit' => $this->M_Admin->get_unit_keyword($keyword),
            'panen' => $this->M_Admin->get_panen_keyword($keyword),
            'pemeliharaan' => $this->M_Admin->get_pemeliharaan_keyword($keyword),
            'jalan' => $this->M_Admin->get_jalan_keyword($keyword),
            'pencurian' => $this->M_Admin->get_pencurian_keyword($keyword),
            'bencana' => $this->M_Admin->get_bencana_keyword($keyword),
            'daftar_unit' =>  $this->db->query("SELECT * FROM tbl_unit ORDER BY id_unit ASC")->result_array()
        );
        $this->load->view('header_view', $data);
        $this->load->view('sidebar_view', $data);
        $this->load->view('opssawit/v_cari', $data);
        $this->load->view('footer_view', $data);
    }
}
