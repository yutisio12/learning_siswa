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


	} 

	public function index()
	{
		$data['sidebar'] = 'home/sidebar';
		$data['subview'] = 'home/dashboard';
		$this->load->view('index', $data);
	}

	// LIST KELAS
	public function list_kelas(){

        $datakelas = $this->list_kelas->getKelas();
        $data['kelas'] = $datakelas;


		$where_role['role'] = 1;
		$data['wali_kelas'] = $this->list_kelas->wali_kelas($where_role);
        foreach($data['wali_kelas'] as $key => $value){
            $data['name'][$value['id']] = $value['name'];
        }

		$data['sidebar'] = 'home/sidebar';
		$data['subview'] = 'home/list_kelas';
		$this->load->view('index', $data);
	}

	// TAMBAH KELAS
	function tambah(){

		$insert['nama_kelas']         = $_POST['nama_kelas'];
        $insert['wali_kelas']         = $_POST['wali_kelas'];
		$insert['lokasi_kelas']       = $_POST['lokasi_kelas'];
        $this->list_kelas->tambah($insert);

        $this->session->set_flashdata('success', 'Kelas Berhasil Di Tambah');
        redirect('home/list_kelas');
	}

	// MATA PELAJARAN
	public function mapel(){

		$datamapel = $this->mapel->getMapel();
        $data['mata_pelajaran'] = $datamapel;


		$where_role['role'] = 1;
		$data['pengajar_mapel'] = $this->mapel->pengajar_mapel($where_role);
        foreach($data['pengajar_mapel'] as $key => $value){
            $data['name'][$value['id']] = $value['name'];
        }

		$data['sidebar'] = 'home/sidebar';
		$data['subview'] = 'home/mapel';
		$this->load->view('index', $data);
	}

	function tambah_mapel(){

		$insert['nama_mapel']         = $_POST['nama_mapel'];
        $insert['kelas_mapel']         = $_POST['kelas_mapel'];
		$insert['pengajar_mapel']       = $_POST['pengajar_mapel'];
		$insert['status']       = $_POST['status'];

		$this->mapel->tambah_mapel($insert);

        $this->session->set_flashdata('success', 'Mata Pelajaran Berhasil Di Tambah');
        redirect('home/mapel');
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
				'password' => $this->encryption->encrypt('12345'),
				'role' => $this->input->post('role'),
				'status' => '1'
			);
			$this->user->tambah_user($data);
			$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('home/user');
		}

		// DATA SISWA
		function list_siswa(){
			$datasiswa = $this->siswa_model->list_siswa();
			$data['siswa'] = $datasiswa;

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

        $this->siswa_model->insert_siswa($insert);

        $this->session->set_flashdata('success', 'Siswa Berhasil Di Tambah');
        redirect('home/list_siswa');
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
			$insert['alamat_guru']       = $_POST['alamat_guru'];
			$insert['telpon_guru']       = $_POST['telpon_guru'];
	
			$this->guru_model->insert_guru($insert);

			$this->session->set_flashdata('success', 'Guru Berhasil Di Tambah');
			redirect('home/list_guru');

		}

}
