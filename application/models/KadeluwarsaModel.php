<?php 

class KadeluwarsaModel extends CI_Model{

	function tampil_data(){
		return $this->db->get('jenis_surat');
	}

	function simpan_data($data){
		$this->db->insert('jenis_surat',$data);
	}

	function edit_data($where){
		return $this->db->get_where('jenis_surat',$where);
	}

	function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('jenis_surat',$data);
	}

	function hapus_data($where){
		$this->db->where($where);
		$this->db->delete('jenis_surat',$where);
	}

}