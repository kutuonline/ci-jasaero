<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Auth extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
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
			redirect(base_url('main/dashboard'));
		} else {
			$this->session->set_flashdata("failed",	
				"<div class='panel-body'>
					<div class='alert alert-danger alert-dismissible' role='alert'>
                    	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    	</button><i class='fa fa-check-circle'></i>
                   		Invalid username or password.
                    	<br />
                	</div>
                </div>");
			redirect(base_url('auth'));
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}
}
?>