<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class App_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('App_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['app_list'] = $this->App_model->getApps()->result();
		$this->template->load('media/template','applist/app_list', $data);
	}

	function actNew(){	
		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");

		$appnm = $this->input->post('appNm');
		$desc = $this->input->post('desc');
		$url = $this->input->post('url');
		$icon = $this->input->post('icon');
		
		$data = array(
			'app_name' => $appnm,
			'app_desc' => $desc,
			'app_url' => $url,
			'app_icon' => $icon,
			'post_date_app' => $tglskrg,
			'post_time_app' => $jamskrg,
			'post_user_app' => $this->session->userdata('complete_name')
		);
		
		$this->form_validation->set_rules('appNm','Application Name','callback_valid_apps');

		if ($this->form_validation->run() == false){
			$data['app_list'] = $this->App_model->getApps()->result();
			$this->template->load('media/template','applist/app_list', $data);
		} else {
			$this->App_model->insertData($data, 'apps');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Application has been saved.
                    <br />
                </div>");
			redirect(base_url('applist/app_list'));
		}
	}
	
	function updateData(){
		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");

		$id = $this->input->post('id');
		$appnm = $this->input->post('appNm');
		$desc = $this->input->post('desc');
		$url = $this->input->post('url');
		$icon = $this->input->post('icon');
		$aktif = $this->input->post('aktif');

		$data = array(
			'app_name' => $appnm,
			'app_desc' => $desc,
			'app_url' => $url,
			'app_icon' => $icon,
			'mod_date_app' => $tglskrg,
			'mod_time_app' => $jamskrg,
			'mod_user_app' => $this->session->userdata('complete_name'),
			'isActiveApp' => $aktif
			);

		$where = array(
			'id_app' => $id
			);

		$this->App_model->getUpdate($where, $data, 'apps');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Application has been updated.
                <br />
            </div>");

		redirect(base_url('applist/app_list'));
	}
	
	function deleteData($id){		
		$where = array('id_app' => $id);

		$this->App_model->getDelete($where, 'id_app');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Application has been deleted.
                <br />
            </div>");
		redirect(base_url('applist/app_list'));
	}
	
	function valid_apps($apps){
		$where = array('app_name' => $apps);
		$res = $this->App_model->validApps($where, 'apps');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_apps','Application already exist.');
			return FALSE;
		}
	}
	
}
?>