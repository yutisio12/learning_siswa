<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('cookie');
        $this->load->model('guru_model');
        $this->load->model('siswa_model');
		if(get_cookie('user')==NULL){
			redirect('auth/logout');
		}
        $this->permission_cookie = explode(";", str_replace('"', '', get_cookie('user')));
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

		$data['sidebar'] = 'siswa/sidebar';
		$data['subview'] = 'siswa/dashboard';
		$this->load->view('index', $data);
	}

    public function tugas_tersedia(){
        $where['id'] = $this->permission_cookie[0];
        $data_user = $this->siswa_model->list_user($where)[0];
            unset($where);
        $where['nip_siswa'] = $data_user['nip'];
        $data_siswa = $this->siswa_model->list_siswa($where)[0];
            unset($where);
        $where['id_kelas']  = $data_siswa['kelas_siswa'];
        $where['status']    = 0;
        $data_tugas = $this->guru_model->list_tugas($where);
        $data['list_tugas'] = $data_tugas;

        // ============ ARRAY KEY
        $data['list_mapel'] = $this->guru_model->list_mapel();
        foreach($data['list_mapel'] as $key => $value){
            $data['nama_mapel'][$value['id']] = $value['nama_mapel'];
        }
        // $this->test_var($data['list_tugas']);

        $data['sidebar'] = 'siswa/sidebar';
        $data['subview'] = 'siswa/list_tugas';
        $this->load->view('index', $data);
    }

    public function kerjakan_tugas($id_tugas){
        $where['id_tugas'] = $id_tugas;
        $data['soal'] = $this->siswa_model->list_soal($where);
        // $this->test_var($data['soal']);

        $data['sidebar'] = 'siswa/sidebar';
        $data['subview'] = 'siswa/pengerjaan_soal';
        $this->load->view('index', $data);
    }

}
