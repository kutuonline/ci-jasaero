<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Applications extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('home/M_home');
		$this->load->model('M_App');
	}

	function index(){
		$data['idHome'] = $this->M_home->getId()->result();
		$data['appQis'] = $this->M_App->getWhereAppQis()->result();
		$data['appSms'] = $this->M_App->getWhereAppSms()->result();
		$data['appTcs'] = $this->M_App->getWhereAppTcs()->result();
		$data['appEgb'] = $this->M_App->getWhereAppEgb()->result();
		$data['cctvJkt'] = $this->M_App->getWhereCctvJkt()->result();
		$data['cctvSub'] = $this->M_App->getWhereCctvSub()->result();
		$data['cctvDps'] = $this->M_App->getWhereCctvDps()->result();
		$this->load->view('applications/applications', $data);
	}

}
?>