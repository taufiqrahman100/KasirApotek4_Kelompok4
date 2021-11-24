<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controlerKasir extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('controlerLogin');
		}
	}
	
	public function index()
	{
		$data['title'] = "Kasir";
		$data['sidebar'] = 'layout/sidebarKasir';
		$data['User'] = $this->db->get_where('admin',['Email'=>$this->session->userdata('email')])->row_array();
		$data['Beranda'] = 'konten/BerandaKasir';
		// echo "Selamat datang".$data['User']['Username'];
		$this->load->view('admin',$data);
	}

	
}
