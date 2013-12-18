<?php

class Model_supervisor extends CI_Model{
   
	public function getTodayUsage($t){
        $this->db->distinct();
        $this->db->select('username');
        $this->db->where('date',$t);
		$query = $this->db->get('usage');
		if($query->num_rows() > 0){
            return json_encode($query->result());
        } else {
            return false;
        }
	}
    
    public function getAllTodayUsage($t){
		$this->db->where('date',$t);
		$query = $this->db->get('usage');
		if($query->num_rows() > 0){
            return json_encode($query->result());
        } else {
            return false;
        }
	}
    
    public function getTodayCompUsage($t){
        $this->db->distinct();
        $this->db->select('comp_id');
		$this->db->where('date',$t);
		$query = $this->db->get('usage');
		if($query->num_rows() > 0){
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
            return json_encode($query->result());
        } else {
            return ;
        }
	} 
    
    public function getTodayCompLogTable($t,$c){
		$this->db->where('date',$t);
		$this->db->where('comp_id',$c);
		$query = $this->db->get('usage');
		if($query->num_rows() > 0){ 
            return json_encode($query->result());
        } else {
            return ;
        }
	}
    
    public function getTodayGraph($t){

		$this->db->where('date',$t);
		$query = $this->db->get('usage');
		if($query->num_rows() > 0){
            return json_encode($query->result());
        } else {
            return false;
        }
	}


}