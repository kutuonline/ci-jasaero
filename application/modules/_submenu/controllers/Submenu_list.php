<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Submenu_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('Submenu_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session'));
	}

	function index(){
		/*-- show all data menu in the datatable --*/
		$data['submenu_list'] = $this->Submenu_model->getSubmenu()->result();
		/*-- menu utama --*/
		$data['menu_list'] = $this->Submenu_model->getMenu()->result();

		//$where = array('id_mnUtama' => $id);
		//$data['mnutama'] = $this->Submenu_model->dropdownList($where, 'mn_utama')->result();

		$this->template->load('media/template','submenu/submenu_list', $data);
	}

	function actNew(){		
		$menu = $this->input->post('menu');
		$submenu = $this->input->post('submenu');
		$link = $this->input->post('link');
		$icon = $this->input->post('icon');
		
		$data = array(
			'id_mnUtama' => $menu,
			'submenu' => $submenu,
			'submenu_link' => $link,
			'icon_submenu' => $icon
		);
		
		$this->form_validation->set_rules('label','label_mnUtama','callback_valid_submenu');

		if ($this->form_validation->run() == false){
			$data['submenu_list'] = $this->Submenu_model->getSubmenu()->result();
			$this->template->load('media/template','submenu/submenu_list', $data);
		} else {
			$this->Submenu_model->insertData($data, 'submenu');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Submenu has been saved.
                    <br />
                </div>");
			redirect(base_url('submenu/submenu_list'));
		}
	}
	
	function updateData(){
		$id = $this->input->post('id');
		$menu = $this->input->post('menu');
		$submenu = $this->input->post('submenu');
		$link = $this->input->post('link');
		$icon = $this->input->post('icon');
		$aktif = $this->input->post('aktif');

		$data = array(
			'id_mnUtama' => $menu,
			'submenu' => $submenu,
			'submenu_link' => $link,
			'icon_submenu' => $icon,
			'isActiveSubmenu' => $aktif
			);

		$where = array(
			'id_submenu' => $id
			);

		$this->Submenu_model->getUpdate($where, $data, 'submenu');
		$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Submenu has been updated.
                    <br />
                </div>");

		redirect(base_url('submenu/submenu_list'));
	}

	function deleteData($id){		
		$where = array('id_submenu' => $id);

		$this->Submenu_model->getDelete($where, 'id_submenu');
		$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Submenu has been deleted.
                    <br />
                </div>");
		redirect(base_url('submenu/submenu_list'));
	}

	function valid_submenu($label){
		$where = array('submenu' => $label);
		$res = $this->Submenu_model->validSubmenu($where, 'submenu');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_submenu','Submenu has been used.');
			return FALSE;
		}
	}
 	
}
?>