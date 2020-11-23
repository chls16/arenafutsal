<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lapangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->m_admin->sesiku();
	}

	public function index()
	{
		$data['lapangan']=$this->m_admin->tampil_lapangan();
		// $data['jairport']=$this->db->query('SELECT COUNT(*) FROM airport A JOIN lapangan D WHERE A.id_lapangan=D.id AND D.id=4');
		$this->load->view('admin/lapangan/lapangan',$data);
	}

	function add()
	{
		$this->load->view('admin/lapangan/add');
	}

	function add_lapangan()
	{
		$id = $this->input->post('id');
		$lapangan = $this->input->post('lapangan');
		$id_tarif = $this->input->post('id_tarif');

		$data = array(
			'id' => $id,
			'lapangan' => $lapangan,
		);
		$this->m_admin->add_lapangan($data,'lapangan');
		redirect('admin/lapangan');
	}

	function edit($id)
	{
		$where = array('id' => $id);
		$data['lapangan'] = $this->m_admin->edit_lapangan('lapangan',$where)->result();
		$this->load->view('admin/lapangan/edit',$data);
	}

	function update($id){
		$lapangan = $this->input->post('lapangan');
		$iso = $this->input->post('iso');

		$data = array(
			'lapangan' =>$lapangan,
			'iso' =>$iso,
		);
		$this->m_admin->update_lapangan($id,$data);
		redirect('admin/lapangan','refresh');
	}

	function del($id)
	{
		$this->m_admin->hapus_lapangan($id);
		redirect('admin/lapangan','refresh');
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */