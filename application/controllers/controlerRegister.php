<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class controlerRegister extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('modelregis');
	}


	public function index(){

		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('NoHP','Number Phone','required|trim|numeric');
		$this->form_validation->set_rules('Alamat','Addres','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[admin.Email]',[
				'is_unique' => 'Email Sudah Digunakan'
			]);
		$this->form_validation->set_rules('Password','password','required|trim|min_length[4]|matches[RepeatPassword]',[
				'matches' => 'Pasword tidak sama!',
				'min_length' => 'Pasword min 4 Karakter!'
			]);
		$this->form_validation->set_rules('RepeatPassword','Password','required|trim|matches[Password]');

		
		if ($this->form_validation->run() == false)
		{
			$this->load->view('admin');
		} else 
		{
			$this->modelregis->TambahKasir();
			redirect('controlerAdmin');
		}
	}
	

}
