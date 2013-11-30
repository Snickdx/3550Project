<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mem3 extends CI_Controller {

	public function index()
	{
		$this->login();
	}
    
    public function login(){
        $this->load->view('login');
    }
    
    public function members3(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
            $this->load->view('header');
            $this->load->view('members3');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
    
    public function viewInfo3(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
            $this->load->view('header');
            $this->load->view('viewInfo3');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
    
    public function graphs3(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
            $this->load->view('header');
            $this->load->view('graphs3');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
}

