<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Log_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('M_log');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['loglist'] = $this->M_log->getLogs()->result();
		$this->template->load('media/template','log/log_list', $data);
	}

}
?>