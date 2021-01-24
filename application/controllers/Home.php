<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 * https://github.com/ondol95/booking-tiket
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$user=$this->m_account->getuser($this->session->userdata('id'));
		$lapangan=$this->m_account->lapangan();
		$tanggal = tanggal_indonesia_lengkap(date('Y-m-d'));
		$jadwal = $this->m_account->jadwal_lapangan($jam);
		$jam = array('08.00','09.00','10.00','11.00','12.00','13.00','14.00','15.00','16.00','17.00','18.00','19.00','20.00','21.00','22.00','23.00');
		$data = array(
			'user' => $user,
			'panelbody' => 'home',
			'lapangan' => $lapangan,
			'tanggal' => $tanggal,
			'jadwal' =>$jadwal,
		);
		$this->load->view('panelbody',$data);
	}

    function result(){
    	$data['rute']=$this->m_account->cari();
    	$this->load->view('cari', $data);
    }

    function payment(){
    	$this->load->view('payment', $data);
    }
}
