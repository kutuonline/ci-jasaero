<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Web_model extends CI_Model {
 
    public $table = 'identitas_web';
    public $id = 'id_identitas';
    public $order = 'ASC';
    
    function __construct(){
        parent::__construct();
    }   

    function getWebId(){
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table);
    }
    
    function getUpdate($where, $data, $table){
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }
    
}
?>