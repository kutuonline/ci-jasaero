<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Career_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('Career_model');
		$this->load->model('log/M_log');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['c_list'] = $this->Career_model->getCareer()->result();
		$this->template->load('media/template','careerlist/career_list', $data);
	}

	function actNew(){
		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");

		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$tgl = $this->input->post('tgl');

		$data = array(
			'title_career' => $title,
			'desc_career' => $desc,
			'closing_date' => $tgl,
			'post_date' => $tglskrg,
			'post_time' => $jamskrg,
			'post_user' => $this->session->userdata('complete_name')
			);

		$this->form_validation->set_rules('title','Title','callback_valid_title');

		if ($this->form_validation->run() == false){
			$data['c_list'] = $this->Career_model->getCareer()->result();
			$this->template->load('media/template','careerlist/career_list', $data);
		} else {
			$this->Career_model->insertData($data, 'career');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Career has been saved.
                    <br />
                </div>");

			helper_log("add", "Add/save career list.");
			redirect(base_url('careerlist/career_list'));
		}
	}
	
	function updateData(){
		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");

		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$tgl = $this->input->post('tgl');
		$aktif = $this->input->post('aktif');

		$data = array(
			'title_career' => $title,
			'desc_career' => $desc,
			'closing_date' => $tgl,
			'mod_date' => $tglskrg,
			'mod_time' => $jamskrg,
			'mod_user' => $this->session->userdata('complete_name'),
			'isActiveCareer' => $aktif
			);

		$where = array(
			'id_career' => $id
			);

		$this->Career_model->getUpdate($where, $data, 'career');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Career has been updated.
                <br />
            </div>");

		helper_log("edit", "Edit/update career list.");
		redirect(base_url('careerlist/career_list'));
	}
	
	function deleteData($id){
		$where = array('id_career' => $id);
		$this->Career_model->getDelete($where, 'career');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Career has been deleted.
                <br />
            </div>");

		helper_log("delete", "Delete career list.");
		redirect(base_url('careerlist/career_list'));
	}
	
	function valid_title($titleCareer){
		$where = array('title_career' => $titleCareer);
		$res = $this->Career_model->validTitle($where, 'career');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_title','Career already exist.');
			return FALSE;
		}
	}
	
}
?>