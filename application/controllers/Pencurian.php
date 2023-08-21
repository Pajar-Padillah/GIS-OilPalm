<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pencurian extends CI_Controller
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
		$this->db->order_by('id_pencurian', 'desc');
		$this->data['pencurian'] = $this->M_Admin->get_table('tbl_pencurian');
		$this->db->order_by('id_pencurian', 'desc');
		$this->data['pencurian_user'] = $this->M_Admin->get_table_pencurian_user();

		$this->data['title_web'] = 'Data Pencurian | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pencurian/pencurian_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['pencurian'] = $this->M_Admin->get_table('tbl_pencurian');
		$this->data['unit'] =  $this->db->query("SELECT * FROM tbl_unit ORDER BY id_unit ASC")->result_array();

		$this->data['title_web'] = 'Tambah Pencurian | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pencurian/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add()
	{
		$tanggal = htmlentities($this->input->post('tanggal', TRUE));
		$jumlah = htmlentities($this->input->post('jumlah', TRUE));
		$objek = htmlentities($this->input->post('objek', TRUE));
		$kerugian = htmlentities($this->input->post('kerugian', TRUE));
		$lokasi = htmlentities($this->input->post('lokasi', TRUE));
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));

		// setting konfigurasi upload
		$nmfile = 'Pencurian_' . time();
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
			'jumlah' => $jumlah,
			'objek' => $objek,
			'kerugian' => $kerugian,
			'lokasi' => $lokasi,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'foto' => $file1['upload_data']['file_name']
		);
		$this->db->insert('tbl_pencurian', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Tambah Pencurian berhasil !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('pencurian'));
	}

	public function edit()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('pencurian') . '";</script>';
		}
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_pencurian', 'id_pencurian', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['pencurian'] = $this->M_Admin->get_tableid_edit('tbl_pencurian', 'id_pencurian', $this->uri->segment('3'));
			$this->data['unit'] =  $this->db->query("SELECT * FROM tbl_unit ORDER BY id_unit ASC")->result_array();
		} else {
			echo '<script>alert("PENCURIAN TIDAK DITEMUKAN");window.location="' . base_url('pencurian') . '"</script>';
		}
		$this->data['title_web'] = 'Edit Pencurian ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pencurian/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function detail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_pencurian', 'id_pencurian', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['pencurian'] = $this->M_Admin->get_tableid_edit('tbl_pencurian', 'id_pencurian', $this->uri->segment('3'));
		} else {
			echo '<script>alert("PENCURIAN TIDAK DITEMUKAN");window.location="' . base_url('pencurian') . '"</script>';
		}

		$this->data['title_web'] = 'Detail Pencurian | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pencurian/detail', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function upd()
	{
		$tanggal = htmlentities($this->input->post('tanggal', TRUE));
		$jumlah = htmlentities($this->input->post('jumlah', TRUE));
		$objek = htmlentities($this->input->post('objek', TRUE));
		$kerugian = htmlentities($this->input->post('kerugian', TRUE));
		$lokasi = htmlentities($this->input->post('lokasi', TRUE));
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$id = htmlentities($this->input->post('id_pencurian', TRUE));

		// setting konfigurasi upload
		$post = $this->input->post();
		$nmfile = 'Pencurian_' . time();
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
				'jumlah' => $jumlah,
				'objek' => $objek,
				'kerugian' => $kerugian,
				'lokasi' => $lokasi,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'foto' => $file1['upload_data']['file_name']
			);
		} else {
			$data = array(
				'tanggal' => $tanggal,
				'jumlah' => $jumlah,
				'objek' => $objek,
				'kerugian' => $kerugian,
				'lokasi' => $lokasi,
				'latitude' => $latitude,
				'longitude' => $longitude,
			);
		}
		$this->M_Admin->update_table('tbl_pencurian', 'id_pencurian', $id, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Update Pencurian!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('pencurian'));
	}

	public function del()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('pencurian') . '";</script>';
		}

		$pencurian = $this->M_Admin->get_tableid_edit('tbl_pencurian', 'id_pencurian', $this->uri->segment('3'));
		unlink('./assets_style/file/' . $pencurian->foto);
		$this->M_Admin->delete_table('tbl_pencurian', 'id_pencurian', $this->uri->segment('3'));
		$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Pencurian Berhasil di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('pencurian'));
	}

	public function pencurianPDF()
	{
		$tgl_awal_pencurian = date('Y-m-d 00:00:00', strtotime($this->uri->segment(3, 0)));
		$tgl_akhir_pencurian = date('Y-m-d 23:59:59', strtotime($this->uri->segment(4, 0)));
		$this->load->library('pdf');
		$this->pdf->set_option('isRemoteEnabled', TRUE);
		if (empty($tgl_awal_pencurian) or empty($tgl_akhir_pencurian)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			echo '<script>alert("Data Pencurian Tidak Ada");window.location="' . base_url('opssawit/laporan') . '";</script>';
		} else { // Jika terisi
			$data = array(
				'title_web' => 'Laporan Pencurian Kelapa Sawit',
				'pencurian' => $this->M_Admin->getPencurianSortTgl($tgl_awal_pencurian, $tgl_akhir_pencurian)->result(),
				'tanggal' => [
					'tgl_awal' => $tgl_awal_pencurian,
					'tgl_akhir' => $tgl_akhir_pencurian
				]
			);
		}
		$paper_size = 'A4';
		$orientation = 'portrait';
		$this->pdf->set_paper($paper_size, $orientation);
		$this->pdf->filename = "laporan_pencurian.pdf";
		$this->pdf->load_view('opssawit/laporan/laporan_pencurian', $data);
	}

	public function pencurianPDFunit()
	{
		$tgl_awal_pencurian = date('Y-m-d 00:00:00', strtotime($this->uri->segment(3, 0)));
		$tgl_akhir_pencurian = date('Y-m-d 23:59:59', strtotime($this->uri->segment(4, 0)));
		$this->load->library('pdf');
		$this->pdf->set_option('isRemoteEnabled', TRUE);
		if (empty($tgl_awal_pencurian) or empty($tgl_akhir_pencurian)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			echo '<script>alert("Data Pencurian Tidak Ada");window.location="' . base_url('laporan') . '";</script>';
		} else { // Jika terisi
			$data = array(
				'idbo' => $this->session->userdata('ses_id'),
				'lokasi' => $this->session->userdata('asal_unit'),
				'title_web' => 'Laporan Pencurian Kelapa Sawit',
				'pencurian' => $this->M_Admin->getPencurianUnitSortTgl($tgl_awal_pencurian, $tgl_akhir_pencurian)->result(),
				'tanggal' => [
					'tgl_awal' => $tgl_awal_pencurian,
					'tgl_akhir' => $tgl_akhir_pencurian
				]
			);
		}
		$paper_size = 'A4';
		$orientation = 'portrait';
		$this->pdf->set_paper($paper_size, $orientation);
		$this->pdf->filename = "laporan_pencurian.pdf";
		$this->pdf->load_view('pencurian/laporan_pencurian', $data);
	}
}
