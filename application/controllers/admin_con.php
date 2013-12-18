<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_con extends CI_Controller {

	public function index()
	{
		$this->login();
	}
    
    public function login(){
        $this->load->view('login');
    }
    
    public function homepage(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 1){
            $this->load->view('header');
            $this->load->view('adminView');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
	
    public function getUniqueUsers(){
        $this->load->model('model_admin');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 1){
            $s = $this->model_admin->getUniqueUsers();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function addUsageTable(){
		$this->load->model('model_admin');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 1){
            $u = $this->input->post('user');
            $d = $this->input->post('date');
            $t = $this->input->post('time');
            $c = $this->input->post('comp');
            $s = $this->model_admin->addUsageTable($u,$d,$t,$c);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function addUserTable(){
		$this->load->model('model_admin');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 1){
            $u = $this->input->post('user');
            $p = $this->input->post('password');
            $t = $this->input->post('type');
            $s = $this->model_admin->addUserTable($u,$p,$t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function deleteUser(){
		$this->load->model('model_admin');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 1){
            $u = $this->input->post('user');
            $s = $this->model_admin->deleteUser($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function editUser(){
		$this->load->model('model_admin');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 1){
            $o = $this->input->post('ouser');
            $u = $this->input->post('user');
            $p = $this->input->post('password');
            $t = $this->input->post('type');
            $s = $this->model_admin->editUser($o,$u,$p,$t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
}

