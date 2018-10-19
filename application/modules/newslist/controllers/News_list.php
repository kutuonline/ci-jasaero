<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class News_list extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('News_model');
		$this->load->model('log/M_log');
		$this->load->helper(array('form','fungsidate_helper','url'));
		$this->load->library(array('form_validation','session','upload'));
	}

	function index(){
		$data['n_list'] = $this->News_model->getNews()->result();
		$data['newslist'] = $this->News_model->getListArchive()->result();
		$this->template->load('media/template','newslist/news_list', $data);
	}
	
	function editData($id){
		$where = array('id_news' => $id);
		$data['l_archive'] = $this->News_model->dropdownList($where, 'news')->result();
		$data['newslist'] = $this->News_model->getListArchive()->result();
		$this->template->load('media/template','newslist/news_archive', $data);
	}
	
	function actNew(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$config['upload_path'] = './img_news/';
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
		
		$headln = $this->input->post('headln');
		$nmarchive = $this->input->post('nmarchive');
		$slug_headln = slug($this->input->post('headln'));
		$desc = $this->input->post('desc');
		$vol_no = $this->input->post('vol_no');
	
		if ($_FILES['fupload']['name']){
			if (!$this->upload->do_upload('fupload')){
				$error = $this->upload->display_errors();
				print_r($error);
				return $error;	
			} else {
				$gbr = $this->upload->data();

				$data = array(
					'id_archive' => $nmarchive,
					'headline' => $headln,
					'news_slug' => $slug_headln,
					'desc_news' => $desc,
					'vol_no_magz' => $vol_no,
					'img_news' => $gbr['file_name'],
					'post_date_news' => $tglskrg,
					'post_time_news' => $jamskrg,
					'post_user_news' => $this->session->userdata('complete_name')
				);
			}
		} else {
			$data = array(
				'id_archive' => $nmarchive,
				'headline' => $headln,
				'news_slug' => $slug_headln,
				'desc_news' => $desc,
				'vol_no_magz' => $vol_no,
				'post_date_news' => $tglskrg,
				'post_time_news' => $jamskrg,
				'post_user_news' => $this->session->userdata('complete_name')
			);
		}
		
		$this->form_validation->set_rules('headln','Headline','callback_valid_headline');

		if ($this->form_validation->run() == false){
			$data['n_list'] = $this->News_model->getNews()->result();
			$this->template->load('media/template','newslist/news_list', $data);
		} else {
			$this->News_model->insertData($data, 'news');
			$this->session->set_flashdata("success",
				"<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button><i class='fa fa-check-circle'></i>

                   	News has been saved.
                    <br />
                </div>");

			helper_log("add", "Add/save news list.");
			redirect(base_url('newslist/news_list'));
		}
	}
	
	function updateData(){
		/*-- upload file --*/
		$nmfile = "file_".time();
		$path = './img_news/';
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
		$nmarchive = $this->input->post('nmarchive');
		$fileLama = $this->input->post('filelama');
		$headln = $this->input->post('headln');
		$slug_headln = slug($this->input->post('headln'));
		$vol_no = $this->input->post('vol_no');
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
					'id_archive' => $nmarchive,
					'headline' => $headln,
					'news_slug' => $slug_headln,
					'desc_news' => $desc,
					'vol_no_magz' => $vol_no,
					'img_news' => $gbr['file_name'],
					'mod_date_news' => $tglskrg,
					'mod_time_news' => $jamskrg,
					'mod_user_news' => $this->session->userdata('complete_name'),
					'isActiveNews' => $aktif
				);

				@unlink($path.$fileLama);
			}
		} else {
		
			/*-- update data jika img news tidak diganti --*/
			$data = array(
				'id_archive' => $nmarchive,
				'headline' => $headln,
				'news_slug' => $slug_headln,
				'desc_news' => $desc,
				'vol_no_magz' => $vol_no,
				'mod_date_news' => $tglskrg,
				'mod_time_news' => $jamskrg,
				'mod_user_news' => $this->session->userdata('complete_name'),
				'isActiveNews' => $aktif
			);
		}

		$where = array(
			'id_news' => $id
			);

		$this->News_model->getUpdate($where, $data, 'news');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                News has been updated.
                <br />
            </div>");

		helper_log("edit", "Edit/update news list.");
		redirect(base_url('newslist/news_list'));		
	}
	
	function deleteData($id){		
		$path = './img_news/';

		$where = array('id_news' => $id);

		/*-- ambil data (img_news) dari tabel news --*/
		$this->db->where('id_news', $id);
		$query = $this->db->get('news');
		$row = $query->row();

		unlink($path.$row->img_news);

		$this->News_model->getDelete($where, 'id_news');
		$this->session->set_flashdata("success",
			"<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                </button><i class='fa fa-check-circle'></i>

                News has been deleted.
                <br />
            </div>");

		helper_log("delete", "Delete news list.");
		redirect(base_url('newslist/news_list'));
	}
	
	function valid_headline($headln){
		$where = array('headline' => $headln);
		$res = $this->News_model->validHeadline($where, 'news');

		if ($res == true){
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_headline','Headline already exist.');
			return FALSE;
		}
	}
	
}
?>