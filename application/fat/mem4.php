<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mem4 extends CI_Controller {
    
    public function members4(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 4){
            $this->load->view('header');
            $this->load->view('members4');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }
        
    }
    
    
    public function graphs4(){
       $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 4){
            $this->load->view('header');
            $this->load->view('graphs4');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted'); 
        }
    } 
    
    public function getTable(){
        $this->load->model('model_mem4');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 4){
            $u = $this->session->userdata('username');
            $s = $this->model_mem4->getSpecificId($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function getSize(){
        $this->load->model('model_mem4');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 4){
            $u = $this->session->userdata('username');
            $s = $this->model_mem4->getSize($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function getLogTable(){
        $this->load->model('model_mem4');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 4){
            $u = $this->session->userdata('username');
            $s = $this->model_mem4->getSpecificUsage($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    public function infTable(){
        $this->load->model('model_mem4');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 4){
            $u = $this->session->userdata('username');
            $s = $this->model_mem4->getInfTable($u,$this->input->post('load'),$this->input->post('offset'));
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
}