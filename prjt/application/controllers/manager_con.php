<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager_con extends CI_Controller {

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
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $this->load->view('header');
            $this->load->view('managerView');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
    
    public function log(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 2){
            $this->load->view('header');
            $this->load->view('managerlog');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
	
	public function getUniqueDateLogs(){
		$this->load->model('model_manager');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
		if ($this->session->userdata('is_logged_in') && $t <= 2){
			$s = $this->model_manager->getUniqueDateLogtable();
			echo "$s";
        } else {
            redirect('/main/restricted');
        }
	}
	
	public function getDateLogTable(){
		$this->load->model('model_manager');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 2){
            $t = $this->input->get('dateS');
            $s = $this->model_manager->getDateLogs($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getUniqueIdLogs(){
		$this->load->model('model_manager');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 2){
            $s = $this->model_manager->getUniqueIdLogTable();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
		public function getUniqueIdLogs2(){
		$this->load->model('model_manager');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 2){
            $s = $this->model_manager->getUniqueIdLogTable2();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }

	
	public function getIdLogTable(){
		$this->load->model('model_manager');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 2){
            $t = $this->input->get('user');
            $s = $this->model_manager->getIdLogs($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getIdLogTable2(){
		$this->load->model('model_manager');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 2){
            $t = $this->input->get('user');
            $s = $this->model_manager->getIdLogs2($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getUniqueCompLogs(){
		$this->load->model('model_manager');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 2){
            $s = $this->model_manager->getUniqueCompLogTable();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getCompLogTable(){
		$this->load->model('model_manager');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 2){
            $t = $this->input->get('comp_id');
            $s = $this->model_manager->getCompLogs($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getAllLogInfo(){
        $this->load->model('model_manager');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 2){
            //$u = $this->session->userdata('username');
            $s = $this->model_manager->getAllUsage();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }

	public function getWebLogTable(){
        $this->load->model('model_manager');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t <= 2){
            $s = $this->model_manager->getWebLogTable();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }

		
}

