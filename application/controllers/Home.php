<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'file'));
        $this->load->model('M_Admin');
    }

    public function index()
    {
        $data = array(
            'title' => 'Sistem Informasi Geografis Kelapa Sawit',
            'isi' => 'home/v_home',
        );
        $this->load->view('home/v_wrapper', $data, FALSE);
    }
    public function about()
    {
        $data = array(
            'title' => 'About | SIG Sawit',
            'isi' => 'home/v_tentang'
        );
        $this->load->view('home/v_wrapper', $data, FALSE);
    }
    public function peta()
    {
        $data = array(
            'title' => 'Peta | SIG Sawit',
            'isi' => 'home/v_peta',
            'unit' => $this->M_Admin->get_table_maps('tbl_unit')
        );
        $this->load->view('home/v_wrapper', $data, FALSE);
    }
}
