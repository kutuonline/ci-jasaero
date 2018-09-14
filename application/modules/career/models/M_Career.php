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

    function getWhereCareer(){
        $this->db->select('*');
        $this->db->where($this->active, 'Y');
        return $this->db->get($this->table);
    }

}
?>