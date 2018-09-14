<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Contact_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('M_Contactlist');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['msg_list'] = $this->M_Contactlist->getMsg()->result();
		$this->template->load('media/template','contactlist/contact_list', $data);
	}
	
}
?>