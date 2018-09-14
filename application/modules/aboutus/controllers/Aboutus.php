<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Aboutus extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('home/M_home');
		$this->load->model('Aboutus_model');
	}

	function index(){
		$data['idHome'] = $this->M_home->getId()->result();
		$data['profil'] = $this->M_home->getWhereProfile()->result();
		$data['approval'] = $this->Aboutus_model->getWhereApproval()->result();
		$data['station'] = $this->Aboutus_model->getWhereStation()->result();
		$data['capability'] = $this->Aboutus_model->getWhereCapabilities()->result();
		$data['commit'] = $this->Aboutus_model->getWhereCommit()->result();
		$data['facility'] = $this->Aboutus_model->getWhereFacility()->result();
		$data['qis'] = $this->Aboutus_model->getWhereQis()->result();
		$data['sms'] = $this->Aboutus_model->getWhereSms()->result();
		$data['tcs'] = $this->Aboutus_model->getWhereTcs()->result();
		$data['egb'] = $this->Aboutus_model->getWhereEgb()->result();
		$this->load->view('aboutus/aboutus', $data);
	}

}
?>