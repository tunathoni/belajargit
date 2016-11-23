<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends Auth_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_mapel');
		$this->load->model('M_guru');
	}
	public function index()
	{
		$data['judul'] = 'Menu Mata Pelajaran';
		$data['data_mapel'] = $this->M_mapel->getmapel();
		$this->load_template('mapel/home', $data);
	}
	public function add_Mapel()
	{
		$data['judul'] = 'Tambah Mata Pelajaran';
		$data['mapel'] = $this->M_mapel->getmapel();
		$data['data_guru'] = $this->M_guru->getguru();
		$this->load_template('mapel/form_tambah_mapel',$data);
			
	}
	public function act_Tambah()
	{
		$this->form_validation->set_rules('nama_mapel'	, 'Nama Mata Pelajaran'	, 'required');
		$this->form_validation->set_rules('id_guru'		, 'Nama Guru'			, 'required');
			if ($this->form_validation->run() == FALSE) 
			{
				$this->session->set_flashdata('alert_msg',err_msg(validation_errors()));
				redirect('mapel/add_mapel');
			}else{
					$param = $this->input->post();
					$proses_simpan = $this->M_mapel->act_Tambah($param);

				if ($proses_simpan >= 0) {
					$this->session->set_flashdata('alert_msg',succ_msg('mapel Berhasil Di Input'));
					redirect('mapel/');
				} else {
					$this->session->set_flashdata('alert_msg',err_msg('mapel Gagal Di Input'));
					redirect('mapel/add_mapel');
				}
			}	

	}
	public function editMapel($id)
	{
		$data['judul'] = 'Edit Mata Pelajaran';
		$data['data_mapel'] = $this->M_mapel->getDetailmapel($id);
		$data['data_guru'] = $this->M_guru->getguru();

		$this->load_template('mapel/edit',$data);
	}
	public function act_edit()
	{	
		$this->form_validation->set_rules('nama_mapel', 'mapel', 'required');
			if ($this->form_validation->run() == FALSE) 
			{
				$this->session->set_flashdata('alert_msg',err_msg(validation_errors()));
				redirect('mapel/editmapel');
			}else{
				$param = $this->input->post();
				$proses_simpan = $this->M_mapel->act_edit($param);
				if ($proses_simpan >= 0) {
					$this->session->set_flashdata('alert_msg',succ_msg('mapel Berhasil Di Edit'));
					redirect('mapel/');
				} else {
					$this->session->set_flashdata('alert_msg',err_msg('mapel Gagal Di Edit'));
					redirect('mapel/editmapel');
				}
				
			}

	}
	public function hapusMapel($id="")
	{
		$proses_simpan = $this->M_mapel->act_hapus($id);
		if ($proses_simpan >= 0) {
			$this->session->set_flashdata('alert_msg',succ_msg('mapel Berhasil Di Hapus'));
		} else {
			$this->session->set_flashdata('alert_msg',err_msg('mapel Gagal Di Hapus'));
		}
		redirect('mapel');

	}
}

/* End of file Mapel.php */
/* Location: ./application/controllers/Mapel.php */