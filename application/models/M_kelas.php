<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model {

	public function getKelas()
	{
		$data = $this->db->get('kelas');
		return $data->result();
	}	

}

/* End of file M_kelas.php */
/* Location: ./application/models/M_kelas.php */