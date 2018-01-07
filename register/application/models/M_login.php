<?php 
class M_login extends CI_Model {

	public function __construct()
	{
		$this->load->model('M_request');
		parent::__construct();
	} 


	public function login_req($param)
	{
		$url=base_api."login";
		return $this->M_request->before_login($url,$param);
	}

	public function forgot_password($param)
	{
		$url=base_api."forgot-password";
		return $this->M_request->before_login($url,$param);
	}

	public function reset_password_storage($users,$password)
	{	$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://telkomstorage.id/ocs/v1.php/cloud/users/".$users,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "PUT",
			CURLOPT_POSTFIELDS => "key=password&value=".$password,
			CURLOPT_HTTPHEADER => array(
				"authorization: Basic YWRtaW5ic2Q6YWRtaW5ic2QxMjM=",
				"content-type: application/x-www-form-urlencoded"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	public function reset_password($param)
	{
		$url=base_api."reset-password";
		return $this->M_request->before_login($url,$param);
	}
}
