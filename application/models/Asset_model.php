<?php
class Asset_model extends CI_Model { 
	
	public function __construct()
	{
		parent::__construct();
			 
	}
	
	private function _id_pengajuan()
	{
		$date		= date('Ymd');
		$select		= "SELECT (MAX(SUBSTRING(id_pengajuan,9))+1) AS maxkode FROM ta_pengajuanasset 
						WHERE id_pengajuan LIKE '".$date."%'";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode; 
		if($maxkode==null){
			$maxkode = 1;
		}
		 
		// $sequence	= $date.str_pad($maxkode, 4, "0", STR_PAD_LEFT); 
		$sequence	= $date.$maxkode; 
		return $sequence; 
	}
	
	private function _kode_pengajuan()
	{
		$kode		= "PGJ-".date('Ymd');
		$select		= "SELECT (MAX(SUBSTRING(kode_pengajuan,13))+1) AS maxkode FROM ta_pengajuanasset 
						WHERE kode_pengajuan LIKE '".$kode."%'";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode; 
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= $kode.$maxkode; 
		return $sequence;  
	} 
	
	private function _kode_asset($kodeJnsAsset,$kodeKategori,$kodeNmBrg,$tglPembelian,$a,$b,$c)
	{
		 
		$date		= explode("-",$tglPembelian);	
		$year		= substr($date[0],2,2);
		$month		= $date[1];
		// $jns		= substr($kodeJnsAsset,3);
		// $kategori	= substr($kodeKategori,3);
		// $kodeBrg	= substr($kodeNmBrg,4);										
		
		if ($kodeJnsAsset==NULL) {
			$kodeJnsAsset="0";
		} else {
			$kodeJnsAsset=$kodeJnsAsset->kode_jns;
		} if ($kodeKategori == NULL) {
			$kodeKategori = "0";
		} else {
			$kodeKategori=$kodeKategori->kode_k;
		} if ($kodeNmBrg == NULL){
			$kodeNmBrg = "0"; 
		} else {
			$kodeNmBrg=$kodeNmBrg->kode_b;
		}		
		$kode		= $year.".".$month."-".$kodeJnsAsset.".".$kodeKategori.".".$kodeNmBrg."-";
		$length		= strlen($kode)+1; 
		$select		= "SELECT (MAX(SUBSTRING(kode_asset,".$length."))+1) AS maxkode FROM ta_asset 
						WHERE kode_jenisasset='".$a."' AND kode_kategori='".$b."' 
						AND kode_namabarang='".$c."' AND kepemilikan_asset='PERUSAHAAN'"; 
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode; 
		if($maxkode==null){
			$maxkode = 1;
		}	
		$sequence	= $kode.$maxkode; 
		return $sequence;  
		
	}
	
	private function _kode_sewa_asset($kodeJnsAsset,$kodeKategori,$kodeNmBrg,$tglPembelian)
	{
		
		$date		= explode("-",$tglPembelian);	
		$year		= substr($date[0],2,2);
		$month		= $date[1];
		// $jns		= substr($kodeJnsAsset,3);
		// $kategori	= substr($kodeKategori,3);
		// $kodeBrg	= substr($kodeNmBrg,4);

		if ($kodeJnsAsset==NULL) {
			$kodeJnsAsset="0";
		} else {
			$kodeJnsAsset=$kodeJnsAsset->kode_jns;
		} if ($kodeKategori == NULL) {
			$kodeKategori = "0";
		} else {
			$kodeKategori=$kodeKategori->kode_k;
		} if ($kodeNmBrg == NULL){
			$kodeNmBrg = "0"; 
		} else {
			$kodeNmBrg=$kodeNmBrg->kode_b;
		}
		
		$kode		= $year.".".$month."-".$jns.".".$kategori.".".$kodeBrg."-";
		$length		= strlen($kode)+1; 
		$select		= "SELECT (MAX(SUBSTRING(kode_asset,".$length."))+1) AS maxkode FROM ta_asset 
						WHERE kode_jenisasset='".$kodeJnsAsset."' AND kode_kategori='".$kodeKategori."' 
						AND kode_namabarang='".$kodeNmBrg."' AND kepemilikan_asset='PENYEWAAN'"; 
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode; 
		if($maxkode==null){
			$maxkode = 1;
		}
		
		$sequence	= $kode.$maxkode; 
		return $sequence;  
		
	}
	
	private function _id_perlakuan()
	{
		$date 		= date('Ymd'); 
		$select		= "SELECT (MAX(SUBSTRING(id_perlakuan,9))+1) AS maxkode FROM ta_perlakuanasset";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode; 
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= $date.$maxkode;
		return $sequence; 
	} 	
	
	public function get_sequence_asset() //tidak bisa diganti karena digunakan sebelum proses save
	{
		$sequence	= $this->Libasset_model->sequence_number('ID ASSET', '', 3, TRUE, TRUE); 
		return $sequence;
	} 
	
	public function get_sequence_sewaasset() //tidak bisa diganti karena digunakan sebelum proses save
	{
		$sequence	= $this->Libasset_model->sequence_number('ID SEWA ASSET', '', 3, TRUE, TRUE); 
		return $sequence;
	} 
	
	public function get_sequence_distribusi() //tidak bisa diganti karena digunakan sebelum proses save
	{
		$sequence	= $this->Libasset_model->sequence_number('ID DISTRIBUSI', '', 3, TRUE, TRUE); 
		return $sequence;
	}
	
	public function get_sequence_assetkend() //tidak bisa diganti karena digunakan sebelum proses save
	{
		$sequence	= $this->Libasset_model->sequence_number('ID ASSET KENDARAAN', '', 3, TRUE, TRUE); 
		return $sequence;
	} 
	
	public function get_sequence_assettanah() //tidak bisa diganti karena digunakan sebelum proses save
	{
		$sequence	= $this->Libasset_model->sequence_number('ID ASSET TANAH', '', 3, TRUE, TRUE); 
		return $sequence;
	} 	
	
	public function get_sequence_pjkkend() //tidak bisa diganti karena digunakan sebelum proses save
	{
		$sequence	= $this->Libasset_model->sequence_number('ID PAJAK KEND', '', 3, TRUE, TRUE); 
		return $sequence;
	}
	
	public function get_sequence_pjktnh() //tidak bisa diganti karena digunakan sebelum proses save
	{
		$sequence	= $this->Libasset_model->sequence_number('ID PAJAK TNHBGN', '', 3, TRUE, TRUE); 
		return $sequence;
	}
	
	public function get_sequence_mainten() //tidak bisa diganti karena digunakan sebelum proses save
	{
		$sequence	= $this->Libasset_model->sequence_number('ID MAINTENANCE', '', 3, TRUE, TRUE); 
		return $sequence;
	}

	public function get_sequence_kir() //tidak bisa diganti karena digunakan sebelum proses save
	{
		$sequence	= $this->Libasset_model->sequence_number('ID KIR', '', 3, TRUE, TRUE); 
		return $sequence;
	}
	
	public function get_sequence_pemakaian()
	{
		$sequence	= $this->Libasset_model->sequence_number('ID PEMAKAIAN', '', 3, TRUE, TRUE); 
		return $sequence;
	}  
	
	private function _kode_tempstokopname()
	{
		$sequence	= $this->Libasset_model->sequence_number('KODE TEMPASSET', '', 10, FALSE, FALSE); 
		return $sequence;
	}
	
	private function _kode_stokopname()
	{
		$sequence	= $this->Libasset_model->sequence_number('KODE STOKOPNAME ASSET', '', 10, TRUE, TRUE); 
		return $sequence;
	} 
	
	private function _id_peminjaman()
	{
		$sequence	= $this->Libasset_model->sequence_number('ID PEMINJAMAN', '', 3, TRUE, TRUE); 
		return $sequence;
	}
	
	public function dashboard_asset()
	{
		$select = "
		SELECT 
		(SELECT Count(ta_pengajuanasset.id_pengajuan) AS pengajuanasset FROM ta_pengajuanasset WHERE ta_pengajuanasset.status =  'PENGAJUAN') AS pengajuan_asset,
		(SELECT Count(ta_asset.id_asset) AS assetrusak FROM ta_asset WHERE ta_asset.kondisi_asset =  'RUSAK' AND ta_asset.kepemilikan_asset =  'PERUSAHAAN') AS asset_rusak,
		(SELECT Count(ta_asset.id_asset) AS assethilang FROM ta_asset WHERE ta_asset.kondisi_asset =  'HILANG' AND ta_asset.kepemilikan_asset =  'PERUSAHAAN') AS asset_hilang,
		(SELECT Count(ta_asset.id_asset) AS assetlayak FROM ta_asset WHERE ta_asset.kondisi_asset =  'LAYAK' AND ta_asset.kepemilikan_asset =  'PERUSAHAAN') AS asset_layak,
		(SELECT Count(ta_asset.id_asset) AS assetmilik FROM ta_asset WHERE ta_asset.kepemilikan_asset =  'PERUSAHAAN') AS asset_perusahaan,
		(SELECT Count(ta_asset.id_asset) AS assetsewa FROM ta_asset WHERE ta_asset.kepemilikan_asset =  'PENYEWAAN') AS asset_penyewaan,
		(SELECT Count(ta_peminjamanasset.id_peminjaman) AS peminjaman_asset FROM ta_peminjamanasset WHERE ta_peminjamanasset.status =  '1') AS asset_dipinjam";
		$query = $this->db->query($select);
		$result= $query->row();
		return $result;
		
	}
	
	public function dashboard_info_asset()
	{
		$startDate = time();
		$tglPajak = date('Y-m-d', strtotime('+7 day', $startDate)); 
		$select = "
		SELECT 
		(
			SELECT COUNT(id_assetkendaraan) AS pjkblmbayar FROM 
			(
			SELECT assetkendaraan.id_assetkendaraan, 
			CASE WHEN ta_pajakkendaraan.tahun_pajak IS NULL THEN 'BELUM BAYAR' ELSE 'SUDAH BAYAR' END AS status_pajak
			FROM (
			SELECT
			YEAR(CURDATE()) AS tahunsekarang,
			ta_assetkendaraan.kode_asset,
			ta_assetkendaraan.id_assetkendaraan
			FROM
			ta_assetkendaraan
			WHERE ta_assetkendaraan.tgl_pajak <='".$tglPajak."'
			) AS assetkendaraan
			Left Join ta_pajakkendaraan ON ta_pajakkendaraan.id_assetkendaraan = assetkendaraan.id_assetkendaraan AND ta_pajakkendaraan.tahun_pajak = assetkendaraan.tahunsekarang
			) AS cekpajak
			WHERE cekpajak.status_pajak='BELUM BAYAR'
		) AS pajak_kendaraan,
		(
			SELECT COUNT(id_assettnhbgn) AS pjkblmbayar FROM 
			(
			SELECT assettnhbgn.id_assettnhbgn, 
			CASE WHEN ta_pajaktnhbgn.tahun_pajak IS NULL THEN 'BELUM BAYAR' ELSE 'SUDAH BAYAR' END AS status_pajak
			FROM (
			SELECT
			YEAR(CURDATE()) AS tahunsekarang,
			ta_assettnhbgn.kode_asset,
			ta_assettnhbgn.id_assettnhbgn
			FROM
			ta_assettnhbgn
			WHERE ta_assettnhbgn.tgl_pajak <='".$tglPajak."'
			) AS assettnhbgn
			Left Join ta_pajaktnhbgn ON ta_pajaktnhbgn.id_assettnhbgn = assettnhbgn.id_assettnhbgn AND ta_pajaktnhbgn.tahun_pajak = assettnhbgn.tahunsekarang
			) AS cekpajak
			WHERE cekpajak.status_pajak='BELUM BAYAR'
		) AS pajak_tanah";
		
		$query = $this->db->query($select);
		$result= $query->row();
		return $result;
	}
	
	public function detail_asset_dashboard()
	{
		$select = "
		SELECT
		(
			SELECT
			Count(ta_asset.id_asset) AS assettanah
			FROM
			ta_asset
			INNER JOIN ma_jenisasset ON ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset
			WHERE
			ma_jenisasset.nama_jenisasset =  'TANAH DAN BANGUNAN' AND
			ta_asset.AKTIF =  'YES' AND
			ta_asset.kepemilikan_asset =  'PERUSAHAAN'
		) AS assettnh_milik,
		(
			SELECT
			Count(ta_asset.id_asset) AS asset_kendaraan
			FROM
			ta_asset
			INNER JOIN ma_jenisasset ON ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset
			WHERE
			ma_jenisasset.nama_jenisasset =  'KENDARAAN' AND
			ta_asset.AKTIF =  'YES' AND
			ta_asset.kepemilikan_asset =  'PERUSAHAAN'
		) AS assetkendaraan_milik,
		(
			SELECT
			Count(ta_asset.id_asset) AS asset_elektronik
			FROM
			ta_asset
			INNER JOIN ma_jenisasset ON ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset
			WHERE
			ma_jenisasset.nama_jenisasset =  'PERALATAN' AND
			ta_asset.AKTIF =  'YES' AND
			ta_asset.kepemilikan_asset =  'PERUSAHAAN'
		) AS assetelektronik_milik,
		(
			SELECT
			Count(ta_asset.id_asset) AS assettanah
			FROM
			ta_asset
			INNER JOIN ma_jenisasset ON ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset
			WHERE
			ma_jenisasset.nama_jenisasset =  'TANAH DAN BANGUNAN' AND
			ta_asset.AKTIF =  'YES' AND
			ta_asset.kepemilikan_asset =  'PENYEWAAN'
		) AS assettnh_sewa,
		(
			SELECT
			Count(ta_asset.id_asset) AS asset_kendaraan
			FROM
			ta_asset
			INNER JOIN ma_jenisasset ON ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset
			WHERE
			ma_jenisasset.nama_jenisasset =  'KENDARAAN' AND
			ta_asset.AKTIF =  'YES' AND
			ta_asset.kepemilikan_asset =  'PENYEWAAN'
		) AS assetkendaraan_sewa,
		(
			SELECT
			Count(ta_asset.id_asset) AS asset_elektronik
			FROM
			ta_asset
			INNER JOIN ma_jenisasset ON ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset
			WHERE
			ma_jenisasset.nama_jenisasset =  'PERALATAN' AND
			ta_asset.AKTIF =  'YES' AND
			ta_asset.kepemilikan_asset =  'PENYEWAAN'
		) AS assetelektronik_sewa";
		$query = $this->db->query($select);
		$result= $query->row();
		return $result;
		
	}
	public function simpan_pengajuan_asset()
	{
		$tglPengajuan 	= $this->Libasset_model->tanggal_tosql($this->input->post('tglPengajuan'));
		$tglPemakaian 	= $this->Libasset_model->tanggal_tosql($this->input->post('tglPemakaian'));
		$jnsAsset	 	= $this->input->post('jnsAsset');
		$kategoriAsset 	= $this->input->post('kategoriAsset');
		$namaBrg	 	= $this->input->post('namaBrg');
		$spesifikasi 	= $this->input->post('spesifikasi');
		$kebutuhan	 	= $this->input->post('kebutuhan');
		$jumlah	 		= $this->input->post('jumlah');
		$perkiraanHarga	= $this->Libasset_model->replace_comma($this->input->post('perkiraanHarga'));
		$sbrAnggaran	= $this->input->post('sbrAnggaran');
		$keterangan		= $this->input->post('keterangan');
		$dateNow		= date("Y-m-d");
		$userLoginId	= 66; //$this->session->userdata('userid');
		$userInput		= 66; //$this->session->userdata('userid');
		$idPengajuan	= $this->_id_pengajuan();
		$kodPengajuan	= $this->_kode_pengajuan();				

		$add = array(
			'id_pengajuan' => $idPengajuan,
			'kode_pengajuan' => $kodPengajuan,
			'tgl_pengajuan' => $tglPengajuan,
			'tgl_pemakaian' => $tglPemakaian,
			'kode_jenisasset' => $jnsAsset,
			'kode_kategori' => $kategoriAsset,
			'kode_barang' => $namaBrg,
			'spesifikasi_barang' => $spesifikasi,
			'jumlah' => $jumlah,
			'kebutuhan' => $kebutuhan,
			'perkiraan_harga' => $perkiraanHarga,
			'sumber_anggaran' => $sbrAnggaran,
			'keterangan' => $keterangan,
			'status' => 'PENGAJUAN',
			'pengaju' => $userLoginId,
			'user_input' => $userInput,
			'tgl_input' => $dateNow
		);

		$insert = $this->db->insert('ta_pengajuanasset', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function get_pengajuan_asset()
	{ 		
		$this->db->select('ta_pengajuanasset.*, ma_jenisasset.nama_jenisasset, ma_namabarang.nama_barang, users.user_name, struktur.unit_kerja');
		$this->db->from('ta_pengajuanasset');
		$this->db->join('ma_jenisasset', 'ta_pengajuanasset.kode_jenisasset = ma_jenisasset.kode_jenisasset');
		$this->db->join('ma_namabarang', 'ta_pengajuanasset.kode_barang = ma_namabarang.kode_barang'); 
		$this->db->join('ma_status', 'ta_pengajuanasset.status = ma_status.nama_status'); 
		$this->db->join('users', 'users.user_id = ta_pengajuanasset.pengaju');
		$this->db->join('struktur', 'struktur.id = users.id_unitkerja','left');
		$this->db->limit(1000);
		$this->db->order_by('ma_status.ORDER','ASC');
		$query = $this->db->get();
		$result	= $query->result(); 
		return $result;
	}
	
	public function data_pengajuan_user()
	{ 		
		$userLoginId	= 66; //$this->session->userdata('userid');
		$this->db->select('ta_pengajuanasset.*, ma_kategoriasset.nama_kategori, ma_jenisasset.nama_jenisasset, ma_namabarang.nama_barang, users.user_name, struktur.unit_kerja');
		$this->db->from('ta_pengajuanasset');
		$this->db->join('ma_jenisasset', 'ta_pengajuanasset.kode_jenisasset = ma_jenisasset.kode_jenisasset');
		$this->db->join('ma_kategoriasset','ta_pengajuanasset.kode_kategori = ma_kategoriasset.kode_kategori');
		$this->db->join('ma_namabarang', 'ta_pengajuanasset.kode_barang = ma_namabarang.kode_barang');
		$this->db->join('ma_status', 'ta_pengajuanasset.status = ma_status.nama_status'); 
		$this->db->join('users', 'users.user_id = ta_pengajuanasset.pengaju');
		$this->db->join('struktur', 'struktur.id = users.id_unitkerja','left');
		$this->db->where('ta_pengajuanasset.pengaju',$userLoginId);
		$this->db->limit(1000);
		$this->db->order_by('ma_status.ORDER','ASC');
		$query = $this->db->get();
		$result	= $query->result();
		
		return $result;
	}
	
	public function get_search_pengajuan()
	{
		$this->db->select('ta_pengajuanasset.id_pengajuan, ta_pengajuanasset.kode_pengajuan, ma_jenisasset.nama_jenisasset, ma_namabarang.nama_barang');
		$this->db->from('ta_pengajuanasset');
		$this->db->join('ma_jenisasset', 'ta_pengajuanasset.kode_jenisasset = ma_jenisasset.kode_jenisasset');
		$this->db->join('ma_namabarang', 'ta_pengajuanasset.kode_barang = ma_namabarang.kode_barang');
		$this->db->where('ta_pengajuanasset.status','PROSES');
		$query	= $this->db->get();
		return $query->result();

	}
	
	public function get_pengajuan_byno($noPeng){
		$this->db->select('ta_pengajuanasset.*, ma_kategoriasset.nama_kategori, ma_jenisasset.nama_jenisasset, ma_namabarang.nama_barang, ma_sumberanggaran.nama_sumberanggaran, users.user_name, struktur.unit_kerja');
		$this->db->from('ta_pengajuanasset');
		$this->db->join('ma_jenisasset', 'ta_pengajuanasset.kode_jenisasset = ma_jenisasset.kode_jenisasset');
		$this->db->join('ma_kategoriasset','ta_pengajuanasset.kode_kategori = ma_kategoriasset.kode_kategori');
		$this->db->join('ma_namabarang', 'ta_pengajuanasset.kode_barang = ma_namabarang.kode_barang');
		$this->db->join('ma_sumberanggaran', 'ta_pengajuanasset.sumber_anggaran = ma_sumberanggaran.kode_sumberanggaran');
		$this->db->join('users', 'users.user_id = ta_pengajuanasset.pengaju');
		$this->db->join('struktur', 'struktur.id = users.id_unitkerja','left');
		$this->db->where('ta_pengajuanasset.kode_pengajuan',$noPeng);
		$query	= $this->db->get();
		return $query->row();
	}
	 
	public function simpan_pembelian_asset($idAsset,$fileNameObj,$fileNameKpl)
	{ 		
		$noPeng			= $this->input->post('noPengajuan'); 
		$dtPengajuan	= $this->get_pengajuan_byno($noPeng); 
		$kodeKategori	= $dtPengajuan->kode_kategori;
		$kodeJnsAsset	= $dtPengajuan->kode_jenisasset;
		$kodeBrg		= $dtPengajuan->kode_barang;  
		$kodePengajuan 	= $dtPengajuan->kode_pengajuan; 
		$kodeBrg		= $dtPengajuan->kode_barang;
		$tglPembelian	= $this->Libasset_model->tanggal_tosql($this->input->post('tglPembelian'));

		$kodeJnsAsset1 = $this->db->query("SELECT * FROM ma_jenisasset where kode_jenisasset='".$kodeJnsAsset."';")->row();						
		$kodeKategori1 = $this->db->query("SELECT * FROM ma_kategoriasset where kode_kategori='".$kodeKategori."';")->row();						
		$kodeBrg1 = $this->db->query("SELECT * FROM ma_namabarang where kode_barang='".$kodeBrg."';")->row();				

		$kodeAsset 		= $this->_kode_asset($kodeJnsAsset1,$kodeKategori1,$kodeBrg1,$tglPembelian,$kodeJnsAsset,$kodeKategori,$kodeBrg);				
		$spesifikasi	= $this->input->post('spesifikasi');
		$jumlah			= $this->input->post('jumlah');
		$harga			= $this->Libasset_model->replace_comma($this->input->post('hargaPembelian'));
		$merk			= $this->input->post('merk');
		$awalGaransi	= $this->Libasset_model->tanggal_tosql($this->input->post('awalGaransi'));
		$akhirGaransi	= $this->Libasset_model->tanggal_tosql($this->input->post('akhirGaransi'));
		$kodeVendor		= $this->input->post('kodeVendor');		
		$objekAsset		= $fileNameObj;
		$kelengAsset	= $fileNameKpl;
		$kelengkapan	= $this->input->post('kelengkapan');
		$keterangan		= $this->input->post('keterangan');
		$userInput		= 1; //$this->session->userdata('userid');
		$dateNow		= date('Y-m-d');
		$inventaris		= $this->input->post('inventaris');
		$namakaryawan	= $this->input->post('namakaryawan');
		$divisi		= $this->input->post('divisi');
		
		$add	= array(
				'id_asset' => $idAsset,
				'kode_asset' => $kodeAsset,
				'kode_pengajuan' => $kodePengajuan,
				'kode_jenisasset' => $kodeJnsAsset,
				'kode_kategori' => $kodeKategori,
				'kode_namabarang' => $kodeBrg,
				'merk_asset' => $merk,
				'tgl_pembelian' => $tglPembelian,
				'spesifikasi' => $spesifikasi,
				'jumlah' => $jumlah,
				'harga' => $harga, 
				'awal_garansi' => $awalGaransi,
				'akhir_garansi' => $akhirGaransi,
				'kode_vendor' => $kodeVendor,
				'img_objek' => $objekAsset,
				'img_kelengkapan' => $kelengAsset,
				'kelengkapan' => $kelengkapan,
				'keterangan' => $keterangan,
				'status' => 'TERSEDIA', 
				'kondisi_asset' => 'LAYAK',
				'kepemilikan_asset' => 'PERUSAHAAN',
				'aktif'=>'YES',
				'user_input' => $userInput,
				'tgl_input' => $dateNow,
				'tipe_asset' => $inventaris,
				'nama_karyawan' => $namakaryawan,
				'divisi' => $divisi
				);
					
		$update	= array('status'=>'TERSEDIA');
		
		$this->db->trans_start();
		$insert = $this->db->insert('ta_asset', $add);	
		$this->db->where('kode_pengajuan',$kodePengajuan);
		$this->db->update('ta_pengajuanasset', $update);
		$this->db->trans_complete();
		
		$data['msg'] = FALSE;
		if ($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		}
		$data['namaJnsAsset'] 	= $dtPengajuan->nama_jenisasset;
		$data['kodeAsset'] 		= $kodeAsset;
		return $data; 
	}	
	
	public function update_asset($fileNameObj,$fileNameKpl)
	{
		$kodeJnsAsset	= $this->input->post('jnsAsset');
		$st	= $this->input->post('st');
		$kodeKategori	= $this->input->post('kategoriAsset');
		$kodeBrg		= $this->input->post('namaBrg');
		$tglPembelian	= $this->Libasset_model->tanggal_tosql($this->input->post('tglPembelian'));
				
		$kodeJnsAsset1 = $this->db->query("SELECT * FROM ma_jenisasset where kode_jenisasset='".$kodeJnsAsset."';")->row();						
		$kodeKategori1 = $this->db->query("SELECT * FROM ma_kategoriasset where kode_kategori='".$kodeKategori."';")->row();						
		$kodeBrg1 = $this->db->query("SELECT * FROM ma_namabarang where kode_barang='".$kodeBrg."';")->row();				

		$kodeAsset 		= $this->_kode_asset($kodeJnsAsset1,$kodeKategori1,$kodeBrg1,$tglPembelian,$kodeJnsAsset,$kodeKategori,$kodeBrg);		
		$kodePengajuan 	= NULL; 
		$spesifikasi	= $this->input->post('spesifikasi');
		$jumlah			= $this->input->post('jumlah');
		$harga			= $this->Libasset_model->replace_comma($this->input->post('hargaPembelian'));
		$merk			= $this->input->post('merk');
		$awalGaransi	= $this->Libasset_model->tanggal_tosql($this->input->post('awalGaransi'));
		$akhirGaransi	= $this->Libasset_model->tanggal_tosql($this->input->post('akhirGaransi'));
		$kodeVendor		= $this->input->post('kodeVendor');		
		$kelengkapan	= $this->input->post('kelengkapan');
		$keterangan		= $this->input->post('keterangan');
		$userInput		= 66; //$this->session->userdata('userid');
		$dateNow		= date('Y-m-d');	
		$objekAsset		= $fileNameObj;
		$kelengAsset	= $fileNameKpl;
		$inventaris		= $this->input->post('inventaris');
		$namakaryawan	= $this->input->post('nama_karyawan');
		$divisi			= $this->input->post('divisi');			
		if ($kelengAsset!="" && $objekAsset!=""){
			$data = array(						
			'kode_asset' => $kodeAsset,
			'kode_pengajuan' => $kodePengajuan,
			'kode_jenisasset' => $kodeJnsAsset,
			'kode_kategori' => $kodeKategori,
			'kode_namabarang' => $kodeBrg,
			'merk_asset' => $merk,
			'tgl_pembelian' => $tglPembelian,
			'spesifikasi' => $spesifikasi,
			'jumlah' => $jumlah,
			'harga' => $harga, 
			'awal_garansi' => $awalGaransi,
			'akhir_garansi' => $akhirGaransi,
			'kode_vendor' => $kodeVendor,						
			'kelengkapan' => $kelengkapan,
			'keterangan' => $keterangan,
			'status' => 'TERSEDIA',
			'kondisi_asset' => 'LAYAK',
			'kepemilikan_asset' => 'PERUSAHAAN',
			'aktif'=>'YES',
			'user_input' => $userInput,
			'tgl_input' => $dateNow,
			'tipe_asset' => $inventaris,
			'nama_karyawan' => $namakaryawan,
			'img_objek' => $objekAsset,
			'img_kelengkapan' => $kelengAsset,
			'divisi' => $divisi
		); 		
		} else if (($kelengAsset=="" && $objekAsset=="")) {
			$data = array(
			'kode_asset' => $kodeAsset,
			'kode_pengajuan' => $kodePengajuan,
			'kode_jenisasset' => $kodeJnsAsset,
			'kode_kategori' => $kodeKategori,
			'kode_namabarang' => $kodeBrg,
			'merk_asset' => $merk,
			'tgl_pembelian' => $tglPembelian,
			'spesifikasi' => $spesifikasi,
			'jumlah' => $jumlah,
			'harga' => $harga, 
			'awal_garansi' => $awalGaransi,
			'akhir_garansi' => $akhirGaransi,
			'kode_vendor' => $kodeVendor,						
			'kelengkapan' => $kelengkapan,
			'keterangan' => $keterangan,
			'status' => 'TERSEDIA',
			'kondisi_asset' => 'LAYAK',
			'kepemilikan_asset' => 'PERUSAHAAN',
			'aktif'=>'YES',
			'user_input' => $userInput,
			'tgl_input' => $dateNow,
			'tipe_asset' => $inventaris,
			'nama_karyawan' => $namakaryawan,			
			'divisi' => $divisi
			); 	
		} else if ($objekAsset==""){
			$data = array(						
			'kode_asset' => $kodeAsset,
			'kode_pengajuan' => $kodePengajuan,
			'kode_jenisasset' => $kodeJnsAsset,
			'kode_kategori' => $kodeKategori,
			'kode_namabarang' => $kodeBrg,
			'merk_asset' => $merk,
			'tgl_pembelian' => $tglPembelian,
			'spesifikasi' => $spesifikasi,
			'jumlah' => $jumlah,
			'harga' => $harga, 
			'awal_garansi' => $awalGaransi,
			'akhir_garansi' => $akhirGaransi,
			'kode_vendor' => $kodeVendor,						
			'kelengkapan' => $kelengkapan,
			'keterangan' => $keterangan,
			'status' => 'TERSEDIA',
			'kondisi_asset' => 'LAYAK',
			'kepemilikan_asset' => 'PERUSAHAAN',
			'aktif'=>'YES',
			'user_input' => $userInput,
			'tgl_input' => $dateNow,
			'tipe_asset' => $inventaris,
			'nama_karyawan' => $namakaryawan,			
			'img_kelengkapan' => $kelengAsset,
			'divisi' => $divisi
		); 		
		} else if ($kelengAsset==""){
			$data = array(						
			'kode_asset' => $kodeAsset,
			'kode_pengajuan' => $kodePengajuan,
			'kode_jenisasset' => $kodeJnsAsset,
			'kode_kategori' => $kodeKategori,
			'kode_namabarang' => $kodeBrg,
			'merk_asset' => $merk,
			'tgl_pembelian' => $tglPembelian,
			'spesifikasi' => $spesifikasi,
			'jumlah' => $jumlah,
			'harga' => $harga, 
			'awal_garansi' => $awalGaransi,
			'akhir_garansi' => $akhirGaransi,
			'kode_vendor' => $kodeVendor,						
			'kelengkapan' => $kelengkapan,
			'keterangan' => $keterangan,
			'status' => 'TERSEDIA',
			'kondisi_asset' => 'LAYAK',
			'kepemilikan_asset' => 'PERUSAHAAN',
			'aktif'=>'YES',
			'user_input' => $userInput,
			'tgl_input' => $dateNow,
			'tipe_asset' => $inventaris,
			'nama_karyawan' => $namakaryawan,
			'img_objek' => $objekAsset,			
			'divisi' => $divisi
		); 		
		} 

		$this->db->trans_start();
		$this->db->where('id_asset',$st);
		$this->db->update('ta_asset', $data);
		$this->db->trans_complete();
		
		if($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		} 
		
		return $data;
	}

	public function simpan_tambah_asset($idAsset,$fileNameObj,$fileNameKpl)
	{ 		 
		$kodeJnsAsset	= $this->input->post('jnsAsset');
		$kodeKategori	= $this->input->post('kategoriAsset');
		$kodeBrg		= $this->input->post('namaBrg');
		$tglPembelian	= $this->Libasset_model->tanggal_tosql($this->input->post('tglPembelian'));
				
		$kodeJnsAsset1 = $this->db->query("SELECT * FROM ma_jenisasset where kode_jenisasset='".$kodeJnsAsset."';")->row();						
		$kodeKategori1 = $this->db->query("SELECT * FROM ma_kategoriasset where kode_kategori='".$kodeKategori."';")->row();						
		$kodeBrg1 = $this->db->query("SELECT * FROM ma_namabarang where kode_barang='".$kodeBrg."';")->row();				

		$kodeAsset 		= $this->_kode_asset($kodeJnsAsset1,$kodeKategori1,$kodeBrg1,$tglPembelian,$kodeJnsAsset,$kodeKategori,$kodeBrg);		
		$kodePengajuan 	= NULL; 
		$spesifikasi	= $this->input->post('spesifikasi');
		$jumlah			= $this->input->post('jumlah');
		$harga			= $this->Libasset_model->replace_comma($this->input->post('hargaPembelian'));
		$merk			= $this->input->post('merk');
		$awalGaransi	= $this->Libasset_model->tanggal_tosql($this->input->post('awalGaransi'));
		$akhirGaransi	= $this->Libasset_model->tanggal_tosql($this->input->post('akhirGaransi'));
		$kodeVendor		= $this->input->post('kodeVendor');
		$objekAsset		= $fileNameObj;
		$kelengAsset	= $fileNameKpl;
		$kelengkapan	= $this->input->post('kelengkapan');
		$keterangan		= $this->input->post('keterangan');
		$userInput		= 66; //$this->session->userdata('userid');
		$dateNow		= date('Y-m-d');	
		$inventaris		= $this->input->post('inventaris');
		$namakaryawan	= $this->input->post('nama_karyawan');
		$divisi		= $this->input->post('divisi');	


		$add	= array(
				'id_asset' => $idAsset,
				'kode_asset' => $kodeAsset,
				'kode_pengajuan' => $kodePengajuan,
				'kode_jenisasset' => $kodeJnsAsset,
				'kode_kategori' => $kodeKategori,
				'kode_namabarang' => $kodeBrg,
				'merk_asset' => $merk,
				'tgl_pembelian' => $tglPembelian,
				'spesifikasi' => $spesifikasi,
				'jumlah' => $jumlah,
				'harga' => $harga, 
				'awal_garansi' => $awalGaransi,
				'akhir_garansi' => $akhirGaransi,
				'kode_vendor' => $kodeVendor,
				'img_objek' => $objekAsset,
				'img_kelengkapan' => $kelengAsset,
				'kelengkapan' => $kelengkapan,
				'keterangan' => $keterangan,
				'status' => 'TERSEDIA',
				'kondisi_asset' => 'LAYAK',
				'kepemilikan_asset' => 'PERUSAHAAN',
				'aktif'=>'YES',
				'user_input' => $userInput,
				'tgl_input' => $dateNow,
				'tipe_asset' => $inventaris,
				'nama_karyawan' => $namakaryawan,
				'divisi' => $divisi
				);
					
		$update	= array('status'=>'TERSEDIA');
		
		$this->db->trans_start();
		$insert = $this->db->insert('ta_asset', $add);	
		$this->db->where('kode_pengajuan',$kodePengajuan);
		$this->db->update('ta_pengajuanasset', $update);
		$this->db->trans_complete();
		
		$data['msg'] = FALSE;
		if ($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		}
		$data['namaJnsAsset'] 	= $dtPengajuan->nama_jenisasset;
		$data['kodeAsset'] 		= $kodeAsset;
		return $data; 
	}
	
	public function simpan_status()
	{
		$kodePeng	= $this->input->post('kodePeng'); 
		$keterangan	= $this->input->post('keterangan'); 
		$status		= $this->input->post('status'); 
		if($status=="PROSES")
		{ 
			$span = "label label-primary arrowed-right";
		}
		
		if($status=="DITUNDA")
		{ 
			$span="label label-warning arrowed-in arrowed-in-right";
		}
		
		if($status=="DITOLAK")
		{ 
			$span="label label-important arrowed arrowed-right";
		}
		
		$update = array(
			'ket_status' => $keterangan,
			'status' => $status
		);
		$this->db->where('kode_pengajuan',$kodePeng);
		$this->db->update('ta_pengajuanasset', $update);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		}
		$data['status'] = $status;
		$data['span'] = $span;
		return $data;
	} 
	
	public function simpan_status_terima()
	{
		$kodePeng	= $this->input->post('kodePeng');   
		$tglTerima	= date('Y-m-d');
		$update1 = array( 
			'status' => 'TERIMA',
			'tgl_penerimaan' => $tglTerima
		); 
		
		$update2 = array( 
			'status' => 'TERIMA'
		); 
		
		$this->db->trans_start();
		$this->db->where('kode_pengajuan',$kodePeng);
		$this->db->update('ta_pengajuanasset', $update1);
		
		$this->db->where('kode_pengajuan',$kodePeng);
		$this->db->update('ta_asset', $update2);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		}
 
		return $data;
	} 
	
	public function get_data_asset()
	{
		$this->db->select('ta_asset.*, ma_kategoriasset.nama_kategori, ma_namabarang.nama_barang, ma_jenisasset.nama_jenisasset, ta_barcodeasset.status as status_barcode');
		$this->db->from('ta_asset');
		$this->db->join('ma_jenisasset', 'ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset', "left");
		$this->db->join('ma_kategoriasset', 'ta_asset.kode_kategori = ma_kategoriasset.kode_kategori', "left");
		$this->db->join('ma_namabarang', 'ta_asset.kode_namabarang = ma_namabarang.kode_barang', "left");
		$this->db->join('ma_vendor', 'ta_asset.kode_vendor = ma_vendor.kode_vendor', "left");
		$this->db->join('ta_barcodeasset', 'ta_asset.kode_asset = ta_barcodeasset.kode_asset', 'left');
		$this->db->where('kepemilikan_asset','PERUSAHAAN');
		$this->db->where('aktif','YES');
		$this->db->limit(1000);
		$query = $this->db->get();
		$result	= $query->result();

		return $result;
	}
	
	public function data_asset_user()
	{
		$this->db->select('ta_asset.*, ma_namabarang.nama_barang, ma_jenisasset.nama_jenisasset');
		$this->db->from('ta_asset');
		$this->db->join('ma_jenisasset', 'ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset');
		$this->db->join('ma_namabarang', 'ta_asset.kode_namabarang = ma_namabarang.kode_barang');
		$this->db->join('ma_vendor', 'ta_asset.kode_vendor = ma_vendor.kode_vendor');
		// $this->db->where('ta_asset.');
		$this->db->limit(1000);
		$query = $this->db->get();
		$result	= $query->result();
		
		return $result;
	}
	
	public function simpan_distribusi($idDist,$fileName)
	{
		$tglDistribusi 	= $this->Libasset_model->tanggal_tosql($this->input->post('tglDistribusi'));
		$kelengkapan 	= $this->input->post('kelDis');
		$penerima	 	= $this->input->post('penerima');
		$penanggungjwb 	= $this->input->post('penanggungjwb');		
		$lokasi			= $this->input->post('lokasi'); 
		$keterangan		= $this->input->post('ketdis'); 
		$idAsset	 	= $this->input->post('idAssetDis');
		$dtAsset		= $this->get_asset_byid($idAsset);
		$dateNow		= date("Y-m-d");
		$userInput		= 66; //$this->session->userdata('userid');
		
		$add	= array(
					'id_distribusi' => $idDist,
					'kode_asset' => $dtAsset->kode_asset,
					'tgl_distribusi' => $tglDistribusi,
					'kelengkapan' => $kelengkapan,
					'lokasi_distribusi' => $lokasi,
					'penerima' => $penerima,
					'penanggung_jawab' => $penanggungjwb,
					'upload_bukti' => $fileName,
					'keterangan' => $keterangan,
					'status' => 'DIGUNAKAN',
					'user_input' => $userInput,
					'tgl_input' => $dateNow
				);
		
		if($dtAsset->kode_pengajuan!=null){
			$update1 = array( 
				'status' => 'DISTRIBUSI'
			);
			$update2 = array( 
				'status' => 'DISTRIBUSI'
			);
		} else {
			$update1 = array( 
				'status' => 'TERIMA',
				'tgl_penerimaan' => $tglDistribusi
			);			
			$update2 = array( 
				'status' => 'TERIMA'
			);
		}
		
		$this->db->trans_start();
		$this->db->where('kode_pengajuan',$dtAsset->kode_pengajuan);
		$this->db->update('ta_pengajuanasset', $update1);
		
		$this->db->where('kode_asset',$dtAsset->kode_asset);
		$this->db->update('ta_asset', $update2);
		
		$this->db->insert('ta_distribusiasset', $add);
		$this->db->trans_complete();
		
		$data['msg'] = FALSE;
		if ($this->db->trans_status() === FALSE)
		{ 
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function simpan_perlakuan_asset()
	{
		$idPerlakuan  = $this->_id_perlakuan();
		$tglPerlakuan = $this->Libasset_model->tanggal_tosql($this->input->post('tglPerlakuan'));
		$jnsPerlakuan = $this->input->post('jnsPerlakuan');
		$pic		  = $this->input->post('pic');
		$detPerlakuan = $this->input->post('detPerlakuan');
		$ketPerlakuan = $this->input->post('ketPerlakuan'); 
		$noAsset	  = $this->input->post('noAsset'); 
		$dateNow		= date("Y-m-d");
		$userInput		= 66; //$this->session->userdata('userid');
		
		$add = array(
			'id_perlakuan' => $idPerlakuan,
			'kode_asset' => $noAsset,
			'tgl_perlakuan' => $tglPerlakuan,
			'jenis_perlakuan' => $jnsPerlakuan,
			'detail' => $detPerlakuan,
			'pic' => $pic,
			'keterangan' => $ketPerlakuan,
			'tgl_input' => $dateNow,
			'user_input' => $userInput
		);
		
		$insert = $this->db->insert('ta_perlakuanasset', $add);
		 
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function get_asset_byid($id)
	{
		$this->db->select('ta_asset.*, ma_kategoriasset.nama_kategori, ma_namabarang.nama_barang, ma_sumberanggaran.nama_sumberanggaran, ma_vendor.nama_vendor, ma_vendor.alamat_vendor, ma_jenisasset.nama_jenisasset');
		$this->db->from('ta_asset');
		$this->db->join('ma_jenisasset', 'ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset', "left");
		$this->db->join('ma_kategoriasset', 'ta_asset.kode_kategori = ma_kategoriasset.kode_kategori', "left");
		$this->db->join('ma_namabarang', 'ta_asset.kode_namabarang = ma_namabarang.kode_barang', "left");
		$this->db->join('ma_vendor', 'ta_asset.kode_vendor = ma_vendor.kode_vendor', "left");
		$this->db->join('ta_pengajuanasset', 'ta_asset.kode_pengajuan = ta_pengajuanasset.kode_pengajuan','left');
		$this->db->join('ma_sumberanggaran', 'ma_sumberanggaran.kode_sumberanggaran = ta_pengajuanasset.sumber_anggaran','left');
		$this->db->where('id_asset',$id);
		$query = $this->db->get();
		$result	= $query->row(); 		
		return $result;
	} 

	public function get_asset_byid1($id)
	{		
		$this->db->from('ta_asset');		
		$this->db->where('id_asset',$id);
		$query = $this->db->get();
		$result	= $query->row(); 		
		return $result;
	} 
	
	public function get_asset_bykdasset($kdAsset){
		$query = $this->db->get_where('ta_asset', array('kode_asset' => $kdAsset));
		$result= $query->row();
		return $result;
	}
	
	public function get_distribusi_bykdasset($kdAsset)
	{
		$select = "SELECT ta_distribusiasset.*, users.user_name 
				   FROM ta_distribusiasset
				   JOIN users on users.user_id = ta_distribusiasset.penerima
				   WHERE kode_asset='".$kdAsset."'"; 
		$query = $this->db->query($select);
		$result= $query->result();
		return $result;
	}
	
	public function get_perlakuan_bykdasset($kdAsset)
	{
		$this->db->select('ta_perlakuanasset.*, ma_jenisperlakuan.nama_jnsperlakuan');
		$this->db->from('ta_perlakuanasset');		
		$this->db->join('ma_jenisperlakuan', 'ma_jenisperlakuan.kode_jnsperlakuan = ta_perlakuanasset.jenis_perlakuan');
		$this->db->where('kode_asset',$kdAsset);
		$query = $this->db->get();
		$result= $query->result();
		return $result;
	}
	
	public function simpan_penyewaan_asset($idAsset,$fileNameObj,$fileNameKpl,$fileNameBkt)
	{  		
		$noPeng			= $this->input->post('noPengajuan'); 
		if($noPeng!=""){
			$dtPengajuan	= $this->get_pengajuan_byno($noPeng); 
			$kodeJnsAsset	= $dtPengajuan->kode_jenisasset;
			$kodeKategori	= $dtPengajuan->kode_kategori;
			$kodeBrg		= $dtPengajuan->kode_barang;  
			$kodePengajuan 	= $dtPengajuan->kode_pengajuan;  
		} else { 
			$kodeJnsAsset	= $this->input->post('jnsAsset'); 
			$kodeKategori	= $this->input->post('kodeKategori'); 
			$kodeBrg		= $this->input->post('namaBrg');  
			$kodePengajuan 	= NULL;  
		}
		
		$mulaiSewa		= $this->Libasset_model->tanggal_tosql($this->input->post('mulaiSewa'));		
		$akhirSewa		= $this->Libasset_model->tanggal_tosql($this->input->post('akhirSewa'));
		$kodeJnsAsset1 = $this->db->query("SELECT * FROM ma_jenisasset where kode_jenisasset='".$kodeJnsAsset."';")->row();						
		$kodeKategori1 = $this->db->query("SELECT * FROM ma_kategoriasset where kode_kategori='".$kodeKategori."';")->row();						
		$kodeBrg1 = $this->db->query("SELECT * FROM ma_namabarang where kode_barang='".$kodeBrg."';")->row();				
		
		$kodeAsset 		= $this->_kode_asset($kodeJnsAsset1,$kodeKategori1,$kodeBrg1,$mulaiSewa,$kodeJnsAsset,$kodeKategori,$kodeBrg);		
		$spesifikasi	= $this->input->post('spesifikasi');
		$jumlah			= $this->input->post('jumlah');
		$harga			= 0;
		$merk			= "-"; 
		$kodeVendor		= $this->input->post('kodeVendor');
		$objekAsset		= $fileNameObj;
		$kelengAsset	= $fileNameKpl;
		$kelengkapan	= $this->input->post('kelengkapan');
		$keterangan		= $this->input->post('keterangan');
		$userInput		= 1; //$this->session->userdata('userid');
		$dateNow		= date('Y-m-d');	 
		 
		$buktiAsset 	= $fileNameBkt;  
		
		$namakaryawan	= $this->input->post('nama_karyawansw');
		$divisi		= $this->input->post('divisisw');	

		$add	= array(
				'id_asset' => $idAsset,
				'kode_asset' => $kodeAsset,
				'kode_pengajuan' => $kodePengajuan,
				'kode_jenisasset' => $kodeJnsAsset,
				'kode_kategori' => $kodeKategori,
				'kode_namabarang' => $kodeBrg,
				'merk_asset' => $merk,
				'tgl_pembelian' => NULL,
				'spesifikasi' => $spesifikasi,
				'jumlah' => $jumlah,
				'harga' => $harga, 
				'awal_garansi' => NULL,
				'akhir_garansi' => NULL,
				'kode_vendor' => $kodeVendor,
				'img_objek' => $objekAsset,
				'img_kelengkapan' => $kelengAsset,
				'kelengkapan' => $kelengkapan,
				'keterangan' => $keterangan,
				'status' => 'TERSEDIA',
				'kondisi_asset' => 'LAYAK',
				'kepemilikan_asset' => 'PENYEWAAN',
				'aktif'=>'YES',
				'user_input' => $userInput,
				'tgl_input' => $dateNow,
				'nama_karyawan' => $namakaryawan,
				'divisi' => $divisi
				);		
		$idseqSewa = $idAsset;
		$jnsSewa = $this->input->post('jnsSewa');
		$lamaSewa = $this->input->post('lamaSewa');
		$hargaBulanan = $this->Libasset_model->replace_comma($this->input->post('hargaBulanan'));
		$hargaTahunan = $this->Libasset_model->replace_comma($this->input->post('hargaTahunan'));
		$addSewa = array(
				'id_asset'=>$idseqSewa,
				'kode_asset'=>$kodeAsset,
				'mulai_sewa'=>$mulaiSewa,
				'akhir_sewa'=>$akhirSewa,
				'jumlah'=>$jumlah,
				'lama_sewa'=>$lamaSewa,
				'jenis_sewa'=>$jnsSewa,
				'harga_bulanan'=>$hargaBulanan,
				'harga_tahunan'=>$hargaTahunan,
				'img_bukti' => $buktiAsset,
				'user_input' => $userInput,
				'tgl_input' => $dateNow
				);
				
		$update	= array('status'=>'TERSEDIA');
		
		$this->db->trans_start();
		$insert = $this->db->insert('ta_asset', $add);	
		$insert = $this->db->insert('ta_sewaasset', $addSewa);	
		
		$this->db->where('kode_pengajuan',$kodePengajuan);
		$this->db->update('ta_pengajuanasset', $update);
		$this->db->trans_complete();
		
		$data['msg'] = FALSE;
		if ($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		}
		$data['kodeJnsAsset'] 	= $kodeJnsAsset;
		$data['kodeAsset'] 		= $kodeAsset;
		return $data; 
	}

	public function update_assetsw($fileNameObj, $fileNameKpl, $fileNameBkt)
	{  		
		$kodeJnsAsset	= $this->input->post('jnsAsset');		
		$kodeKategori	= $this->input->post('kodeKategori');
		$kodeBrg		= $this->input->post('namaBrg');
		$kodePengajuan = null;
		$mulaiSewa		= $this->Libasset_model->tanggal_tosql($this->input->post('mulaiSewa'));
		$akhirSewa		= $this->Libasset_model->tanggal_tosql($this->input->post('akhirSewa'));
		$st	= $this->input->post('st');
		$kodeJnsAsset1 = $this->db->query("SELECT * FROM ma_jenisasset where kode_jenisasset='".$kodeJnsAsset."';")->row();						
		$kodeKategori1 = $this->db->query("SELECT * FROM ma_kategoriasset where kode_kategori='".$kodeKategori."';")->row();						
		$kodeBrg1 = $this->db->query("SELECT * FROM ma_namabarang where kode_barang='".$kodeBrg."';")->row();				
		
		$kodeAsset 		= $this->_kode_asset($kodeJnsAsset1,$kodeKategori1,$kodeBrg1,$mulaiSewa,$kodeJnsAsset,$kodeKategori,$kodeBrg);		
		$spesifikasi	= $this->input->post('spesifikasi');
		$jumlah			= $this->input->post('jumlah');
		$harga			= 0;
		$merk			= "-"; 
		$kodeVendor		= $this->input->post('kodeVendor');		
		$kelengkapan	= $this->input->post('kelengkapan');
		$keterangan		= $this->input->post('keterangan');
		$userInput		= 1; //$this->session->userdata('userid');
		$dateNow		= date('Y-m-d');	 		 		
		
		$objekAsset		= $fileNameObj;
		$kelengAsset	= $fileNameKpl;	
		$namakaryawan	= $this->input->post('nama_karyawansw');
		$divisi		= $this->input->post('divisisw');	
		$buktiAsset 	= $fileNameBkt;  

		if ($objekAsset!="" && $kelengAsset!=""){
			$add	= array(				
				'kode_asset' => $kodeAsset,
				'kode_pengajuan' => null,
				'kode_jenisasset' => $kodeJnsAsset,
				'kode_kategori' => $kodeKategori,
				'kode_namabarang' => $kodeBrg,
				'merk_asset' => $merk,
				'tgl_pembelian' => NULL,
				'spesifikasi' => $spesifikasi,
				'jumlah' => $jumlah,
				'harga' => $harga, 
				'awal_garansi' => NULL,
				'akhir_garansi' => NULL,
				'kode_vendor' => $kodeVendor,				
				'kelengkapan' => $kelengkapan,
				'keterangan' => $keterangan,
				'status' => 'TERSEDIA',
				'kondisi_asset' => 'LAYAK',
				'kepemilikan_asset' => 'PENYEWAAN',
				'aktif'=>'YES',
				'user_input' => $userInput,
				'tgl_input' => $dateNow,
				'nama_karyawan' => $namakaryawan,
				'img_objek' => $objekAsset,
				'img_kelengkapan' => $kelengAsset,
				'divisi' => $divisi
				);		
		} else if ($objekAsset=="" && $kelengAsset==""){
			$add	= array(				
				'kode_asset' => $kodeAsset,
				'kode_pengajuan' => $kodePengajuan,
				'kode_jenisasset' => $kodeJnsAsset,
				'kode_kategori' => $kodeKategori,
				'kode_namabarang' => $kodeBrg,
				'merk_asset' => $merk,
				'tgl_pembelian' => NULL,
				'spesifikasi' => $spesifikasi,
				'jumlah' => $jumlah,
				'harga' => $harga, 
				'awal_garansi' => NULL,
				'akhir_garansi' => NULL,
				'kode_vendor' => $kodeVendor,				
				'kelengkapan' => $kelengkapan,
				'keterangan' => $keterangan,
				'status' => 'TERSEDIA',
				'kondisi_asset' => 'LAYAK',
				'kepemilikan_asset' => 'PENYEWAAN',
				'aktif'=>'YES',
				'user_input' => $userInput,
				'tgl_input' => $dateNow,
				'nama_karyawan' => $namakaryawan,				
				'divisi' => $divisi
				);
		} else if($objekAsset==""){
			$add	= array(				
				'kode_asset' => $kodeAsset,
				'kode_pengajuan' => $kodePengajuan,
				'kode_jenisasset' => $kodeJnsAsset,
				'kode_kategori' => $kodeKategori,
				'kode_namabarang' => $kodeBrg,
				'merk_asset' => $merk,
				'tgl_pembelian' => NULL,
				'spesifikasi' => $spesifikasi,
				'jumlah' => $jumlah,
				'harga' => $harga, 
				'awal_garansi' => NULL,
				'akhir_garansi' => NULL,
				'kode_vendor' => $kodeVendor,				
				'kelengkapan' => $kelengkapan,
				'keterangan' => $keterangan,
				'status' => 'TERSEDIA',
				'kondisi_asset' => 'LAYAK',
				'kepemilikan_asset' => 'PENYEWAAN',
				'aktif'=>'YES',
				'user_input' => $userInput,
				'tgl_input' => $dateNow,
				'nama_karyawan' => $namakaryawan,				
				'img_kelengkapan' => $kelengAsset,
				'divisi' => $divisi
				);		
		} else if ($kelengAsset==""){
			$add	= array(				
				'kode_asset' => $kodeAsset,
				'kode_pengajuan' => $kodePengajuan,
				'kode_jenisasset' => $kodeJnsAsset,
				'kode_kategori' => $kodeKategori,
				'kode_namabarang' => $kodeBrg,
				'merk_asset' => $merk,
				'tgl_pembelian' => NULL,
				'spesifikasi' => $spesifikasi,
				'jumlah' => $jumlah,
				'harga' => $harga, 
				'awal_garansi' => NULL,
				'akhir_garansi' => NULL,
				'kode_vendor' => $kodeVendor,				
				'kelengkapan' => $kelengkapan,
				'keterangan' => $keterangan,
				'status' => 'TERSEDIA',
				'kondisi_asset' => 'LAYAK',
				'kepemilikan_asset' => 'PENYEWAAN',
				'aktif'=>'YES',
				'user_input' => $userInput,
				'tgl_input' => $dateNow,
				'nama_karyawan' => $namakaryawan,
				'img_objek' => $objekAsset,				
				'divisi' => $divisi
				);		
		} 		
		
		$idseqSewa = $this->get_sequence_sewaasset();
		$jnsSewa = $this->input->post('jnsSewa');
		$lamaSewa = $this->input->post('lamaSewa');
		$hargaBulanan = $this->Libasset_model->replace_comma($this->input->post('hargaBulanan'));
		$hargaTahunan = $this->Libasset_model->replace_comma($this->input->post('hargaTahunan'));

		if ($buktiAsset==""){
			$addSewa = array(				
				'kode_asset'=>$kodeAsset,
				'mulai_sewa'=>$mulaiSewa,
				'akhir_sewa'=>$akhirSewa,
				'jumlah'=>$jumlah,
				'lama_sewa'=>$lamaSewa,
				'jenis_sewa'=>$jnsSewa,
				'harga_bulanan'=>$hargaBulanan,
				'harga_tahunan'=>$hargaTahunan,				
				'user_input' => $userInput,
				'tgl_input' => $dateNow				
				);
		} else {
			$addSewa = array(				
				'kode_asset'=>$kodeAsset,
				'mulai_sewa'=>$mulaiSewa,
				'akhir_sewa'=>$akhirSewa,
				'jumlah'=>$jumlah,
				'lama_sewa'=>$lamaSewa,
				'jenis_sewa'=>$jnsSewa,
				'harga_bulanan'=>$hargaBulanan,
				'harga_tahunan'=>$hargaTahunan,				
				'user_input' => $userInput,
				'tgl_input' => $dateNow,
				'img_bukti' => $buktiAsset
				);
		}				
		$update	= array('status'=>'TERSEDIA');
		
		$this->db->trans_start();		
		$this->db->where('id_asset',$st);
		$this->db->update('ta_asset', $add);			
		
		$this->db->where('id_asset',$st);
		$this->db->update('ta_sewaasset', $addSewa);
		$this->db->trans_complete();
		
		$data['msg'] = FALSE;
		if ($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		}		
		return $data; 
	}
	
	public function get_asset_sewa()
	{	
		$this->db->select('ta_asset.*, ma_namabarang.nama_barang, ma_jenisasset.nama_jenisasset, ta_sewaasset.mulai_sewa, ta_sewaasset.akhir_sewa');
		$this->db->from('ta_asset');
		$this->db->join('ma_jenisasset', 'ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset', "left");
		$this->db->join('ma_namabarang', 'ta_asset.kode_namabarang = ma_namabarang.kode_barang', "left");
		$this->db->join('ma_vendor', 'ta_asset.kode_vendor = ma_vendor.kode_vendor', "left");
		$this->db->join('ta_sewaasset','ta_sewaasset.kode_asset = ta_asset.kode_asset', "left");
		$this->db->where('kepemilikan_asset','PENYEWAAN');
		$this->db->limit(1000);
		$query = $this->db->get();
		$result	= $query->result();
		
		return $result;	
	} 
	
	public function get_sewaasset_byid($id)
	{
		$this->db->select('ta_asset.*, ma_namabarang.nama_barang, ma_sumberanggaran.nama_sumberanggaran, ma_vendor.nama_vendor, ma_vendor.alamat_vendor, ma_jenisasset.nama_jenisasset, ta_sewaasset.*');
		$this->db->from('ta_asset');
		$this->db->join('ma_jenisasset', 'ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset');
		$this->db->join('ma_namabarang', 'ta_asset.kode_namabarang = ma_namabarang.kode_barang');
		$this->db->join('ma_vendor', 'ta_asset.kode_vendor = ma_vendor.kode_vendor');
		$this->db->join('ta_pengajuanasset', 'ta_asset.kode_pengajuan = ta_pengajuanasset.kode_pengajuan','left');
		$this->db->join('ma_sumberanggaran', 'ma_sumberanggaran.kode_sumberanggaran = ta_pengajuanasset.sumber_anggaran','left');
		$this->db->join('ta_sewaasset','ta_sewaasset.kode_asset = ta_asset.kode_asset');
		$this->db->where('kepemilikan_asset','PENYEWAAN');
		$this->db->where('ta_asset.id_asset',$id);
		$query = $this->db->get();
		$result	= $query->row();
		
		return $result;
	}
	
	public function simpan_detail_kedaraan($idAsset,$fileStnk,$fileBpkb)
	{
		$kodeAsset	= $this->input->post('kodeAsset');
		$noKendaraan= $this->input->post('noKendaraan');
		$warnaKedaraan	= $this->input->post('warnaKedaraan');
		$noBpkb		= $this->input->post('noBpkb'); 
		$noStnk		= $this->input->post('noStnk'); 
		$namaStnk	= $this->input->post('namaStnk'); 
		$alamatStnk	= $this->input->post('alamatStnk'); 
		$thnPembuatan	= $this->input->post('thnPembuatan'); 
		$tglPajak	= $this->Libasset_model->tanggal_tosql($this->input->post('tglPajak')); 
		$keterangan	= $this->input->post('keterangan');   
		$dateNow	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		
		$add	= array(
				'id_assetkendaraan' => $idAsset,
				'kode_asset' => $kodeAsset,
				'no_kendaraan' => $noKendaraan,
				'warna_kendaraan' => $warnaKedaraan,
				'no_bpkb' => $noBpkb,
				'no_stnk' => $noStnk, 
				'nama_pdstnk' => $namaStnk,
				'alamat_pdstnk' => $alamatStnk,
				'tahun_pembuatan' => $thnPembuatan,
				'tgl_pajak' => $tglPajak,
				'img_stnk' => $fileStnk,
				'img_bpkb' => $fileBpkb,  
				'keterangan' => $keterangan,
				'user_input' => $userInput,
				'tgl_input' => $dateNow
				); 
				
		$update = array( 
				'status' => 'TERSEDIA'
			);	 
		
		$this->db->trans_start();
		$this->db->insert('ta_assetkendaraan', $add); 
		// $this->db->insert('ta_pajakkendaraan', $addPajak); 
		$this->db->update('ta_asset', $update);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			$msg = FALSE;
		} 
		else 
		{
			$msg = TRUE;
		}
 
		return $msg; 
	}
	
	public function simpan_detail_tanah($idAsset,$fileLokasi)
	{
		$kodeAsset	= $this->input->post('kodeAsset');
		$luasTnhBgn	= $this->input->post('luasTnhBgn');
		$jnsSrtTnh	= $this->input->post('jnsSrtTnh');
		$namaTnhBgn	= $this->input->post('namaTnhBgn');
		$lokasiTnhBgn	= $this->input->post('lokasiTnhBgn');
		$tglPajak	= $this->Libasset_model->tanggal_tosql($this->input->post('tglPajak')); 
		$latitude	= $this->input->post('latitude');   
		$longitude	= $this->input->post('longitude');   
		$keterangan	= $this->input->post('keterangan');   
		
		$add	= array(
				'id_assettnhbgn' => $idAsset,
				'kode_asset' => $kodeAsset,
				'luas_tnhbgn' => $luasTnhBgn,
				'jenissurat_tnhbgn' => $jnsSrtTnh,
				'tgl_pajak' => $tglPajak,
				'lokasi_tnhbgn' => $lokasiTnhBgn,
				'nama_tnhbgn' => $namaTnhBgn, 
				'img_tnhbgn' => $fileLokasi, 
				'latitude' => $latitude, 
				'longitude' => $longitude, 
				'keterangan' => $keterangan 
				);
				
		// $idPajak	= $this->get_sequence_pjktnh();
		// $addPajak = array(
				// 'id_pjktnhbgn' => $idPajak,
				// 'id_assettnhbgn' => $idAsset,
				// 'tgl_pajak' => $tglPajak,
				// 'kode_jnspajak' => 'JP-001',
				// 'biaya_pajak' => 0,
				// 'pajak_ke' => 1,
				// 'img_pajak' => '-',
				// 'keterangan' => 'Pajak Tanah Pertama Beli'
				// );
		$update = array( 
				'status' => 'TERSEDIA'
			);	 
		
		$this->db->trans_start();
		$this->db->insert('ta_assettnhbgn', $add); 
		// $this->db->insert('ta_pajaktnhbgn', $addPajak); 
		$this->db->update('ta_asset', $update);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			$msg = FALSE;
		} 
		else 
		{
			$msg = TRUE;
		}
 
		return $msg; 
	}
	
	public function get_imgdis()
	{
		$kdAsset = $this->input->post('kdAsset');
		$this->db->select('upload_bukti');
		$query = $this->db->get_where('ta_distribusiasset', array('kode_asset' => $kdAsset));
		$result= $query->row();
		return $result;
	}
	
	public function get_asset_kendaraan()
	{
		$this->db->select('ta_assetkendaraan.id_assetkendaraan, ta_asset.kode_asset,ma_namabarang.nama_barang, ta_asset.merk_asset, 
		ta_asset.tgl_pembelian, ta_asset.jumlah, ta_asset.harga, ta_asset.akhir_garansi, ta_asset.kepemilikan_asset, ta_assetkendaraan.no_kendaraan, 
		ta_assetkendaraan.warna_kendaraan');
		$this->db->from('ta_assetkendaraan');
		$this->db->join('ta_asset', 'ta_assetkendaraan.kode_asset = ta_asset.kode_asset', "left");
		$this->db->join('ma_namabarang', 'ta_asset.kode_namabarang = ma_namabarang.kode_barang', "left");
		$this->db->limit(1000);
		$this->db->order_by('ta_asset.tgl_pembelian','ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function simpan_mainten_kendaraan($idAsstMainten,$fileMainten)
	{
		 
		$tglMainten	= $this->Libasset_model->tanggal_tosql($this->input->post('tglMainten'));
		$jnsMainten	= $this->input->post('jnsMainten');
		$vendor		= $this->input->post('vendorMaintenance');
		$biayaMainten= $this->Libasset_model->replace_comma($this->input->post('biayaMainten'));		 
		$idKendMain	= $this->input->post('idKendMain'); 		
		$keterangan	= $this->input->post('ketMainten'); 		
		$maintenKe	= $this->_counter_mainten_kend($idKendMain); 
		$dateNow	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		$addPajak	= array(
					'id_maintenkendaraan' => $idAsstMainten,
					'id_assetkendaraan' => $idKendMain,
					'tgl_mainten' => $tglMainten,
					'jenis_mainten' => $jnsMainten,
					'kode_vendor' => $vendor,
					'biaya_mainten' => $biayaMainten,
					'mainten_ke' => $maintenKe,
					'img_mainten' => $fileMainten,
					'keterangan' => $keterangan,
					'user_input' => $userInput,
					'tgl_input' => $dateNow
					); 
		
		$insert = $this->db->insert('ta_maintenkendaraan', $addPajak);
		 
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function simpan_pajak_kendaraan($idAsstPjk,$filePjk)
	{
		 
		$tglPajak	= $this->Libasset_model->tanggal_tosql($this->input->post('tglPajak'));
		$thnPajak	= $this->input->post('thnPajak');
		$jnsPajak	= $this->input->post('jnsPajak');
		$biayaPajak	= $this->Libasset_model->replace_comma($this->input->post('biayaPajak'));
		$keterangan	= $this->input->post('ketPajak');
		$idAssetKend= $this->input->post('idKendPajak'); 		
		$pajakKe	= $this->_counter_pajak_kend($idAssetKend); 
		$dateNow	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		
		$addPajak	= array(
					'id_pjkkendaraan' => $idAsstPjk,
					'id_assetkendaraan' => $idAssetKend,
					'tgl_pajak' => $tglPajak,
					'tahun_pajak' => $thnPajak,
					'kode_jnspajak' => $jnsPajak,
					'biaya_pajak' => $biayaPajak,
					'pajak_ke' => $pajakKe,
					'img_pajak' => $filePjk,
					'keterangan' => $keterangan,
					'user_input' => $userInput,
					'tgl_input' => $dateNow
					); 
		
		$insert = $this->db->insert('ta_pajakkendaraan', $addPajak);
		 
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function simpan_pajak_tnhbgn($idAsstPjk,$filePjk)
	{
		 
		$tglPajak	= $this->Libasset_model->tanggal_tosql($this->input->post('tglPajak'));
		$thnPajak	= $this->input->post('thnPajak');
		$jnsPajak	= $this->input->post('jnsPajak');
		$biayaPajak	= $this->Libasset_model->replace_comma($this->input->post('biayaPajak'));
		$keterangan	= $this->input->post('ketPajak');
		$idAssetTnh = $this->input->post('idAsset'); 		
		$pajakKe	= $this->_counter_pajak_tnhbgn($idAssetTnh); 
		$dateNow	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		
		$addPajak	= array(
					'id_pjktnhbgn' => $idAsstPjk,
					'id_assettnhbgn' => $idAssetKend,
					'tgl_pajak' => $tglPajak,
					'tahun_pajak' => $thnPajak,
					'kode_jnspajak' => $jnsPajak,
					'biaya_pajak' => $biayaPajak,
					'pajak_ke' => $pajakKe,
					'img_pajak' => $filePjk,
					'keterangan' => $keterangan,
					'user_input' => $userInput,
					'tgl_input' => $dateNow
					); 
		
		$insert = $this->db->insert('ta_pajakkendaraan', $addPajak);
		 
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function simpan_ujikir_kendaraan($idAsstKir,$fileKir)
	{
		$tglKir			= $this->Libasset_model->tanggal_tosql($this->input->post('tglUjikir'));
		$tempatUjikir	= $this->input->post('tempatUjikir');
		$biayaUjikir	= $this->Libasset_model->replace_comma($this->input->post('biayaUjikir'));
		$ketUjikir		= $this->input->post('ketUjikir');
		$idAssetKend	= $this->input->post('idKendKir'); 
		$keterangan		= $this->input->post('ketUjikir'); 
		$ujiKirKe		= $this->_counter_kir_kend($idAssetKend); 
		$dateNow		= date("Y-m-d");
		$userInput		= 66; //$this->session->userdata('userid');
		
		$addKir		= array(
					'id_kirkendaraan' => $idAsstKir,
					'id_assetkendaraan' => $idAssetKend,
					'tgl_kir' => $tglKir,
					'tempat_kir' => $tempatUjikir,
					'biaya_kir' => $biayaUjikir,
					'ujikir_ke' => $ujiKirKe,
					'img_kir' => $fileKir,
					'keterangan' => $keterangan,
					'user_input' => $userInput,
					'tgl_input' => $dateNow
					);
		
		$insert = $this->db->insert('ta_kirkendaraan', $addKir);
		 
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	private function _counter_mainten_kend($idKendMain)
	{
		$this->db->select_max('mainten_ke');
		$this->db->where('id_assetkendaraan',$idKendMain);
		$query = $this->db->get('ta_maintenkendaraan');
		$result = $query->row();
		$ke = ($result->mainten_ke+1);
		return $ke;
	}
	
	private function _counter_pajak_kend($idAssetKend)
	{
		$this->db->select_max('pajak_ke');
		$this->db->where('id_assetkendaraan',$idAssetKend);
		$query = $this->db->get('ta_pajakkendaraan');
		$result = $query->row();
		$ke = ($result->pajak_ke+1);
		return $ke;
	}
	
	private function _counter_pajak_tnhbgn($idAssetKend)
	{
		$this->db->select_max('pajak_ke');
		$this->db->where('id_assettnhbgn',$idAssetKend);
		$query = $this->db->get('ta_pajaktnhbgn');
		$result = $query->row();
		$ke = ($result->pajak_ke+1);
		return $ke;
	}
	
	
	private function _counter_kir_kend($idAssetKend)
	{
		$this->db->select_max('ujikir_ke');
		$this->db->where('id_assetkendaraan',$idAssetKend);
		$query = $this->db->get('ta_kirkendaraan');
		$result = $query->row();
		$ke = ($result->ujikir_ke+1);
		return $ke;
	}
	
	public function simpan_pemakai_kendaraan()
	{
		$idPakaiKend= $this->get_sequence_pemakaian();
		$awalPakai	= $this->Libasset_model->tanggal_tosql($this->input->post('awalPakai'));
		$akhirPakai	= $this->Libasset_model->tanggal_tosql($this->input->post('akhirPakai'));
		$idAssetKend= $this->input->post('idKendPemakai'); 
		$pemakai	= $this->input->post('pemakai'); 
		$tujuan		= $this->input->post('tujuan'); 
		$keperluan	= $this->input->post('keperluan'); 
		$sopir		= $this->input->post('sopir'); 
		$keterangan	= $this->input->post('ketPemakaian'); 
		$dateNow	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		
		$add		= array(
					'id_pemakaian' => $idPakaiKend,
					'id_assetkendaraan' => $idAssetKend,
					'tgl_awalpemakaian' => $awalPakai,
					'tgl_selesaipemakaian' => $akhirPakai,
					'pemakai' => $pemakai,
					'tujuan' => $tujuan,
					'keperluan' => $keperluan,
					'kode_sopir' => $sopir,
					'keterangan' => $keterangan,
					'user_input' => $userInput,
					'tgl_input' => $dateNow
					);
		
		$insert = $this->db->insert('ta_pemakaiankendaraan', $add);
		 
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function get_mainten_byassetkend()
	{
		$idAssetKend	= $this->input->post('idAssetKend'); 
		$this->db->select('ta_maintenkendaraan.*, ma_vendor.nama_vendor');
		$this->db->from('ta_maintenkendaraan');
		$this->db->join('ma_vendor','ma_vendor.kode_vendor = ta_maintenkendaraan.kode_vendor');
		$this->db->where('ta_maintenkendaraan.id_assetkendaraan',$idAssetKend);
		$query = $this->db->get();
		$result= $query->result();
		return $result;
	}
		
	public function get_img_maintenance()
	{
		$idMainten = $this->input->post('idMainten');
		$this->db->select('img_mainten');
		$query = $this->db->get_where('ta_maintenkendaraan', array('id_maintenkendaraan' => $idMainten));
		$result= $query->row(); 
		return $result;
	}
	
	public function get_ujikir_byassetkend()
	{
		$idAssetKend	= $this->input->post('idAssetKend');  
		$query = $this->db->get_where('ta_kirkendaraan', array('id_assetkendaraan' => $idAssetKend));
		$result= $query->result();
		return $result;
	}	
	
	public function get_img_ujikir()
	{
		$idKir	= $this->input->post('idKir');  
		$this->db->select('img_kir');
		$query = $this->db->get_where('ta_kirkendaraan', array('ID_KIRKENDARAAN' => $idKir));
		$result= $query->row();
		return $result;
	}
	
	public function get_pajak_byassetkend()
	{
		$idAssetKend	= $this->input->post('idAssetKend');  
		$query = $this->db->get_where('ta_pajakkendaraan', array('id_assetkendaraan' => $idAssetKend));
		$result= $query->result();
		return $result;
	}
	
	public function get_img_pajak()
	{ 
		$idPajak	= $this->input->post('idPajak');  
		$this->db->select('img_pajak');
		$query = $this->db->get_where('ta_pajakkendaraan', array('ID_PJKKENDARAAN' => $idPajak));
		$result= $query->row();
		return $result;
	}	
	
	public function get_sopir()
	{
		$this->db->select('user_id,user_name, posisi');
		$this->db->from('users');
		$this->db->where('posisi','Driver');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function get_pemakaian_byassetkend()
	{
		$idAssetKend	= $this->input->post('idAssetKend'); 
		$this->db->select('ta_pemakaiankendaraan.*, users.user_name');
		$this->db->from('ta_pemakaiankendaraan');
		$this->db->join('users','users.user_id = ta_pemakaiankendaraan.kode_sopir');
		$this->db->where('ta_pemakaiankendaraan.id_assetkendaraan',$idAssetKend);
		$query = $this->db->get();
		$result= $query->result();
		return $result; 
	}
		
	public function get_asset_tnhbgn()
	{
		$this->db->select('ta_assettnhbgn.id_assettnhbgn, ta_asset.kode_asset,ma_namabarang.nama_barang, ta_asset.tgl_pembelian, 
		ta_asset.jumlah, ta_asset.harga, ta_asset.kepemilikan_asset, ta_assettnhbgn.luas_tnhbgn, ta_assettnhbgn.lokasi_tnhbgn, ta_assettnhbgn.jenissurat_tnhbgn');
		$this->db->from('ta_assettnhbgn');
		$this->db->join('ta_asset', 'ta_assettnhbgn.kode_asset = ta_asset.kode_asset');
		$this->db->join('ma_namabarang', 'ta_asset.kode_namabarang = ma_namabarang.kode_barang');
		$this->db->limit(1000); 
		$this->db->order_by('ta_asset.tgl_pembelian','ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result; 
	}
	
	public function get_tnhbgn_byid($id)
	{
		$query = $this->db->get_where('ta_assettnhbgn', array('id_assettnhbgn' => $id)); 
		$result = $query->row();
		return $result;
	}
	
	public function asset_kendaraan_byidasset($kdAsset)
	{
		$this->db->select('ta_assetkendaraan.id_assetkendaraan, ta_asset.kode_asset,ma_namabarang.nama_barang, ta_asset.merk_asset, 
		ta_asset.tgl_pembelian, ta_asset.jumlah, ta_asset.harga, ta_asset.akhir_garansi, ta_asset.kepemilikan_asset, ta_assetkendaraan.no_kendaraan, 
		ta_assetkendaraan.warna_kendaraan');
		$this->db->from('ta_assetkendaraan');
		$this->db->join('ta_asset', 'ta_assetkendaraan.kode_asset = ta_asset.kode_asset');
		$this->db->join('ma_namabarang', 'ta_asset.kode_namabarang = ma_namabarang.kode_barang'); 
		$this->db->where('ta_asset.kode_asset', $kdAsset);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function asset_tnhbgn_byidasset($kdAsset)
	{
		$this->db->select('ta_assettnhbgn.id_assettnhbgn, ta_asset.kode_asset,ma_namabarang.nama_barang, ta_asset.tgl_pembelian, 
		ta_asset.jumlah, ta_asset.harga, ta_assettnhbgn.luas_tnhbgn, ta_assettnhbgn.lokasi_tnhbgn, ta_assettnhbgn.jenissurat_tnhbgn');
		$this->db->from('ta_assettnhbgn');
		$this->db->join('ta_asset', 'ta_assettnhbgn.kode_asset = ta_asset.kode_asset');
		$this->db->join('ma_namabarang', 'ta_asset.kode_namabarang = ma_namabarang.kode_barang');
		$this->db->where('ta_asset.kode_asset', $kdAsset);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function cek_nopeng_inasset($kodeAsset)
	{
		$this->db->select('kode_pengajuan');
		$this->db->from('ta_asset'); 
		$this->db->where('kode_asset', $kodeAsset);
		$query = $this->db->get();
		$result = $query->row();
		return $result->kode_pengajuan;
	}
	
	public function set_penerima_asset($kodePengajuan)
	{
		$this->db->select('pengaju');
		$this->db->from('ta_pengajuanasset');
		$this->db->where('ta_pengajuanasset.kode_pengajuan',$kodePengajuan);
		$query = $this->db->get();
		$result = $query->row();
		return $result->pengaju;
		
	}
	
	public function delete_distribusi_asset($idDistribusi)
	{
		$distribusi = $this->get_distribusi_byid($idDistribusi); 
		$update1 = array( 
				'status' => 'TERSEDIA'
			);	 
		$update2 = array( 
				'status' => 'TIDAK DIGUNAKAN'
			);	 
		
		$this->db->trans_start();
		$this->db->where('ta_asset.kode_asset',$distribusi->kode_asset);
		$this->db->update('ta_asset', $update1);
		
		$this->db->where('ta_distribusiasset.id_distribusi',$idDistribusi);
		$this->db->update('ta_distribusiasset', $update2);  
		$this->db->trans_complete();
		
		$data['msg'] = FALSE;
		
		if ($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		}
		$data['idasset'] = $distribusi->id_asset;
		return $data; 
	}
	
	public function get_distribusi_byid($id){  
		$this->db->select('ta_distribusiasset.*,ta_asset.id_asset');
		$this->db->from('ta_distribusiasset');
		$this->db->join('ta_asset','ta_asset.kode_asset = ta_distribusiasset.kode_asset');
		$this->db->where('id_distribusi',$id);
		$query = $this->db->get();
		$result= $query->row();  
		return $result;
	}
	
	public function get_dtkondisi_asset()
	{
		$this->db->select('ta_asset.*, ma_namabarang.nama_barang, ma_jenisasset.nama_jenisasset');
		$this->db->from('ta_asset');
		$this->db->join('ma_jenisasset', 'ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset');
		$this->db->join('ma_namabarang', 'ta_asset.kode_namabarang = ma_namabarang.kode_barang');
		$this->db->join('ma_vendor', 'ta_asset.kode_vendor = ma_vendor.kode_vendor');
		$this->db->where('kepemilikan_asset','PERUSAHAAN');
		// $this->db->where('aktif !=','YES');
		$this->db->where('kondisi_asset !=','LAYAK');
		$this->db->limit(1000);
		$query = $this->db->get();
		$result	= $query->result();
		
		return $result;
	}
	
	public function get_data_stokopn()
	{ 
		$tglStok	= $this->input->post('tglOpname'); 		
		// $query 		= $this->db->get_where('ta_stokopname', array('tgl_stokopname'=>$tglStok));
		$select =" SELECT
			ta_stokopname.tgl_stokopname,
			ta_stokopname.kode_asset,
			ma_jenisasset.nama_jenisasset,
			ma_namabarang.nama_barang,
			ta_stokopname.kondisi_asset,
			ta_stokopname.keterangan
			FROM
			ta_stokopname
			Inner Join ta_asset ON ta_stokopname.kode_asset = ta_asset.kode_asset
			Inner Join ma_jenisasset ON ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset
			Inner Join ma_namabarang ON ta_asset.kode_namabarang = ma_namabarang.kode_barang
			WHERE
			ta_stokopname.tgl_stokopname =  '".$tglStok."'";
		$query	= $this->db->query($select);
		$result	= $query->result(); 
		return $result;
	}
	
	public function get_search_tglopn()
	{
		$this->db->where('jns_stok_opname', 'STOKASSET');
		$this->db->where('status', 'non');
		$this->db->from('ta_tglstokopname');
		
		$query 	= $this->db->get();
		$result = $query->result(); 
		return $result;
	}
	
	public function cek_tgl_opname()
	{ 
		$this->db->where('jns_stok_opname', 'STOKASSET');
		$this->db->where('status', 'aktif');
		$this->db->from('ta_tglstokopname');
		return $this->db->count_all_results();
	}
	
	public function scan_opname_asset()
	{
		$barcode = trim($this->input->post('barcode')); 
		$result = new stdClass();
		$cekBarcode	= $this->cek_barcode($barcode);
		if($cekBarcode>0)
		{ 
			$this->db->select('kode_asset, nama_jenisasset, nama_barang, merk_asset, spesifikasi, kelengkapan, tgl_pembelian, img_objek, img_kelengkapan, kondisi_asset');
			$this->db->from('ta_asset');
			$this->db->join('ma_namabarang', 'ma_namabarang.kode_barang = ta_asset.kode_namabarang');
			$this->db->join('ma_jenisasset', 'ma_jenisasset.kode_jenisasset = ma_namabarang.kode_jenisasset');
			$this->db->where('kode_asset',$barcode);
			$this->db->where('aktif','YES');
			$query = $this->db->get();
			$result = $query->row();
		} 
		$result->cek_barcode = $cekBarcode; 
		return $result;
	}
	
	public function cek_barcode($kdAsset)
	{
		
		$select1 	= 'SELECT * FROM ta_asset WHERE kode_asset="'.$kdAsset.'" AND aktif="YES"';
		$query1 	= $this->db->query($select1);
		$cek1 		= $query1->num_rows();
		$tglOpname 	= $this->get_tgl_opname();
		$cek = 0;
		if($cek1>0){
			$cek = 1; //data ada di database
			
			$select2 = "SELECT temp_assetopname.* FROM ta_asset
						Inner Join temp_assetopname ON ta_asset.kode_asset = temp_assetopname.kode_asset
						WHERE
						ta_asset.kode_asset =  '".$kdAsset."' AND
						temp_assetopname.tgl_stokopname =  '".$tglOpname."'";
			$query2 	= $this->db->query($select2);
			$cek2 		= $query2->num_rows();
			if($cek2>0){
				$cek = 2; // data sudah ada di tempstokopname
			}
			
			$select3 = "SELECT ta_stokopname.* FROM
						ta_asset
						Inner Join ta_stokopname ON ta_asset.kode_asset = ta_stokopname.kode_asset
						WHERE
						ta_asset.kode_asset =  '".$kdAsset."' AND
						ta_stokopname.tgl_stokopname =  '".$tglOpname."'";
			$query3 	= $this->db->query($select3);
			$cek3 		= $query3->num_rows();
			if($cek3>0){
				$cek = 3; // data sudah ada di stokopname
			}
		}
		return $cek;
	}
	
	public function simpan_opname_asset()
	{ 
		$tglPerlakuan = $this->get_tgl_opname();
		$kondisiAsset = $this->input->post('kondisiAsset');
		$pic		  = $this->input->post('pic'); 
		$ketPerlakuan = $this->input->post('ketPerlakuan'); 
		$kodeAsset	  = trim($this->input->post('kodeAsset')); 
		
		$dtAsset 	  =  $this->get_asset_bykdasset($kodeAsset);
		
		$dateNow		= date("Y-m-d");
		$userInput		= 66; //$this->session->userdata('userid');
		   	 
		$idStokOpname = $this->_kode_tempstokopname();
		$tempOpname = array(
			'id_stokopname' => $idStokOpname,
			'tgl_stokopname' => $tglPerlakuan,
			'kode_asset' => $kodeAsset,
			'kondisi_asset' => $kondisiAsset,
			'keterangan' => $ketPerlakuan,
			'tgl_input' => $dateNow,
			'user_input' => $userInput			
		); 
		
		$cekUpdate = 0; 
		if($kondisiAsset!="LAYAK")
		{  
			
			$updateAsset = array(
				'kondisi_asset' => $kondisiAsset,
				'aktif' => 'NO'
			);
			$cekUpdate = 1; 
		} 
		
		$this->db->trans_start(); 
		$this->db->insert('temp_assetopname', $tempOpname);	
		
		if($cekUpdate>0)
		{
			$this->db->where('kode_asset',$kodeAsset);
			$this->db->update('ta_asset', $updateAsset);
		}
		
		$this->db->trans_complete();
		
		$data['msg'] = FALSE;
		if ($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		}
		$data['kondisiSblm']  = $dtAsset->kondisi_asset;
		return $data;
	}
	
	public function get_tgl_opname()
	{
		$this->db->select_max('tgl_stok_opname');
		$this->db->from('ta_tglstokopname');
		$this->db->where('jns_stok_opname','STOKASSET');
		$this->db->where('status','aktif');
		$query	= $this->db->get();
		$result	= $query->row();
		return $result->tgl_stok_opname; 
	}
	
	public function delete_stokopname()
	{
		$kdAsset = $this->input->post('kdAsset');
		$kondisi = $this->input->post('kondisi');
		$tglPerlakuan = $this->get_tgl_opname();
		
		$delete1 = "DELETE FROM temp_assetopname WHERE kode_asset='".$kdAsset."'";
		$delete2 = "DELETE FROM ta_perlakuanasset WHERE kode_asset='".$kdAsset."' AND tgl_perlakuan='".$tglPerlakuan."'";
		$update2 = "UPDATE ta_asset SET aktif='YES', kondisi_asset='".$kondisi."' WHERE kode_asset='".$kdAsset."'";
		
		try{ 
			$this->db->trans_begin(); 
			$this->db->query($delete1);  
			$this->db->query($delete2);  
			$this->db->query($update2);  
			
			if ($this->db->trans_status() === FALSE)
			{				
				$status = "failed";
				$this->db->trans_rollback();
			}
			else
			{ 
				$status = "success";
				$this->db->trans_commit();
			}
			
		} catch (Exception $e){
			$this->db->trans_rollback();
			$status = "failed";
			// echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		$data['msg'] = $status;
		return $data;
	}
	
	public function ver_stok_opname()
	{ 
		$select="
			SELECT *, CASE WHEN CEKASSET.cek_kode IS NULL THEN 'NO' ELSE 'OK' END AS cek_opname FROM (
			SELECT ta_asset.kode_asset, nama_jenisasset, nama_barang, ta_asset.kondisi_asset, temp_assetopname.kode_asset as cek_kode
			FROM ta_asset
			LEFT JOIN temp_assetopname ON temp_assetopname.kode_asset = ta_asset.kode_asset
			JOIN ma_jenisasset ON ma_jenisasset.kode_jenisasset = ta_asset.kode_jenisasset
			JOIN ma_namabarang ON ma_namabarang.kode_barang = ta_asset.kode_namabarang
			WHERE ta_asset.kepemilikan_asset = 'PERUSAHAAN'
			) AS CEKASSET";
		// echo "<pre>".$this->db->get_compiled_select(); exit();
		// echo $this->db->last_query(); exit();
		$query = $this->db->query($select);
		$result = $query->result();
		 
		return $result;
	}
	
	public function get_veropname_data()
	{
		$kodeAsset = $this->input->post('kodeAsset');
		$select = "
			SELECT ta_asset.kode_asset, nama_jenisasset, nama_barang, ta_asset.kondisi_asset, temp_assetopname.keterangan,ta_perlakuanasset.pic, ta_perlakuanasset.jenis_perlakuan
			FROM ta_asset
			LEFT JOIN temp_assetopname ON temp_assetopname.kode_asset = ta_asset.kode_asset
			LEFT JOIN ta_perlakuanasset ON ta_perlakuanasset.kode_asset = ta_asset.kode_asset
			JOIN ma_jenisasset ON ma_jenisasset.kode_jenisasset = ta_asset.kode_jenisasset
			JOIN ma_namabarang ON ma_namabarang.kode_barang = ta_asset.kode_namabarang
			WHERE ta_asset.kepemilikan_asset = 'PERUSAHAAN' 
			AND ta_asset.kode_asset='".$kodeAsset."'";
			
		$query = $this->db->query($select);
		$result = $query->row();
		 
		return $result;
	}
	
	public function update_ver_opname()
	{
		$kodeAsset 		= $this->input->post('kodeAsset');
		$kondisiAsset 	= $this->input->post('kondisiAsset');
		$pic		 	= $this->input->post('pic');
		$keterangan 	= $this->input->post('ketPerlakuan');
		$tglPerlakuan 	= $this->get_tgl_opname();
		
		 
		$cekUpdate = 0;
		if($kondisiAsset!="LAYAK")
		{  
			$updateAsset = "UPDATE ta_asset SET kondisi_asset='".$kondisiAsset."', aktif='NO' WHERE kode_asset='".$kodeAsset."'";		
			$cekUpdate = 1; 
		} else {
			$updateAsset = "UPDATE ta_asset SET kondisi_asset='".$kondisiAsset."', aktif='YES' WHERE kode_asset='".$kodeAsset."'";	
		}
		
		$updateTemp = "UPDATE temp_assetopname SET kondisi_asset='".$kondisiAsset."', keterangan='".$keterangan."' WHERE kode_asset='".$kodeAsset."'";		
		
		try{ 
			$this->db->trans_begin(); 
			$this->db->query($updateTemp);  
			$this->db->query($updateAsset);  
			
			if ($this->db->trans_status() === FALSE)
			{				
				$status = "failed";
				$this->db->trans_rollback();
			}
			else
			{ 
				$status = "success";
				$this->db->trans_commit();
			}
			
		} catch (Exception $e){
			$this->db->trans_rollback();
			$status = "failed";
			// echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		$data['msg'] = $status;
		return $data; 
	}
	
	public function simpan_verifikasi_opname()
	{ 
		$tglPerlakuan = $this->get_tgl_opname();
		$kondisiAsset = $this->input->post('kondisiAsset');
		$pic		  = $this->input->post('pic'); 
		$ketPerlakuan = $this->input->post('ketPerlakuan'); 
		$kodeAsset	  = trim($this->input->post('kodeAsset')); 
		
		$dtAsset 	  =  $this->get_asset_bykdasset($kodeAsset);
		
		$dateNow		= date("Y-m-d");
		$userInput		= 66; //$this->session->userdata('userid');
		  	 
		$idStokOpname = $this->_kode_tempstokopname();
		$tempOpname = array(
			'id_stokopname' => $idStokOpname,
			'tgl_stokopname' => $tglPerlakuan,
			'kode_asset' => $kodeAsset,
			'kondisi_asset' => $kondisiAsset,
			'keterangan' => $ketPerlakuan,
			'tgl_input' => $dateNow,
			'user_input' => $userInput			
		); 
		
		$cekUpdate = 0; 
		if($kondisiAsset!="LAYAK")
		{   
			$updateAsset = array(
				'kondisi_asset' => $kondisiAsset,
				'aktif' => 'NO'
			);
			$cekUpdate = 1; 
		} 
		
		$this->db->trans_start(); 
		$this->db->insert('temp_assetopname', $tempOpname);	
		
		if($cekUpdate>0)
		{
			$this->db->where('kode_asset',$kodeAsset);
			$this->db->update('ta_asset', $updateAsset);
		}
		
		$this->db->trans_complete();
		
		$data['msg'] = FALSE;
		if ($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function simpan_verall_stokopname()
	{
		// menonaktifkan tanggal stok opname
 		$this->db->select_max('id');
		$this->db->from('ta_tglstokopname');
		$this->db->where('jns_stok_opname','STOKASSET');
		$this->db->where('status','aktif');
		$query = $this->db->get();
		$result = $query->row();  
		//end menonaktifkan tanggal stok opname
		
		$tglInput	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		
		$query = $this->db->get('temp_assetopname');
		$insOpname = "INSERT INTO ta_stokopname VALUES "; 
		
		foreach($query->result() as $stokopname){
			$kode = $this->_kode_stokopname();
			
			$insOpname .= "('".$kode."','".$stokopname->tgl_stokopname."','".$stokopname->kode_asset."','".$stokopname->kondisi_asset."','".$stokopname->keterangan."','".$tglInput."',".$userInput."),"; 
			  
		}
		
		$delTempOpn = "DELETE FROM temp_assetopname";
		$insOpname	= rtrim($insOpname, ','); 
		$updateTgl 	= "UPDATE ta_tglstokopname SET status='non' WHERE id=".$result->id."";
		
		$status = "";
		try{ 
			$this->db->trans_begin();   
			$this->db->query($insOpname);    
			$this->db->query($delTempOpn); 
			$this->db->query($updateTgl); 
			
			if ($this->db->trans_status() === FALSE)
			{				
				$status = "failed";
				$this->db->trans_rollback();
			}
			else
			{ 
				$status = "success";
				$this->db->trans_commit();
			}
			
		} catch (Exception $e){
			$this->db->trans_rollback();
			$status = "failed";
			// echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		$data['msg'] = $status;
		return $data;
	}
	
	public function get_unit_kerja()
	{
		$this->db->select("id,unit_kerja");
		$this->db->from('struktur'); 
		$this->db->where('unit_kerja !=','');
		$query 	= $this->db->get(); 
		$result = $query->result(); 
		return $result;
	}
	
	public function get_pengguna_byunitkerja($unitKerja)
	{ 
		$this->db->select('users.user_name,users.user_id');
		$this->db->from('users');  
		$this->db->where('users.id_unitkerja',$unitKerja);
		$query 	= $this->db->get();
		$result = $query->result(); 
		return $result;
	}
	
	public function get_namabrg_bypengguna($pengguna)
	{ 
		$this->db->select('ta_asset.kode_asset, ma_namabarang.nama_barang');
		$this->db->from('ta_distribusiasset');
		$this->db->join('ta_asset','ta_asset.kode_asset = ta_distribusiasset.kode_asset');
		$this->db->join('ma_namabarang','ta_asset.kode_namabarang = ma_namabarang.kode_barang');
		$this->db->where('ta_distribusiasset.status', 'DIGUNAKAN');
		$this->db->where('ta_distribusiasset.penerima', $pengguna);
		
		$query 	= $this->db->get();
		$result = $query->result(); 
		return $result;
	}
	
	public function simpan_peminjaman_asset()
	{
		$idPeminjaman 	= $this->_id_peminjaman();
		$tglPinjam		= $this->Libasset_model->tanggal_tosql($this->input->post('tglPinjam'));
		$tglKembali		= $this->Libasset_model->tanggal_tosql($this->input->post('tglKembali'));
		$unitKerja		= $this->input->post('unitKerja');
		$penanggungJwb	= $this->input->post('penanggungJwb');
		$keperluan		= $this->input->post('keperluan');
		$keterangan		= $this->input->post('keterangan');
		$unitKerjaAsal	= $this->input->post('unitKerjaAsal');
		$penggunaAsal	= $this->input->post('penggunaAsset');
		$kodeAsset		= $this->input->post('namaBrg');
		
		$dateNow		= date("Y-m-d"); 
		$userInput		= 66; //$this->session->userdata('userid'); 
		
		$add = array(
			'id_peminjaman' => $idPeminjaman,
			'tgl_peminjaman' => $tglPinjam,
			'tgl_pengembalian' => $tglKembali,
			'unit_peminjam' => $unitKerja,
			'user_peminjam	' => $penanggungJwb,
			'keperluan' => $keperluan,
			'keterangan' => $keterangan,
			'unit_asal' => $unitKerjaAsal,
			'pengguna_asal' => $penggunaAsal,
			'kode_asset' => $kodeAsset, 
			'status' => 1, 
			'user_input' => $userInput,
			'tgl_input' => $dateNow
		);
		
		$insert = $this->db->insert('ta_peminjamanasset', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function get_peminjaman_asset()
	{
		$select = "
			SELECT
			ta_peminjamanasset.id_peminjaman,
			ta_peminjamanasset.tgl_peminjaman,
			ta_peminjamanasset.tgl_pengembalian,
			ta_peminjamanasset.status,
			ma_namabarang.nama_barang,
			ma_jenisasset.nama_jenisasset,
			ta_asset.kode_asset,
			struktur.unit_kerja,
			users.user_name,
			unitasal.unit_kerja AS unit_asal ,
			userasal.user_name AS pengguna_asal
			FROM
			ta_peminjamanasset
			Inner Join ta_asset ON ta_peminjamanasset.kode_asset = ta_asset.kode_asset
			Inner Join ma_namabarang ON ta_asset.kode_namabarang = ma_namabarang.kode_barang
			Inner Join ma_jenisasset ON ta_asset.kode_jenisasset = ma_jenisasset.kode_jenisasset
			Inner Join struktur ON ta_peminjamanasset.unit_peminjam = struktur.id
			Inner Join users ON ta_peminjamanasset.user_peminjam = users.user_id
			Inner Join struktur AS unitasal ON ta_peminjamanasset.unit_asal = unitasal.id
			Inner Join users AS userasal ON ta_peminjamanasset.pengguna_asal = userasal.user_id";
		$query 	= $this->db->query($select);
		$result = $query->result();
		return $result;
	}
	
	public function update_status_peminjaman()
	{
		$idPeminjaman	= $this->input->post('idPeminjaman');    
		$update = array( 
			'status' => '0', 
		); 
		
		$this->db->trans_start();
		$this->db->where('id_peminjaman',$idPeminjaman);
		$this->db->update('ta_peminjamanasset', $update); 
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		}
 
		return $data;
	}
	
	private function _id_barcode()
	{
		$date 		= date('Ymd'); 
		$select		= "SELECT (MAX(SUBSTRING(id_barcode,9))+1) AS maxkode FROM ta_barcodeasset";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode; 
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= $date.$maxkode;
		return $sequence; 
	} 	
	
	public function insert_barcode($kodeAsset)
	{
		$idBarcode 	= $this->_id_barcode();  
		$status		= "TERSEDIA"; 
		
		$add = array(
			'id_barcode' => $idBarcode,
			'kode_asset' => $kodeAsset, 
			'status' => $status
		);
		
		$insert = $this->db->insert('ta_barcodeasset', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		} 
		return $data;
	}
}
?>