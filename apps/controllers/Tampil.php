<?php
defined('__NAJZMI_PUDINTEA__') OR exit('No direct script access allowed');

class Tampil extends REST_Controller {
	function __construct(){
		$this->data 	= [];
		parent::__construct();
			date_default_timezone_set ('Asia/Jakarta');
	}
	
	public function index()
	{
		$serverApi 	= "https://apialazhar.eu.org/ypia?nip=123456";
		$dataAPI 	= file_get_contents($serverApi);
		$data 		= json_decode($dataAPI, True);
		
		echo "<Pre>";
		echo $data['status'];
		echo '<br/>';
		echo $data['message'];
		echo "</Pre>";
	}
	
	function periksa()
	{
		$ServerApi 	= "https://apialazhar.eu.org/ypia?nip=123456";
		$DataAPI 	= File_get_contents($ServerApi);
		$Data 		= Json_decode($DataAPI, True);
		
		echo "<Pre>";
		print_r ($Data);
		echo "</Pre>";
	}
}
