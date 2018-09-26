<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Archive_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('Archive_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['a_list'] = $this->Archive_model->getArchive()->result();
		$this->template->load('media/template','archivelist/archive_list', $data);
	}

	function actNew(){
		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");

		$archive = $this->input->post('archive');

		$data = array(
			'nm_archive' => $archive,
			'post_date_archive' => $tglskrg,
			'post_time_archive' => $jamskrg,
			'post_user_archive' => $this->session->userdata('complete_name')
			);

		$this->form_validation->set_rules('archive','Archive','callback_valid_archive');

		if ($this->form_validation->run() == false){
			$data['a_list'] = $this->Archive_model->getArchive()->result();
			$this->template->load('media/template','archivelist/archive_list', $data);
		} else {
			$this->Archive_model->insertData($data, 'archive');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Archive has been saved.
                    <br />
                </div>");
			redirect(base_url('archivelist/archive_list'));
		}
	}
	
	function updateData(){
		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");

		$id = $this->input->post('id');
		$archive = $this->input->post('archive');
		$aktif = $this->input->post('aktif');

		$data = array(
			'nm_archive' => $archive,
			'mod_date_archive' => $tglskrg,
			'mod_time_archive' => $jamskrg,
			'mod_user_archive' => $this->session->userdata('complete_name'),
			'isActiveArchive' => $aktif
			);

		$where = array(
			'id_archive' => $id
			);

		$this->Archive_model->getUpdate($where, $data, 'archive');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Archive has been updated.
                <br />
            </div>");
		redirect(base_url('archivelist/archive_list'));
	}
	
	function deleteData($id){
		$where = array('id_archive' => $id);
		$this->Archive_model->getDelete($where, 'archive');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Archive has been deleted.
                <br />
            </div>");
		redirect(base_url('archivelist/archive_list'));
	}
	
	function valid_archive($nmArchive){
		$where = array('nm_archive' => $nmArchive);
		$res = $this->Archive_model->validArchive($where, 'archive');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_archive','Archive already exist.');
			return FALSE;
		}
	}
	
}
?>