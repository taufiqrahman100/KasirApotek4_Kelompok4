<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modelLaporan extends CI_Model {
	
	function AmbilLaporan($bulan, $tahun)
	{	
		return $this->db->where('year(TglTransaksi)', $tahun)
						->where('month(TglTransaksi)', $bulan)
							->get('laporan');
		// query('SELECT * FROM `laporan` WHERE month(TglTransaksi) = $bulan and ');
	}

	function AmbilTotal($bulan, $tahun)
	{	
		return $this->db->select_sum('Subtotal')
						->where('year(TglTransaksi)', $tahun)
						->where('month(TglTransaksi)', $bulan)
							->get('laporan');
		// query('SELECT * FROM `laporan` WHERE month(TglTransaksi) = $bulan and ');
	}
	

}