<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Facility_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('Facility_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['f_list'] = $this->Facility_model->getFacility()->result();
		$this->template->load('media/template','facility/facility_list', $data);
	}

	function actNew(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$config['upload_path'] = './img_facility/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '2048';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

		/*-- hapus spasi pada nama file foto --*/
		$config['remove_space'] = TRUE;
 		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);		
		/*-- end --*/

		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");
		
		$facility = $this->input->post('facility');
		$desc = $this->input->post('desc');
	
		if ($_FILES['fupload']['name']){
			if (!$this->upload->do_upload('fupload')){
				$error = $this->upload->display_errors();
				print_r($error);
				return $error;	
			} else {
				$gbr = $this->upload->data();

				$data = array(
					'facility_name' => $facility,
					'desc_facility' => $desc,
					'img_facility' => $gbr['file_name'],
					'cr_dt_facility' => $tglskrg,
					'cr_tm_facility' => $jamskrg,
					'cr_user_facility' => $this->session->userdata('complete_name')
				);
			}
		} else {
			$data = array(
				'facility_name' => $facility,
				'desc_facility' => $desc,
				'cr_dt_facility' => $tglskrg,
				'cr_tm_facility' => $jamskrg,
				'cr_user_facility' => $this->session->userdata('complete_name')
			);
		}
		
		$this->form_validation->set_rules('title','Title','callback_valid_title');

		if ($this->form_validation->run() == false){
			$data['f_list'] = $this->Facility_model->getFacility()->result();
			$this->template->load('media/template','facility/facility_list', $data);
		} else {
			$this->Facility_model->insertData($data, 'facility');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Facility has been saved.
                    <br />
                </div>");
			redirect(base_url('facility/facility_list'));
		}
	}
	
	function updateData(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$path = './img_facility/';
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '2048';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

		/*-- hapus spasi pada nama file foto --*/
		$config['remove_space'] = TRUE;
		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);
		/*-- end --*/

		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");

		$id = $this->input->post('id');
		$fileLama = $this->input->post('filelama');
		$facility = $this->input->post('facility');
		$desc = $this->input->post('desc');
		$aktif = $this->input->post('aktif');
		
		if ($_FILES['fupload']['name']){
			if (!$this->upload->do_upload('fupload')){
				$error = $this->upload->display_errors();
				print_r($error);
				return $error;
			} else {
				$gbr = $this->upload->data();

				$data = array(
					'facility_name' => $facility,
					'desc_facility' => $desc,
					'img_facility' => $gbr['file_name'],
					'cr_dt_facility' => $tglskrg,
					'cr_tm_facility' => $jamskrg,
					'cr_user_facility' => $this->session->userdata('complete_name'),
					'isActiveFacility' => $aktif
				);

				@unlink($path.$fileLama);
			}
		} else {
		
			/*-- update data jika img service tidak diganti --*/
			$data = array(
				'facility_name' => $facility,
				'desc_facility' => $desc,
				'cr_dt_facility' => $tglskrg,
				'cr_tm_facility' => $jamskrg,
				'cr_user_facility' => $this->session->userdata('complete_name'),
				'isActiveFacility' => $aktif
			);
		}

		$where = array(
			'id_facility' => $id
			);

		$this->Facility_model->getUpdate($where, $data, 'facility');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Facility has been updated.
                <br />
            </div>");
		redirect(base_url('facility/facility_list'));		
	}
	
	function deleteData($id){		
		$path = './img_facility/';

		$where = array('id_facility' => $id);

		/*-- ambil data (foto_user) dari tabel user --*/
		$this->db->where('id_facility', $id);
		$query = $this->db->get('facility');
		$row = $query->row();

		unlink($path.$row->img_facility);

		$this->Facility_model->getDelete($where, 'id_facility');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Facility has been deleted.
                <br />
            </div>");
		redirect(base_url('facility/facility_list'));
	}
	
	function valid_title($facilityNm){
		$where = array('facility_name' => $facilityNm);
		$res = $this->Facility_model->validTitle($where, 'facility');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_title','Facility name already exist.');
			return FALSE;
		}
	}
	
}
?>