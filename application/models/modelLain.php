<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modelLain extends CI_Model {
	
	function tAMBAHmEREK($data)
	{	
		$val= array(
			'Merek'=> htmlspecialchars($data) 
			);

		$this->db->insert('merek', $val);

	}

	function cekMerek($Data){
		return $this->db->where('Merek',$Data)->get('merek');
	}

	function tAMBAHfARIAN($Data)
	{	
		$val= array(
			'Farian'=> htmlspecialchars($Data) 
			);

		$this->db->insert('farian', $val);

	}

	function cekFarian($Data){
		return $this->db->where('Farian',$Data)->get('farian');	
	}
	
	function tAMBAHsTUAN($Data)
	{	
		$val= array(
			'Satuan'=> htmlspecialchars($Data) 
			);

		$this->db->insert('satuan', $val);

	}

	function cekSatuan($Data){
		return $this->db->where('Satuan',$Data)->get('satuan');	
	}

}