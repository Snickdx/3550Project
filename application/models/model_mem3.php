<?php

class Model_mem3 extends CI_Model{
    
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
	
	public function getTodayUsage($t){

		$this->db->where('date',$t);
		$query = $this->db->get('usage');
		if($query->num_rows() > 0){
             //$row = $query->row(); 
            return json_encode($query->result());
        } else {
            return false;
        }
	}
    
    public function getTodayLogTable($t,$u){

		$this->db->where('date',$t);
		$this->db->where('username',$u);
		$query = $this->db->get('usage');
		if($query->num_rows() > 0){
             //$row = $query->row(); 
            return json_encode($query->result());
        } else {
            return false;
        }
	}
}