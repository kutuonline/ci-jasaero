<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Archives extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('home/M_home');
		$this->load->model('M_Archives');
		$this->load->library('pagination');
	}

	function index(){
		$data['idHome'] = $this->M_home->getId()->result();
		$data['allArchive'] = $this->M_Archives->getArchive()->result();
		$this->load->view('archives/archives', $data);
	}

	function details($nm){
		/*
		$parameter = $_REQUEST[$nm];

		//konfigurasi pagination
        $config['base_url'] = site_url('archives/details/'.$parameter); //site url
        $config['total_rows'] = $this->db->count_all('archive'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $config['suffix'] = '?'.http_build_query($_REQUEST, '', ''&'');

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        */

		$where = array('nm_archive' => $nm);
		$data['idHome'] = $this->M_home->getId()->result();

		$data['data_detail'] = $this->M_Archives->getWhere($where, 'archive')->result();
		//$data['data_detail'] = $this->M_Archives->getWhere($where, 'archive', $config["per_page"], $data['page'], $parameter)->result();

		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('archives/archivesdetails', $data);
	}

}
?>