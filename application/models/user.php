<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class user extends CI_Model{

    function getUser(){
		$this->db->from('user');

        $query = $this->db->get();
        return $query;
	}

    function tambah_user($data){
       $this->db->insert('user', $data);
    }
}