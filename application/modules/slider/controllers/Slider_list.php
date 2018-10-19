<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Slider_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('Slider_model');
		$this->load->model('log/M_log');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['s_list'] = $this->Slider_model->getSlider()->result();
		$this->template->load('media/template','slider/slider_list', $data);
	}

	function actNew(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$config['upload_path'] = './img_slider/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '2048';
		$config['max_width'] = '2024';
		$config['max_height'] = '768';

		/*-- hapus spasi pada nama file foto --*/
		$config['remove_space'] = TRUE;
 		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);		
		/*-- end --*/

		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");
		
		$imgname = $this->input->post('imagenm');
		$desc = $this->input->post('desc');
	
		if ($_FILES['fupload']['name']){
			if (!$this->upload->do_upload('fupload')){
				$error = $this->upload->display_errors();
				print_r($error);
				return $error;	
			} else {
				$gbr = $this->upload->data();

				$data = array(
					'slider_name' => $imgname,
					'desc_slider' => $desc,
					'img_slider' => $gbr['file_name'],
					'post_date_slider' => $tglskrg,
					'post_time_slider' => $jamskrg,
					'post_user_slider' => $this->session->userdata('complete_name')
				);
			}
		} else {
			$data = array(
				'slider_name' => $imgname,
				'desc_slider' => $desc,
				'post_date_slider' => $tglskrg,
				'post_time_slider' => $jamskrg,
				'post_user_slider' => $this->session->userdata('complete_name')
			);
		}
		
		$this->form_validation->set_rules('imagenm','Image','callback_valid_image');

		if ($this->form_validation->run() == false){
			$data['s_list'] = $this->Slider_model->getSlider()->result();
			$this->template->load('media/template','slider/slider_list', $data);
		} else {
			$this->Slider_model->insertData($data, 'slider');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	Image slider has been saved.
                    <br />
                </div>");
			helper_log("add", "Add/save image slider.");
			redirect(base_url('slider/slider_list'));
		}
	}
	
	function updateData(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$path = './img_slider/';
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '2048';
		$config['max_width'] = '2024';
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
		$imgname = $this->input->post('imagenm');
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
					'slider_name' => $imgname,
					'desc_slider' => $desc,
					'img_slider' => $gbr['file_name'],
					'mod_date_slider' => $tglskrg,
					'mod_time_slider' => $jamskrg,
					'mod_user_slider' => $this->session->userdata('complete_name'),
					'isActiveSlider' => $aktif
				);

				@unlink($path.$fileLama);
			}
		} else {
		
			/*-- update data jika img service tidak diganti --*/
			$data = array(
				'slider_name' => $imgname,
				'desc_slider' => $desc,
				'mod_date_slider' => $tglskrg,
				'mod_time_slider' => $jamskrg,
				'mod_user_slider' => $this->session->userdata('complete_name'),
				'isActiveSlider' => $aktif
			);
		}

		$where = array(
			'id_slider' => $id
			);

		$this->Slider_model->getUpdate($where, $data, 'slider');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Image slider has been updated.
                <br />
            </div>");
		helper_log("edit", "Edit/update image slider.");
		redirect(base_url('slider/slider_list'));		
	}
	
	function deleteData($id){		
		$path = './img_slider/';

		$where = array('id_slider' => $id);

		/*-- ambil data (img_slider) dari tabel slider --*/
		$this->db->where('id_slider', $id);
		$query = $this->db->get('slider');
		$row = $query->row();

		unlink($path.$row->img_slider);

		$this->Slider_model->getDelete($where, 'id_slider');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                Image slider has been deleted.
                <br />
            </div>");
		helper_log("delete", "Delete image slider.");
		redirect(base_url('slider/slider_list'));
	}
	
	function valid_image($sliderNm){
		$where = array('slider_name' => $sliderNm);
		$res = $this->Slider_model->validImage($where, 'slider');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_image','Image slider already exist.');
			return FALSE;
		}
	}
	
}
?>