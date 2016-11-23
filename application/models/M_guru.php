<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {
	public function getGuru()
	{
		$data = $this->db->get('guru');
		return $data->result();
	}
	public function act_tambah($param='')
	{	
		$this->db->insert('guru', $param);
		return $this->db->affected_rows();
	}
	public function getDetailGuru($id)
	{
		$this->db->where('id_guru',$id);
		$data = $this->db->get('guru');
		return $data->row();
	}
	public function act_edit($param='')
	{	
		$object = [
		'nama_guru' => $param['nama_guru'],
		];
		$this->db->where('id_guru',$param['id_guru']);
		$this->db->update('guru', $object);
		return $this->db->affected_rows();
	}
		public function act_hapus($id="")
	{	
		$this->db->where('id_guru',$id);
		$this->db->delete('guru');
		return $this->db->affected_rows();
	}
	

}

/* End of file M_guru.php */
/* Location: ./application/models/M_guru.php */