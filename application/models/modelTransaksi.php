<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modelTransaksi extends CI_Model {
	
	function tmbTransaksi($brg){
		return $this->db->where('idBarang',$brg)->get('dtbrg');


		// $val= array(
		// 	'IdBarang'=> $brg, 
		// 	'TglTransaksi' => date('y/m/d'),
		// 	'JumlahBeli' => $Data,
		// 	'IdKasir' => '2',
		// 	);
		
		// $this->db->insert('simpansementara', $val);
	}

	function Ambilstok($id){
		return $this->db->select('Stock')->where('idBarang',$id)->get('barang');
	}

	function KurangStock($id, $jmlSkarang){
		$val = array('Stock' => $jmlSkarang);
		$this->db->where('idBarang', $id);
		$this->db->update('barang', $val);
	}

}