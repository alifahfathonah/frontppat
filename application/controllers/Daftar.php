<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('m_login');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == 'Sudah Login') {
			redirect('home');
		}
		else {
			$options = array(
	        'img_path'		=>'./captcha/',
	        'img_url'			=>base_url('captcha'),
					'word_length' => 4,
	        'img_width'		=>'150',
	        'img_height'	=>'28',
	        'expiration'	=>120,
	        'pool' 				=> '0123456789', #tipe captcha (angka/huruf, atau kombinasi dari keduanya)

	        # atur warna captcha-nya di sini ya.. gunakan kode RGB
	        'colors' => array(
	                'background' => array(242, 242, 242),
	                'border' => array(255, 255, 255),
	                'text' => array(0, 0, 0),
	                'grid' => array(255, 40, 40))
	           );
	    $cap = create_captcha($options);
	    $data['image'] = $cap['image'];
	    $this->session->set_userdata('mycaptcha', $cap['word']);
	    $data['word'] = $this->session->userdata('mycaptcha');
			$this->load->view('daftar', $data);
		}
	}

	public function aksi_daftar(){
		$pass = $this->input->post('password');
		$re  	= $this->input->post('re_password');
		$data = array(
				'no_sk_ppat' => $this->input->post('no_sk_ppat')
		);
		$cek = $this->m_login->cek_data($data);
		if ($cek->num_rows() == 1){
			echo " <script>alert('No SK PPATK sudah terdaftar!');history.go(-1);</script>";
		}
		else {
			if ($pass == $re) {
				$captcha = $this->input->post('captcha_code');
				$word = $this->session->userdata('mycaptcha');
				if (isset($captcha)) {
					if (strtoupper($captcha)==strtoupper($word)) {
						$this->m_login->daftar();
						echo "<script>
								alert('Berhasil daftar!');
								window.location.href='../login';
								</script>";
					}
					else {
						echo " <script>alert('Kode Keamanan salah!');history.go(-1);</script>";
					}
				}
			}
			else {
				echo " <script>alert('Password tidak sama!');history.go(-1);</script>";
			}
		}
	}
}
