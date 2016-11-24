<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Guru');
	}
	public function index()
	{
		$data['judul'] = "Menu guru";
		$data['data_guru'] = $this->M_Guru->getGuru();
		$this->load_template('guru/guru',$data);
	}
	public function add_guru()
	{
		$data['judul'] = "Tambah Guru";
		$this->load_template('guru/form_tambah_guru',$data);
	}
	public function act_tambah(){
		$this->form_validation->set_rules('nama_guru', 'nama', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('guru/add_guru');
			} else {
				$param = $this->input->post();
				$proses= $this->M_Guru->act_tambah($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("guru Berhasil diinputkan"));
					redirect('guru');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("guru Gagal diinputkan"));
					redirect('guru/add_guru');
				}
			}
	}

	public function edit($id){
		$data['judul'] = 'Edit guru';
		$data['data_guru'] = $this->M_Guru->getDetailguru($id);
		$this->load_template('guru/form_edit_guru',$data);
	}

	public function act_edit(){
		$this->form_validation->set_rules('nama_guru', 'nama', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('guru/edit');
			} else {

				$param = $this->input->post();
				$proses= $this->M_Guru->act_edit($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("guru Berhasil diedit"));
					redirect('guru');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("guru Gagal diedit"));
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
	}

	public function hapus($id=''){
		$proses= $this->M_Guru->act_hapus($id);
		if ($proses>=0) {
			$this->session->set_flashdata('alert_msg',succ_msg("guru Berhasil dihapus"));
			redirect('guru');
		}
		else {
			$this->session->set_flashdata('alert_msg',err_msg("guru Gagal dihapus"));
			redirect($_SERVER['HTTP_REFERER']);
		}
	}


}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */