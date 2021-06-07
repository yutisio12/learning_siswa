<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('encryption');
		$this->load->helper('cookie');
		$this->load->model('list_kelas');
		$this->load->model('mapel');
		$this->load->model('user');
		$this->load->model('siswa_model');
		$this->load->model('guru_model');
		if(get_cookie('user')==NULL){
			redirect('auth/logout');
		}
		$this->permission_cookie = explode(";", str_replace('"', '', get_cookie('user')));
		if($this->permission_cookie[3]!=0){
            $this->session->set_flashdata('warning', 'You dant have permission to access this page');
            redirect('auth/logout');
        }


	} 

	public function index()
	{

		$data['list_guru'] = $this->guru_model->list_guru();
		$data['list_siswa'] = $this->guru_model->list_siswa();
		$data['list_user'] = $this->guru_model->list_user();

		$data['sidebar'] = 'home/sidebar';
		$data['subview'] = 'home/dashboard';
		$this->load->view('index', $data);
	}

	// LIST KELAS
	public function list_kelas(){

        $datakelas = $this->list_kelas->getKelas();
        $data['kelas'] = $datakelas;


		// $where_role['role'] = 1;
		// $data['wali_kelas'] = $this->list_kelas->wali_kelas($where_role);
        // foreach($data['wali_kelas'] as $key => $value){
        //     $data['name'][$value['id']] = $value['name'];
        // }

		$data['wali_kelas'] = $this->guru_model->list_guru();
        foreach($data['wali_kelas'] as $key => $value){
            $data['name'][$value['id']] = $value['nama_guru'];
        }

		$data['sidebar'] = 'home/sidebar';
		$data['subview'] = 'home/list_kelas';
		$this->load->view('index', $data);
	}

	function tambah(){

		$insert['nama_kelas']         = $_POST['nama_kelas'];
        $insert['wali_kelas']         = $_POST['wali_kelas'];
		$insert['lokasi_kelas']       = $_POST['lokasi_kelas'];
		$insert['status']       	  = 1;
        $this->list_kelas->tambah($insert);

        $this->session->set_flashdata('success', 'Kelas Berhasil Di Tambah');
        redirect('home/list_kelas');
	}

	function edit(){

		$where['id'] = $_POST['id'];
		$data['nama_kelas'] = $_POST['nama_kelas'];
		$data['wali_kelas'] = $_POST['wali_kelas'];
		$data['lokasi_kelas'] = $_POST['lokasi_kelas'];
	   
        $this->list_kelas->edit($where, $data);
		$this->session->set_flashdata('success',"Data Berhasil Di edit");
        redirect('home/list_kelas');

	}

	function hapus_kelas(){
		$where['id'] = $_POST['id'];
		$data['status'] = 0;
		$this->list_kelas->edit($where, $data);

	}

	// MATA PELAJARAN
	public function mapel(){

		$datamapel = $this->mapel->getMapel();
        $data['mata_pelajaran'] = $datamapel;


		// $where_role['role'] = 1;
		// $data['pengajar_mapel'] = $this->mapel->pengajar_mapel($where_role);
  //       foreach($data['pengajar_mapel'] as $key => $value){
  //           $data['name'][$value['id']] = $value['name'];
  //       }
        // $where_role['role'] = 1;
		$data['pengajar_mapel'] = $this->guru_model->list_guru();
        foreach($data['pengajar_mapel'] as $key => $value){
            $data['name'][$value['id']] = $value['nama_guru'];
        }

		$data['kelas'] = $this->list_kelas->getKelas();
        foreach($data['kelas'] as $key => $value){
            $data['nama_kelas'][$value['id']] = $value['nama_kelas'];
        }

		$data['sidebar'] = 'home/sidebar';
		$data['subview'] = 'home/mapel';
		$this->load->view('index', $data);
	}

	function tambah_mapel(){

		$insert['nama_mapel']         	= $_POST['nama_mapel'];
        $insert['kelas_mapel']         	= $_POST['kelas_mapel'];
		$insert['pengajar_mapel']       = $_POST['pengajar_mapel'];
		$insert['status']       		= $_POST['status'];
		$insert['status_hapus']       	= 1;


		$this->mapel->tambah_mapel($insert);

        $this->session->set_flashdata('success', 'Mata Pelajaran Berhasil Di Tambah');
        redirect('home/mapel');
	}

	function edit_mapel(){

		$where['id'] = $_POST['id'];
		$data['nama_mapel'] = $_POST['nama_mapel'];
		$data['kelas_mapel'] = $_POST['kelas_mapel'];
		$data['pengajar_mapel'] = $_POST['pengajar_mapel'];
		$data['status'] = $_POST['status'];

        $this->mapel->editMapel($where, $data);
		$this->session->set_flashdata('success',"Data Berhasil Di edit");
        redirect('home/mapel');

	}

	function hapus_mapel(){
		$where['id'] = $_POST['id'];
		$data['status_hapus'] = 0;
		$this->mapel->editMapel($where, $data);
	}

		// USER
		public function user(){
			$data['user'] = $this->user->getUser()->result();
	
			$data['sidebar'] = 'home/sidebar';
			$data['subview'] = 'home/user';
			$this->load->view('index', $data);
		}
	
		function tambah_user(){
			$data = array(
				'name'  => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'nip' => $this->input->post('nip'),
				'password' => $this->encryption->encrypt('12345'),
				'role' => $this->input->post('role'),
				'status' => '1'
			);
			$this->user->tambah_user($data);
			$this->session->set_flashdata('success',"Data Berhasil Di Tambahkan");
			redirect('home/user');
		}

		function hapus_user(){
			$where['id'] = $_POST['id'];
			$data['status'] = 0;
			$this->user->hapus_user($where, $data);
		}

		// DATA SISWA
		function list_siswa(){
			$datasiswa = $this->siswa_model->list_siswa();
			$data['siswa'] = $datasiswa;
			
			$data['kelas'] = $this->list_kelas->getKelas();
			foreach($data['kelas'] as $key => $value){
			$data['nama_kelas'][$value['id']] = $value['nama_kelas'];
        
		}

			$data['sidebar'] = 'home/sidebar';
			$data['subview'] = 'home/list_siswa';
			$this->load->view('index', $data);
		}

		function tambah_siswa(){
		$insert['nama_siswa']         = $_POST['nama_siswa'];
        $insert['nip_siswa']         = $_POST['nip_siswa'];
		$insert['kelas_siswa']       = $_POST['kelas_siswa'];
		$insert['alamat_siswa']       = $_POST['alamat_siswa'];
		$insert['telpon_siswa']       = $_POST['telpon_siswa'];
		$insert['status']       	= 1;

        $this->siswa_model->insert_siswa($insert);

        $this->session->set_flashdata('success', 'Siswa Berhasil Di Tambah');
        redirect('home/list_siswa');
		}

		function edit_siswa(){

			$where['id'] = $_POST['id'];
			$data['nama_siswa'] = $_POST['nama_siswa'];
			$data['nip_siswa'] = $_POST['nip_siswa'];
			$data['alamat_siswa'] = $_POST['alamat_siswa'];
			$data['telpon_siswa'] = $_POST['telpon_siswa'];
			$data['kelas_siswa'] = $_POST['kelas_siswa'];
			$insert['status']       	= 1;

			$this->siswa_model->editSiswa($where, $data);
			$this->session->set_flashdata('success',"Data Berhasil Di edit");
			redirect('home/list_siswa');

		}

		function hapus_siswa(){
			$where['id'] = $_POST['id'];
			$data['status'] = 0;
			$this->siswa_model->editSiswa($where, $data);
		}

		//DATA GURU
		function list_guru(){
			$dataguru = $this->guru_model->list_guru();
			$data['guru'] = $dataguru;
			
			$data['list_kelas'] = $this->guru_model->list_kelas();
			foreach($data['list_kelas'] as $key => $value){
				$data['nama_kelas'][$value['id']] = $value['nama_kelas'];
			}
	
			$data['list_mapel'] = $this->guru_model->list_mapel();
			foreach($data['list_mapel'] as $key => $value){
				$data['nama_mapel'][$value['id']] = $value['nama_mapel'];
			}

			$data['sidebar'] = 'home/sidebar';
			$data['subview'] = 'home/list_guru';
			$this->load->view('index', $data);
		}

		function tambah_guru(){
			$insert['nama_guru']         = $_POST['nama_guru'];
			$insert['nip_guru']         = $_POST['nip_guru'];
			$insert['id_kelas']         = implode('; ', $_POST['kelas']);
			$insert['id_mapel']         = implode('; ', $_POST['mapel']);
			$insert['alamat_guru']      = $_POST['alamat_guru'];
			$insert['telpon_guru']      = $_POST['telpon_guru'];
			$insert['status']       	= 1;
	
			$this->guru_model->insert_guru($insert);

			$this->session->set_flashdata('success', 'Guru Berhasil Di Tambah');
			redirect('home/list_guru');

		}

		function edit_guru(){
			// echo '<pre>';
			// print_r($_POST);
			// exit;

			$where['id'] = $_POST['id'];
			$data['nama_guru'] = $_POST['nama_guru'];
			$data['nip_guru'] = $_POST['nip_guru'];
			$data['alamat_guru'] = $_POST['alamat_guru'];
			$data['telpon_guru'] = $_POST['telpon_guru'];

			$data['id_kelas'] = implode('; ', $_POST['kelas']);
			$data['id_mapel'] = implode('; ', $_POST['mapel']);
		   
			$this->guru_model->editGuru($where, $data);
			$this->session->set_flashdata('success',"Data Berhasil Di edit");
			redirect('home/list_guru');

		}

		function hapus_guru(){
			$where['id'] = $_POST['id'];
			$data['status'] = 0;
			$this->guru_model->editGuru($where, $data);
		}

		function edit_user(){

			// echo '<pre>';
			// print_r($_POST);
			// exit;

			$where['id'] = $_POST['id'];

			$data['name'] = $_POST['name'];
			$data['username'] = $_POST['username'];
			$data['nip'] = $_POST['nip'];
			$data['role'] = $_POST['role'];

			$this->siswa_model->edit_pengguna($where, $data);
			$this->session->set_flashdata('success',"Data Berhasil Di edit");
			redirect('home/user');

		}

}
