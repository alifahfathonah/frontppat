<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('m_laporan');
	}

	public function index(){
		if ($this->session->userdata('logged_in') == 'Sudah Login') {
			$data['record']= $this->m_laporan->data_laporan()->result();
			$this->load->view('menu/laporan/body', $data);
		}
		else {
			redirect('login');
		}
	}

	public function tambah(){
		if (isset($_POST['simpan'])) {
			$status = 'Draf';
			$data = array(
					'periode_bulan' => $this->input->post('periode_bulan'),
					'periode_tahun' => $this->input->post('periode_tahun')
			);
			$cek = $this->m_laporan->cek_data($data);
			if ($cek->num_rows() == 1)
			{
				echo " <script>alert('Data sudah ada!');history.go(-1);</script>";
			}
			else {
				$this->m_laporan->tambah($status);
				echo " <script>alert('Laporan berhasil ditambah!');history.go(-1);</script>";
			}
		}
		else {
			$data['record']= $this->m_laporan->select_all()->result();
			$this->load->view('menu/laporan/body', $data);
		}
	}

	public function detail($id){
		if ($this->session->userdata('logged_in')) {
			$data['detail'] = $this->m_laporan->detail($id)->result();
			$data['laporan'] = $this->m_laporan->list_laporan($id)->result();
			$this->load->view('menu/laporan/list',$data);
		}
		else {
			redirect('login');
		}
	}

	public function edit(){
		if ($this->session->userdata('logged_in')) {
			if (isset($_POST['edit'])) {
				$data = array(
						'periode_bulan' => $this->input->post('periode_bulan'),
						'periode_tahun' => $this->input->post('periode_tahun')
				);
				$cek = $this->m_laporan->cek_data($data);
				if ($cek->num_rows() == 1)
				{
					echo " <script>alert('Data sudah ada!');history.go(-1);</script>";
				}
				else {
					$id = $this->input->post('id');
					$this->m_laporan->edit($id);
					echo " <script>alert('Edit laporan berhasil!');history.go(-1);</script>";
				}
			}
			else {
				$data['record']= $this->m_laporan->select_all()->result();
				$this->load->view('menu/laporan/body', $data);
			}
		}
		else {
			redirect('login');
		}
	}

	public function hapus($id){
		if ($this->session->userdata('logged_in')) {
			$this->m_laporan->hapus($id);
			echo " <script>alert('Laporan berhasil dihapus!');history.go(-1);</script>";
		}
		else {
			redirect('login');
		}
	}

	public function kirim($id){
		if ($this->session->userdata('logged_in')) {
			$this->m_laporan->kirim($id);
			echo " <script>alert('Laporan berhasil dikirim!');history.go(-1);</script>";
			//redirect('menu/laporan');
		}
		else {
			redirect('login');
		}
	}

	public function tambah_laporan_list(){
		if ($this->session->userdata('logged_in')) {
			if (isset($_POST['simpan'])) {
					$this->m_laporan->tambah_list_laporan();
					echo " <script>alert('Tambah penerbitan akta berhasil!');history.go(-1);</script>";
			}
			else {
				echo " <script>alert('Tambah penerbitan akta gagal!');history.go(-1);</script>";
			}
		}
		else {
			redirect('login');
		}
	}

	public function edit_laporan_list($id){
		if ($this->session->userdata('logged_in')) {
			if (isset($_POST['simpan'])) {
				$this->m_laporan->edit_list_laporan($id);
				echo " <script>alert('Edit data penerbitan akta berhasil!');history.go(-1);</script>";
			}
			else {
				$data['record']= $this->m_laporan->cek_list_laporan($id)->result();
				$this->load->view('menu/laporan/edit',$data);
			}
		}
		else {
			redirect('login');
		}
	}

	public function hapus_laporan_list($id){
		if ($this->session->userdata('logged_in')) {
			$this->m_laporan->hapus_list_laporan($id);
			echo " <script>alert('Data berhasil dihapus!');history.go(-1);</script>";
		}
		else {
			redirect('login');
		}
	}

}
