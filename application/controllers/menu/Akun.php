<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('m_login');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == 'Sudah Login') {
      $id = $this->session->userdata('ppat_id');
			$data['record']= $this->m_login->select_profil($id)->result();
			$this->load->view('menu/akun/ubah-profil', $data);
		}
		else {
			redirect('login');
		}
	}

  public function password()
	{
		if ($this->session->userdata('logged_in') == 'Sudah Login') {
			$this->load->view('menu/akun/ubah-password');
		}
		else {
			redirect('login');
		}
	}

  public function edit_profil(){
    if ($this->session->userdata('logged_in')) {
      if (isset($_POST['submit'])) {
          $this->m_login->update();
          echo " <script>alert('Ubah profil berhasil!');history.go(-1);</script>";
          //redirect('home');
      }else {
          // $id = $this->session->userdata('ppat_id');
          // $data['record']= $this->m_login->select_profil($id)->result();
          // $this->load->view('menu/akun/uabh-profil',$data);
          echo " <script>alert('Ubah profil gagal!');history.go(-1);</script>";
      }
    }
    else {
      redirect('login');
    }
  }

  public function edit_password(){
    if ($this->session->userdata('logged_in')) {
      if (isset($_POST['submit'])) {
        $pass = $this->input->post('password');
        $re   = $this->input->post('re_password');
        if ($pass == $re) {
          $this->m_login->reset_pass();
          echo " <script>alert('Password berhasil dirubah!');history.go(-1);</script>";
        }
        else {
          echo " <script>alert('Password tidak sama!');history.go(-1);</script>";
        }
      }
      else {
        echo " <script>alert('Password gagal dirubah!');history.go(-1);</script>";
      }
    }
    else {
      redirect('login');
    }
  }

}
