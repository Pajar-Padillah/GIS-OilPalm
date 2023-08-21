<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		$this->data['CI'] = &get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');
		if ($this->session->userdata('masuk_sistem_rekam') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['title_web'] = 'Dashboard | SIG Sawit';
		$this->data['count_pengguna'] = $this->db->query("SELECT * FROM tbl_user")->num_rows();
		$this->data['count_unit'] = $this->db->query("SELECT * FROM tbl_unit")->num_rows();
		$this->data['unit'] = $this->M_Admin->get_table_unit_user();
		$this->data['unit_admin'] = $this->M_Admin->get_table_maps('tbl_unit');
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('dashboard_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}
}
