<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class list_kelas extends CI_Model{

    function tambah($data){
       $this->db->insert('list_kelas', $data);
    }
}