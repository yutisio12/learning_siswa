<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class guru_model extends CI_Model{

    function list_tugas($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('tugas')->result_array();
        return $db;
    }

    function list_kelas($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('kelas')->result_array();
        return $db;
    }

    function list_mapel($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('mapel')->result_array();
        return $db;
    }

    function list_siswa($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('siswa')->result_array();
        return $db;
    }

    function list_user($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('user')->result_array();
        return $db;
    }

    function total_tugas(){
        $db = $this->db->query("SELECT 
            SUM(IF(status=0, 1, 0)) AS total_open,
            SUM(IF(status=1, 1, 0)) AS total_close,
            SUM(IF(status=2, 1, 0)) AS total_scored
        FROM tugas
        ")->result_array();
        return $db;
    }

    function insert_tugas($data){
        $this->db->insert('tugas', $data);
    }

    function list_guru(){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('guru')->result_array();
        return $db;
    }

    function insert_guru($data){
        $this->db->insert('guru', $data);
    }

    function insert_soal($insert){
        $this->db->insert('tugas_soal', $insert);
    }

    function list_tugas_soal($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('tugas_soal')->result_array();
        return $db;
    }

    function editGuru($where, $data){
        $this->db->where($where);
        $this->db->update('guru', $data);
    }       

    function siswa($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('siswa')->result_array();
        return $db;
    }

    function update_soal($where, $data){
        $this->db->where($where);
        $this->db->update('tugas_soal', $data);
    }

    function update_tugas($where, $data){
        $this->db->where($where);
        $this->db->update('tugas', $data);
    }

    function GetKelas($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('kelas')->result_array();
        return $db;
	}

    function list_pengumpulan_siswa($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('pengumpulan')->result_array();
        return $db;
    }

    function score($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('penilaian')->result_array();
        return $db;
    }

    function insert_score($data){
        $this->db->insert('penilaian', $data);
    }

    function list_nilai($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('penilaian')->result_array();
        return $db;
    }
}