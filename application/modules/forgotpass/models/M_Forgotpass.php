<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class M_Forgotpass extends CI_Model{

	public $table = 'users';
	public $table2 = 'tokens';
	
	function __construct(){
		parent::__construct();
	}

	function register($data){
		$this->db->insert($this->table, $data);
	}

	/*-- get data user by id --*/
	public function getUserInfo($id){
		$query = $this->db->get_where($this->table, array('users_id' => $id), 1);
		if($this->db->affected_rows() > 0){
			$row = $query->row();
			return $row;
		} else {
			error_log('No user found getUserInfo('.$id.')');
			return false;
		}
	}

	/*-- get data user by email --*/
	public function getUserInfoByEmail($email){
		$query = $this->db->get_where($this->table, array('email' => $email), 1);
		if($this->db->affected_rows() > 0){
			$row = $query->row();
			return $row;
		}
	}

	/*-- insert token into table tokens --*/
	public function insertToken($users_id){
		$token = substr(sha1(rand()), 0 ,30);
		$date = date("Y-m-d");

		$string = array(
			'token' => $token,
			'users_id' => $users_id,
			'created_date' => $date
			);

		$query = $this->db->insert_string($this->table2, $string);
		$this->db->query($query);
		return $token.$users_id;
	}

	public function isTokenValid($token){
		$tkn = substr($token, 0, 30);
		$uid = substr($token, 30);

		$query = $this->db->get_where($this->table2, array(
			'tokens.token' => $tkn,
			'tokens.users_id' => $uid), 1);

		if($this->db->affected_rows() > 0){
			$row = $query->row();

			$created = $row->created_date;
			$createdTS = strtotime($created);
			$today = date('Y-m-d');
			$todayTS = strtotime($today);

			if($createdTS != $todayTS){
				return false;
			}

			$user_info = $this->getUserInfo($row->users_id);
			return $user_info;
		} else {
			return false;
		}
	}

	public function updatePass($post){
		$this->db->where('users_id', $post['users_id']);
		$this->db->update($this->table, array('pass_encrypt' => $post['password']));
		return true;
	}

}
?>