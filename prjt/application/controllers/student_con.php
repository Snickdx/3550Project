<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_con extends CI_Controller {
    
    public function homepage(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 4){
            $this->load->view('header');
            $this->load->view('studentView');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }
        
    }
    
    
    public function getTable(){
        $this->load->model('model_student');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 4){
            $u = $this->session->userdata('username');
            $s = $this->model_student->getSpecificId($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function getSize(){
        $this->load->model('model_student');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 4){
            $u = $this->session->userdata('username');
            $s = $this->model_student->getSize($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function getLogTable(){
        $this->load->model('model_student');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 4){
            $u = $this->session->userdata('username');
            $s = $this->model_student->getSpecificUsage($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    /*public function infTable(){
        $this->load->model('model_student');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 4){
            $u = $this->session->userdata('username');
            $s = $this->model_student->getInfTable($u,$this->input->post('load'),$this->input->post('offset'));
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }*/
}