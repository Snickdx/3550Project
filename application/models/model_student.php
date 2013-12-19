<?php

class Model_student extends CI_Model{
    
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
        $query = $this->db->get('usage');
        //$query = $this->db->get('usage',10,0);
            
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
    
        /*public function getInfTable($username,$load,$off){
        $load = $load * 7;
        $this->db->where('username',$username);    
        $query = $this->db->get('usage',$off,$load);
        $table="";
        if($query->num_rows() > 0){
            foreach ($query->result_array() as $row)
            {
               $table .= "<tr><td>".$row['date']."</td><td>".$row['comp_id']."</td><td>".$row['time']."</td></tr>";
            }

            return $table;
        } else {
            return false;
        }
    }*/
    
}