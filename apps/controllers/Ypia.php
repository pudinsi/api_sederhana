<?php
defined('__NAJZMI_PUDINTEA__') OR exit('No direct script access allowed');

class Ypia extends REST_Controller {
	function __construct(){
		$this->data 	= [];
		$this->response = [];
		parent::__construct();
			date_default_timezone_set ('Asia/Jakarta');
			$this->load->database();
			$this->load->model('YpiaModel','MYpia');
	}
	/**
     * Common HTTP status codes and their respective description.
     *
     * @link http://www.restapitutorial.com/httpstatuscodes.html
    HTTP_OK = 200;
    HTTP_CREATED = 201;
    HTTP_NOT_MODIFIED = 304;
    HTTP_BAD_REQUEST = 400;
    HTTP_UNAUTHORIZED = 401;
    HTTP_FORBIDDEN = 403;
    HTTP_NOT_FOUND = 404;
    HTTP_METHOD_NOT_ALLOWED = 405;
    HTTP_NOT_ACCEPTABLE = 406;
    HTTP_INTERNAL_ERROR = 500;
	*/
	
	public function index()
	{
		if($this->input->method(TRUE)=='GET'):
			$_nip = $this->input->get('nip', TRUE);
			if ($_nip == ''){
				$respon = ['status' => 'kosong', 'message' => 'Nip Harus Diisi'];
				$this->response($respon);
			}else{
				$cek = $this->MYpia->getNipData($_nip);
				if ($cek){
					$respon = ['status' => 'success', 'message' => 'Nip Terdaftar'];
					$this->response($respon);
				}else{
					$respon = ['status' => 'tidakada', 'message' => 'Nip Tidak Terdaftar'];
					$this->response($respon);
				}
			}
		endif;
	}
}
