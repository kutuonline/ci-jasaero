<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class M_home extends CI_Model {
 
    public $table = 'identitas_web';
    public $id = 'id_identitas';
    public $order = 'DESC';

    public $table2 = 'services';
    public $id2 = 'id_service';
    public $order2 = 'ASC';

    public $table3 = 'profile';
    public $id3 = 'id_profile';
    public $order3 = 'ASC';

    public $table4 = 'customer';
    public $id4 = 'id_cust';
    public $order4 = 'ASC';

    public $table5 = 'slider';
    public $id5 = 'id_slider';
    public $order5 = 'ASC';
    
    function __construct(){
        parent::__construct();
    }   

    function getId(){
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table);
    }

    function getService(){
        $this->db->order_by($this->id2, $this->order2);
        return $this->db->get($this->table2);
    }

    function getCust(){
        $this->db->order_by($this->id4, $this->order4);
        return $this->db->get($this->table4);
    }

    function getWhereProfile(){
        $this->db->select('*');
        $this->db->where($this->id3, '2');
        return $this->db->get($this->table3);
    }

    function getWhereCust(){
        $this->db->select('*');
        $this->db->where($this->id3, '4');
        return $this->db->get($this->table3);
    }

    function getWhereService(){
        $this->db->select('*');
        $this->db->where($this->id3, '8');
        return $this->db->get($this->table3);
    }

    function getSlider(){
        $this->db->order_by($this->id5, $this->order5);
        return $this->db->get($this->table5);
    }

}
?>