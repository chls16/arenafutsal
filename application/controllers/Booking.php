<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct(){
	
			parent::__construct();
        $this->load->helper(array('form','url'));
		$this ->load ->model('m_account');
        $this ->load ->model('m_admin');
		if($this->session->userdata('id') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('akun');
        };

      }


    public function get_harga(){
        $id_lapangan=$this->input->post('id_lapangan');
        $jam=$this->input->post('jam');
        $data=$this->m_account->get_harga($id_lapangan,$jam);
        echo json_encode($data);
    }


    function booking()
	{
		$id_user = $this->input->post('id_users');
		$tanggal_booking = $this->input->post('tanggal_booking');
		$lapangan = $this->input->post('lapangan');
		$jam_mulai = $this->input->post('jam_mulai');
		$durasi = $this->input->post('durasi');
		$total_harga = $this->input->post('total_harga');

		$data = array(
			'id_user' => $id_user,
			'tgl_booking' => $tanggal_booking,
			'id_users' => $lapangan,
			'jam_booking' => $jam_mulai,
			'durasi' => $durasi,
			'total_harga' => $total_harga,
			'status' => "1",

		);
		$this->m_account->add_booking($data);
		// redirect('Booking');
		$this->load->view('payment',$data);
	}


	public function index(){
		$user=$this->m_account->getuser($this->session->userdata('id'));
		$lapangan=$this->m_account->lapangan();

		//$seat_qty=$this->input->get('seat_qty');
		// $rute=$this->m_account->booking($id)->result();
		$data = array(
			'user' => $user,
			'lapangan' => $lapangan,
			'panelbody' =>'booking',
			// 'rute' =>$rute,
		);
		$this->load->view('panelbody', $data);
	}
}