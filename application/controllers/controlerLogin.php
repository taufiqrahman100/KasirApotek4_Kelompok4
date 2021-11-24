<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class controlerLogin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}


	public function index(){
		$this->form_validation->set_rules('Email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('Password','Password','required|trim');

		if ($this->form_validation->run() == false)
		{
			$this->load->view('Login');
		} else 
		{
			$this->_login();
		}
		
	}
	
	private function _login(){
		$email = $this->input->post("Email");
		$Password = $this->input->post('Password');

		$User = $this->db->get_where('admin',['Email' => $email])->row_array();
		
		if($User){
			// cek user aktiv
			if ($User['Status'] == 1) {
				// cek pasword
				if (password_verify($Password, $User['Pasword'])) {
					$data = [
						'email' => $User['Email'],
						'id' => $User['IdPengguna'],
						'Status' => $User['Status']
					];
						$this->session->set_userdata($data);
					if ($User['Posisi'] == 'Admin') {
						redirect('controlerAdmin');
					}else{
						redirect('controlerKasir');
					}
					
					
				} else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Your Password Wrong!</div>');
					redirect('controlerLogin');
				}
			} else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">You Are Not An Employee In Here Again!</div>');
				redirect('controlerLogin');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Your email wrong, Please Login Again!</div>');
			redirect('controlerLogin');
		}

	}

	public function logout(){
		$this->session->unset_userdata('email');	
		$this->session->unset_userdata('Status');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">You Succes logout!</div>');
		redirect('controlerLogin');
	}

}
