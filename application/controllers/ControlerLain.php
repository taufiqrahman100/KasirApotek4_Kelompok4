<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlerLain extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('modelLain');
	
	}

	public function index()
	{	
		$Data = $this->input->post('MerkNew');
		$cek = $this->modelLain->cekMerek($Data)->row();
		if (!$cek) {
			$this->modelLain->tAMBAHmEREK($Data);
			$response = array('info' => 'Merek Berhasil Ditambahkan' );


		} else {
			$response = array('info' => 'Merek Sudah Ada' );
		}
		

		

		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit;	
	}

	public function FarianBaru()
	{	
		$Data = $this->input->post('FarnNew');
		
		$cek = $this->modelLain->cekFarian($Data)->row();
		if (!$cek) {
			$this->modelLain->tAMBAHfARIAN($Data);
			$response = array('info' => 'Farian Berhasil Ditambahkan' );


		} else {
			$response = array('info' => 'Farian Sudah Ada' );
		}
		

		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit;	
	}

	public function SatuanBaru()
	{	
		$Data = $this->input->post('StnNew');
		$cek = $this->modelLain->cekSatuan($Data)->row();
		if (!$cek) {
			$this->modelLain->tAMBAHsTUAN($Data);
			$response = array('info' => 'Satuan Berhasil Ditambahkan' );

		} else {
			$response = array('info' => 'Satuan Sudah Ada' );
		}


		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit;	
	}
}
