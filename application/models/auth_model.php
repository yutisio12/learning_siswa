<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class auth_model extends CI_Model{

    function find_user($where){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('user')->result_array();
        return $db;
    }

    function find_siswa($where){
        if(isset($where)){
            $this->db->where($where);
        }
        $db = $this->db->get('siswa')->result_array();
        return $db;
    }

}