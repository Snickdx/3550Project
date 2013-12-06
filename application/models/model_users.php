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
    
    public function setLog($u,$d){
        $start = convertDateToString($d);
        $data = array(
            'username' => $u,
            'start' => $start
        );
        
        $this->db->insert('log', $data); 
    }
    
     public function endLog($u,$d){
        $start = convertDateToString($d); 
        $end = convertDateToString(getdate());
        $data = array(
               'end' => $end
            );

        $this->db->where('username', $u);
        $this->db->where('start', $start);
        $this->db->update('log', $data); 
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

function convertDateToString($d){
        $date_array = $d;
        $formated_date = "";
        $formated_date .= $date_array['mday'] . "/";
        $formated_date .= $date_array['mon'] . "/";
        $formated_date .= $date_array['year'] . "-";
        $formated_date .= $date_array['hours'] . ":";
        $formated_date .= $date_array['minutes'] . ":";
        $formated_date .= $date_array['seconds'];
        return $formated_date;
    }