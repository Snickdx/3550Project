<?php

class Model_admin extends CI_Model{

    
    public function getUniqueUsers(){
		$this->db->distinct();
		$this->db->select('username');
		$query = $this->db->get('users');
		if($query->num_rows() >0){
			return json_encode($query->result());
		}
		else{
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
            if($this->db->affected_rows() >= 0){
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
