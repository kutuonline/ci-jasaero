<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Mnutama_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('Mnutama_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session'));
	}

	function index(){
		/*-- show all data menu in the datatable --*/
		$data['mnutama_list'] = $this->Mnutama_model->getMnUtama()->result();
		$this->template->load('media/template','menu_utama/mnutama_list', $data);
	}

	function actNew(){		
		$label = $this->input->post('label');
		$link = $this->input->post('link');
		//$menu = $this->input->post('menu');
		$icon = $this->input->post('icon');
		
		$data = array(
			'label_mnUtama' => $label,
			'link' => $link,
			//'isMainMenu' => $menu,
			'icon_mnUtama' => $icon
		);
		
		$this->form_validation->set_rules('label','label_mnUtama','callback_valid_label');

		if ($this->form_validation->run() == false){
			$data['mnutama_list'] = $this->Mnutama_model->getMnUtama()->result();
			$this->template->load('media/template','menu_utama/mnutama_list', $data);
		} else {
			$this->Mnutama_model->insertData($data, 'menu_utama');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Main menu has been saved.
                    <br />
                </div>");
			redirect(base_url('menu_utama/mnutama_list'));
		}
	}
	
	function updateData(){
		$id = $this->input->post('id');
		$label = $this->input->post('label');
		$link = $this->input->post('link');
		//$menu = $this->input->post('menu');
		$icon = $this->input->post('icon');
		$aktif = $this->input->post('aktif');

		$data = array(
			'label_mnUtama' => $label,
			'link' => $link,
			//'isMainMenu' => $menu,
			'icon_mnUtama' => $icon,
			'isActiveMnUtama' => $aktif
			);

		$where = array(
			'id_mnUtama' => $id
			);

		$this->Mnutama_model->getUpdate($where, $data, 'menu_utama');
		$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Main menu has been updated.
                    <br />
                </div>");

		redirect(base_url('menu_utama/mnutama_list'));
	}

	function deleteData($id){		
		$where = array('id_mnUtama' => $id);

		$this->Mnutama_model->getDelete($where, 'id_mnutama');
		$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Main menu has been deleted.
                    <br />
                </div>");
		redirect(base_url('menu_utama/mnutama_list'));
	}

	function valid_label($label){
		$where = array('label_mnUtama' => $label);
		$res = $this->Mnutama_model->validLabel($where, 'menu_utama');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_label','Label of menu has been used.');
			return FALSE;
		}
	}
 	
}
?>