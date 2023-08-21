<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bencana extends CI_Controller
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
		$this->db->order_by('id_bencana', 'desc');
		$this->data['bencana'] = $this->M_Admin->get_table('tbl_bencana_alam');
		$this->db->order_by('id_bencana', 'desc');
		$this->data['bencana_user'] = $this->M_Admin->get_table_bencana_user();

		$this->data['title_web'] = 'Data Bencana | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('bencana/bencana_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['bencana'] = $this->M_Admin->get_table('tbl_bencana_alam');
		$this->data['unit'] =  $this->db->query("SELECT * FROM tbl_unit ORDER BY id_unit ASC")->result_array();

		$this->data['title_web'] = 'Tambah Bencana | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('bencana/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add()
	{
		$tanggal = htmlentities($this->input->post('tanggal', TRUE));
		$lokasi = htmlentities($this->input->post('lokasi', TRUE));
		$nama = htmlentities($this->input->post('nama_bencana', TRUE));
		$luas = htmlentities($this->input->post('luas', TRUE));
		$kerugian = htmlentities($this->input->post('kerugian', TRUE));
		$geojson = $this->input->post('bencana_geojson', TRUE);
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$warna = htmlentities($this->input->post('warna', TRUE));

		// setting konfigurasi upload
		$nmfile = 'Bencana_' . time();
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
			'tanggal' => $tanggal,
			'lokasi' => $lokasi,
			'nama_bencana' => $nama,
			'luas' => $luas,
			'kerugian' => $kerugian,
			'bencana_geojson' => $geojson,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'warna' => $warna,
			'foto' => $file1['upload_data']['file_name']
		);
		$this->db->insert('tbl_bencana_alam', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Tambah Bencana berhasil !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('bencana'));
	}

	public function edit()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('bencana') . '";</script>';
		}
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_bencana_alam', 'id_bencana', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['bencana'] = $this->M_Admin->get_tableid_edit('tbl_bencana_alam', 'id_bencana', $this->uri->segment('3'));
			$this->data['unit'] =  $this->db->query("SELECT * FROM tbl_unit ORDER BY id_unit ASC")->result_array();
		} else {
			echo '<script>alert("BENCANA TIDAK DITEMUKAN");window.location="' . base_url('bencana') . '"</script>';
		}
		$this->data['title_web'] = 'Edit Bencana | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('bencana/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function detail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_bencana_alam', 'id_bencana', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['bencana'] = $this->M_Admin->get_tableid_edit('tbl_bencana_alam', 'id_bencana', $this->uri->segment('3'));
		} else {
			echo '<script>alert("BENCANA TIDAK DITEMUKAN");window.location="' . base_url('bencana') . '"</script>';
		}

		$this->data['title_web'] = 'Detail Bencana';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('bencana/detail', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function upd()
	{
		$tanggal = htmlentities($this->input->post('tanggal', TRUE));
		$lokasi = htmlentities($this->input->post('lokasi', TRUE));
		$nama = htmlentities($this->input->post('nama_bencana', TRUE));
		$luas = htmlentities($this->input->post('luas', TRUE));
		$kerugian = htmlentities($this->input->post('kerugian', TRUE));
		$geojson = $this->input->post('bencana_geojson', TRUE);
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$warna = htmlentities($this->input->post('warna', TRUE));
		$id = htmlentities($this->input->post('id_bencana', TRUE));

		// setting konfigurasi upload
		$post = $this->input->post();
		$nmfile = 'Bencana_' . time();
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
				'tanggal' => $tanggal,
				'lokasi' => $lokasi,
				'nama_bencana' => $nama,
				'luas' => $luas,
				'kerugian' => $kerugian,
				'bencana_geojson' => $geojson,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna,
				'foto' => $file1['upload_data']['file_name']
			);
		} else {
			$data = array(
				'tanggal' => $tanggal,
				'lokasi' => $lokasi,
				'nama_bencana' => $nama,
				'luas' => $luas,
				'kerugian' => $kerugian,
				'bencana_geojson' => $geojson,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna
			);
		}
		$this->M_Admin->update_table('tbl_bencana_alam', 'id_bencana', $id, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Update Bencana!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('bencana'));
	}

	public function del()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('bencana') . '";</script>';
		}

		$bencana = $this->M_Admin->get_tableid_edit('tbl_bencana_alam', 'id_bencana', $this->uri->segment('3'));
		unlink('./assets_style/file/' . $bencana->foto);
		$this->M_Admin->delete_table('tbl_bencana_alam', 'id_bencana', $this->uri->segment('3'));
		$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Bencana Berhasil di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('bencana'));
	}

	public function bencanaPDF()
	{
		$tgl_awal_bencana = date('Y-m-d 00:00:00', strtotime($this->uri->segment(3, 0)));
		$tgl_akhir_bencana = date('Y-m-d 23:59:59', strtotime($this->uri->segment(4, 0)));
		$this->load->library('pdf');
		$this->pdf->set_option('isRemoteEnabled', TRUE);
		if (empty($tgl_awal_bencana) or empty($tgl_akhir_bencana)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			echo '<script>alert("Data Bencana Tidak Ada");window.location="' . base_url('opssawit/laporan') . '";</script>';
		} else { // Jika terisi
			$data = array(
				'title_web' => 'Laporan Bencana Kelapa Sawit',
				'bencana' => $this->M_Admin->getBencanaSortTgl($tgl_awal_bencana, $tgl_akhir_bencana)->result(),
				'tanggal' => [
					'tgl_awal' => $tgl_awal_bencana,
					'tgl_akhir' => $tgl_akhir_bencana
				]
			);
		}
		$paper_size = 'A4';
		$orientation = 'portrait';
		$this->pdf->set_paper($paper_size, $orientation);
		$this->pdf->filename = "laporan_bencana.pdf";
		$this->pdf->load_view('opssawit/laporan/laporan_bencana', $data);
	}

	public function bencanaPDFunit()
	{
		$tgl_awal_bencana = date('Y-m-d 00:00:00', strtotime($this->uri->segment(3, 0)));
		$tgl_akhir_bencana = date('Y-m-d 23:59:59', strtotime($this->uri->segment(4, 0)));
		$this->load->library('pdf');
		$this->pdf->set_option('isRemoteEnabled', TRUE);
		if (empty($tgl_awal_bencana) or empty($tgl_akhir_bencana)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			echo '<script>alert("Data Bencana Tidak Ada");window.location="' . base_url('laporan') . '";</script>';
		} else { // Jika terisi
			$data = array(
				'idbo' => $this->session->userdata('ses_id'),
				'lokasi' => $this->session->userdata('asal_unit'),
				'title_web' => 'Laporan Bencana Kelapa Sawit',
				'bencana' => $this->M_Admin->getBencanaUnitSortTgl($tgl_awal_bencana, $tgl_akhir_bencana)->result(),
				'tanggal' => [
					'tgl_awal' => $tgl_awal_bencana,
					'tgl_akhir' => $tgl_akhir_bencana
				]
			);
		}
		$paper_size = 'A4';
		$orientation = 'portrait';
		$this->pdf->set_paper($paper_size, $orientation);
		$this->pdf->filename = "laporan_bencana.pdf";
		$this->pdf->load_view('bencana/laporan_bencana', $data);
	}
}
