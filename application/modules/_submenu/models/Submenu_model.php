<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Submenu_model extends CI_Model {
 
    public $table = 'submenu';
    public $id = 'id_submenu';
    public $order = 'ASC';

    public $table2 = 'mn_utama';
    public $id2 = 'id_mnUtama';
    public $order2 = 'ASC';
    
    function __construct(){
        parent::__construct();
    }   

    function getSubmenu(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->table2, 'submenu.id_mnUtama = mn_utama.id_mnUtama');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get();
    }

    /*-- get data from menu_utama for showing on the select --*/
    function getMenu(){
        $this->db->select('*');
        $this->db->from($this->table2);
        $this->db->order_by($this->id2, $this->order2);
        return $this->db->get();
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
    
    function validSubmenu($where, $table){
        $this->db->where($where);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0){
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*-- selected value from dropdown list --*/
    function dropdownList($where, $table){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->table2, 'submenu.id_mnUtama = mn_utama.id_mnUtama');
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $rec = $this->db->get();

        $data = array();
        $data[0] = 'SELECT';

        foreach($rec->result() as $row){
            $data[$row->id_mnUtama] = $row->label_mnUtama;
        }
        return $data;
    }

}
?>