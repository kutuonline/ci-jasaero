<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Auth extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->model('log/M_log');
	}

	function index(){
		$this->load->view('login');
	}

	function actLogin(){		
		$cek = $this->Auth_model->cekLogin();
		if($cek){
			foreach($cek as $data_session){
				$complete_name = $data_session['complete_name'];
				$pwd = $data_session['pass_encrypt'];
				$email = $data_session['email'];
				$ulevel = $data_session['users_level'];
				$img = $data_session['photo'];
			}
			$data_session = array(
				'complete_name' => $complete_name,
				'pass_encrypt' => $pwd,
				'email' => $email,
				'users_level' => $ulevel,
				'photo' => $img,
				'is_logged_in' => true,
				);
			$this->session->set_userdata($data_session);
			helper_log("login", "Login to the system.");
			redirect(base_url('main/dashboard'));			
		} else {
			echo "<script>alert('Invalid username or password.');window.location.href='auth';</script>";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		helper_log("logout", "Logout from the system.");
		redirect(base_url('auth'));
	}
}
?>