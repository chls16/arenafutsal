<?php
Class M_admin extends CI_Model
{

	function sesiku(){
		$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Login Pak</div>');
		if($this->session->statusadmin != "online"){
			redirect('admin/login','refresh');
		}
	}

	

	function clapangan(){
		return $this->db->query('SELECT COUNT(*) as jumlah FROM lapangan;')->result();
	}

	function cbooking(){
		return $this->db->query('SELECT COUNT(*) as jumlah FROM transaksi;')->result();
	}


	function tampil_transaksi()
	{
		$query= $this->db->query('SELECT * FROM transaksi AS t INNER JOIN users AS u ON t.id_users = u.id INNER JOIN lapangan AS l ON l.id_lapangan = t.id_lapangan');
		return $query->result(); 
	}

	function tampil_user(){
		return $this->db->get('users')->result();	
	}

	/*function tampil_airport($id=''){
		if($id!=''){
			$where = ' AND A.id = "'.$id.'"';
		} else {
			$where = '';
		}
		$query = $this->db->query('SELECT A.id,A.name,A.iso, B.lapangan,B.id as idkota FROM airport A,lapangan B WHERE A.id_lapangan=B.id' . $where);
		return $query;
		// return $this->db->get('airport')->result();	lapangan
	}

	function get_airport($id=''){
		if($id!=''){
			$where = ' AND id_lapangan = "'.$id.'"';
		} else {
			$where = '';
		}
		$query = $this->db->query('SELECT * FROM airport WHERE 1=1 ' . $where);
		return $query;
	}

	function tampil_rute($id=''){
		if($id!=''){
			$where = ' AND A.id = "'.$id.'"';
		} else {
			$where = '';
		}
		$query= $this->db->query('SELECT A.*,B.name as maskapai FROM rute A, transportation B WHERE A.id_transportation=B.id '.$where.' ORDER BY creat_date DESC');
    	return $query->result();
		
    }

	function tampil_transportation(){
		return $this->db->get('transportation')->result();
	}*/

	function tampil_booking(){
		$query = $this->db->query('SELECT * FROM transaksi AS t INNER JOIN users AS u ON t.id_users = u.id INNER JOIN lapangan AS l ON l.id_lapangan = t.id_lapangan');
		return $query->result();
	}

	function add_status($data){
    $this->db->insert('status', $data);
	}

	function tampil_lapangan()
	{
		return $this->db->get('lapangan')->result();
	}

	function add_lapangan($data){
    $this->db->insert('lapangan', $data);
	}

	function add_transportation($data){
    $this->db->insert('transportation', $data);
	}

	function add_airport($data){
    $this->db->insert('airport', $data);
	}

	function add_rute($data,$table){
		$this->db->insert($table,$data);
	}

	function edit_lapangan($table,$id){
		$this->db->where('id', $id);
		return $this->db->get($table,$id); }

	function edit_user($users,$id){
		return $this->db->get_where($users,$where);
	}

	function edit_airport($table,$id){
		$query = $this->db->query('SELECT A.*,D.lapangan FROM airport A JOIN lapangan D WHERE A.id='.$id.' AND D.id=A.id_lapangan');
		return $query;
	}

	function edit_transportation($table,$id){
		$this->db->where('id', $id);
		return $this->db->get($table,$id);
	}

	function update_lapangan($id,$data){
		$this->db->where('id', $id);
		$this->db->update('lapangan', $data);
	}

	function update_user($id,$data){
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

	function update_airport($id,$data){
		$this->db->where('id', $id);
		$this->db->update('airport', $data);
	}

	function update_rute($id,$data){
		$this->db->where('id', $id);
		$this->db->update('rute', $data);
	}

	function update_transportation($id,$data){
		$this->db->where('id', $id);
		$this->db->update('transportation', $data);
	}

	function hapus_lapangan($id){
		$this->db->where('id', $id);
		$this->db->delete('lapangan');
	}

	function hapus_transaksi($id){
		$this->db->where('id', $id);
		$this->db->delete('transaksi');
	}

	function hapus_user($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
	}

	function hapus_rute($id){
		$this->db->where('id', $id);
		$this->db->delete('rute');
	}

	function hapus_transportation($id){
		$this->db->where('id', $id);
		$this->db->delete('transportation');
	}

	function add_buktitf($data){
			$this->db->set($data);
			$this->db->insert('transaksi',$data);
		}


	function update_status($data){
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('transaksi',$data);
	}
	function add_jadwal($data){
		$this->db->insert('jadwal', $data);
	}
}
?>

