<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Web_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('Web_model');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session'));
	}

	function index(){
		/*-- show all data menu in the datatable --*/
		$data['w_list'] = $this->Web_model->getWebId()->result();
		$this->template->load('media/template','id_web/web_list', $data);
	}

	function updateData(){
		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");

		$id = $this->input->post('id');
		$department = $this->input->post('department');
		$websitenm = $this->input->post('website_nm');
		$corporatenm = $this->input->post('corporate_nm');
		$address = $this->input->post('address');
		$postalcode = $this->input->post('postalcode');
		$phone = $this->input->post('phone');
		$fax = $this->input->post('fax');
		$pic_email1 = $this->input->post('picemail1');
		$email1 = $this->input->post('email1');
		$pic_email2 = $this->input->post('picemail2');
		$email2 = $this->input->post('email2');
		$pic_email3 = $this->input->post('picemail3');
		$email3 = $this->input->post('email3');
		$url = $this->input->post('url');
		$fb = $this->input->post('fb');
		$twitter = $this->input->post('twitter');
		$ig = $this->input->post('ig');
		$wnote = $this->input->post('wnote');
		$desc = $this->input->post('desc');
		$key = $this->input->post('key');

		$data = array(
			'website_name' => $websitenm,
			'department' => $department,
			'corp_name' => $corporatenm,
			'corp_address' => $address,
			'postal_code' => $postalcode,
			'phone_no' => $phone,
			'fax_no' => $fax,
			'pic_email1' => $pic_email1,
			'email1' => $email1,
			'pic_email2' => $pic_email2,
			'email2' => $email2,
			'pic_email3' => $pic_email3,
			'email3' => $email3,
			'url' => $url,
			'facebook' => $fb,
			'twitter' => $twitter,
			'instagram' => $ig,
			'welcome_note' => $wnote,
			'meta_desc' => $desc,
			'meta_keyword' => $key,
			'mod_dt_webid' => $tglskrg,
			'mod_tm_webid' => $jamskrg,
			'mod_user_webid' => $this->session->userdata('complete_name')
			);

		$where = array(
			'id_identitas' => $id
			);

		$this->Web_model->getUpdate($where, $data, 'identitas_web');
		$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Web identity has been updated.
                    <br />
                </div>");

		redirect(base_url('id_web/web_list'));
	}
	
}
?>