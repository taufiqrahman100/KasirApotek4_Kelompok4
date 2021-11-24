<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modelBarang extends CI_Model {
	
	function AmbilDtBarang(){
		return $this->db->query('SELECT idBarang, Merek, NamaBarang, Stock, Harga, Gambar, Satuan, farian FROM barang, merek, satuan, farian WHERE merek.idMerek= barang.idMerek  and  satuan.IdSatuan = barang.IdSatuan  and  farian.IdFarian = barang.IdFarian');
	}

	function Merek(){	
	  return $this->db->query('Select * from merek');	
	}

	function farian(){
		return $this->db->query('Select * from farian');	
	}

	function Satuan(){
		return $this->db->query('Select * from satuan');	
	}

	function SimpanBarang($Data){
		$val= array(
			'NamaBarang'=> $Data['NamaBarang'], 
			'IdMerek'=> $Data['Merek'], 
			'Stock'=>$Data['Jumlah'],
			'Harga'=>$Data['Harga'],
			'IdFarian'=>$Data['Farian'],
			'IdSatuan'=>$Data['Satuan'],
			'Gambar'=>$Data['nama_gambar'],
			);
		
		$this->db->insert('barang', $val);

	}
	
	function HapusBarang($HpsBrng){
		$this->db->delete('barang', array('idBarang' => $HpsBrng));
	}

	function AmbilBrgEdit($EdtBarang){
		return $this->db->where("idBarang",$EdtBarang)->get('barang');
	}

	function EditBarang($Data){
		$val = array(
			'idMerek' => $Data['EdMerek'],
			'NamaBarang' => $Data['EdNamaBarang'],
			'Stock' => $Data['EdJumlah'],
			'Harga' => $Data['EdHarga'],
			'IdFarian'=>$Data['EdFarian'],
			'IdSatuan'=>$Data['EdSatuan']
		);

		$id = $Data['Sembunyi'];
		$this->db->where('idBarang', $id);
		$this->db->update('barang', $val);
	}

	function Ambilstok($idBrg){
		return $this->db->select('Stock')->where('idBarang',$idBrg)->get('barang');
	}

	function TmbhStock($idBrg, $jmlSkarang){
		$val = array('Stock' => $jmlSkarang);
		$this->db->where('idBarang', $idBrg);
		$this->db->update('barang', $val);
	}

	function CariBarang($valCri){
		if ($valCri =='0')  {
			return $this->db->query('SELECT idBarang, Merek, NamaBarang, Stock, Harga, Gambar, Satuan, farian FROM barang, merek, satuan, farian WHERE merek.idMerek= barang.idMerek  and  satuan.IdSatuan = barang.IdSatuan  and  farian.IdFarian = barang.IdFarian');

		} else{
		 return $this->db->or_like('NamaBarang',$valCri)
		 				->or_like('Merek',$valCri)
		 				->or_like('farian',$valCri)
		 				->or_like('Stock',$valCri)
		 				->or_like('Harga',$valCri)
						->get("dtbrg");
		}
	}
}








