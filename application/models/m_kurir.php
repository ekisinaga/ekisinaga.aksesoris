<?php 

class M_kurir extends CI_Model{

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


	function tampil_login_kurir($email){
		$this->db->select('*');
		$this->db->from('kurir');
		$this->db->where('email',$email);      
		$query = $this->db->get();
		return $query;

}

	function tampil_login_admin($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$username);      
		$query = $this->db->get();
		return $query;

}

	function update_data_admin($where,$data){
		$this->db->where($where);
		$this->db->update('user',$data);
}

}
