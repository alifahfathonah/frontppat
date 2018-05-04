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

}
