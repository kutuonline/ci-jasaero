<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class M_News extends CI_Model {
 
    public $table = 'news';
    public $id = 'id_news';
    public $active = 'isActiveNews';
    public $order = 'DESC';
    
    function __construct(){
        parent::__construct();
    }   

    function getWhereNews(){
        $this->db->select('*');
        $this->db->where($this->active, 'Y');
        return $this->db->get($this->table);
    }

    /*-- get news by slug --*/
    function getWhere($where, $table){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($where);
        return $this->db->get();
    }
    
}
?>