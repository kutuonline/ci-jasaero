<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_log extends CI_Model {

	public $table = 'trans_log';
    public $id = 'log_id';
    public $order = 'DESC';
    
    function __construct(){
        parent::__construct();
    }   

    function getLogs(){
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table);
    }
 
    public function save_log($param)
    {
        $sql = $this->db->insert_string('trans_log',$param);
        $ex  = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }
}