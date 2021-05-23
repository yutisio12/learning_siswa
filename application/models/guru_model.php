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
        
}