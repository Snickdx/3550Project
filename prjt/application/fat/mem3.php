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
		//
	public function getDailyTable(){
		$this->load->model('model_mem3');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
			//$u = $this->session->userdata('username');
            $t = $this->input->get('today');
            $s = $this->model_mem3->getTodayUsage($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    //
    public function getAllDailyTable(){
		$this->load->model('model_mem3');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
			//$u = $this->session->userdata('username');
            $t = $this->input->get('today');
            $s = $this->model_mem3->getAllTodayUsage($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    //
    public function getDailyCompTable(){
		$this->load->model('model_mem3');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
			//$u = $this->session->userdata('username');
            $t = $this->input->get('today');
            $s = $this->model_mem3->getTodayCompUsage($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    //
    public function getTodayLogTable(){
		$this->load->model('model_mem3');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
            $t = $this->input->get('today');
            $u = $this->input->get('user');
            $s = $this->model_mem3->getTodayLogTable($t,$u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    //
    public function getTodayCompLogTable(){
		$this->load->model('model_mem3');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
            $t = $this->input->get('today');
            $c = $this->input->get('comp');
            $s = $this->model_mem3->getTodayCompLogTable($t,$c);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    //
    public function getDailyGraph(){
		$this->load->model('model_mem3');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
			//$u = $this->session->userdata('username');
            $t = $this->input->get('today');
            $s = $this->model_mem3->getTodayGraph($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
	
	public function getTable(){
        $this->load->model('model_mem3');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
            $u = $this->session->userdata('username');
            $s = $this->model_mem3->getSpecificId($u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    
    public function getLogTable(){
        $this->load->model('model_mem3');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
            $u = $this->session->userdata('username');
            $s = $this->model_mem3->getSpecificUsage($u);
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

