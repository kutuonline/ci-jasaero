<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class News extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('home/M_home');
		$this->load->model('M_News');
		$this->load->library('pagination');
	}

	function index(){
		//konfigurasi pagination
        $config['base_url'] = site_url('news/index'); //site url
        $config['total_rows'] = $this->db->count_all('news'); //total row
        $config['per_page'] = 6;  //show record per halaman
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

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['idHome'] = $this->M_home->getId()->result();

        //panggil function getWhereNews yang ada pada model M_News. 
        $data['newslist'] = $this->M_News->getWhereNews($config["per_page"], $data['page'])->result();

        $data['pagination'] = $this->pagination->create_links();

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