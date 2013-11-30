<?php

class Model_users extends CI_Model{
    
    public function can_log_in(){
        
        $this->db->where('username',$this->input->post('username'));
        $this->db->where('password',sha1($this->input->post('password')));
        
        $query = $this->db->get('users');
        
        if($query->num_rows() == 1){
            return true;         
        } else {
            return false;
        }
    }
    
    public function getType($username){

        $this->db->where('username',$username);
        
        $query = $this->db->get('users');
        if($query->num_rows() == 1){
             $row = $query->row(); 
            return $row->type;         
        } else {
            return false;
        }
        //return $query;
    }
    
    public function getSpecificId($username){

        $this->db->where('username',$username);
        
        $query = $this->db->get('users');
            
        if($query->num_rows() == 1){
             $row = $query->row(); 
            return json_encode($row);         
        } else {
            return false;
        }
        //return $query;
    }
    
    public function getSpecificUsage($username){
        //$sql = "SELECT * FROM  `usage` WHERE  `username` =868;";
        //$this->db->query($sql);
        $this->db->where('username',$username);
        
        $query = $this->db->get('usage');
            
        if($query->num_rows() > 0){
             //$row = $query->row(); 
            return json_encode($query->result());
        } else {
            return false;
        }
        //return $query;
    }
}