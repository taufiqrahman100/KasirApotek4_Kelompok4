<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlerUser extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('modelUser');
	
	}
	
	public function index()
	{
		$response = $this->modelUser->AmbilKntkUser()->result();

		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit;
	}

	public function CekEmail(){
		$response = $this->modelUser->CekEmail()->row();

		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit;
	} 

	function UbahStsUser($iduser){
		$cekStatus = $this->modelUser->CekStatusUser($iduser)->row();
		if ($cekStatus->Status == 1) {
			$Stts = '0';
		} else {
			$Stts = '1';
		}

		if ($cekStatus->Status == 1) {
			$Setus = 'Nonaktif';
		} else {
			$Setus = 'Aktif';
		}

		$nama = $cekStatus->Username;
		// $t = $cekStatus->Status;
		$this->modelUser->UbahStsUser($iduser,$Stts);
		$response = array('info' => $nama.' Sekarang '.$Setus );
		
		$this->output
					->set_status_header(201)
					->set_content_type('aplication/json')
					->set_output(json_encode($response, JSON_PRETTY_PRINT))
					->_display();
		exit;
	}
	function TambahUser(){
		$this->modelUser->TambahKasir();

		$response = array('info' => 'User Berhasil Ditambahkan' );
		
		$this->output
					->set_status_header(201)
					->set_content_type('aplication/json')
					->set_output(json_encode($response, JSON_PRETTY_PRINT))
					->_display();
		exit;
	}

	
}
