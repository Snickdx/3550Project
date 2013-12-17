<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mem1 extends CI_Controller {

	public function index()
	{
		$this->login();
	}
    
    public function login(){
        $this->load->view('login');
    }
    
    public function adminView(){
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
    
    public function managerView(){
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
	
     public function supervisorView(){
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
            $this->load->view('header');
            $this->load->view('supervisorView');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }

    public function studentView(){
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
        $this->load->model('model_mem1');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in')){
            $u = $this->session->userdata('username');
            $s = $this->model_mem1->getSpecificId($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getLogTable(){
        $this->load->model('model_mem1');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in')){
            $u = $this->session->userdata('username');
            $s = $this->model_mem1->getSpecificUsage($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getUniqueIdLogs(){
		$this->load->model('model_mem1');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') ){
            $s = $this->model_mem1->getUniqueIdLogTable();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getIdLogTable(){
		$this->load->model('model_mem1');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') ){
            $t = $this->input->get('user');
            $s = $this->model_mem1->getIdLogs($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getUniqueCompLogs(){
		$this->load->model('model_mem1');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') ){
            $s = $this->model_mem1->getUniqueCompLogTable();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getCompLogTable(){
		$this->load->model('model_mem1');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') ){
            $t = $this->input->get('comp_id');
            $s = $this->model_mem1->getCompLogs($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getUniqueDateLogs(){
		$this->load->model('model_mem1');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
		if ($this->session->userdata('is_logged_in') ){
			$s = $this->model_mem1->getUniqueDateLogtable();
			echo "$s";
        } else {
            redirect('/main/restricted');
        }
	}
	
	public function getDateLogTable(){
		$this->load->model('model_mem1');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') ){
            $t = $this->input->get('dateS');
            $s = $this->model_mem1->getDateLogs($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getAllLogInfo(){
        $this->load->model('model_mem1');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') ){
            //$u = $this->session->userdata('username');
            $s = $this->model_mem1->getAllUsage();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getUniqueIdLogs2(){
		$this->load->model('model_mem1');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in')){
            $s = $this->model_mem1->getUniqueIdLogTable2();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getWebLogTable(){
        $this->load->model('model_mem1');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') ){
            $s = $this->model_mem1->getWebLogTable();
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getIdLogTable2(){
		$this->load->model('model_mem1');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') ){
            $t = $this->input->get('user');
            $s = $this->model_mem1->getIdLogs2($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function addUsageTable(){
		$this->load->model('model_mem1');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') ){
            $u = $this->input->post('user');
            $d = $this->input->post('date');
            $t = $this->input->post('time');
            $c = $this->input->post('comp');
            $s = $this->model_mem1->addUsageTable($u,$d,$t,$c);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function addUserTable(){
		$this->load->model('model_mem1');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') ){
            $u = $this->input->post('user');
            $p = $this->input->post('password');
            $t = $this->input->post('type');
            $s = $this->model_mem1->addUserTable($u,$p,$t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function deleteUser(){
		$this->load->model('model_mem1');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') ){
            $u = $this->input->post('user');
            $s = $this->model_mem1->deleteUser($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function editUser(){
		$this->load->model('model_mem1');
		$this->load->model('model_users');
		$t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') ){
            $o = $this->input->post('ouser');
            $u = $this->input->post('user');
            $p = $this->input->post('password');
            $t = $this->input->post('type');
            $s = $this->model_mem1->editUser($o,$u,$p,$t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
}

