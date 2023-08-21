<?php if (!defined('BASEPATH')) exit('No direct script acess allowed');

class M_Admin extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function get_table($table_name)
  {
    $get_user = $this->db->get($table_name);
    return $get_user->result_array();
  }

  function get_table_maps($table_name)
  {
    $get_user = $this->db->get($table_name);
    return $get_user->result();
  }

  // Start tampil data unit berdasarkan asal unit user
  function get_table_unit_user()
  {
    $this->db->where('tbl_unit.nama_unit', $this->session->userdata('asal_unit'));
    return $this->db->get('tbl_unit')->result();
  }

  // Start tampil geografis berdasarkan asal unit user
  function get_table_panen_user()
  {
    $this->db->where('tbl_panen.lokasi', $this->session->userdata('asal_unit'));
    return $this->db->get('tbl_panen')->result_array();
  }
  function get_table_pemeliharaan_user()
  {
    $this->db->where('tbl_pemeliharaan.lokasi', $this->session->userdata('asal_unit'));
    return $this->db->get('tbl_pemeliharaan')->result_array();
  }
  function get_table_jalan_user()
  {
    $this->db->where('tbl_jalan.lokasi', $this->session->userdata('asal_unit'));
    return $this->db->get('tbl_jalan')->result_array();
  }
  function get_table_pencurian_user()
  {
    $this->db->where('tbl_pencurian.lokasi', $this->session->userdata('asal_unit'));
    return $this->db->get('tbl_pencurian')->result_array();
  }
  function get_table_bencana_user()
  {
    $this->db->where('tbl_bencana_alam.lokasi', $this->session->userdata('asal_unit'));
    return $this->db->get('tbl_bencana_alam')->result_array();
  }
  // End tampil data unit geografis berdasarkan user unit login

  function get_tableid($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $edit = $this->db->get($table_name);
    return $edit->result_array();
  }

  function get_tableid_edit($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $edit = $this->db->get($table_name);
    return $edit->row();
  }

  function insertTable($table_name, $data)
  {
    $tambah = $this->db->insert($table_name, $data);
    return $tambah;
  }

  function update_table($table_name, $where, $id, $data)
  {
    $this->db->where($where, $id);
    $update = $this->db->update($table_name, $data);
    return $update;
  }

  function delete_table($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $hapus = $this->db->delete($table_name);
    return $hapus;
  }

  function edit_table($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $edit = $this->db->get($table_name);
    return $edit->row();
  }

  function CountTable($table_name)
  {
    $Count = $this->db->get($table_name);
    return $Count->num_rows();
  }

  function CountTableId($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $Count = $this->db->get($table_name);
    return $Count->num_rows();
  }

  // Start pencarian unit geografis
  public function get_unit_keyword($keyword)
  {
    $this->db->select('*');
    $this->db->from('tbl_unit');
    $this->db->like('nama_unit', $keyword);
    return $this->db->get()->result();
  }

  public function get_panen_keyword($keyword)
  {
    $this->db->select('*');
    $this->db->from('tbl_panen');
    $this->db->like('lokasi', $keyword);
    $this->db->limit(3);
    $this->db->order_by('tanggal DESC');
    return $this->db->get()->result();
  }

  public function get_pemeliharaan_keyword($keyword)
  {
    $this->db->select('*');
    $this->db->from('tbl_pemeliharaan');
    $this->db->like('lokasi', $keyword);
    $this->db->limit(3);
    $this->db->order_by('tanggal DESC');
    return $this->db->get()->result();
  }

  public function get_jalan_keyword($keyword)
  {
    $this->db->select('*');
    $this->db->from('tbl_jalan');
    $this->db->like('lokasi', $keyword);
    $this->db->limit(3);
    $this->db->order_by('id_jalan DESC');
    return $this->db->get()->result();
  }

  public function get_pencurian_keyword($keyword)
  {
    $this->db->select('*');
    $this->db->from('tbl_pencurian');
    $this->db->like('lokasi', $keyword);
    $this->db->limit(3);
    $this->db->order_by('tanggal DESC');
    return $this->db->get()->result();
  }

  public function get_bencana_keyword($keyword)
  {
    $this->db->select('*');
    $this->db->from('tbl_bencana_alam');
    $this->db->like('lokasi', $keyword);
    $this->db->limit(3);
    $this->db->order_by('tanggal DESC');
    return $this->db->get()->result();
  }
  // End pencarian unit geografis

  // Start laporan untuk bagian ops sawit
  public function getPanenSortTgl($tgl_awal_panen, $tgl_akhir_panen)
  {
    $query = "SELECT * FROM tbl_panen 
			WHERE tanggal BETWEEN '$tgl_awal_panen' AND '$tgl_akhir_panen'
			ORDER BY tanggal DESC
		";
    return $this->db->query($query);
  }
  public function getPemeliharaanSortTgl($tgl_awal_pemeliharaan, $tgl_akhir_pemeliharaan)
  {
    $query = "SELECT * FROM tbl_pemeliharaan 
			WHERE tanggal BETWEEN '$tgl_awal_pemeliharaan' AND '$tgl_akhir_pemeliharaan'
			ORDER BY tanggal DESC
		";
    return $this->db->query($query);
  }
  public function getPencurianSortTgl($tgl_awal_pencurian, $tgl_akhir_pencurian)
  {
    $query = "SELECT * FROM tbl_pencurian 
			WHERE tanggal BETWEEN '$tgl_awal_pencurian' AND '$tgl_akhir_pencurian'
			ORDER BY tanggal DESC
		";
    return $this->db->query($query);
  }
  public function getBencanaSortTgl($tgl_awal_bencana, $tgl_akhir_bencana)
  {
    $query = "SELECT * FROM tbl_bencana_alam 
			WHERE tanggal BETWEEN '$tgl_awal_bencana' AND '$tgl_akhir_bencana'
			ORDER BY tanggal DESC
		";
    return $this->db->query($query);
  }
  // End laporan untuk bagian ops sawit

  // Start laporan untuk bagian unit
  function getPanenUnitSortTgl($tgl_awal_panen, $tgl_akhir_panen)
  {
    $lokasi = $this->session->userdata('asal_unit');
    $query = "SELECT * FROM tbl_panen 
			WHERE lokasi = '$lokasi' and tanggal BETWEEN '$tgl_awal_panen' AND '$tgl_akhir_panen'
			ORDER BY tanggal DESC
		";
    return $this->db->query($query);
  }
  function getPemeliharaanUnitSortTgl($tgl_awal_pemeliharaan, $tgl_akhir_pemeliharaan)
  {
    $lokasi = $this->session->userdata('asal_unit');
    $query = "SELECT * FROM tbl_pemeliharaan 
			WHERE lokasi = '$lokasi' and tanggal BETWEEN '$tgl_awal_pemeliharaan' AND '$tgl_akhir_pemeliharaan'
			ORDER BY tanggal DESC
		";
    return $this->db->query($query);
  }
  function getPencurianUnitSortTgl($tgl_awal_pencurian, $tgl_akhir_pencurian)
  {
    $lokasi = $this->session->userdata('asal_unit');
    $query = "SELECT * FROM tbl_pencurian 
			WHERE lokasi = '$lokasi' and tanggal BETWEEN '$tgl_awal_pencurian' AND '$tgl_akhir_pencurian'
			ORDER BY tanggal DESC
		";
    return $this->db->query($query);
  }
  function getBencanaUnitSortTgl($tgl_awal_bencana, $tgl_akhir_bencana)
  {
    $lokasi = $this->session->userdata('asal_unit');
    $query = "SELECT * FROM tbl_bencana_alam 
			WHERE lokasi = '$lokasi' and tanggal BETWEEN '$tgl_awal_bencana' AND '$tgl_akhir_bencana'
			ORDER BY tanggal DESC
		";
    return $this->db->query($query);
  }
  // End laporan untuk bagian unit
}
