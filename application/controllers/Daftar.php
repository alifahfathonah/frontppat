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
		$options = array(
        'img_path'=>'./captcha/', #folder captcha yg sudah dibuat tadi
        'img_url'=>base_url('captcha'), #ini arahnya juga ke folder captcha
        'img_width'=>'150', #lebar image captcha
        'img_height'=>'28', #tinggi image captcha
        'expiration'=>7200, #waktu expired
        // 'font_path' => FCPATH . 'assets/font/coolvetica.ttf', #load font jika mau ganti fontnya
        'pool' => '0123456789', #tipe captcha (angka/huruf, atau kombinasi dari keduanya)

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

	public function aksi_daftar(){
		$pass = $this->input->post('password');
		$re  	= $this->input->post('re_password');
		if ($pass == $re) {
			$captcha = $this->input->post('captcha_code'); #mengambil value inputan pengguna
			$word = $this->session->userdata('mycaptcha'); #mengambil value captcha
			if (isset($captcha)) { #cek variabel $captcha kosong/tidak
				if (strtoupper($captcha)==strtoupper($word)) { #proses pencocokan captcha
					$this->m_login->daftar();
					echo " <script>alert('Berhasil daftar!');history.go(-1);</script>";
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
