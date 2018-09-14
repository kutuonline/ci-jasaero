<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class M_Service extends CI_Model {
 
    public $table = 'services';
    public $id = 'id_service';
    public $active = 'isActiveService';
    public $order = 'DESC';
    
    function __construct(){
        parent::__construct();
    }   
    
    function getWhereService(){
        $this->db->select('*');
        $this->db->where($this->active, 'Y');
        return $this->db->get($this->table);
    }

    /*-- get service by slug --*/
    function getWhere($where, $table){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($where);
        return $this->db->get();
    }
    
}
?>