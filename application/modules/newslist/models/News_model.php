<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class News_model extends CI_Model {
 
    public $table = 'news';
    public $id = 'id_news';
    public $order = 'DESC';

    public $table2 = 'archive';
    public $id2 = 'id_archive';
    public $order2 = 'DESC';
    
    function __construct(){
        parent::__construct();
    }   

    function getNews(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->table2, 'news.id_archive = archive.id_archive');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get();
    }

    /*-- join table between news and archive --*/
    function getWhere($where, $table){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->table2, 'news.id_archive = archive.id_archive');
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get();
    }

    /*-- get data from archive to show up into combobox --*/
    function getListArchive(){
        $this->db->select('*');
        $this->db->from($this->table2);
        $this->db->order_by($this->id2, $this->order2);
        return $this->db->get();
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
    
    function validHeadline($where, $table){
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
        $this->db->join($this->table2, 'news.id_archive = archive.id_archive');
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $rec = $this->db->get();

        $data = array();
        $data[0] = 'SELECT';

        foreach($rec->result() as $row){
            $data[$row->id_archive] = $row->nm_archive;
        }
        return $data;
    }
    
}
?>