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

    function hapus_tugas($id){
        $this->guru_model->hapus_tugas($id);

        $this->session->set_flashdata('success', 'Tugas Berhasil Di Hapus');
        redirect('guru/list_tugas');
    }

    public function list_pengumpulan(){
        
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
		$data['subview'] = 'guru/list_pengumpulan';
		$this->load->view('index', $data);
    }

    public function list_pengumpulan_tugas($idtugas, $idkelas){
        error_reporting(0);
        
        $data['id_tugas'] = $idtugas;

        $where['kelas_siswa']  = $idkelas;
        $datasiswa = $this->guru_model->siswa($where);
        $data['siswa'] = $datasiswa;

        $where_nilai['id_tugas'] = $idtugas;
        $data['nilai'] = $this->guru_model->list_nilai($where_nilai);
        // $this->test_var($nilai);
        
        $data['kelas'] = $this->guru_model->GetKelas();
        foreach($data['kelas'] as $key => $value){
            $data['nama_kelas'][$value['id']] = $value['nama_kelas'];
        }

        $data['sidebar'] = 'guru/sidebar';
        $data['subview'] = 'guru/list_pengumpulan_tugas';
        $this->load->view('index', $data);
    }

    public function list_nilai(){

        $where['created_by'] = $this->permission_cookie[0];
        $datanilai = $this->guru_model->list_nilai($where);
        $data['penilaian'] = $datanilai;
        unset($where);
        // $this->test_var($datanilai);

        $data['siswa'] = $this->guru_model->list_user();
        foreach($data['siswa'] as $key => $value){
            $data['name'][$value['id']] = $value['name'];
        }

        $data['kelas'] = $this->guru_model->list_kelas();
        foreach($data['kelas'] as $key => $value){
            $data['nama_kelas'][$value['id']] = $value['nama_kelas'];
        }

        $data['mapel'] = $this->guru_model->list_mapel();
        foreach($data['mapel'] as $key => $value){
            $data['nama_mapel'][$value['id']] = $value['nama_mapel'];
        }


        $data['tugas'] = $this->guru_model->list_tugas();
        foreach($data['tugas'] as $key => $value){
            $data['tugas'][$value['id']] = $value['running_number'];
        }

        $data['tugas'] = $this->guru_model->list_tugas();
        foreach($data['tugas'] as $key => $value){
            $data['tugas'][$value['id']] = $value['running_number'];
        }
        

        $data['sidebar'] = 'guru/sidebar';
		$data['subview'] = 'guru/list_nilai';
		$this->load->view('index', $data);
    }

   
    public function add_tugas_process(){

        $where['id_mapel'] = $_POST['mapel'][0];
        $datadb = $this->guru_model->list_tugas($where);
        if(count($datadb)<1){
            $insert['running_number'] = '000001';
        } else {
            $where['id_mapel'] = $_POST['mapel'][0];
            $str = $this->guru_model->get_running_number($where)[0]['running_number']+1;

            $insert['running_number'] = str_pad($str,6,0,STR_PAD_LEFT);
        }

        $insert['id_kelas']         = $_POST['kelas'][0];
        $insert['id_mapel']         = $_POST['mapel'][0];
        $insert['semester']         = $_POST['semester'][0];
        $insert['open_date']        = $_POST['date_open'].' '.$_POST['time_open'];
        $insert['close_date']       = $_POST['date_close'].' '.$_POST['time_close'];
        $insert['created_by']       = $this->permission_cookie[0];
        $insert['created_datetime'] = DATE('Y-m-d H:i:s');
        $this->guru_model->insert_tugas($insert);

        $this->session->set_flashdata('success', 'Tugas Berhasil Di Buat');
        redirect('guru/list_tugas');
    }

    public function tulis_soal($id_tugas){
        
        $data['id_tugas'] = $id_tugas;
        $tugas['id'] = $id_tugas;
        $where_tugas = $this->guru_model->list_tugas($tugas)[0];
            
        $where_soal['id_tugas'] = $where_tugas['id'];
        $data['soal'] = $this->guru_model->list_tugas_soal($where_soal);
        // $this->test_var($data['soal']);

        $data['sidebar'] = 'guru/sidebar';
        $data['subview'] = 'guru/list_soal';
        $this->load->view('index', $data);
    }

    public function add_soal_process($id_tugas){
        error_reporting(0);
        // $this->test_var($_POST);
        foreach ($_POST['soal'] as $key => $soal) {
            $insert['id_tugas']         = $id_tugas;
            $insert['soal']             = $soal;
    
            // $insert['jenis_soal']       = $_POST['jenis'][$key]; diganti karena mau pakai satu jenis untuk satu tugas
            $insert['jenis_soal']       = $_POST['jenis_soal_all']; 

            if($_POST['jenis_soal_all']==1){
                $insert['soal_opsi_a']      = $_POST['opsi_a'][$key];
                $insert['soal_opsi_b']      = $_POST['opsi_b'][$key];
                $insert['soal_opsi_c']      = $_POST['opsi_c'][$key];
                $insert['soal_opsi_d']      = $_POST['opsi_d'][$key];
                $insert['jawaban_benar']    = $_POST['jawaban_benar'][$key];
            }
            
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
        $data['status'] = $_POST['status'];
        $this->guru_model->update_tugas($where, $data);

    }

    public function review_pengumpulan_tugas($id_siswa, $id_tugas){
        error_reporting(0);

        $data['id_tugas_main']  = $id_tugas;

        $where['id_tugas'] = $id_tugas;
        $data['soal'] = $this->siswa_model->list_soal($where);
        $tugas['id'] = $id_tugas;
        $where_tugas = $this->guru_model->list_tugas($tugas)[0];
        $where_mapel['id'] = $where_tugas['id_mapel'];
        $yoo = $this->guru_model->list_mapel($where_mapel);
        $where_kelas['id'] = $where_tugas['id_kelas'];
        $where_semester['semester'] = $where_tugas['semester'];
        // $this->test_var($where_semester);


        $where_siswa['id'] = $id_siswa;
        $nip = $this->siswa_model->list_siswa($where_siswa)[0];
        // $this->test_var($nip['nip_siswa']);
        $where_user['nip'] = $nip['nip_siswa'];
        $id_akun_siswa = $this->siswa_model->list_user($where_user)[0];
        
        $data['siswa'] = $this->guru_model->list_user($where_user);
        foreach($data['siswa'] as $key => $value){
            $data['name'][$value['id']] = $value['name'];
        }

        $data['kelas'] = $this->guru_model->list_kelas($where_kelas);
        foreach($data['kelas'] as $key => $value){
            $data['nama_kelas'][$value['id']] = $value['nama_kelas'];
        }

        $data['mapel'] = $this->guru_model->list_mapel($where_mapel);
        foreach($data['mapel'] as $key => $value){
            $data['nama_mapel'][$value['id']] = $value['nama_mapel'];
        }

        $data['semester'] = $this->guru_model->list_tugas($where_semester);
        foreach($data['semester'] as $key => $value){
            $data['semester'][$value['semester']] = $value['semester'];
        }

        $where['created_by'] = $id_akun_siswa['id'];
        $data_jawaban = $this->siswa_model->list_pengumpulan($where);
        foreach ($data_jawaban as $key => $value) {
            $data['jawaban'][$value['id_tugas_soal']] = $value['jawaban'];
            $data['file'][$value['id_tugas_soal']] = $value['file'];
        }

        $data['sidebar'] = 'guru/sidebar';
        $data['subview'] = 'guru/review_pengumpulan';
        $this->load->view('index', $data);
    }

    public function add_score(){
        
        $insert['id_tugas']      = $_POST['id_tugas'];
        $insert['id_siswa']      = $_POST['id_siswa'];
        $insert['id_kelas']      = $_POST['id_kelas'];
        $insert['id_mapel']      = $_POST['id_mapel'];
        $insert['semester']      = $_POST['semester'];
        $insert['nilai']         = $_POST['nilai'];
        $insert['created_by']    = $this->permission_cookie[0];

        $this->guru_model->insert_score($insert);
        $this->session->set_flashdata('success', 'Penilaian Berhasil');
        redirect('guru/list_pengumpulan');
    }

}
