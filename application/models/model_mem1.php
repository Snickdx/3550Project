<?php

class Model_mem1 extends CI_Model{

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
    
    public function addUsageTable($u,$d,$t,$c){        
        $data = array(
           'username' => $u ,
           'date' => $d ,
           'time' => $t ,
           'comp_id' => $c
        );

        $this->db->insert('usage', $data); 
		if($this->db->affected_rows() == 1){
            return "<p>Inserted Sucessfully</p>";
        } else {
            return "<p>Error Inserting</p>";
        }
	}
    
    public function addUserTable($u,$p,$t){        
            $shaPass = sha1($p);
            $data = array(
               'username' => $u ,
               'password' => $shaPass ,
               'type' => $t
            );
    
            $this->db->insert('users', $data); 
            if($this->db->affected_rows() == 1){
                return "<p>Inserted Sucessfully</p>";
            } else {
                return "<p>Error Inserting</p>";
            }
    }
    
    public function deleteUser($u){
            $this->db->where('username', $u);
            $this->db->delete('users');
            $this->db->where('username', $u);
            $this->db->delete('usage');
            $this->db->where('username', $u);
            $this->db->delete('log'); 
            if($this->db->affected_rows() > 0){
                return "<p>Deleted Sucessfully</p>";
            } else {
                return "<p>Error Deleting</p>";
            }
    }
    public function editUser($o,$u,$p,$t){
            $tr= "Arr:" . $o .", " . $u .", " . $p .", " . $t;
            $data = array();
            if($u != -999){
                $data['username'] = $u;
            }
            if($p != -999){
                $data['password'] = sha1($p);
            }
            if($t != -999){
                $data['type'] = $t;
            }
                
            $this->db->where('username', $o);
            $this->db->update('users', $data); 

            if($this->db->affected_rows() == 1){
                return "<p>Updated Sucessfully</p>";
            } else {
                return $tr;//"<p>Error Updating</p>";
            }
    }

}
