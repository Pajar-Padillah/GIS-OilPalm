<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
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
		$this->db->order_by('id_unit', 'desc');
		$this->data['unit'] = $this->M_Admin->get_table('tbl_unit');
		$this->db->order_by('id_unit', 'desc');
		$this->data['unit_user'] = $this->M_Admin->get_table_unit_user();

		$this->data['title_web'] = 'Data Unit | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('unit/unit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['unit'] = $this->M_Admin->get_table('tbl_unit');

		$this->data['title_web'] = 'Tambah Unit | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('unit/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add()
	{
		$nama = htmlentities($this->input->post('nama_unit', TRUE));
		$kepala_unit = htmlentities($this->input->post('nama_kepala_unit', TRUE));
		$luastm = htmlentities($this->input->post('luas_tm', TRUE));
		$luastbm = htmlentities($this->input->post('luas_tbm', TRUE));
		$luas = htmlentities($this->input->post('luas', TRUE));
		$alamat = htmlentities($this->input->post('alamat', TRUE));
		$geojson = $this->input->post('unit_geojson', TRUE);
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$warna = htmlentities($this->input->post('warna', TRUE));

		$dd = $this->db->query("SELECT * FROM tbl_unit WHERE nama_unit = '$nama'");
		if ($dd->num_rows() > 0) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert"> Gagal Tambah Unit : ' . $nama . ' !, Nama Unit Sudah Ada<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('unit/tambah'));
		} else {
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
				'nama_unit' => $nama,
				'nama_kepala_unit' => $kepala_unit,
				'luas_tm' => $luastm,
				'luas_tbm' => $luastbm,
				'luas' => $luas,
				'alamat' => $alamat,
				'unit_geojson' => $geojson,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna,
				'foto' => $file1['upload_data']['file_name'],
			);
			$this->db->insert('tbl_unit', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Tambah Unit berhasil !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('unit'));
		}
	}

	public function edit()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('unit') . '";</script>';
		}
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_unit', 'id_unit', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['unit'] = $this->M_Admin->get_tableid_edit('tbl_unit', 'id_unit', $this->uri->segment('3'));
		} else {
			echo '<script>alert("UNIT TIDAK DITEMUKAN");window.location="' . base_url('unit') . '"</script>';
		}
		$this->data['title_web'] = 'Edit Unit | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('unit/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function detail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_unit', 'id_unit', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['unit'] = $this->M_Admin->get_tableid_edit('tbl_unit', 'id_unit', $this->uri->segment('3'));
		} else {
			echo '<script>alert("UNIT TIDAK DITEMUKAN");window.location="' . base_url('unit') . '"</script>';
		}

		$this->data['title_web'] = 'Detail Unit | SIG Sawit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('unit/detail', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function upd()
	{
		$nama = htmlentities($this->input->post('nama_unit', TRUE));
		$kepala_unit = htmlentities($this->input->post('nama_kepala_unit', TRUE));
		$luastm = htmlentities($this->input->post('luas_tm', TRUE));
		$luastbm = htmlentities($this->input->post('luas_tbm', TRUE));
		$luas = htmlentities($this->input->post('luas', TRUE));
		$alamat = htmlentities($this->input->post('alamat', TRUE));
		$geojson = $this->input->post('unit_geojson', TRUE);
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$warna = htmlentities($this->input->post('warna', TRUE));
		$id = htmlentities($this->input->post('id_unit', TRUE));

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
				'nama_unit' => $nama,
				'nama_kepala_unit' => $kepala_unit,
				'luas_tm' => $luastm,
				'luas_tbm' => $luastbm,
				'luas' => $luas,
				'alamat' => $alamat,
				'unit_geojson' => $geojson,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna,
				'foto' => $file1['upload_data']['file_name']
			);
		} else {
			$data = array(
				'nama_unit' => $nama,
				'nama_kepala_unit' => $kepala_unit,
				'luas_tm' => $luastm,
				'luas_tbm' => $luastbm,
				'luas' => $luas,
				'alamat' => $alamat,
				'unit_geojson' => $geojson,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna
			);
		}
		$this->M_Admin->update_table('tbl_unit', 'id_unit', $id, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Update Unit : ' . $nama . ' !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('unit'));
	}

	public function del()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('unit') . '";</script>';
		}

		$unit = $this->M_Admin->get_tableid_edit('tbl_unit', 'id_unit', $this->uri->segment('3'));
		unlink('./assets_style/file/' . $unit->foto);
		$this->M_Admin->delete_table('tbl_unit', 'id_unit', $this->uri->segment('3'));
		$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Unit Berhasil di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('unit'));
	}
}
