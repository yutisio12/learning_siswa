<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mapel extends CI_Model{

    function getMapel($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('mapel')->result_array();
            return $db;
        }

    function tambah_mapel($data){
       $this->db->insert('mapel', $data);
    }

    function pengajar_mapel($where = NULL){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('user')->result_array();
        return $db;
    }
}