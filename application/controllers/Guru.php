<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('cookie');
        $this->load->model('guru_model');
		if(get_cookie('user')==NULL){
			redirect('auth/logout');
		}
        $this->permission_cookie = explode(";", str_replace('"', '', get_cookie('user'))) ;
	} 

    public function test_var($var){
        echo "<pre>";
        print_r($var);
        echo "</pre>";
        exit;
    }

	public function index()
	{
        $datatugas = $this->guru_model->total_tugas()[0];
        $data['total_tugas'] = $datatugas;

		$data['sidebar'] = 'guru/sidebar';
		$data['subview'] = 'guru/dashboard';
		$this->load->view('index', $data);
	}

    public function list_tugas(){
        $where['created_by'] = $this->permission_cookie[0];
        $datatugas = $this->guru_model->list_tugas($where);
        $data['tugas'] = $datatugas;

        $data['list_kelas'] = $this->guru_model->list_kelas();
        foreach($data['list_kelas'] as $key => $value){
            $data['nama_kelas'][$value['id']] = $value['nama_kelas'];
        }

        $data['list_mapel'] = $this->guru_model->list_mapel();
        foreach($data['list_mapel'] as $key => $value){
            $data['nama_mapel'][$value['id']] = $value['nama_mapel'];
        }

        $data['sidebar'] = 'guru/sidebar';
		$data['subview'] = 'guru/list_tugas';
		$this->load->view('index', $data);
    }

    public function add_tugas_process(){
        $insert['id_kelas']         = $_POST['kelas'];
        $insert['id_mapel']         = $_POST['mapel'];
        $insert['open_date']        = $_POST['date_open'].' '.$_POST['time_open'];
        $insert['close_date']       = $_POST['date_close'].' '.$_POST['time_close'];
        $insert['created_by']       = $this->permission_cookie[0];
        $insert['created_datetime'] = DATE('Y-m-d H:i:s');
        $this->guru_model->insert_tugas($insert);

        $this->session->set_flashdata('success', 'Tugas Berhasil Di Buat');
        redirect('guru/list_tugas');
    }

}
