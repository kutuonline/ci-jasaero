<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Service_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('Service_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['serv_list'] = $this->Service_model->getService()->result();
		$this->template->load('media/template','servicelist/service_list', $data);
	}

	function actNew(){
		/*-- upload file --*/
		$nmfile = "file_1".time();
		$config['upload_path'] = './img_service/';
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
		
		$title = $this->input->post('title');
		$slug_title = slug($this->input->post('title'));
		$desc = $this->input->post('desc');
		$detail = $this->input->post('detail');

		if ($_FILES['fupload']['name']) {
			if (!$this->upload->do_upload('fupload')){
				$error = $this->upload->display_errors();
				print_r($error);
				return $error;	
			} else {
				$gbr = $this->upload->data();

				$data = array(
					'title' => $title,
					'post_slug' => $slug_title,
					'desc_service' => $desc,
					'detail_service' => $detail,
					'img_service' => $gbr['file_name'],
					'cr_dt_service' => $tglskrg,
					'cr_tm_service' => $jamskrg,
					'cr_user_service' => $this->session->userdata('complete_name')
				);
			}
		} else {
			$data = array(
				'title' => $title,
				'post_slug' => $slug_title,
				'desc_service' => $desc,
				'detail_service' => $detail,
				'cr_dt_service' => $tglskrg,
				'cr_tm_service' => $jamskrg,
				'cr_user_service' => $this->session->userdata('complete_name')
			);
		}
		
		$this->form_validation->set_rules('title','Title','callback_valid_title');

		if ($this->form_validation->run() == false){
			$data['serv_list'] = $this->Service_model->getService()->result();
			$this->template->load('media/template','servicelist/service_list', $data);
		} else {
			$this->Service_model->insertData($data, 'services');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Service has been saved.
                    <br />
                </div>");
			redirect(base_url('servicelist/service_list'));
		}
	}
	
	function updateData(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$path = './img_service/';
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
		$title = $this->input->post('title');
		$slug_title = slug($this->input->post('title'));
		$desc = $this->input->post('desc');
		$detail = $this->input->post('detail');
		$aktif = $this->input->post('aktif');
		
		if ($_FILES['fupload']['name']){
			if (!$this->upload->do_upload('fupload')){
				$error = $this->upload->display_errors();
				print_r($error);
				return $error;
			} else {
				$gbr = $this->upload->data();

				$data = array(
					'title' => $title,
					'post_slug' => $slug_title,
					'desc_service' => $desc,
					'detail_service' => $detail,
					'img_service' => $gbr['file_name'],
					'mod_dt_service' => $tglskrg,
					'mod_tm_service' => $jamskrg,
					'mod_user_service' => $this->session->userdata('complete_name'),
					'isActiveService' => $aktif
				);

				@unlink($path.$fileLama);
			}
		} else {
		
			/*-- update data jika img service tidak diganti --*/
			$data = array(
				'title' => $title,
				'post_slug' => $slug_title,
				'desc_service' => $desc,
				'detail_service' => $detail,
				'mod_dt_service' => $tglskrg,
				'mod_tm_service' => $jamskrg,
				'mod_user_service' => $this->session->userdata('complete_name'),
				'isActiveService' => $aktif
			);
		}

		$where = array(
			'id_service' => $id
			);

		$this->Service_model->getUpdate($where, $data, 'services');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Service has been updated.
                <br />
            </div>");
		redirect(base_url('servicelist/service_list'));		
	}
	
	function deleteData($id){		
		$path = './img_service/';

		$where = array('id_service' => $id);

		/*-- ambil data (img_service) dari tabel services --*/
		$this->db->where('id_service', $id);
		$query = $this->db->get('services');
		$row = $query->row();

		unlink($path.$row->img_service);

		$this->Service_model->getDelete($where, 'id_service');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Service has been deleted.
                <br />
            </div>");
		redirect(base_url('servicelist/service_list'));
	}
	
	function valid_title($titleServ){
		$where = array('title' => $titleServ);
		$res = $this->Service_model->validTitle($where, 'services');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_title','Title already exist.');
			return FALSE;
		}
	}
	
}
?>