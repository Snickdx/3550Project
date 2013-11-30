<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mem2 extends CI_Controller {

	public function index()
	{
		$this->login();
	}
    
    public function login(){
        $this->load->view('login');
    }
    
    public function members2(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $this->load->view('header');
            $this->load->view('members2');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
    
    public function viewInfo2(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $this->load->view('header');
            $this->load->view('viewInfo2');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
    
    public function graphs2(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $this->load->view('header');
            $this->load->view('graphs2');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
    
    public function log(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $this->load->view('header');
            $this->load->view('log');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
}

