<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class M_Contact extends CI_Model {
 
    public $table = 'contact';
    public $id = 'id_contact';
    public $order = 'DESC';
    
    function __construct(){
        parent::__construct();
    }   

    function insertData($data, $table){
        $this->db->insert($this->table, $data);
    }

}
?>