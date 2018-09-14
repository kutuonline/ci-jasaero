<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Aboutus_model extends CI_Model {
 
    public $table = 'apps';
    public $id = 'id_app';
    public $order = 'DESC';

    public $table2 = 'facility';
    public $id2 = 'id_facility';
    public $order2 = 'ASC';

    public $table3 = 'profile';
    public $id3 = 'id_profile';
    public $order3 = 'ASC';
    
    function __construct(){
        parent::__construct();
    }   

    function getWhereApproval(){
        $this->db->select('*');
        $this->db->where($this->id3, '3');
        return $this->db->get($this->table3);
    }

    function getWhereStation(){
        $this->db->select('*');
        $this->db->where($this->id3, '6');
        return $this->db->get($this->table3);
    }

    function getWhereCapabilities(){
        $this->db->select('*');
        $this->db->where($this->id3, '5');
        return $this->db->get($this->table3);
    }

    function getWhereCommit(){
        $this->db->select('*');
        $this->db->where($this->id3, '7');
        return $this->db->get($this->table3);
    }

    function getWhereFacility(){
        $this->db->select('*');
        $this->db->where($this->id2, '2');
        return $this->db->get($this->table2);
    }

    function getWhereQis(){
        $this->db->select('*');
        $this->db->where($this->id, '6');
        return $this->db->get($this->table);
    }

    function getWhereSms(){
        $this->db->select('*');
        $this->db->where($this->id, '5');
        return $this->db->get($this->table);
    }

    function getWhereTcs(){
        $this->db->select('*');
        $this->db->where($this->id, '4');
        return $this->db->get($this->table);
    }

    function getWhereEgb(){
        $this->db->select('*');
        $this->db->where($this->id, '3');
        return $this->db->get($this->table);
    }
    
}
?>