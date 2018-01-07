<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_register');
	}

	public function send_otp()
	{
		$data['value']=$_POST;
		$param['phone']=$_POST['nomor_telepon'];
		$param['email']=$_POST['email'].'@'.domain;
		$param['password']=$_POST['password'];
		$data['value']['email']=$_POST['email'].'@'.domain;
		//echo json_encode($param);
		$this->M_register->send_otp(json_encode($param));
		$this->load->view('register/verifikasi_otp',$data);

	}
	public function do_register()
	{
		//echo json_encode($_POST);
		$param['firstname']=$_POST['firstname'];
		$param['lastname']=$_POST['lastname'];
		$param['phone']=$_POST['phone'];
		$param['email']=$_POST['email'];
		$param['code']=$_POST['code'];
		$result=$this->M_register->register(json_encode($param));
		$data['result']=$result;
		if($result['status']=='200'){
			$this->M_register->register_storage($_POST['email'],$_POST['password']);
			redirect('success');
		}
		else{
			$this->load->view('register/success',$data);
		}
	}
	public function pricing()
	{
		$this->load->view('register/pricing');
	}
	public function index()
	{
		$this->load->view('register/personal');
	}
	public function business()
	{
		$this->load->view('register/business');
	}
	public function success()
	{
		$this->load->view('register/success');
	}

}
