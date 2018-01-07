<?php 
class M_register extends CI_Model {

	public function __construct()
	{
		$this->load->model('M_request');
		parent::__construct();
	} 


	public function send_otp($param)
	{
		$url=base_api."activation-request";
		return $this->M_request->before_login($url,$param);
	}

	public function register($param)
	{
		$url=base_api."register";
		return $this->M_request->before_login($url,$param);
	}

	public function register_storage($userid,$password)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://telkomstorage.id/ocs/v1.php/cloud/users?format=json",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS =>  "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"userid\"\r\n\r\n".$userid."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"password\"\r\n\r\n".$password."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
			CURLOPT_HTTPHEADER => array(
				"authorization: Basic YWRtaW5ic2Q6YWRtaW5ic2QxMjM=",
				"content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			"cURL Error #:" . $err;
		} else {
			$response;
		}

	}
}
?>