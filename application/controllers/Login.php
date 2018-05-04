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
		$options = array(
        'img_path'=>'./captcha/',
        'img_url'=>base_url('captcha'),
        'img_width'=>'150',
        'img_height'=>'30',
        'expiration'=>7200,
        'pool' => '0123456789', #tipe captcha (angka/huruf, atau kombinasi dari keduanya)

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
		$this->load->view('login', $data);
	}

	public function aksi_login(){
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
					redirect('home', $sess_data);
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

	function logout()
	{
			session_destroy();
			echo " <script>alert('Berhasil logout!');history.go(-1);</script>";
			redirect('login');
	}


}
