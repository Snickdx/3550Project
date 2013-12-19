<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Superv_con extends CI_Controller {

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
        if ($this->session->userdata('is_logged_in') && $t == 3){
            $this->load->view('header');
            $this->load->view('supervisorView');
            $this->load->view('footer');
        } else {
            redirect('/main/restricted');
        }    
    }

		//
	public function getDailyTable(){
		$this->load->model('model_supervisor');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
			$u = $this->session->userdata('username');
            $t = $this->input->get('today');
            $s = $this->model_supervisor->getTodayUsage($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    //
    public function getAllDailyTable(){
		$this->load->model('model_supervisor');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
			//$u = $this->session->userdata('username');
            $t = $this->input->get('today');
            $s = $this->model_supervisor->getAllTodayUsage($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    //
    public function getDailyCompTable(){
		$this->load->model('model_supervisor');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
			//$u = $this->session->userdata('username');
            $t = $this->input->get('today');
            $s = $this->model_supervisor->getTodayCompUsage($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    //
    public function getTodayLogTable(){
		$this->load->model('model_supervisor');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
            $t = $this->input->get('today');
            $u = $this->input->get('user');
            $s = $this->model_supervisor->getTodayLogTable($t,$u);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    //
    public function getTodayCompLogTable(){
		$this->load->model('model_supervisor');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
            $t = $this->input->get('today');
            $c = $this->input->get('comp');
            $s = $this->model_supervisor->getTodayCompLogTable($t,$c);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    //
    public function getDailyGraph(){
		$this->load->model('model_supervisor');
        $this->load->model('model_users');
        $t = $this->model_users->getType($this->session->userdata('username'));
        if ($this->session->userdata('is_logged_in') && $t == 3){
			//$u = $this->session->userdata('username');
            $t = $this->input->get('today');
            $s = $this->model_supervisor->getTodayGraph($t);
            echo "$s";
        } else {
            redirect('/main/restricted');
        }
    }
    

}

