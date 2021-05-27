<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class siswa_model extends CI_Model{

    function list_user($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('user')->result_array();
        return $db;
    }

    function list_siswa($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('siswa')->result_array();
        return $db;
    }

    function list_soal($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('tugas_soal')->result_array();
        return $db;
    }

    function insert_siswa($data){
        $this->db->insert('siswa', $data);
    }

    function editSiswa($where, $data){
        $this->db->where($where);
        $this->db->update('siswa', $data);    
    }

    function insert_pengumpulan($data){
        $this->db->insert('pengumpulan', $data);
    }

    function list_pengumpulan($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('pengumpulan')->result_array();
        return $db;
    }
        
}