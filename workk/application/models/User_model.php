<?php
class User_model extends CI_Model{
    public function insert($data) {
        $this->db->insert('res',$data);
    }
    public function all(){
        return $this->db->get('res')->result_array();
    }
}
?>