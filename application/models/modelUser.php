<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modelUser extends CI_Model {
	
	function AmbilKntkUser(){
		return $this->db->query('SELECT * FROM `admin` ');
	}

	function CekStatusUser($userid){
		return $this->db->select('Status')->select('Username')->where('idPengguna',$userid)->get('admin');
	}

	// function ambilHrg($brg){
	// 	return $this->db->select('Harga')->where('idBarang',$brg)->get('barang');
	// }

	// function AmbilPesanan(){
	// 	return $this->db->query('SELECT * FROM simpansementara ');
	// }

	function UbahStsUser($iduser, $stts){

	$val = array('Status' => $stts );
		$this->db->where('idPengguna',$iduser);
		$this->db->update('admin', $val);
	}

	function TambahKasir()
	{	
		$val= array(
			'Username'=> htmlspecialchars($this->input->post('name',true)), 
			'Pasword'=> password_hash($this->input->post('Password'),PASSWORD_DEFAULT),
			'Email'=> htmlspecialchars($this->input->post('email'), true) ,
			'NoHp'=> htmlspecialchars($this->input->post('NoHP'),true),
			'Posisi'=> 'Kasir',
			'Status'=> '1',
			'Alamat'=> htmlspecialchars($this->input->post('Alamat'),true) ,
			'foto'=> 'baseline_person_black_36dp.png'
			);

		$this->db->insert('admin', $val);

	}

	function CekEmail(){
		return $this->db->get_where('admin',['Email'=>$this->input->post('email')]);
	}	


}