<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	} 
	public function index()
	{
		if (isset($_SESSION['token'])) {
			redirect('inbox');
		}
		else{
			$this->load->view('login/login');
		}
	}
	public function do_login()
	{
		$param['email']=$_POST['email'];
		$param['password']=$_POST['password'];
		$login=$this->M_login->login_req(json_encode($param));
		if ($login['status']==400) {
			$this->session->set_flashdata('login_message', $login['message']);
			redirect("login");
		}
		else{
			$_SESSION['cGFzc3dvcmQ']=base64_encode($_POST['password']);
			$this->session->set_userdata(array(
				'firstname'  => $login['result']['user']['firstname'],
				'lastname' => $login['result']['user']['lastname'],
				'email'  => $login['result']['user']['email'],
				'avatar' =>$login['result']['user']['avatar'],
				'diskusage' =>$login['result']['user']['diskusage'],
				'token' => $login['result']['user']['token']
			));
			redirect("inbox");
		}
	}

	public function forgot_password()
	{
		$this->load->view('login/forgot_password');
	}

	public function verifikasi_otp()
	{
		$data['email']=$_POST['email'];
		$result=$this->M_login->forgot_password(json_encode($data));
		//echo json_encode($result['status']);
		if ($result['status']!='200') {
			$this->session->set_flashdata('email_verif_message',$result['result']['text']);
			redirect("login/forgot_password");
		}
		else{
			$this->load->view('login/verifikasi_otp',$data);
		}
		
	}

	public function do_forgot()
	{
		$data['email']=$_POST['email'];
		$result=$this->M_login->reset_password(json_encode($_POST));
		if ($result['status']!='200') {
			$this->session->set_flashdata('otp_success',$result['status']);
			$this->session->set_flashdata('otp_message',$result['result']['text']);
			$this->load->view('login/verifikasi_otp',$data);
		}
		else{
			$this->M_login->reset_password_storage($_POST['email'],$_POST['password']);
			$this->session->set_flashdata('otp_message',$result['result']['text']);
			$this->session->set_flashdata('otp_success',$result['status']);
			$this->load->view('login/verifikasi_otp',$data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}
