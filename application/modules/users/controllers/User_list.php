<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class User_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('User_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['u_list'] = $this->User_model->getUser()->result();
		$this->template->load('media/template','users/user_list', $data);
	}

	function actNew(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$config['upload_path'] = './img_user/';
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
		
		$completeNm = $this->input->post('completenm');
		$pass = md5($this->input->post('passwd'));
		$gender = $this->input->post('gender');
		$phoneNo = $this->input->post('phone_no');		
		$email = $this->input->post('email');
	
		if ($_FILES['foto']['name']){
			if (!$this->upload->do_upload('foto')){
				$error = $this->upload->display_errors();
				print_r($error);
				return $error;	
			} else {
				$gbr = $this->upload->data();
			}
		}
		
		$data = array(
			'complete_name' => $completeNm,
			'gender' => $gender,
			'phone_no' => $phoneNo,
			'email' => $email,
			'photo' => $gbr['file_name'],
			'pass_encrypt' => $pass,
			'users_postdate' => $tglskrg,
			'users_posttime' => $jamskrg,
			'users_postuser' => $this->session->userdata('complete_name')
		);
		
		$this->form_validation->set_rules('completenm','Complete Name','callback_valid_completeName');
		$this->form_validation->set_rules('email','Users email', 'valid_email');

		if ($this->form_validation->run() == false){
			$data['u_list'] = $this->User_model->getUser()->result();
			$this->template->load('media/template','users/user_list', $data);
		} else {
			$this->User_model->insertData($data, 'users');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Data has been saved.
                    <br />
                </div>");
			redirect(base_url('users/user_list'));
		}
	}
	
	function updateData(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$path = './img_user/';
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
		$completeNm = $this->input->post('completenm');
		//$pass = md5($this->input->post('passwd'));
		$gender = $this->input->post('gender');
		$phoneNo = $this->input->post('phone_no');		
		$email = $this->input->post('email');
		$ulevel = $this->input->post('ulevel');
		
		if ($_FILES['foto']['name']){
			if (!$this->upload->do_upload('foto')){
				$error = $this->upload->display_errors();
				print_r($error);
				return $error;
			} else {
				$gbr = $this->upload->data();

				$data = array(
					'complete_name' => $completeNm,
					'gender' => $gender,
					'phone_no' => $phoneNo,
					'email' => $email,
					'photo' => $gbr['file_name'],
					'users_level' => $ulevel,
					//'pass_encrypt' => $pass,
					'users_moddate' => $tglskrg,
					'users_modtime' => $jamskrg,
					'users_moduser' => $this->session->userdata('complete_name')
				);

				@unlink($path.$fileLama);
			}
		} else {
		
		/*-- update data jika foto user tidak diganti --*/
		$data = array(
			'complete_name' => $completeNm,
			'gender' => $gender,
			'phone_no' => $phoneNo,
			'email' => $email,
			'users_level' => $ulevel,
			//'pass_encrypt' => $pass,
			'users_moddate' => $tglskrg,
			'users_modtime' => $jamskrg,
			'users_moduser' => $this->session->userdata('complete_name')
			);
		}

		$where = array(
			'users_id' => $id
			);

		$this->form_validation->set_rules('email','Email','valid_email');

		if ($this->form_validation->run() == false){
			$this->template->load('media/template','users/user_list');
		} else {
			$this->User_model->getUpdate($where, $data, 'users');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Data has been saved.
                    <br />
                </div>");
			redirect(base_url('users/user_list'));
		}
	}
	
	function deleteData($id){		
		$path = './img_user/';

		$where = array('users_id' => $id);

		/*-- ambil data (foto_user) dari tabel user --*/
		$this->db->where('users_id', $id);
		$query = $this->db->get('users');
		$row = $query->row();

		unlink($path.$row->photo);

		$this->User_model->getDelete($where, 'users_id');
		$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Data has been deleted.
                    <br />
                </div>");
		redirect(base_url('users/user_list'));
	}
	
	function valid_completeName($user){
		$where = array('complete_name' => $user);
		$res = $this->User_model->validUser($where, 'users');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_completeName','User already exist.');
			return FALSE;
		}
	}
 
}
?>