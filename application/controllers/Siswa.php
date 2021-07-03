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
        $this->kelas_cookie = get_cookie('cookies_kelas');
        if($this->permission_cookie[3]!=2){
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

		$data['sidebar'] = 'siswa/sidebar';
		$data['subview'] = 'siswa/dashboard';
		$this->load->view('index', $data);
	}

    public function tugas_tersedia(){
        error_reporting(0);

        $where_peng['created_by'] =  $this->permission_cookie[0];
        $pengumpulan = $this->siswa_model->list_pengumpulan($where_peng);
        foreach ($pengumpulan as $key => $value) {
            $data['check_kumpul'][$value['id_tugas']] = 1;
        }

        $where_pen['id_siswa']  =  $this->permission_cookie[0];
        $penilaia      = $this->siswa_model->list_penilaian($where_pen);
        foreach ($penilaia as $key => $value) {
            $data['check_nilai'][$value['id_tugas']] = 1;
        }

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
        $data['id_tugas_main']  = $id_tugas;
        $where['id_tugas'] = $id_tugas;
        $data['soal'] = $this->siswa_model->list_soal($where);
        // $this->test_var($data['soal']);

        $data['sidebar'] = 'siswa/sidebar';
        $data['subview'] = 'siswa/pengerjaan_soal';
        $this->load->view('index', $data);
    }

    public function review_pengumpulan($id_tugas){
        error_reporting(0);

        $data['id_tugas_main']  = $id_tugas;
        $where['id_tugas'] = $id_tugas;
        $data['soal'] = $this->siswa_model->list_soal($where);

        $nilai['id_siswa'] = $this->permission_cookie[0];
        $nilai['id_tugas'] = $id_tugas;
        $data['nilai'] = $this->siswa_model->list_penilaian($nilai)[0];
        // $this->test_var($data['nilai']);

        $where['created_by'] = $this->permission_cookie[0];
        $data_jawaban = $this->siswa_model->list_pengumpulan($where);
        foreach ($data_jawaban as $key => $value) {
            $data['jawaban'][$value['id_tugas_soal']] = $value['jawaban'];
            $data['file'][$value['id_tugas_soal']] = $value['file'];
        }
            // $this->test_var($data_jawaban);
        $data['sidebar'] = 'siswa/sidebar';
        $data['subview'] = 'siswa/review_pengumpulan';
        $this->load->view('index', $data);
    }

    public function pengumpulan_soal($id_tugas){
        error_reporting(0);
        
        $jumlah_soal = count($_POST['id_soal']);
        $jumlah_benar= 0;
        foreach ($_POST['id_soal'] as $key => $soal) {

            // ambil data file
            if(isset($_FILES['foto']['tmp_name'][$key])){
                $namaFile = 'Jawaban'.$key.DATE('YmdHis').'.jpg';
                $namaSementara = $_FILES['foto']['tmp_name'][$key];

                // tentukan lokasi file akan dipindahkan
                $dirUpload = "upload/";

                // pindahkan file
                $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
            }

            $insert['id_tugas']         = $id_tugas;
            $insert['id_tugas_soal']    = $soal;
            $insert['file']             = $namaFile;
            $insert['created_by']       = $this->permission_cookie[0];
            $insert['created_date']     = DATE('Y-m-d H:i:s');
            $insert['jawaban']          = $_POST['jawaban'][$key];
            $insert['status_jawaban']   = 0;
            
            $this->siswa_model->insert_pengumpulan($insert);

            $where_cek['id'] = $soal;
            $cek_benar = $this->siswa_model->list_soal($where_cek)[0];
            if($cek_benar['jawaban_benar']==$_POST['jawaban'][$key]){
                $jumlah_benar++;
            }

            $where_cek_main['id'] = $cek_benar['id_tugas'];
            $main = $this->guru_model->list_tugas($where_cek_main)[0];  
        }

        if($cek_benar['jenis_soal']==1){
            $nilai = ($jumlah_benar/$jumlah_soal)*100;
            // $this->test_var($main);
            $insert_penilaian['id_siswa']   = $this->permission_cookie[0];
            $insert_penilaian['id_tugas']       = $cek_benar['id_tugas'];
            $insert_penilaian['id_kelas']       = $main['id_kelas'];
            $insert_penilaian['id_mapel']       = $main['id_mapel'];
            $insert_penilaian['semester']       = $main['semester'];
            $insert_penilaian['nilai']          = $nilai;
            $insert_penilaian['created_by']     = 99999; //id system
            $insert_penilaian['created_date']   = DATE('Y-m-d H:i:s'); //id system
            
            $this->guru_model->insert_score($insert_penilaian);
        }

        $this->session->set_flashdata('success', 'Soal berhasil dikumpulkan :)');
        redirect('siswa/tugas_tersedia');
    }

}
