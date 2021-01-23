<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->m_admin->sesiku();
	}

	public function index()
	{
		$data['transaksi']=$this->m_admin->tampil_transaksi();
		// $data['jairport']=$this->db->query('SELECT COUNT(*) FROM airport A JOIN lapangan D WHERE A.id_lapangan=D.id AND D.id=4');
		$this->load->view('admin/payment/payment',$data);
	}

	function add_status()
	{	
		$id = $this->input->post('id');
		$id_transaksi = $this->input->post('harga_siang');
		$nama = $this->input->post('harga_malam');
		$nama = $this->input->post('harga_malam');
		
		$this->m_admin->add_lapangan($data,'lapangan');
		redirect('admin/lapangan');
	}

	function del($id)
	{
		$this->m_admin->hapus_payment($id);
		redirect('admin/payment','refresh');
	}

	function status($id)
	{
		//update status
		$data = array(	'id_transaksi'	=> $id,
						'status_bayar'	=> 'Sudah Bayar'
						);
			$this->m_admin->update_status($data);

		//add jadal
		$data = array(	'hari'	=> $this->input->post('tgl_booking'),
						'jam'	=> $this->input->post('jam_booking')
						);
		$this->m_admin->add_jadwal($data);
		redirect(base_url('admin/payment'), 'refresh');
	}

	function add_buktitf()
	{
		$id = $this->input->post('id');
		$config['upload_path']          = './gudang/images/bukti_tf/';
		// $config['allowed_types']        = 'png|jpg|PNG';
		$config['allowed_types']        = '*';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;	

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('bukti_tf'))
		{
			$bukti_tf = '';
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/payment/add_buktitf', $error);
		}
		else
		{
			$upload_data = $this->upload->data();
			$data = array('upload_data' => $upload_data);
			$bukti_tf = $upload_data['file_name'];
		}

		$data = array(
			'bukti_tf' => $bukti_tf,

			);
		$this->m_admin->add_buktitf($data,'transaksi');
		redirect('admin/payment');
	}


}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */