<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mem1 extends CI_Controller {

	public function index()
	{
		$this->login();
	}
    
    public function login(){
        $this->load->view('login');
    }
    
    public function members1(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 1){
            $this->load->view('header');
            $this->load->view('members1');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
    
    public function viewInfo1(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 1){
            $this->load->view('header');
            $this->load->view('viewInfo1');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
    
    public function graphs1(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 1){
            $this->load->view('header');
            $this->load->view('graphs1');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
    
    public function add(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 1){
            $this->load->view('header');
            $this->load->view('add');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }

    public function edit(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 1){
            $this->load->view('header');
            $this->load->view('edit');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
    
    public function delete(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 1){
            $this->load->view('header');
            $this->load->view('delete');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
    
}

