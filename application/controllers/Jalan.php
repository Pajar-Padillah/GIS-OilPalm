<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jalan extends CI_Controller
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
		$this->db->order_by('id_jalan', 'desc');
		$this->data['jalan'] = $this->M_Admin->get_table('tbl_jalan');
		$this->db->order_by('id_jalan', 'desc');
		$this->data['jalan_user'] = $this->M_Admin->get_table_jalan_user();

		$this->data['title_web'] = 'Data Jalan | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('jalan/jalan_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['jalan'] = $this->M_Admin->get_table('tbl_jalan');
		$this->data['unit'] =  $this->db->query("SELECT * FROM tbl_unit ORDER BY id_unit ASC")->result_array();

		$this->data['title_web'] = 'Tambah Jalan | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('jalan/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add()
	{
		$nama = htmlentities($this->input->post('nama_jalan', TRUE));
		$lokasi = htmlentities($this->input->post('lokasi', TRUE));
		$kondisi = htmlentities($this->input->post('kondisi', TRUE));
		$panjang = htmlentities($this->input->post('panjang', TRUE));
		$lebar = htmlentities($this->input->post('lebar', TRUE));
		$geojson = $this->input->post('jalan_geojson', TRUE);
		$ketebalan = htmlentities($this->input->post('ketebalan', TRUE));
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$warna = htmlentities($this->input->post('warna', TRUE));

		// setting konfigurasi upload
		$nmfile = $nama . '_' . time();
		$config['upload_path'] = './assets_style/file/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] = $nmfile;
		// load library upload
		$this->load->library('upload', $config);

		// uploud file pertama
		if ($this->upload->do_upload('foto')) {
			$this->upload->data();
			$file1 = array('upload_data' => $this->upload->data());
		} else {
			return false;
		}

		$data = array(
			'nama_jalan' => $nama,
			'lokasi' => $lokasi,
			'kondisi' => $kondisi,
			'panjang' => $panjang,
			'lebar' => $lebar,
			'jalan_geojson' => $geojson,
			'ketebalan' => $ketebalan,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'warna' => $warna,
			'foto' => $file1['upload_data']['file_name']
		);
		$this->db->insert('tbl_jalan', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Tambah Jalan berhasil !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('jalan'));
	}

	public function edit()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('jalan') . '";</script>';
		}
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_jalan', 'id_jalan', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['jalan'] = $this->M_Admin->get_tableid_edit('tbl_jalan', 'id_jalan', $this->uri->segment('3'));
			$this->data['unit'] =  $this->db->query("SELECT * FROM tbl_unit ORDER BY id_unit ASC")->result_array();
		} else {
			echo '<script>alert("JALAN TIDAK DITEMUKAN");window.location="' . base_url('jalan') . '"</script>';
		}
		$this->data['title_web'] = 'Edit Jalan | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('jalan/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function detail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_jalan', 'id_jalan', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['jalan'] = $this->M_Admin->get_tableid_edit('tbl_jalan', 'id_jalan', $this->uri->segment('3'));
		} else {
			echo '<script>alert("JALAN TIDAK DITEMUKAN");window.location="' . base_url('jalan') . '"</script>';
		}

		$this->data['title_web'] = 'Detail Jalan | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('jalan/detail', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function upd()
	{
		$nama = htmlentities($this->input->post('nama_jalan', TRUE));
		$lokasi = htmlentities($this->input->post('lokasi', TRUE));
		$kondisi = htmlentities($this->input->post('kondisi', TRUE));
		$panjang = htmlentities($this->input->post('panjang', TRUE));
		$lebar = htmlentities($this->input->post('lebar', TRUE));
		$geojson = $this->input->post('jalan_geojson', TRUE);
		$ketebalan = htmlentities($this->input->post('ketebalan', TRUE));
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$warna = htmlentities($this->input->post('warna', TRUE));
		$id = htmlentities($this->input->post('id_jalan', TRUE));

		// setting konfigurasi upload
		$post = $this->input->post();
		$nmfile = $nama . '_' . time();
		$config['upload_path'] = './assets_style/file/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 5000;
		$config['file_name'] = $nmfile;
		// load library upload
		$this->load->library('upload', $config);

		if (!empty($_FILES['foto']['name'])) {
			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')) {
				$this->upload->data();
				$file1 = array('upload_data' => $this->upload->data());
			} else {
				return false;
			}


			$foto = './assets_style/file/' . htmlentities($post['foto_old']);
			if (file_exists($foto)) {
				unlink($foto);
			}

			$data = array(
				'nama_jalan' => $nama,
				'lokasi' => $lokasi,
				'kondisi' => $kondisi,
				'panjang' => $panjang,
				'lebar' => $lebar,
				'jalan_geojson' => $geojson,
				'ketebalan' => $ketebalan,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna,
				'foto' => $file1['upload_data']['file_name']
			);
		} else {
			$data = array(
				'nama_jalan' => $nama,
				'lokasi' => $lokasi,
				'kondisi' => $kondisi,
				'panjang' => $panjang,
				'lebar' => $lebar,
				'jalan_geojson' => $geojson,
				'ketebalan' => $ketebalan,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna,
			);
		}
		$this->M_Admin->update_table('tbl_jalan', 'id_jalan', $id, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Update Jalan : ' . $nama . ' !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('jalan'));
	}

	public function del()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('jalan') . '";</script>';
		}

		$jalan = $this->M_Admin->get_tableid_edit('tbl_jalan', 'id_jalan', $this->uri->segment('3'));
		unlink('./assets_style/file/' . $jalan->foto);
		$this->M_Admin->delete_table('tbl_jalan', 'id_jalan', $this->uri->segment('3'));
		$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Jalan Berhasil di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('jalan'));
	}

	public function jalanPDF()
	{
		$this->load->library('pdf');
		$this->pdf->set_option('isRemoteEnabled', TRUE);
		$data = array(
			'title_web' => 'Laporan Jalan Kelapa Sawit',
			'jalan' => $this->M_Admin->get_table_maps('tbl_jalan'),
		);
		$paper_size = 'A4';
		$orientation = 'portrait';
		$this->pdf->set_paper($paper_size, $orientation);
		$this->pdf->filename = "laporan_jalan.pdf";
		$this->pdf->load_view('opssawit/laporan/laporan_jalan', $data);
	}

	public function jalanPDFunit()
	{
		$this->load->library('pdf');
		$this->pdf->set_option('isRemoteEnabled', TRUE);
		$data = array(
			'idbo' => $this->session->userdata('ses_id'),
			'lokasi' => $this->session->userdata('asal_unit'),
			'title_web' => 'Laporan Jalan Kelapa Sawit',
			'jalan' => $this->M_Admin->get_table_jalan_user(),
		);
		$paper_size = 'A4';
		$orientation = 'portrait';
		$this->pdf->set_paper($paper_size, $orientation);
		$this->pdf->filename = "laporan_jalan.pdf";
		$this->pdf->load_view('jalan/laporan_jalan', $data);
	}
}
