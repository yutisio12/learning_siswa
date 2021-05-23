<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->model('auth_model');
        $this->load->helper('cookie');
    }

	public function index()
	{
		$data['subview'] = 'auth/login';
		$this->load->view('auth/login', $data);
	}

    public function test_var($var){
        echo "<pre>";
        print_r($var);
        echo "</pre>";
        exit;
    }

    public function checking(){
        $where["username LIKE '".$_POST['username']."'"] = NULL;
        $datadb = $this->auth_model->find_user($where)[0];
        // $this->test_var($datadb);
        $c_pass = $this->encryption->decrypt($datadb['password']);
        $i_pass = $_POST['password'];

        if($c_pass==$i_pass && isset($_POST['username'])){

            $permission = $datadb['id'].';'.$datadb['name'].';'.$_POST['username'].';'.$datadb['role'];

            $permissions = json_encode($permission);
            setcookie('user', null, -1, '/'); 
            setcookie('user', $permissions, time() + (60 * 60 * 24 * 5), '/');
            $cookie = get_cookie('user');
            if($datadb['role']==0){
                redirect('home');
            } elseif($datadb['role']==1){
                redirect('guru');
            }
            
        } else {
            delete_cookie('user');
            redirect('auth/index');
        }
    }

    public function logout(){
        setcookie('user', null, -1, '/'); 
        delete_cookie('user');
        redirect('auth/index');
    }

}
