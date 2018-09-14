<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Contact extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('home/M_home');
		$this->load->model('M_Contact');
	}

	function index(){
		$data['idHome'] = $this->M_home->getId()->result();
		$this->load->view('contact/contact', $data);
	}

	function actNew(){	
		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");

		$fullnm = $this->input->post('fullNm');
		$email = $this->input->post('email');
		$msg = $this->input->post('msg');
		
		/*-- set for security from xss attack --*/
		$this->security->xss_clean($data = array(
			'full_name' => $fullnm,
			'email' => $email,
			'msg' => $msg,
			'post_date_msg' => $tglskrg,
			'post_time_msg' => $jamskrg,
		));
		
		$this->M_Contact->insertData($data, 'contact');
		echo "<script>alert('Your message has been sent.');window.location.href='contact';</script>";
	}

}
?>