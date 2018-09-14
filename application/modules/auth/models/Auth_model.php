<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Auth_model extends CI_Model{

	public $table = 'users';
	
	function __construct(){
		parent::__construct();
	}

	function cekLogin(){
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('pass_encrypt', md5($this->input->post('passwd')));
		$login = $this->db->get($this->table);

		if ($login->num_rows() == 1){
			return $login->result_array();
		}
	}
}
?>