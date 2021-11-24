<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'controlerLogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['logout'] = 'controlerLogin/logout';
$route['Regis'] = 'controlerRegister';
$route['Admin'] = 'controlerAdmin';

// barang
$route['AmbilDtBarang'] = 'ControlerBarang';
$route['AmbilMerek'] = 'ControlerBarang/Merek';
$route['AmbilFarian'] = 'ControlerBarang/Farian';
$route['AmbilSatuan'] = 'ControlerBarang/Satuan';
$route['SimpanBarang'] = 'ControlerBarang/SimpanBarang';
$route['uploadGambar'] = 'ControlerBarang/uploadGambar';
$route['EditBarang'] = 'ControlerBarang/EditBarang';
$route['UbahStok/(:any)'] = 'ControlerBarang/TambhStok/$1';
$route['HapusDtBarang/(:any)'] = 'ControlerBarang/HapusBarang/$1';
$route['AmbilDtEdit/(:any)'] = 'ControlerBarang/AmbilBrgEdit/$1';
$route['AmbilStok/(:any)'] = 'ControlerBarang/AmbilStok/$1';
$route['Cari/(:any)'] = 'ControlerBarang/CariBarang/$1';
$route['cetakBrg'] = 'ControlerBarang/cetakBrg';


// pembelian
$route['hapusChart/(:any)'] = 'ControlerTransaksi/hapusChart/$1';
$route['TamhPembelian/(:any)'] = 'ControlerTransaksi/tmbPembelian/$1';
$route['AmbilPesanan'] = 'ControlerTransaksi';
$route['hapusChartAll'] = 'ControlerTransaksi/hapusChartAll';
$route['ambilChart'] = 'ControlerTransaksi';
$route['bayar'] = 'ControlerTransaksi/bayar';
$route['jumlah/(:any)/(:any)'] = 'ControlerTransaksi/jumlah/$1/$2';

// Data User
$route['AmbilDtUser'] = 'ControlerUser';
$route['TambahUser'] = 'ControlerUser/TambahUser';
$route['CekEmail'] = 'ControlerUser/CekEmail';
$route['UbahDStatus/(:any)'] = 'ControlerUser/UbahStsUser/$1';
// Laporan
$route['buatLaporan/(:any)/(:any)'] = 'ControlerLaporan/buatLaporan/$1/$2';

// lain lain
$route['MerekBaru'] = 'ControlerLain/index';
$route['FarianBaru'] = 'ControlerLain/FarianBaru';
$route['SatuanBaru'] = 'ControlerLain/SatuanBaru';
// $route['Hapus/(:any)'] = 'HapusControler/HapusData/$1';
// $route['Edit'] = 'EdittCountroller/Ubah';
// $route['getData'] = 'controlerHome/getData';
// $route['JudulBukuGet'] = 'JudulBukuCountroller/getData';
// $route['tambahData'] = 'TambahDataCountroller/TambahData';
// $route['Nom'] = 'TambahDataCountroller/NoOto';
// $route['tampilPengarang/(:any)'] = 'JudulBukuCountroller/tampilPeng/$1';
// $route['tampilEd/(:any)'] = 'controlerHome/tampilEdit/$1';
// $route['Cari/(:any)'] = 'controlerHome/cariData/$1';
// $route['Ujicoba'] = 'ujicobaCountroller';
