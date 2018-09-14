<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Career extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('home/M_home');
		$this->load->model('M_Career');
	}

	function index(){
		$data['idHome'] = $this->M_home->getId()->result();
		$data['career'] = $this->M_Career->getWhereCareer()->result();
		$this->load->view('career/career', $data);
	}

}
?>