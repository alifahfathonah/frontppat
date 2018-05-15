<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('m_login');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') ==  'Sudah Login') {
			redirect('home');
		}
		else {
			$options = array(
					'img_path'		=>'./captcha/',
					'img_url'			=>base_url('captcha'),
					'word_length' => 4,
					'img_width'		=>'120',
					'img_height'	=>'30',
					'expiration'	=> 7200,
					'pool' 				=> '0123456789', #tipe captcha (angka/huruf, atau kombinasi dari keduanya)

					'colors' => array(
									'background' => array(242, 242, 242),
									'border' => array(255, 255, 255),
									'text' => array(0, 0, 0),
									'grid' => array(255, 40, 40))
						 );
			$cap 						= create_captcha($options);
			$data['image']  = $cap['image'];
			$this->session->set_userdata('mycaptcha', $cap['word']);
			$data['word'] 	= $this->session->userdata('mycaptcha');
			$this->load->view('login', $data);
		}
	}

	public function aksi_login(){
		if (isset($_POST['login'])) {
			$captcha = $this->input->post('captcha_code');
			$word = $this->session->userdata('mycaptcha');
			if (isset($captcha)) {
		  	if (strtoupper($captcha)==strtoupper($word)) {
					$data = array(
							'no_sk_ppat' => $this->input->post('no_sk_ppat'),
							'password'	 => md5($this->input->post('password'))
					);
					$cek = $this->m_login->login($data);
					if ($cek->num_rows() == 1)
					{
						foreach ($cek->result() as $sess)
						{
							$sess_data['logged_in'] = 'Sudah Login';
							$sess_data['no_sk_ppat']= $sess->no_sk_ppat;
							$sess_data['ppat_id']		= $sess->ppat_id;
		          $this->session->set_userdata($sess_data);
						}
						if ($this->session->userdata('logged_in') == 'Sudah Login')
						{
							redirect('home', $sess_data);
						}
						// redirect('home', $sess_data);
					}
					else
					{
						echo " <script>alert('Gagal Login: Cek No SK PPTK atau password!');history.go(-1);</script>";
					}
		   	}
				else {
					echo " <script>alert('Kode keamanan salah!');history.go(-1);</script>";
				}
		 	}
		}
		else {
			redirect('login');
		}
	}

	public function reset(){
		if (isset($_POST['reset'])) {
			$captcha = $this->input->post('captcha_code');
			$word = $this->session->userdata('mycaptcha');
			if (strtoupper($captcha)==strtoupper($word)) {
				$data = array(
						'no_sk_ppat' => $this->input->post('no_sk_ppat')
				);
				$cek = $this->m_login->login($data);
				if ($cek->num_rows() == 1){
					$pass = $this->input->post('password');
					$re   = $this->input->post('re_password');
					if ($pass==$re) {
						$this->m_login->reset_pass();
							echo " <script>alert('Password berhasil di reset!');history.go(-1);</script>";
					}
					else {
						echo " <script>alert('Password tidak cocok!');history.go(-1);</script>";
					}
				}
				else {
					echo " <script>alert('No SK PPATK tidak ditemukan!');history.go(-1);</script>";
				}
			}
			else {
				echo " <script>alert('Kode keamanan salah!');history.go(-1);</script>";
			}
		}
		else {
			redirect('login');
		}
	}

	public function logout()
	{	
			session_destroy();
			echo " <script>alert('Berhasil logout!');history.go(-1);</script>";
			redirect('login');
	}

}
