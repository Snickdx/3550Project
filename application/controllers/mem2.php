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
            $this->load->view('managerlog');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }
	
	public function getUniqueDateLogs(){
		$this->load->model('model_mem2');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
		if ($this->session->userdata('is_logged_in') && $t == 2){
			$s = $this->model_mem2->getUniqueDateLogtable();
			echo "$s";
        } else {
            redirect('/main/restricted');
        }
	}
	
	public function getDateLogTable(){
		$this->load->model('model_mem2');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $t = $this->input->get('dateS');
            $s = $this->model_mem2->getDateLogs($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getUniqueIdLogs(){
		$this->load->model('model_mem2');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $s = $this->model_mem2->getUniqueIdLogTable();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
		public function getUniqueIdLogs2(){
		$this->load->model('model_mem2');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $s = $this->model_mem2->getUniqueIdLogTable2();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }

	
	public function getIdLogTable(){
		$this->load->model('model_mem2');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $t = $this->input->get('user');
            $s = $this->model_mem2->getIdLogs($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getIdLogTable2(){
		$this->load->model('model_mem2');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $t = $this->input->get('user');
            $s = $this->model_mem2->getIdLogs2($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getUniqueCompLogs(){
		$this->load->model('model_mem2');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $s = $this->model_mem2->getUniqueCompLogTable();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getCompLogTable(){
		$this->load->model('model_mem2');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $t = $this->input->get('comp_id');
            $s = $this->model_mem2->getCompLogs($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
		public function getTable(){
        $this->load->model('model_mem2');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $u = $this->session->userdata('username');
            $s = $this->model_mem2->getSpecificId($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getLogTable(){
        $this->load->model('model_mem2');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $u = $this->session->userdata('username');
            $s = $this->model_mem2->getSpecificUsage($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getAllLogInfo(){
        $this->load->model('model_mem2');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            //$u = $this->session->userdata('username');
            $s = $this->model_mem2->getAllUsage();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }

	public function getWebLogTable(){
        $this->load->model('model_mem2');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 2){
            $s = $this->model_mem2->getWebLogTable();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }

		
}

