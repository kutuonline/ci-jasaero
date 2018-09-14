<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Mnutama_model extends CI_Model {
 
    public $table = 'mn_utama';
    public $id = 'id_mnUtama';
    public $order = 'ASC';
    
    function __construct(){
        parent::__construct();
    }   

    /*-- show all data menu in the datatable --*/
    function getMnUtama(){
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table);
    }
    
    /*
    function getWhere($where, $table){
        return $this->db->get_where($this->table, $where);
    }
    */
        
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
    
    function validLabel($where, $table){
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