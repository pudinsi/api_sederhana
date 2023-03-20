<?php
defined('__NAJZMI_PUDINTEA__') OR exit('No direct script access allowed');

class Tesapi extends REST_Controller {
	function __construct(){
		$this->data 	= [];
		parent::__construct();
			date_default_timezone_set ('Asia/Jakarta');
	}
	public function index()
	{
		$this->load->view('view_tesapi');
	}
	
	public function periksanip()
	{
		if($this->input->method(TRUE)=='POST'):
			$nip = $this->input->post('nip', TRUE);
			if (empty($nip)){
				$respon = ['status' => 'kosong', 'message' => 'Nip Kosong'];
				$this->response($respon);
			}else{
				$serverApi 	= "http://localhost/ci_api/public/ypia?nip=".$nip;
				$token		= '';
				$dataAPI 	= file_get_contents($serverApi);
				$data 		= json_decode($dataAPI, True);
				
				if ($data['status'] == 'success'){
					$respon = ['status' => 'success', 'message' => 'Nip Terdaftar'];
					$this->response($respon);
				}else{
					$respon = ['status' => 'tidakada', 'message' => 'Nip Tidak Terdaftar'];
					$this->response($respon);
				}
			};
		endif;
	}
}
