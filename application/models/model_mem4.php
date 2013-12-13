<?php

class Model_mem4 extends CI_Model{
    
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
        $this->db->where('username',$username);    
        $query = $this->db->get('usage',10,0);
            
        if($query->num_rows() > 0){
             //$row = $query->row(); 
            return json_encode($query->result());
        } else {
            return false;
        }
    }
    
    public function getSize($username){
        $this->db->where('username',$username);    
        $query = $this->db->get('usage');
        
        if($query->num_rows() > 0){
            return $query->num_rows();
        } else {
            return false;
        }
    }
    
}