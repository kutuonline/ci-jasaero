<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class M_Archives extends CI_Model {
 
    public $table = 'archive';
    public $id = 'id_archive';
    public $active = 'isActiveArchive';
    public $order = 'DESC';

    public $table2 = 'news';
    public $id2 = 'id_news';
    public $active2 = 'isActiveNews';
    
    function __construct(){
        parent::__construct();
    }   

    function getArchive(){
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table);
    }

    /*-- join table between news and archive --*/
    function getWhere($where, $table){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->table2, 'news.id_archive = archive.id_archive');
        $this->db->where($where);
        return $this->db->get();
    }

}
?>