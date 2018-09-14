<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Cust_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('Cust_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['cust_list'] = $this->Cust_model->getCust()->result();
		$this->template->load('media/template','customer/cust_list', $data);
	}

	function actNew(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$config['upload_path'] = './img_customer/';
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
		
		$custnm = $this->input->post('custNm');
	
		if ($_FILES['fupload']['name']){
			if (!$this->upload->do_upload('fupload')){
				$error = $this->upload->display_errors();
				print_r($error);
				return $error;	
			} else {
				$gbr = $this->upload->data();

				$data = array(
					'cust_name' => $custnm,
					'cust_logo' => $gbr['file_name'],
					'post_date_cust' => $tglskrg,
					'post_time_cust' => $jamskrg,
					'post_user_cust' => $this->session->userdata('complete_name')
				);
			}
		} else {
			$data = array(
				'cust_name' => $custnm,
				'post_date_cust' => $tglskrg,
				'post_time_cust' => $jamskrg,
				'post_user_cust' => $this->session->userdata('complete_name')
			);
		}
		
		$this->form_validation->set_rules('custNm','Customer Name','callback_valid_customer');

		if ($this->form_validation->run() == false){
			$data['cust_list'] = $this->Cust_model->getCust()->result();
			$this->template->load('media/template','customer/cust_list', $data);
		} else {
			$this->Cust_model->insertData($data, 'customer');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Customer has been saved.
                    <br />
                </div>");
			redirect(base_url('customer/cust_list'));
		}
	}
	
	function updateData(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$path = './img_customer/';
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
		$custnm = $this->input->post('custNm');
		$aktif = $this->input->post('aktif');
		
		if ($_FILES['fupload']['name']){
			if (!$this->upload->do_upload('fupload')){
				$error = $this->upload->display_errors();
				print_r($error);
				return $error;
			} else {
				$gbr = $this->upload->data();

				$data = array(
					'cust_name' => $custnm,
					'cust_logo' => $gbr['file_name'],
					'mod_date_cust' => $tglskrg,
					'mod_time_cust' => $jamskrg,
					'mod_user_cust' => $this->session->userdata('complete_name'),
					'isActiveCust' => $aktif
				);

				@unlink($path.$fileLama);
			}
		} else {
		
			/*-- update data jika img news tidak diganti --*/
			$data = array(
				'cust_name' => $custnm,
				'mod_date_cust' => $tglskrg,
				'mod_time_cust' => $jamskrg,
				'mod_user_cust' => $this->session->userdata('complete_name'),
				'isActiveCust' => $aktif
			);
		}

		$where = array(
			'id_cust' => $id
			);

		$this->Cust_model->getUpdate($where, $data, 'customer');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Customer has been updated.
                <br />
            </div>");
		redirect(base_url('customer/cust_list'));		
	}
	
	function deleteData($id){		
		$path = './img_customer/';

		$where = array('id_cust' => $id);

		/*-- ambil data (img_news) dari tabel news --*/
		$this->db->where('id_cust', $id);
		$query = $this->db->get('customer');
		$row = $query->row();

		unlink($path.$row->cust_logo);

		$this->Cust_model->getDelete($where, 'id_cust');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Customer has been deleted.
                <br />
            </div>");
		redirect(base_url('customer/cust_list'));
	}
	
	function valid_customer($cust){
		$where = array('cust_name' => $cust);
		$res = $this->Cust_model->validCust($where, 'customer');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_customer','Customer already exist.');
			return FALSE;
		}
	}
	
}
?>