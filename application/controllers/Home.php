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
		$data['mata_pelajaran'] = $this->mapel->getMapel()->result();

		$data['sidebar'] = 'home/sidebar';
		$data['subview'] = 'home/mapel';
		$this->load->view('index', $data);
	}

	function tambah_mapel(){
		$data = array(
			'nama_mapel'  => $this->input->post('nama_mapel'),
			'kelas_mapel' => $this->input->post('kelas_mapel'),
			'pengajar_mapel' => $this->input->post('pengajar_mapel'),
			'status' => $this->input->post('status')
		);
		$this->mapel->tambah_mapel($data);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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

}
