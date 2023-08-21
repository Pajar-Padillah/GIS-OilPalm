<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panen extends CI_Controller
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
		$this->db->order_by('id_panen', 'desc');
		$this->data['panen'] = $this->M_Admin->get_table('tbl_panen');
		$this->db->order_by('id_panen', 'desc');
		$this->data['panen_user'] = $this->M_Admin->get_table_panen_user();

		$this->data['title_web'] = 'Data Panen | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('panen/panen_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['panen'] = $this->M_Admin->get_table('tbl_panen');
		$this->data['unit'] =  $this->db->query("SELECT * FROM tbl_unit ORDER BY id_unit ASC")->result_array();

		$this->data['title_web'] = 'Tambah Panen | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('panen/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add()
	{
		$tanggal = htmlentities($this->input->post('tanggal', TRUE));
		$lokasi = htmlentities($this->input->post('lokasi', TRUE));
		$jumlah_tandan = htmlentities($this->input->post('jumlah_tandan', TRUE));
		$berat_kotor = htmlentities($this->input->post('berat_kotor', TRUE));
		$berat_bersih = htmlentities($this->input->post('berat_bersih', TRUE));
		$tara_kotor = htmlentities($this->input->post('tara_kotor', TRUE));
		$tahun_tanam = htmlentities($this->input->post('tahun_tanam', TRUE));
		$total_panen = htmlentities($this->input->post('total_panen', TRUE));
		$geojson = $this->input->post('panen_geojson', TRUE);
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$warna = htmlentities($this->input->post('warna', TRUE));

		// setting konfigurasi upload
		$nmfile = 'Panen_' . time();
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
			'jumlah_tandan' => $jumlah_tandan,
			'berat_kotor' => $berat_kotor,
			'tara_kotor' => $tara_kotor,
			'berat_bersih' => $berat_bersih,
			'tahun_tanam' => $tahun_tanam,
			'total_panen' => $total_panen,
			'panen_geojson' => $geojson,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'warna' => $warna,
			'foto' => $file1['upload_data']['file_name']
		);
		$this->db->insert('tbl_panen', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Tambah Panen berhasil !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('panen'));
	}

	public function edit()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('panen') . '";</script>';
		}
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_panen', 'id_panen', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['panen'] = $this->M_Admin->get_tableid_edit('tbl_panen', 'id_panen', $this->uri->segment('3'));
			$this->data['unit'] =  $this->db->query("SELECT * FROM tbl_unit ORDER BY id_unit ASC")->result_array();
		} else {
			echo '<script>alert("PANEN TIDAK DITEMUKAN");window.location="' . base_url('panen') . '"</script>';
		}
		$this->data['title_web'] = 'Edit Panen | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('panen/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function detail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_panen', 'id_panen', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['panen'] = $this->M_Admin->get_tableid_edit('tbl_panen', 'id_panen', $this->uri->segment('3'));
		} else {
			echo '<script>alert("PANEN TIDAK DITEMUKAN");window.location="' . base_url('panen') . '"</script>';
		}

		$this->data['title_web'] = 'Detail Panen | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('panen/detail', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function upd()
	{
		$tanggal = htmlentities($this->input->post('tanggal', TRUE));
		$lokasi = htmlentities($this->input->post('lokasi', TRUE));
		$jumlah_tandan = htmlentities($this->input->post('jumlah_tandan', TRUE));
		$berat_kotor = htmlentities($this->input->post('berat_kotor', TRUE));
		$berat_bersih = htmlentities($this->input->post('berat_bersih', TRUE));
		$tara_kotor = htmlentities($this->input->post('tara_kotor', TRUE));
		$tahun_tanam = htmlentities($this->input->post('tahun_tanam', TRUE));
		$total_panen = htmlentities($this->input->post('total_panen', TRUE));
		$geojson = $this->input->post('panen_geojson', TRUE);
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$warna = htmlentities($this->input->post('warna', TRUE));
		$id = htmlentities($this->input->post('id_panen', TRUE));

		// setting konfigurasi upload
		$post = $this->input->post();
		$nmfile = 'Panen_' . time();
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
				'jumlah_tandan' => $jumlah_tandan,
				'berat_kotor' => $berat_kotor,
				'tara_kotor' => $tara_kotor,
				'berat_bersih' => $berat_bersih,
				'tahun_tanam' => $tahun_tanam,
				'total_panen' => $total_panen,
				'panen_geojson' => $geojson,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna,
				'foto' => $file1['upload_data']['file_name'],
			);
		} else {
			$data = array(
				'tanggal' => $tanggal,
				'lokasi' => $lokasi,
				'jumlah_tandan' => $jumlah_tandan,
				'berat_kotor' => $berat_kotor,
				'tara_kotor' => $tara_kotor,
				'berat_bersih' => $berat_bersih,
				'tahun_tanam' => $tahun_tanam,
				'total_panen' => $total_panen,
				'panen_geojson' => $geojson,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna,
			);
		}
		$this->M_Admin->update_table('tbl_panen', 'id_panen', $id, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Update Panen!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('panen'));
	}

	public function del()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('panen') . '";</script>';
		}

		$panen = $this->M_Admin->get_tableid_edit('tbl_panen', 'id_panen', $this->uri->segment('3'));
		unlink('./assets_style/file/' . $panen->foto);
		$this->M_Admin->delete_table('tbl_panen', 'id_panen', $this->uri->segment('3'));
		$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Data Panen Berhasil di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('panen'));
	}
	public function panenPDF()
	{
		$tgl_awal_panen = date('Y-m-d 00:00:00', strtotime($this->uri->segment(3, 0)));
		$tgl_akhir_panen = date('Y-m-d 23:59:59', strtotime($this->uri->segment(4, 0)));
		if (empty($tgl_awal_panen) or empty($tgl_akhir_panen)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			echo '<script>alert("Data Panen Tidak Ada");window.location="' . base_url('opssawit/laporan') . '";</script>';
		} else { // Jika terisi
			$data = array(
				'title_web' => 'Laporan Panen Kelapa Sawit',
				'panen' => $this->M_Admin->getPanenSortTgl($tgl_awal_panen, $tgl_akhir_panen)->result(),
				'tanggal' => [
					'tgl_awal' => $tgl_awal_panen,
					'tgl_akhir' => $tgl_akhir_panen
				]
			);
		}
		$this->load->library('pdf');
		$this->pdf->set_option('isRemoteEnabled', TRUE);
		$paper_size = 'A4';
		$orientation = 'portrait';
		$this->pdf->set_paper($paper_size, $orientation);
		$this->pdf->filename = "laporan_panen.pdf";
		$this->pdf->load_view('opssawit/laporan/laporan_panen', $data);
	}

	public function panenPDFunit()
	{
		$tgl_awal_panen = date('Y-m-d 00:00:00', strtotime($this->uri->segment(3, 0)));
		$tgl_akhir_panen = date('Y-m-d 23:59:59', strtotime($this->uri->segment(4, 0)));
		$this->load->library('pdf');
		$this->pdf->set_option('isRemoteEnabled', TRUE);
		if (empty($tgl_awal_panen) or empty($tgl_akhir_panen)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			echo '<script>alert("Data Panen Tidak Ada");window.location="' . base_url('laporan') . '";</script>';
		} else { // Jika terisi
			$data = array(
				'idbo' => $this->session->userdata('ses_id'),
				'lokasi' => $this->session->userdata('asal_unit'),
				'title_web' => 'Laporan Panen Kelapa Sawit',
				'panen' => $this->M_Admin->getPanenUnitSortTgl($tgl_awal_panen, $tgl_akhir_panen)->result(),
				'tanggal' => [
					'tgl_awal' => $tgl_awal_panen,
					'tgl_akhir' => $tgl_akhir_panen
				]
			);
		}
		$paper_size = 'A4';
		$orientation = 'portrait';
		$this->pdf->set_paper($paper_size, $orientation);
		$this->pdf->filename = "laporan_panen.pdf";
		$this->pdf->load_view('panen/laporan_panen', $data);
	}
}
