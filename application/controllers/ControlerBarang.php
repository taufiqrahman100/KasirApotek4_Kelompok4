
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlerBarang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('modelBarang');
	
	}
	
	public function index()
	{
		$response = $this->modelBarang->AmbilDtBarang()->result();

		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit;
	}

	public function Merek()
	{
		$response = $this->modelBarang->Merek()->result(); 
		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}
	
	public function farian(){
		$response = $this->modelBarang->farian()->result(); 
		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function Satuan(){
		$response = $this->modelBarang->Satuan()->result(); 
		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}
	
	public function uploadGambar(){
      	// upload dengan crop
      	// $this->load->view('upload');

		// Upload Tanpa Crop
        $config['upload_path'] = './assets/img/fotoBarang/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // $config['max_size']  = '1000';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
 
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('file')){
            $status = "error";
            $msg = $this->upload->display_errors();
        }
        else{
            $dataupload = $this->upload->data();
            $status = "success";
            $msg = $dataupload['file_name']." berhasil diupload";
        }
        $this->output
        	->set_content_type('application/json')
        	->set_output(json_encode(array('status'=>$status,'msg'=>$msg, 'nama'=>$dataupload['file_name'])));



	}

	public function SimpanBarang()
	{
		parse_str(file_get_contents('php://input'), $Data);
		$this->modelBarang->SimpanBarang($Data);

		$response =  array('info' => 'Barang Ditambahkan' );
		
		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function HapusBarang($HpsBrng)
	{
		$this->modelBarang->HapusBarang($HpsBrng);

		$response =  array('info' => 'Barang sudah dihapus' );
		
		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function AmbilBrgEdit($EdtBarang){

		$response = $this->modelBarang->AmbilBrgEdit($EdtBarang)->row();
		
		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function EditBarang(){
		parse_str(file_get_contents('php://input'), $Data);

		$this->modelBarang->EditBarang($Data);

		$response = array('info' => 'Data Telah Di rubah');
		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function AmbilStok($idBrg){
		$response = $this->modelBarang->Ambilstok($idBrg)->row();
		
		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;		
	}
	public function TambhStok($idBrg){
		$stokawal = $this->modelBarang->Ambilstok($idBrg)->row(); 
		$Data = $this->input->POST('StokBru');

		$jmlSkarang = $stokawal->Stock + $Data; 

		$this->modelBarang->TmbhStock($idBrg, $jmlSkarang);
		$response = array('info' => 'Stok Berhasil Ditambahkan');

		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function CariBarang($valCri){
		$response = $this->modelBarang->CariBarang($valCri)->result();

		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function cetakBrg(){
		$data['Barang'] = $this->modelBarang->AmbilDtBarang()->result();
	}
}
