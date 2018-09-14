<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Service extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('home/M_home');
		$this->load->model('M_Service');
	}

	function index(){
		$data['idHome'] = $this->M_home->getId()->result();
		$data['service'] = $this->M_Service->getWhereService()->result();
		$this->load->view('service/service', $data);
	}

	function details($slug){
		$where = array('post_slug' => $slug);
		$data['idHome'] = $this->M_home->getId()->result();
		$data['data_detail'] = $this->M_Service->getWhere($where, 'services')->result();
		$this->load->view('service/servicedetails', $data);
	}

}
?>