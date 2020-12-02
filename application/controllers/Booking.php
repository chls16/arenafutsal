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

	public function index(){
		$user=$this->m_account->getuser($this->session->userdata('id'));
		$lapangan=$this->m_account->lapangan();

		$seat_qty=$this->input->get('seat_qty');
		// $rute=$this->m_account->booking($id)->result();
		$data = array(
			'user' => $user,
			'lapangan' => $lapangan,
			'panelbody' =>'booking',
			'seat_qty' =>$seat_qty,
			// 'rute' =>$rute,
		);
		$this->load->view('panelbody', $data);
	}
}