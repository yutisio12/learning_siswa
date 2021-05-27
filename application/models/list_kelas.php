<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class list_kelas extends CI_Model{

    function getKelas($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('kelas')->result_array();
        return $db;
	}

    function tambah($data){
       $this->db->insert('kelas', $data);
    }

    function edit($where, $data){
        $this->db->where($where);
        $this->db->update('kelas', $data);
    }

    function wali_kelas($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('user')->result_array();
        return $db;
    }
}