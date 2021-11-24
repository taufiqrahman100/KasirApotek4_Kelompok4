<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlerTransaksi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('modelTransaksi');
	
	}
	
	public function index()
	{
		$response = $this->show_cart();

		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function tmbPembelian($brg)
	{
		// parse_str(file_get_contents('php://input'), $jmlBli);
		// // $hrg = $this->modelTransaksi->ambilHrg($brg)->row;
		// $data_produk = array(
		// 	'id' => '1', 
		// 	'name' => 'anngga', 
		// 	'price' => '2000', 
		// 	'qty' => '3', 
		// );
		$data = $this->modelTransaksi->tmbTransaksi($brg)->row();
		$data_produk = array(
			'id' => $data->idBarang, 
			'name' => $data->NamaBarang,
			'price' => $data->Harga,
			'qty' => '1',
			'satuan' => $data->Satuan,
			'merek' => $data->Merek,
			'farian' => $data->farian,
			'stok' => $data->Stock
			);
		$this->cart->insert($data_produk);
		// $data1 = $this->cart->contents();
		$response = $this->show_cart();

		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function show_cart(){ //Fungsi untuk menampilkan Cart
		$output = '';
		$no = 0;
		foreach ($this->cart->contents() as $items) {
			$no++;
			$output .='
				<tr>
					<td>'.$no.'</td>
					<td>'.$items['name'].' '.$items['merek'].' '.$items['farian'].'</td>
					<td> <input type="number" name="angga" value="'.$items['qty'].'" style="width: 60px;" min="1" max="'.$items['stok'].'" id="'.$items['rowid'].'" class="jumlahhh"></input>'.$items['satuan'].'</td>
					<td>'.number_format($items['price']).'</td>
					<td> Rp. '.number_format($items['subtotal']).'</td>
					<td><button type="button" id="'.$items['rowid'].'" class="hps hapus_cart btn btn-danger btn-xs"><i class="far fa-window-close"></i></button></td>
				</tr>
			';
		}
		$output .= '
			<tr>
				<th colspan="4">Total</th>
				<th colspan="2">'.'Rp. '.number_format($this->cart->total()).'</th>
			</tr>
		';
		return $response = array('tampilan' => $output, 
								'Nomor' => $no
								); 
	}

	public function hapusChart($id){
		$data = array(
			'rowid' => $id, 
			'qty' => 0, 
		);
		$this->cart->update($data);
		$response =  $this->show_cart();
		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function jumlah($id, $nilai){
		$data = array(
			'rowid' => $id, 
			'qty' => $nilai, 
		);
		$this->cart->update($data);
		$response =  $this->show_cart();
		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function hapusChartAll(){
		$this->cart->destroy();
		$response =  $this->show_cart();
		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;	
	}

	public function bayar(){
		$tanggal = date('y/m/d');
		$idUser = $this->session->userdata('id');
		foreach ($this->cart->contents() as $item) {
			$dtachart  = array(	'IdBarang' =>  $item['id'],
								'TglTransaksi' => $tanggal,
								'JumlahBeli' => $item['qty'],
								'IdPengguna' => $idUser,
								'Subtotal' => $item['subtotal']
			);
		$this->db->insert('penjualan', $dtachart);
		$stokawal = $this->modelTransaksi->Ambilstok($item['id'])->row();

		$jmlSkarang = $stokawal->Stock - $item['qty'];
		$this->modelTransaksi->KurangStock($item['id'], $jmlSkarang);
		}
		$this->cart->destroy();


		
		$response  = array('info' => 'Transaksi Berhasil',
							'tampil' => $this->show_cart()
							);
		
		$this->output
			->set_status_header(201) 
			->set_content_type('application/json') 
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;	
	}

	
}
