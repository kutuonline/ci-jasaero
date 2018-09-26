<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Archive_model extends CI_Model {
 
    public $table = 'archive';
    public $id = 'id_archive';
    public $order = 'DESC';
    
    function __construct(){
        parent::__construct();
    }   

    function getArchive(){
        $this->db->order_by($this->id, $this->order);
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
    
    function validArchive($where, $table){
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