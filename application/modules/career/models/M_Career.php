<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class M_Career extends CI_Model {
 
    public $table = 'career';
    public $id = 'id_career';
    public $active = 'isActiveCareer';
    public $order = 'DESC';
    
    function __construct(){
        parent::__construct();
    }   

    /*-- get career where isActiveNews = Y --*/
    function getWhereCareer($limit, $start){
        $this->db->select('*');
        $this->db->where($this->active, 'Y');
        return $this->db->get($this->table, $limit, $start);
    }

    /*-- get carrer by career_slug --*/
    function getWhere($where, $table){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($where);
        return $this->db->get();
    }

}
?>