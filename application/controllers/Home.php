<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();


		$this->load->model('list_kelas');

	} 

	public function index()
	{
		$data['sidebar'] = 'home/sidebar';
		$data['subview'] = 'home/dashboard';
		$this->load->view('index', $data);
	}

	// LIST KELAS
	public function list_kelas(){
		$data['row'] = $this->list_kelas->getKelas()->result();

		$data['sidebar'] = 'home/sidebar';
		$data['subview'] = 'home/list_kelas';
		$this->load->view('index', $data);
	}

	// TAMBAH KELAS
	function tambah(){
		$data = array(
			'nama_kelas'  => $this->input->post('nama_kelas'),
			'wali_kelas' => $this->input->post('wali_kelas'),
			'lokasi_kelas' => $this->input->post('lokasi_kelas')
		);
		$this->list_kelas->tambah($data);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('home/list_kelas');
	}

	//TAMBAH MAPEL
	public function mapel(){
		$data['row'] = $this->list_kelas->getKelas()->result();

		$data['sidebar'] = 'home/sidebar';
		$data['subview'] = 'home/mapel';
		$this->load->view('index', $data);
	}

}
