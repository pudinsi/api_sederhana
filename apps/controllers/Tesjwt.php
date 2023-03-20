<?php
defined('__NAJZMI_PUDINTEA__') OR exit('No direct script access allowed');

class Tesjwt extends REST_Controller {
	function __construct(){
		$this->data 	= [];
		parent::__construct();
			date_default_timezone_set ('Asia/Jakarta');
			$this->load->library('Authorization_Token');
	}
	
	public function index()
	{
		$serverApi 	= "http://localhost/ci_api/Tesjwt/verify";
		$token		= '';
		$dataAPI 	= file_get_contents($serverApi);
		$data 		= json_decode($dataAPI, True);
		
		echo "<Pre>";
		echo $data['status'];
		echo '<br/>';
		echo $data['message'];
		echo "</Pre>";
	}
	
	public function register()
	{   
		$waktuRequest 	= time();
		$waktuToken		= $this->config->item('token_expire_time');
		$waktuExpired 	= $waktuRequest + $waktuToken;
		
		$token_data['iat'] = $waktuRequest;
		$token_data['exp'] = $waktuExpired;
		
		$token_data['user_id'] = 121;
		$token_data['fullname'] = 'code'; 
		$token_data['email'] = 'code@gmail.com';

		$tokenData = $this->authorization_token->generateToken($token_data);

		$final = array();
		$final['token'] = $tokenData;
		$final['status'] = 'ok';
 
		$this->response($final, 200); 

	}
	public function verify()
	{  
		$headers = $this->input->request_headers(); 
		$decodedToken = $this->authorization_token->validateToken($headers['Authorization']);

		$this->response($decodedToken, 200);
	}

}
