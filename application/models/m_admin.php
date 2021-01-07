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

	function tampil_payment(){
		$this->db->select('*');
		$this->db->FROM('transaksi a');
		$this->db->join('users b', 'a.id_user=b.id', 'Left');
		$this->db->join('jadwal c','a.id_jadwal=c.id','Left');
		$this->db->join('status d','a.status=d.id','left');
		$this->db->join('lapangan e','a.id_lapangan=e.id','left');
		
		$data=$this->db->get();
		return $data->result();
	}	

	function tampil_user(){
		return $this->db->get('users')->result();	
	}

	function tampil_airport($id=''){
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
	}

	function tampil_reservation(){
		$query = $this->db->query('SELECT R.*,C.id_users,C.name,C.noid,JR.rute_from,JR.rute_to,(select name from airport where JR.rute_from=airport.id) AS mktndol,(select iso from airport where JR.rute_from=airport.id) AS codemkt,(select iso from airport where JR.rute_to=airport.id) AS codebli,(select name from airport where JR.rute_to=airport.id) AS blindol FROM reservation R, customer C JOIN rute JR JOIN airport JA WHERE R.customer_id=C.id AND R.rute_id=JR.id AND JR.rute_from=JA.id ORDER BY reservation_date DESC');
		return $query->result();
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

	function edit_lapangan($lapangan,$where){
		return $this->db->get_where($lapangan,$where);
	}

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

	function hapus_airport($id){
		$this->db->where('id', $id);
		$this->db->delete('airport');
	}
}
?>

