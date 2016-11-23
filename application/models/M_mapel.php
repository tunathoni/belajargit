<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mapel extends CI_Model {

	public function getmapel()
	{
		$this->db->select('mapel.*, guru.nama_guru');
		$this->db->from('mapel');
		$this->db->join('guru', 'guru.id_guru = mapel.id_guru', 'left');
		$data = $this->db->get();
		return $data->result();
	}
	public function act_tambah($param='')
	{	
		$this->db->insert('mapel', $param);
		return $this->db->affected_rows();
	}
	public function getDetailmapel($id)
	{
		$this->db->where('id_mapel',$id);
		$data = $this->db->get('mapel');
		return $data->row();
	}
	public function act_edit($param='')
	{	
		$object = [
		'nama_mapel' => $param['nama_mapel'],
		'id_guru' => $param['id_guru'],
		];
		$this->db->where('id_mapel',$param['id_mapel']);
		$this->db->update('mapel', $object);
		return $this->db->affected_rows();
	}
		public function act_hapus($id="")
	{	
		$this->db->where('id_mapel',$id);
		$this->db->delete('mapel');
		return $this->db->affected_rows();
	}

}

/* End of file M_mapel.php */
/* Location: ./application/models/M_mapel.php */