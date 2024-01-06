<?php 

class Kadeluwarsa_model extends CI_Model{

	function tampil_data(){
		return $this->db->get('kadeluwarsa');
	}

	function simpan_data($data){
		$this->db->insert('kadeluwarsa',$data);
	}

	function edit_data($where){
		return $this->db->get_where('kadeluwarsa',$where);
	}

	function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('kadeluwarsa',$data);
	}

	function hapus_data($where){
		$this->db->where($where);
		$this->db->delete('kadeluwarsa',$where);
	}
    function join2table(){
		$this->db->select('*');
		$this->db->from('kadeluwarsa');
		$this->db->join('products','products.id = kadeluwarsa.id_product');      
		$query = $this->db->get();
		return $query;
	}

}