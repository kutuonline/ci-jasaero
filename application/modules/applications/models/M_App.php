<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class M_App extends CI_Model {
 
    public $table = 'apps';
    public $id = 'id_app';
    public $active = 'isActiveApp';
    public $order = 'DESC';
    
    function __construct(){
        parent::__construct();
    }   

    function getWhereAppQis(){
        $this->db->select('*');
        $this->db->where($this->id, '6');
        return $this->db->get($this->table);
    }

    function getWhereAppSms(){
        $this->db->select('*');
        $this->db->where($this->id, '5');
        return $this->db->get($this->table);
    }

    function getWhereAppTcs(){
        $this->db->select('*');
        $this->db->where($this->id, '4');
        return $this->db->get($this->table);
    }

    function getWhereAppEgb(){
        $this->db->select('*');
        $this->db->where($this->id, '3');
        return $this->db->get($this->table);
    }

    function getWhereCctvJkt(){
        $this->db->select('*');
        $this->db->where($this->id, '8');
        return $this->db->get($this->table);
    }

    function getWhereCctvSub(){
        $this->db->select('*');
        $this->db->where($this->id, '9');
        return $this->db->get($this->table);
    }

    function getWhereCctvDps(){
        $this->db->select('*');
        $this->db->where($this->id, '10');
        return $this->db->get($this->table);
    }

}
?>