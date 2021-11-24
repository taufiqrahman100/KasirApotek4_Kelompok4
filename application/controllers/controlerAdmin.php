<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controlerAdmin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$user = $this->db->get_where('admin',['Email'=>$this->session->userdata('email')])->row_array();
		if (!$this->session->userdata('email')) {
			redirect('controlerLogin');
		} else if ($user['Posisi'] !== 'Admin') {
			redirect('controlerKasir');
		}
	}

	public function index()
	{
		$data['title'] = "Admin";
		$data['sidebar'] = 'layout/sidebarAdmin';
		$data['User'] = $this->db->get_where('admin',['Email'=>$this->session->userdata('email')])->row_array();
		$data['Beranda'] = 'konten/Beranda';
		
		$this->load->view('admin',$data);
		// echo "Selamat datang".$data['User']['Username'];
	}

}
