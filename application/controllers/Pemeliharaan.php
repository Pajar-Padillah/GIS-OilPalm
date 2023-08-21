<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeliharaan extends CI_Controller
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
		$this->db->order_by('id_pemeliharaan', 'desc');
		$this->data['pemeliharaan'] = $this->M_Admin->get_table('tbl_pemeliharaan');
		$this->db->order_by('id_pemeliharaan', 'desc');
		$this->data['pemeliharaan_user'] = $this->M_Admin->get_table_pemeliharaan_user();

		$this->data['title_web'] = 'Data Pemeliharaan | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pemeliharaan/pemeliharaan_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['pemeliharaan'] = $this->M_Admin->get_table('tbl_pemeliharaan');
		$this->data['unit'] =  $this->db->query("SELECT * FROM tbl_unit ORDER BY id_unit ASC")->result_array();

		$this->data['title_web'] = 'Tambah Pemeliharaan | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pemeliharaan/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add()
	{
		$tanggal = htmlentities($this->input->post('tanggal', TRUE));
		$lokasi = htmlentities($this->input->post('lokasi', TRUE));
		$nama_pemeliharaan = htmlentities($this->input->post('nama_pemeliharaan', TRUE));
		$luas = htmlentities($this->input->post('luas', TRUE));
		$jumlah_tenaga_kerja = htmlentities($this->input->post('jumlah_tenaga_kerja', TRUE));
		$geojson = $this->input->post('pemeliharaan_geojson', TRUE);
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$warna = htmlentities($this->input->post('warna', TRUE));

		// setting konfigurasi upload
		$nmfile = 'Pemeliharaan_' . time();
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
			'nama_pemeliharaan' => $nama_pemeliharaan,
			'luas' => $luas,
			'jumlah_tenaga_kerja' => $jumlah_tenaga_kerja,
			'pemeliharaan_geojson' => $geojson,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'warna' => $warna,
			'foto' => $file1['upload_data']['file_name'],
		);
		$this->db->insert('tbl_pemeliharaan', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Tambah Pemeliharaan berhasil !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('pemeliharaan'));
	}

	public function edit()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('pemeliharaan') . '";</script>';
		}
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_pemeliharaan', 'id_pemeliharaan', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['pemeliharaan'] = $this->M_Admin->get_tableid_edit('tbl_pemeliharaan', 'id_pemeliharaan', $this->uri->segment('3'));
			$this->data['unit'] =  $this->db->query("SELECT * FROM tbl_unit ORDER BY id_unit ASC")->result_array();
		} else {
			echo '<script>alert("PEMELIHARAAN TIDAK DITEMUKAN");window.location="' . base_url('pemeliharaan') . '"</script>';
		}
		$this->data['title_web'] = 'Edit Pemeliharaan | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pemeliharaan/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function detail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_pemeliharaan', 'id_pemeliharaan', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['pemeliharaan'] = $this->M_Admin->get_tableid_edit('tbl_pemeliharaan', 'id_pemeliharaan', $this->uri->segment('3'));
		} else {
			echo '<script>alert("PEMELIHARAAN TIDAK DITEMUKAN");window.location="' . base_url('pemeliharaan') . '"</script>';
		}

		$this->data['title_web'] = 'Detail Pemeliharaan | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pemeliharaan/detail', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function upd()
	{
		$tanggal = htmlentities($this->input->post('tanggal', TRUE));
		$lokasi = htmlentities($this->input->post('lokasi', TRUE));
		$nama_pemeliharaan = htmlentities($this->input->post('nama_pemeliharaan', TRUE));
		$luas = htmlentities($this->input->post('luas', TRUE));
		$jumlah_tenaga_kerja = htmlentities($this->input->post('jumlah_tenaga_kerja', TRUE));
		$geojson = $this->input->post('pemeliharaan_geojson', TRUE);
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$warna = htmlentities($this->input->post('warna', TRUE));
		$id = htmlentities($this->input->post('id_pemeliharaan', TRUE));

		// setting konfigurasi upload
		$post = $this->input->post();
		$nmfile = 'Pemeliharaan_' . time();
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
				'nama_pemeliharaan' => $nama_pemeliharaan,
				'luas' => $luas,
				'jumlah_tenaga_kerja' => $jumlah_tenaga_kerja,
				'pemeliharaan_geojson' => $geojson,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna,
				'foto' => $file1['upload_data']['file_name'],
			);
		} else {
			$data = array(
				'tanggal' => $tanggal,
				'lokasi' => $lokasi,
				'nama_pemeliharaan' => $nama_pemeliharaan,
				'luas' => $luas,
				'jumlah_tenaga_kerja' => $jumlah_tenaga_kerja,
				'pemeliharaan_geojson' => $geojson,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna,
			);
		}
		$this->M_Admin->update_table('tbl_pemeliharaan', 'id_pemeliharaan', $id, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Update Pemeliharaan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('pemeliharaan'));
	}

	public function del()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('pemeliharaan') . '";</script>';
		}

		$pemeliharaan = $this->M_Admin->get_tableid_edit('tbl_pemeliharaan', 'id_pemeliharaan', $this->uri->segment('3'));
		unlink('./assets_style/file/' . $pemeliharaan->foto);
		$this->M_Admin->delete_table('tbl_pemeliharaan', 'id_pemeliharaan', $this->uri->segment('3'));
		$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Data Pemeliharaan Berhasil di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('pemeliharaan'));
	}

	public function pemeliharaanPDF()
	{
		$tgl_awal_pemeliharaan = date('Y-m-d 00:00:00', strtotime($this->uri->segment(3, 0)));
		$tgl_akhir_pemeliharaan = date('Y-m-d 23:59:59', strtotime($this->uri->segment(4, 0)));
		$this->load->library('pdf');
		$this->pdf->set_option('isRemoteEnabled', TRUE);
		if (empty($tgl_awal_pemeliharaan) or empty($tgl_akhir_pemeliharaan)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			echo '<script>alert("Data Pemeliharaan Tidak Ada");window.location="' . base_url('opssawit/laporan') . '";</script>';
		} else { // Jika terisi
			$data = array(
				'title_web' => 'Laporan Pemeliharaan Kelapa Sawit',
				'pemeliharaan' => $this->M_Admin->getPemeliharaanSortTgl($tgl_awal_pemeliharaan, $tgl_akhir_pemeliharaan)->result(),
				'tanggal' => [
					'tgl_awal' => $tgl_awal_pemeliharaan,
					'tgl_akhir' => $tgl_akhir_pemeliharaan
				]
			);
		}
		$paper_size = 'A4';
		$orientation = 'portrait';
		$this->pdf->set_paper($paper_size, $orientation);
		$this->pdf->filename = "laporan_pemeliharaan.pdf";
		$this->pdf->load_view('opssawit/laporan/laporan_pemeliharaan', $data);
	}

	public function pemeliharaanPDFunit()
	{
		$tgl_awal_pemeliharaan = date('Y-m-d 00:00:00', strtotime($this->uri->segment(3, 0)));
		$tgl_akhir_pemeliharaan = date('Y-m-d 23:59:59', strtotime($this->uri->segment(4, 0)));
		$this->load->library('pdf');
		$this->pdf->set_option('isRemoteEnabled', TRUE);
		if (empty($tgl_awal_pemeliharaan) or empty($tgl_akhir_pemeliharaan)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			echo '<script>alert("Data Pemeliharaan Tidak Ada");window.location="' . base_url('laporan') . '";</script>';
		} else { // Jika terisi
			$data = array(
				'idbo' => $this->session->userdata('ses_id'),
				'lokasi' => $this->session->userdata('asal_unit'),
				'title_web' => 'Laporan Pemeliharaan Kelapa Sawit',
				'pemeliharaan' => $this->M_Admin->getPemeliharaanUnitSortTgl($tgl_awal_pemeliharaan, $tgl_akhir_pemeliharaan)->result(),
				'tanggal' => [
					'tgl_awal' => $tgl_awal_pemeliharaan,
					'tgl_akhir' => $tgl_akhir_pemeliharaan
				]
			);
		}
		$paper_size = 'A4';
		$orientation = 'portrait';
		$this->pdf->set_paper($paper_size, $orientation);
		$this->pdf->filename = "laporan_pemeliharaan.pdf";
		$this->pdf->load_view('pemeliharaan/laporan_pemeliharaan', $data);
	}
}
