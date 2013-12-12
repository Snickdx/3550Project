<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->login();
	}
    
    public function login(){
        $this->load->view('login');
    }
    
    public function login_validation(){
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean|callback_validate_credentials');
        $this->form_validation->set_rules('password','Password','required|sha1|trim');
        if($this->form_validation->run()){
            $d = getdate();
            $data= array(
                "username" => $this->input->post('username'),
                "is_logged_in" => 1,
                "date" => $d
            );
            $this->session->set_userdata($data);
            $this->load->model('model_users');
            $t = $this->model_users->getType($this->session->userdata('username'));
            $this->model_users->setLog($this->session->userdata('username'),$d);
            if($t == 4){
                redirect('mem4/members4');
            } else if($t == 3){
                redirect('mem3/members3');
            } else if($t == 2){
                redirect('mem2/members2');
            } else if($t == 1){
                redirect('mem1/graphs1');
            } else {
                redirect('main');;
            }
        } else {
            $this->load->view('login');
        }
        
        
    }
    
    public function validate_credentials(){
        $this->load->model('model_users');
        if($this->model_users->can_log_in()){
            return true;
        } else {
            $this->form_validation->set_message('validate_credentials','Incorrect username/password.');
            return false;
        }
    }
    
    

    public function restricted(){
        $this->load->view('restricted');
        
    }
    
    public function logout(){
        $this->load->model('model_users');
        $this->model_users->endLog($this->session->userdata('username'),$this->session->userdata('date'));
        $this->session->sess_destroy();
        redirect('main/login');
    }
    
}
