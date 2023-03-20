<?php
defined('__NAJZMI_PUDINTEA__') OR exit('No direct script access allowed');

class YpiaModel extends CI_Model {
	function __construct(){
		parent::__construct();	
	}
	/**
     * return _retval
     *
     * @var Boolean
     **/
	private $_tb = 'tb_pegawai';
	/**
     * return _retval
     *
     * @var Boolean
     **/
    private $_retval = NULL;

    /**
     * return _result
     *
     * @var Boolean
     **/
    private $_result = FALSE;

    /**
     * return _retarr
     *
     * @var Array
     **/
    private $_retarr = array();
	
	function getNipData($_nip = '')
	{
		if (empty ($_nip)) {
            return false;
        }
		$this->db->where('pegawai_nip', $_nip);
        $this->_result = $this->db->get($this->_tb)->num_rows();
		
        if ($this->_result == 1) {
            return $this->_result;
        }else{
			return false;
		}
		
	}
	
	function getNipTglData($_nip = '', $_tgl = '')
	{
		if (empty ($_nip)) {
            return false;
        }
		if (empty ($_tgl)) {
            return false;
        }
		$this->db->where('pegawai_nip', $_nip);
		$this->db->where('pegawai_tanggal', $_tgl);
        $this->_result = $this->db->get($this->_tb)->num_rows();
		
        if ($this->_result == 1) {
            return $this->_result;
        }else{
			return false;
		}
		
	}
}