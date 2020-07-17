<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function is_logged()
{
	$get =& get_instance();
	
	if(!$get->session->userdata('is_logged'))
	{
			redirect('login');
	}
}

function hari($hari)
{
 switch($hari){      
	case 0 : {
				$hari='Minggu';
			}break;
	case 1 : {
				$hari='Senin';
			}break;
	case 2 : {
				$hari='Selasa';
			}break;
	case 3 : {
				$hari='Rabu';
			}break;
	case 4 : {
				$hari='Kamis';
			}break;
	case 5 : {
				$hari="Jum'at";
			}break;
	case 6 : {
				$hari='Sabtu';
			}break;
	default: {
				$hari='UnKnown';
			}break;
	
}
	return $hari;
}

function active_menu($index,$menu=null)
{
	$surat	=	array(
		'Surat Masuk','Surat Keluar','Surat Keputusan','Surat Perjanjian (Mou)'
	);

	$naskah	=	array(
		'Tata Naskah','Klasifikasi Masalah','Takah Peredaran'	
	);
	
	$aktifitas = array(
		'Daily Activity','Realisasi Daily Activity'	
	);

	$dokumen = array(
		'Formulir','Prosedur','Format Surat'
	);

	$inventory = array(
		'Ruang Meeting','Kelola Ruang'	
	);
	$sppd	= array(
		'Pengajuan SPPD',
		'Data Pengajuan SPPD',
		'Persetujuan GA',
		'Persetujuan Atasan',
		'Persetujuan Personalia',
		'Persetujuan HCM',
		'Persetujuan Budget Control',
		'Persetujuan Akunting',
		'Persetujuan Keuangan',
		'Persetujuan Direktur Keuangan',
		'Persetujuan Direktur Utama',
		'Pencairan',
		'Persetujuan Realisasi',
		'Persetujuan CA',
		'Laporan Anggaran',
		'Anggaran SPPD',
		'Cash Advance',
		'Realisasi SPPD',
	);
	$sistem = array(
		'Pengguna','Hak Akses','Ruang'	
	);
	$programkerja = array(
		'Program Kerja',
		'Realisasi Program Kerja'	
	);
	$pengawasan = array(
		'Laporan Pengawasan'	
	);
	$monitoring = array(
		'Laporan Monitoring'	
	);
	$keuangan	=	array(
		'Chart of Account',
		'Form Anggaran',
		'Daftar Anggaran',
		'Form Pengajuan Dana',
		'Daftar Pengajuan Dana',
		'Cash Advance Keuangan',
		'Pengembalian CA',
		'Transaksi',
		'Anggaran',
		'Realisasi Anggaran'	
	);
	
	if($index == $menu)
	{
		return 'active';	
	}
	else if(($index == 'Surat'))
	{
		return (in_array($menu,$surat))?'active open':'';
	}
	else if(($index == 'Naskah'))
	{
		return (in_array($menu,$naskah))?'active open':'';
	}
	else if(($index == 'Dokumen'))
	{
		return (in_array($menu,$dokumen))?'active open':'';
	}
	else if(($index == 'Inventory'))
	{
		return (in_array($menu,$inventory))?'active open':'';
	}
	else if(($index == 'SPPD'))
	{
		return (in_array($menu,$sppd))?'active open':'';
	}
	else if(($index == 'Sistem'))
	{
		return (in_array($menu,$sistem))?'active open':'';
	}
	else if(($index == 'Aktivitas'))
	{
		return (in_array($menu,$aktifitas))?'active open':'';
	}
	else if(($index == 'Program Kerj'))
	{
		return (in_array($menu,$programkerja))?'active open':'';
	}
	else if(($index == 'Sistem Pengawasan'))
	{
		return (in_array($menu,$pengawasan))?'active open':'';
	}
	else if(($index == 'Monitoring'))
	{
		return (in_array($menu,$monitoring))?'active open':'';
	}
	else if(($index == 'Keuangan'))
	{
		return (in_array($menu,$keuangan))?'active open':'';
	}
	
}

function scriptjavascript($url)
{
	return "<script src=".base_url().$url."></script>";	
}

function scriptcss($url)
{
	return "<link rel='stylesheet' href='".base_url()."' />";	
}
?>