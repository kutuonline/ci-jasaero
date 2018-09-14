<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class M_Contactlist extends CI_Model {
 
    public $table = 'contact';
    public $id = 'id_contact';
    public $order = 'DESC';
    
    function __construct(){
        parent::__construct();
    }   

    function getMsg(){
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table);
    }

}
?>