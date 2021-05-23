<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class list_kelas extends CI_Model{

    function getKelas(){
		$this->db->from('kelas');

        $query = $this->db->get();
        return $query;
	}

    function tambah($data){
       $this->db->insert('kelas', $data);
    }
}