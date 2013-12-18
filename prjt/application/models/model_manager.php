<?php

class Model_manager extends CI_Model{

	public function getUniqueDateLogTable(){
		$this->db->distinct();
		$this->db->select('date');
		$query = $this->db->get('usage');
		if($query->num_rows() >0){
			return json_encode($query->result());
		}
		else{
			return false;
		}
	}
	
	public function getDateLogs($t){
		$this->db->where('date',$t);
		$query = $this->db->get('usage');
		if($query->num_rows() > 0){
			return json_encode($query->result());
		}
		else{
			return ;
			} 
	}
	
	public function getUniqueIdLogTable(){
		$this->db->distinct();
		$this->db->select('username');
		$query = $this->db->get('usage');
		if($query->num_rows() >0){
			return json_encode($query->result());
		}
		else{
			return false;
		}
	}
	
	public function getUniqueIdLogTable2(){
		$this->db->distinct();
		$this->db->select('username');
		$query = $this->db->get('log');
		if($query->num_rows() >0){
			return json_encode($query->result());
		}
		else{
			return false;
		}
	}
	
	public function getIdLogs($t){
		$this->db->where('username',$t);
		$query = $this->db->get('usage');
		if($query->num_rows() > 0){
			return json_encode($query->result());
		}
		else{
			return ;
			}
	
	}
	
	public function getIdLogs2($t){
		$this->db->where('username',$t);
		$query = $this->db->get('log');
		if($query->num_rows() > 0){
			return json_encode($query->result());
		}
		else{
			return ;
			}
	
	}
	
	public function getUniqueCompLogTable(){
		$this->db->distinct();
		$this->db->select('comp_id');
		$query = $this->db->get('usage');
		if($query->num_rows() >0){
			return json_encode($query->result());
		}
		else{
			return false;
		}
	}
	
	public function getCompLogs($t){
		$this->db->where('comp_id',$t);
		$query = $this->db->get('usage');
		if($query->num_rows() > 0){
			return json_encode($query->result());
		}
		else{
			return ;
			}
	
	}

	
	public function getAllUsage(){
	
		$query = $this->db->get('usage');
		if($query->num_rows() > 0){
            return json_encode($query->result());
        } else {
            return false;
        }
	}
    
    public function getWebLogTable(){
		$query = $this->db->get('log');
		if($query->num_rows() > 0){
            return json_encode($query->result());
        } else {
            return false;
        }
	}

}
