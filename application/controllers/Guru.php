<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('cookie');
        $this->load->model('guru_model');
        $this->load->model('siswa_model');
		if(get_cookie('user')==NULL){
			redirect('auth/logout');
		}
        $this->permission_cookie = explode(";", str_replace('"', '', get_cookie('user')));
        $this->kelas_cookie = get_cookie('cookies_kelas');
        if($this->permission_cookie[3]!=1){
            $this->session->set_flashdata('warning', 'You dant have permission to access this page');
            redirect('auth/logout');
        }
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

        $where['nip_guru'] = $this->permission_cookie[4];
        $id_guru = $this->guru_model->list_guru($where)[0];
        unset($where);
        // $this->test_var($id_guru);

        $where['created_by'] = $this->permission_cookie[0];
        $datatugas = $this->guru_model->list_tugas($where);
        $data['tugas'] = $datatugas;
        unset($where);

        $where['id IN ('.str_replace(';',',',$id_guru['id_kelas']).')'] = NULL;
        $data['list_kelas'] = $this->guru_model->list_kelas($where);
        unset($where);
        foreach($data['list_kelas'] as $key => $value){
            $data['nama_kelas'][$value['id']] = $value['nama_kelas'];
        }

        $where['id IN ('.str_replace(';',',',$id_guru['id_mapel']).')'] = NULL;
        $data['list_mapel'] = $this->guru_model->list_mapel($where);
        unset($where);
        foreach($data['list_mapel'] as $key => $value){
            $data['nama_mapel'][$value['id']] = $value['nama_mapel'];
        }

        $data['sidebar'] = 'guru/sidebar';
		$data['subview'] = 'guru/list_tugas';
		$this->load->view('index', $data);
    }

    public function list_pengumpulan(){
        
        
        $datatugas = $this->guru_model->list_tugas();
        $data['tugas'] = $datatugas;
        // $this->test_var($datatugas);

        $data['list_kelas'] = $this->guru_model->list_kelas();
        foreach($data['list_kelas'] as $key => $value){
            $data['nama_kelas'][$value['id']] = $value['nama_kelas'];
        }

        $data['list_mapel'] = $this->guru_model->list_mapel();
        foreach($data['list_mapel'] as $key => $value){
            $data['nama_mapel'][$value['id']] = $value['nama_mapel'];
        }

        $data['sidebar'] = 'guru/sidebar';
		$data['subview'] = 'guru/list_pengumpulan';
		$this->load->view('index', $data);
    }

    public function list_pengumpulan_tugas($idtugas, $idkelas){
        error_reporting(0);
        
        $data['id_tugas'] = $idtugas;

        $where['kelas_siswa']  = $idkelas;
        $datasiswa = $this->guru_model->siswa($where);
        $data['siswa'] = $datasiswa;
        
        $data['kelas'] = $this->guru_model->GetKelas();
        foreach($data['kelas'] as $key => $value){
            $data['nama_kelas'][$value['id']] = $value['nama_kelas'];
        }

        $data['sidebar'] = 'guru/sidebar';
        $data['subview'] = 'guru/list_pengumpulan_tugas';
        $this->load->view('index', $data);
    }

   
    public function add_tugas_process(){

        //$this->test_var($_POST);

        $insert['id_kelas']         = $_POST['kelas'][0];
        $insert['id_mapel']         = $_POST['mapel'][0];
        $insert['open_date']        = $_POST['date_open'].' '.$_POST['time_open'];
        $insert['close_date']       = $_POST['date_close'].' '.$_POST['time_close'];
        $insert['created_by']       = $this->permission_cookie[0];
        $insert['created_datetime'] = DATE('Y-m-d H:i:s');
        $this->guru_model->insert_tugas($insert);

        $this->session->set_flashdata('success', 'Tugas Berhasil Di Buat');
        redirect('guru/list_tugas');
    }

    public function tulis_soal($id_tugas){
        
        $where['id_tugas'] = $id_tugas;
        $data['soal'] = $this->guru_model->list_tugas_soal($where);
        // $this->test_var($data);
        $data['id_tugas'] = $id_tugas;
        $data['sidebar'] = 'guru/sidebar';
        $data['subview'] = 'guru/list_soal';
        $this->load->view('index', $data);
    }

    public function add_soal_process($id_tugas){
        error_reporting(0);
        
        foreach ($_POST['soal'] as $key => $soal) {
            $insert['id_tugas']         = $id_tugas;
            $insert['soal']             = $soal;
            $insert['soal_opsi_a']      = $_POST['opsi_a'][$key];
            $insert['soal_opsi_b']      = $_POST['opsi_b'][$key];
            $insert['soal_opsi_c']      = $_POST['opsi_c'][$key];
            $insert['soal_opsi_d']      = $_POST['opsi_d'][$key];
            $insert['jenis_soal']       = $_POST['jenis'][$key];
            
            $this->guru_model->insert_soal($insert);
        }
        $this->session->set_flashdata('success', 'Soal Berhasil Di Tambahkan');
        redirect('guru');
    }

    public function hapus_soal(){
        // $this->test_var($_POST);
        $where['id'] = $_POST['id_soal'];
        $data['status_soal'] = 1;
        $this->guru_model->update_soal($where, $data);
    }

    public function ubah_status_tugas(){
        //$this->test_var($_POST);

        $where['id'] = $_POST['id'];
        $data['status'] = 1;
        $this->guru_model->update_tugas($where, $data);

    }

    public function review_pengumpulan_tugas($id_siswa, $id_tugas){
        $data['id_tugas_main']  = $id_tugas;

        $where['id_tugas'] = $id_tugas;
        $data['soal'] = $this->siswa_model->list_soal($where);

        $where['created_by'] = $id_siswa;
        $data_jawaban = $this->siswa_model->list_pengumpulan($where);
        foreach ($data_jawaban as $key => $value) {
            $data['jawaban'][$value['id_tugas_soal']] = $value['jawaban'];
        }

        $data['sidebar'] = 'guru/sidebar';
        $data['subview'] = 'guru/review_pengumpulan';
        $this->load->view('index', $data);
    }

}
