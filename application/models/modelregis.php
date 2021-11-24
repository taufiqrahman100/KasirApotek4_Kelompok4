<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modelregis extends CI_Model {
	
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
	

}