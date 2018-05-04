<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == 'Sudah Login'){
			$this->load->view('menu/home');
		}
		else {
			redirect('login');
		}
	}

}
