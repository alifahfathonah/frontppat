<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('m_laporan');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == 'Sudah Login') {
			$data['record']= $this->m_laporan->history()->result();
			$this->load->view('menu/history/body', $data);
		}
		else {
			redirect('login');
		}
	}

	public function detail($id){
		if ($this->session->userdata('logged_in')) {
			$data['detail'] = $this->m_laporan->detail($id)->result();
			$data['laporan'] = $this->m_laporan->list_laporan($id)->result();
			$this->load->view('menu/history/list',$data);
		}
		else {
			redirect('login');
		}
	}

	public function unduh($id){
		if ($this->session->userdata('logged_in')) {
			$data['download'] = $this->m_laporan->download($id)->result();
			$this->load->view('menu/history/download',$data);
		}
		else {
		redirect('login');
		}
	}

}
