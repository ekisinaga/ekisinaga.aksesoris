<?php 

class Kurir_model extends CI_Model{

	function tampil_data(){
		return $this->db->get('kurir');
	}

	function simpan_data($data){
		$this->db->insert('kurir',$data);
	}

	function edit_data($where){
		return $this->db->get_where('kurir',$where);
	}

	function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('kurir',$data);
	}

	function hapus_data($where){
		$this->db->where($where);
		$this->db->delete('kurir',$where);
	}

}