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
        // print_r($this->encryption->encrypt('12345'));
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

            $permission = $datadb['id'].';'.$datadb['name'].';'.$_POST['username'].';'.$datadb['role'].';'.$datadb['nip'];

            $permissions = json_encode($permission);
            setcookie('user', null, -1, '/'); 
            setcookie('user', $permissions, time() + (60 * 60 * 24 * 5), '/');

            if($datadb['role']==1){
                // guru soon, nunggu table dr ardi
            } elseif($datadb['role']==2){
                $where_detail['nip_siswa'] = $datadb['nip'];
                $detail = $this->auth_model->find_siswa($where_detail)[0];
                setcookie('cookies_kelas', null, -1, '/'); 
                setcookie('cookies_kelas', $detail['kelas_siswa'], time() + (60 * 60 * 24 * 5), '/');
            }

            $cookie = get_cookie('user');
            if($datadb['role']==0){
                redirect('home');
            } elseif($datadb['role']==1){
                redirect('guru');
            } elseif($datadb['role']==2){
                redirect('siswa');
            }
            
        } else {
            delete_cookie('user');
            setcookie('user', null, -1, '/'); 
            setcookie('cookies_kelas', null, -1, '/'); 
            redirect('auth/index');
        }
    }

    public function logout(){
        setcookie('user', null, -1, '/'); 
        setcookie('cookies_kelas', null, -1, '/'); 
        delete_cookie('user');
        redirect('auth/index');
    }

    public function change_password(){
        $cookie = explode(';',get_cookie('user'));
        
        $where["id"] = str_replace('"', '', $cookie[0]);
        $datadb = $this->auth_model->find_user($where)[0];
        $data['akun'] = $datadb;
        // $this->test_var($datadb);

        $this->load->view('auth/change_password', $data);
    }

    public function change_password_process(){
        // $this->test_var($_POST);

        $where['username'] = $_POST['username'];
        $data['password']  = $this->encryption->encrypt($_POST['password']);
        $this->auth_model->change_password($where, $data);
        redirect('auth/logout');
    }

    public function reset_password(){
        // $this->test_var($_POST);
        $where['id'] = $_POST['id'];
        $data['password']  = $this->encryption->encrypt('12345');
        $this->auth_model->change_password($where, $data);
    }

}
