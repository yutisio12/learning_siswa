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
        
}