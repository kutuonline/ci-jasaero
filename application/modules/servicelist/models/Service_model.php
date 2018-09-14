<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Service_model extends CI_Model {
 
    public $table = 'services';
    public $id = 'id_service';
    public $slug = 'post_slug';
    public $order = 'DESC';
    
    function __construct(){
        parent::__construct();
    }   

    function getService(){
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table);
    }

    function getPostBySlug($slug){
        $this->db->select('*');
        $this->db->where($this->slug, $slug);
        return $this->db->get($this->table);
    }

    function insertData($data, $table){
        $this->db->insert($this->table, $data);
    }

    function getUpdate($where, $data, $table){
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }

    function getDelete($where, $table){
        $this->db->where($where);
        $this->db->delete($this->table);
    }
    
    function validTitle($where, $table){
        $this->db->where($where);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0){
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
}
?>