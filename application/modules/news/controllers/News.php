<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class News extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('home/M_home');
		$this->load->model('M_News');
	}

	function index(){
		$data['idHome'] = $this->M_home->getId()->result();
		$data['newslist'] = $this->M_News->getWhereNews()->result();
		$this->load->view('news/news', $data);
	}

	function details($slug){
		$where = array('news_slug' => $slug);
		$data['idHome'] = $this->M_home->getId()->result();
		$data['data_detail'] = $this->M_News->getWhere($where, 'news')->result();
		$this->load->view('news/newsdetails', $data);
	}

}
?>