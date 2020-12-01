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
		$list = $this ->Model_obat->get_obatlist()->result();
        $id = $this->session->userdata('id_session');
        $data = array(
            'menu' => 'Menu',
            'panelbody' => 'obat/tbl_obat_list',
            'id' => $id,
            "list" => $list
        );
        $this ->load ->view('panelbody',$data);

        $user = $this->m_account->getuser($this->session->userdata('id'));
        $lapangan = $this->m_account->lapangan();

		$this->load->model('m_admin');
		$data['user']=$this->m_account->getuser($this->session->userdata('id'));
		$data['lapangan']=$this->m_account->lapangan();
		$this->load->view('home',$data);
	}

    function result(){
    	$data['rute']=$this->m_account->cari();
    	$this->load->view('cari', $data);
    }

    function payment(){
    	$this->load->view('payment', $data);
    }
}
