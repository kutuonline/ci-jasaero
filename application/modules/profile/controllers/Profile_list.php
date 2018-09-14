<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Profile_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('Profile_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['p_list'] = $this->Profile_model->getProfile()->result();
		$this->template->load('media/template','profile/profile_list', $data);
	}

	function actNew(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$config['upload_path'] = './img_profile/';
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
		$desc = $this->input->post('desc');
	
		if ($_FILES['fupload']['name']){
			if (!$this->upload->do_upload('fupload')){
				$error = $this->upload->display_errors();
				print_r($error);
				return $error;	
			} else {
				$gbr = $this->upload->data();

				$data = array(
					'title_profile' => $title,
					'desc_profile' => $desc,
					'img_profile' => $gbr['file_name'],
					'cr_dt_profile' => $tglskrg,
					'cr_tm_profile' => $jamskrg,
					'cr_user_profile' => $this->session->userdata('complete_name')
				);
			}
		} else {
			$data = array(
				'title_profile' => $title,
				'desc_profile' => $desc,
				'cr_dt_profile' => $tglskrg,
				'cr_tm_profile' => $jamskrg,
				'cr_user_profile' => $this->session->userdata('complete_name')
			);
		}
		
		$this->form_validation->set_rules('title','Title','callback_valid_title');

		if ($this->form_validation->run() == false){
			$data['p_list'] = $this->Profile_model->getProfile()->result();
			$this->template->load('media/template','profile/profile_list', $data);
		} else {
			$this->Profile_model->insertData($data, 'profile');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Profile has been saved.
                    <br />
                </div>");
			redirect(base_url('profile/profile_list'));
		}
	}
	
	function updateData(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$path = './img_profile/';
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
					'title_profile' => $title,
					'desc_profile' => $desc,
					'img_profile' => $gbr['file_name'],
					'mod_dt_profile' => $tglskrg,
					'mod_tm_profile' => $jamskrg,
					'mod_user_profile' => $this->session->userdata('complete_name'),
					'isActiveProfile' => $aktif
				);

				@unlink($path.$fileLama);
			}
		} else {
		
			/*-- update data jika img service tidak diganti --*/
			$data = array(
				'title_profile' => $title,
				'desc_profile' => $desc,
				'mod_dt_profile' => $tglskrg,
				'mod_tm_profile' => $jamskrg,
				'mod_user_profile' => $this->session->userdata('complete_name'),
				'isActiveProfile' => $aktif
			);
		}

		$where = array(
			'id_profile' => $id
			);

		$this->Profile_model->getUpdate($where, $data, 'profile');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Profile has been updated.
                <br />
            </div>");
		redirect(base_url('profile/profile_list'));		
	}
	
	function deleteData($id){		
		$path = './img_profile/';

		$where = array('id_profile' => $id);

		/*-- ambil data (img_profile) dari tabel profile --*/
		$this->db->where('id_profile', $id);
		$query = $this->db->get('profile');
		$row = $query->row();

		unlink($path.$row->img_profile);

		$this->Profile_model->getDelete($where, 'id_profile');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Profile has been deleted.
                <br />
            </div>");
		redirect(base_url('profile/profile_list'));
	}
	
	function valid_title($titleProf){
		$where = array('title_profile' => $titleProf);
		$res = $this->Profile_model->validTitle($where, 'profile');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_title','Title already exist.');
			return FALSE;
		}
	}
	
}
?>