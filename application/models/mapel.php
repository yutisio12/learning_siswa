<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mapel extends CI_Model{

    function getMapel(){
		$this->db->from('mapel');

        $query = $this->db->get();
        return $query;
	}

    function tambah_mapel($data){
       $this->db->insert('mapel', $data);
    }
}