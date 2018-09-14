<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('M_home');
	}

	function index(){
		$data['idHome'] = $this->M_home->getId()->result();
		$data['serv'] = $this->M_home->getService()->result();
		$data['profil'] = $this->M_home->getWhereProfile()->result();
		$data['cust'] = $this->M_home->getWhereCust()->result();
		$data['service'] = $this->M_home->getWhereService()->result();
		$data['slider'] = $this->M_home->getSlider()->result();
		$data['cust_carousel'] = $this->M_home->getCust()->result();
		$this->load->view('home/home', $data);
	}

}
?>