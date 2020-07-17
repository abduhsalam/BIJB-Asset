<?php
class Masterasset_model extends CI_Model {
 
	public function __construct()
	{
			parent::__construct();
			 
	}
	
	//start menu master->jenis asset ==============================================================
	private function _kode_jnsasset()
	{
		$select		= "SELECT (MAX(SUBSTRING(kode_jenisasset,4))+1) AS maxkode FROM ma_jenisasset";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode; 
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= 'JA-'.$maxkode;
		return $sequence;
	}
	
	public function get_jns_asset()
	{
		$query = $this->db->get('ma_jenisasset'); 
		return $query->result();
	}
	
	public function tambah_jnsasset()
	{
		$kodeJnsAsset 	= $this->_kode_jnsasset();
		$namaJnsAsset	= $this->input->post('namaJnsAsset');
		$kodejns	= $this->input->post('kodejns');  
		$add = array(
			'kode_jenisasset' => $kodeJnsAsset,
			'kode_jns' => $kodejns,
			'nama_jenisasset' => $namaJnsAsset
		);

		$insert = $this->db->insert('ma_jenisasset', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{
		// if($this->db->affected_rows()){
			$data['msg'] = TRUE;
		}
		$data['kode'] = $kodeJnsAsset;		
		return $data;
	}
	
	public function update_jnsasset()
	{
		$kode		= $this->input->post('kode');
		$namaJnsAsset	= $this->input->post('namaJnsAsset');
		$kodejns	= $this->input->post('kodejns');
		$data = array(
			'nama_jenisasset' => $namaJnsAsset,
			'kode_jns' => $kodejns
		); 
		
		$this->db->where('kode_jns', $kodejns);
		$this->db->from('ma_jenisasset');		
		$status= $this->db->count_all_results(); 		
		if ($status>0){
			$status = FALSE;
		} else {
			$this->db->trans_start();
			$this->db->where('kode_jenisasset',$kode);
			$this->db->update('ma_jenisasset', $data);
			$this->db->trans_complete();	
			$status = $this->db->trans_status();
		}				
		if($status === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		} 
		
		return $data;
	} 
	
	public function cek_jnsasset($namaJnsAsset)
	{		
		$namaJnsAsset = trim($namaJnsAsset);
		$this->db->where('nama_jenisasset', $namaJnsAsset);
		$this->db->from('ma_jenisasset');		
		return $this->db->count_all_results(); 
	}

	public function cekkodejns($kodejns)
	{		
		// $kodejns = trim($kodejns);		
		$this->db->where('kode_jns', $kodejns);
		$this->db->from('ma_jenisasset');		
		return $this->db->count_all_results(); 
	}
	
	public function delete_jnsasset(){
		$kode = $this->input->post('kode');
		$this->db->where('kode_jenisasset',$kode);
		$this->db->from('ma_kategoriasset');
		$cek = $this->db->count_all_results();
		$data = array();
		if($cek>0){
			$data['delete'] = 'NO';
		} else {
			$data['delete'] = 'YES';
			$this->db->delete('ma_jenisasset', array('kode_jenisasset' => $kode));  
			$data['msg'] = FALSE;
			if ($this->db->affected_rows()>0)
			{  
				$data['msg'] = TRUE;
			} 
		}
		
		return $data;
	}	
	//end menu master->jenis asset =================================================================
	
	//start menu master->kategori asset	============================================================
	private function _kode_katergoriasset()
	{
		$select		= "SELECT (MAX(SUBSTRING(kode_kategori,4))+1) AS maxkode FROM ma_kategoriasset";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode;
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= 'KT-'.$maxkode;
		return $sequence;
	}
	
	public function get_kategori_asset()
	{
		$this->db->select('kode_kategori, kode_k, nama_kategori, nama_jenisasset');
		$this->db->from('ma_kategoriasset');
		$this->db->join('ma_jenisasset', 'ma_jenisasset.kode_jenisasset=ma_kategoriasset.kode_jenisasset'); 
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function tambah_kategoriasset()
	{
		$kodeKategorix 	= $this->_kode_katergoriasset();
		$jnsAsset		= $this->input->post('jnsAsset'); 
		$namaKategori	= $this->input->post('namaKategori'); 
		$kodekategori2	= $this->input->post('kode');
		
		$add = array(
			'kode_kategori' => $kodeKategorix,
			'kode_k' => $kodekategori2,
			'kode_jenisasset' => $jnsAsset,
			'nama_kategori' => $namaKategori			
		);		
		$insert = $this->db->insert('ma_kategoriasset', $add);
		$data['msg'] = FALSE;		
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		}
		$data['kode'] = $kodekategori2;		
		return $data;
	}
	
	public function cek_kategori_asset($namaKategori)
	{		
		$namaKategori = trim($namaKategori);
		$this->db->where('nama_kategori', $namaKategori);
		$this->db->from('ma_kategoriasset');
		return $this->db->count_all_results(); 
	}
	
	public function cek_kodekategori_asset($kodekategori,$jns)
	{		
		$kodekategori = trim($kodekategori);
		$jns = trim($jns);
		$this->db->where('kode_k', $kodekategori);
		$this->db->where('kode_jenisasset', $jns);
		$this->db->from('ma_kategoriasset');
		$dd = $this->db->count_all_results();		
		return $dd; 
	}

	public function update_kategori_asset()
	{
		$kode		= $this->input->post('kode');
		$namaKategori	= $this->input->post('namaKategori');
		$kodekategori	= $this->input->post('kodekategori');
		$jns	= $this->input->post('jns');
		$data = array(
			'nama_kategori' => $namaKategori,
			'kode_k' => $kodekategori
		); 
		
		$kodekategori = trim($kodekategori);
		$jns = trim($jns);
		$this->db->where('kode_k', $kodekategori);
		$this->db->where('kode_jenisasset', $jns);
		$this->db->from('ma_kategoriasset');
		$status = $this->db->count_all_results();				

		if ($status>0){
			$status = FALSE;
		} else {
			$this->db->trans_start();
			$this->db->where('kode_kategori',$kode);
			$this->db->update('ma_kategoriasset', $data);
			$this->db->trans_complete();
			$status = $this->db->trans_status();
		}			
		
		if($status === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		} 
		
		return $data;
	}
	
	public function delete_kategori_asset(){
		$kode = $this->input->post('kode');
		$this->db->where('kode_kategori',$kode);
		$this->db->from('ma_namabarang');
		$cek = $this->db->count_all_results();
		$data = array();
		if($cek>0){
			$data['delete'] = 'NO';
		} else {
			$data['delete'] = 'YES';
			$this->db->delete('ma_kategoriasset', array('kode_kategori' => $kode));  
			$data['msg'] = FALSE;
			if ($this->db->affected_rows()>0)
			{  
				$data['msg'] = TRUE;
			} 
		}
		
		return $data;
	}
	//end menu master -> kategori asset =============================================================
	
	//start menu master -> jenis barang asset =======================================================
	private function _kode_jnsasset_brg()
	{
		$select		= "SELECT (MAX(SUBSTRING(kode_barang,5))+1) AS maxkode FROM ma_namabarang";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode;
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= 'BRG-'.$maxkode;
		return $sequence; 
	}

	public function get_jns_brgasset()
	{
		$this->db->select('kode_barang, nama_barang, nama_kategori, nama_jenisasset, kode_b');
		$this->db->from('ma_namabarang');
		$this->db->join('ma_kategoriasset','ma_kategoriasset.kode_kategori = ma_namabarang.kode_kategori');
		$this->db->join('ma_jenisasset', 'ma_jenisasset.kode_jenisasset=ma_kategoriasset.kode_jenisasset'); 
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function tambah_barangasset()
	{
		$kodeBarang 	= $this->_kode_jnsasset_brg(); 
		$kategoriAsset	= $this->input->post('kategoriAsset'); 
		$namaBarang		= $this->input->post('namaBarang'); 
		$kodebarang2		= $this->input->post('kodebarang'); 
		$add = array(
			'kode_barang' => $kodeBarang,
			'kode_kategori' => $kategoriAsset,
			'nama_barang' => $namaBarang,
			'kode_b' => $kodebarang2
		);

		$insert = $this->db->insert('ma_namabarang', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{
			$data['msg'] = TRUE;
		}
		$data['kode'] = $kodeBarang;
		return $data;
	}
	
	//digunakan di menu tambah barang asset, menu pengajuan asset user
	public function kategori_byjnsasset($jenisAsset)
	{
		$query = $this->db->get_where('ma_kategoriasset', array('kode_jenisasset' => $jenisAsset))->result();
		return $query;
	}
	
	public function cek_barang_asset($namaBarang)
	{		
		$namaBarang = trim($namaBarang);
		$this->db->where('nama_barang', $namaBarang);
		$this->db->from('ma_namabarang');
		return $this->db->count_all_results(); // Produces an integer, like 17
	}

	public function cek_kodebarang_asset($kodebarang,$kategori)
	{				
		$this->db->where('kode_b', $kodebarang);
		$this->db->where('kode_kategori', $kategori);
		$this->db->from('ma_namabarang');		
		$hasil = $this->db->count_all_results(); // Produces an integer, like 17		
		return $hasil;
	}
		
	public function update_namabrg()
	{
		$kode		= $this->input->post('kode');
		$namaBarang	= $this->input->post('namaBarang');
		$kodebarang	= $this->input->post('kodebarang');
		$kategori	= $this->input->post('kategori');
		$data = array(
			'nama_barang' => $namaBarang,
			'kode_b' => $kodebarang,
			'kode_kategori' => $kategori,
		); 
		
		$this->db->where('kode_b', $kodebarang);
		$this->db->where('kode_kategori', $kategori);
		$this->db->from('ma_namabarang');		
		$status = $this->db->count_all_results();

		if ($status>0){
			$status = FALSE;
		} else {
			$this->db->trans_start();
			$this->db->where('kode_barang',$kode);
			$this->db->update('ma_namabarang', $data);
			$this->db->trans_complete();
			$status = $this->db->trans_status();
		}			
		
		if($status === FALSE)
		{
			$data['msg'] = FALSE;
		} 
		else 
		{
			$data['msg'] = TRUE;
		} 
		
		return $data;
	}
	 
	public function delete_brgasset(){
		$kode = $this->input->post('kode');
		$this->db->where('kode_namabarang',$kode);
		$this->db->from('ta_asset');
		$cek = $this->db->count_all_results();
		$data = array();
		if($cek>0){
			$data['delete'] = 'NO';
		} else {
			$data['delete'] = 'YES';
			$this->db->delete('ma_namabarang', array('kode_barang' => $kode));  
			$data['msg'] = FALSE;
			if ($this->db->affected_rows()>0)
			{  
				$data['msg'] = TRUE;
			} 
		}
		
		return $data;
	}
	//end menu master -> jenis barang asset ================================================ 
	
	//start menu master -> data vendor =====================================================
	private function _kode_vendor(){
		$select		= "SELECT (MAX(SUBSTRING(kode_vendor,5))+1) AS maxkode FROM ma_vendor";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode;
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= 'VDR-'.$maxkode;
		return $sequence;  
	} 
	public function get_vendor()
	{
		$query = $this->db->get('ma_vendor'); 
		return $query->result();
	}
	
	public function get_vendor_byid($id)
	{ 
		$query = $this->db->get_where('ma_vendor', array('kode_vendor'=>$id)); 
		return $query->row();
	}	 
	
	public function tambah_vendor_asset()
	{
		$kodeVendor 	= $this->_kode_vendor(); 
		$jnsVendor		= $this->input->post('jnsVendor'); 
		$namaVendor		= $this->input->post('tbhNamaVendor'); 
		$jnsPenyedia	= $this->input->post('jnsPenyedia'); 
		$alamat			= $this->input->post('alamat'); 
		$pajak			= $this->input->post('pajak'); 
		$pemilik		= $this->input->post('pemilik'); 
		$noTlp			= $this->input->post('noTlp'); 
		$noHp			= $this->input->post('noHp'); 
		
		$add = array(
			'kode_vendor' => $kodeVendor,
			'jenis_vendor' => $jnsVendor,
			'type_vendor' => 'asset',
			'nama_vendor' => $namaVendor,
			'kode_jnspenyedia' => $jnsPenyedia,
			'alamat_vendor' => $alamat,
			'pajak' => $pajak,
			'pemilik' => $pemilik,
			'no_telepon' => $noTlp,
			'no_hp' => $noHp,
		);

		$insert = $this->db->insert('ma_vendor', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		}
		$data['kode'] = $kodeVendor;
		return $data;
	}	
	
	public function tambah_vendor_mainten()
	{
		$kodeVendor 	= $this->_kode_vendor(); 
		$jnsVendor		= $this->input->post('jnsVendor'); 
		$namaVendor		= $this->input->post('tbhNamaVendor'); 
		$jnsPenyedia	= $this->input->post('jnsPenyedia'); 
		$alamat			= $this->input->post('alamat'); 
		$pajak			= $this->input->post('pajak'); 
		$pemilik		= $this->input->post('pemilik'); 
		$noTlp			= $this->input->post('noTlp'); 
		$noHp			= $this->input->post('noHp'); 
		
		$add = array(
			'kode_vendor' => $kodeVendor,
			'jenis_vendor' => $jnsVendor,
			'type_vendor' => 'maintenance',
			'nama_vendor' => $namaVendor,
			'kode_jnspenyedia' => $jnsPenyedia,
			'alamat_vendor' => $alamat,
			'pajak' => $pajak,
			'pemilik' => $pemilik,
			'no_telepon' => $noTlp,
			'no_hp' => $noHp,
		);

		$insert = $this->db->insert('ma_vendor', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		}
		$data['kode'] = $kodeVendor;
		return $data;
	}
	
	public function get_vendor_byjnsvendor($jnsVendor)
	{
		$this->db->select('kode_vendor, nama_vendor');
		$query = $this->db->get_where('ma_vendor', array('jenis_vendor'=>$jnsVendor, 'type_vendor'=>'asset')); 
		return $query->result();
	}
	
	public function vendor_byjnsvendor_mainten($jnsVendor)
	{
		$this->db->select('kode_vendor, nama_vendor');
		$query = $this->db->get_where('ma_vendor', array('jenis_vendor'=>$jnsVendor, 'type_vendor'=>'maintenance')); 
		return $query->result();
	}
	
	public function update_vendor()
	{
		$kodeVendor 	= $this->input->post('edtKdVendor');  
		$namaVendor		= $this->input->post('edtNamaVendor'); 
		$jnsPenyedia	= $this->input->post('edtJnsPenyedia'); 
		$alamat			= $this->input->post('edtAlamat'); 
		$pajak			= $this->input->post('edtPajak'); 
		$pemilik		= $this->input->post('edtPemilik'); 
		$noTlp			= $this->input->post('edtNoTlp'); 
		$noHp			= $this->input->post('edtNoHp'); 
		
		$update = array( 
			'nama_vendor' => $namaVendor,
			'kode_jnspenyedia' => $jnsPenyedia,
			'alamat_vendor' => $alamat,
			'pajak' => $pajak,
			'pemilik' => $pemilik,
			'no_telepon' => $noTlp,
			'no_hp' => $noHp
		);
		
		$this->db->where('kode_vendor',$kodeVendor);
		$insert = $this->db->update('ma_vendor', $update); 
		
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{
		// if($this->db->affected_rows()){
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	//end menu master -> data vendor =================================================================================
	
	//start menu master -> jenis penyedia ============================================================================	
	private function _kode_jnspenyedia()
	{
		$select		= "SELECT (MAX(SUBSTRING(kode_jnspenyedia,4))+1) AS maxkode FROM ma_jenispenyedia";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode;
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= 'PV-'.$maxkode;
		return $sequence;   
	}  
	
	public function get_jns_penyedia() //digunakan ketika membuat vendor juga
	{
		$query = $this->db->get('ma_jenispenyedia'); 
		return $query->result();
	}
	
	public function tambah_jenis_penyedia()
	{
		$kodeJnsPenyedia	= $this->_kode_jnspenyedia();
		$jnsPenyedia		= $this->input->post('jnsPenyedia'); 
		$add = array(
			'kode_jnspenyedia' => $kodeJnsPenyedia,
			'nama_jnspenyedia' => $jnsPenyedia
		);

		$insert = $this->db->insert('ma_jenispenyedia', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		}
		$data['kode'] = $kodeJnsPenyedia;
		return $data;
	}
	
	public function cek_jnspenyedia($jnsPenyedia)
	{		
		$jnsPenyedia = trim($jnsPenyedia);
		$this->db->where('nama_jnspenyedia', $jnsPenyedia);
		$this->db->from('ma_jenispenyedia');
		return $this->db->count_all_results(); 
	}	
		
	public function update_jnspenyedia()
	{
		$kode			= $this->input->post('kode');
		$namaPenyedia	= $this->input->post('namaPenyedia');
		$data = array(
			'nama_jnspenyedia' => $namaPenyedia
		); 
		
		$this->db->trans_start();
		$this->db->where('kode_jnspenyedia',$kode);
		$this->db->update('ma_jenispenyedia', $data);
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
	
	public function delete_jnspenyedia(){
		$kode = $this->input->post('kode');
		$this->db->where('kode_jnspenyedia',$kode);
		$this->db->from('ma_vendor');
		$cek = $this->db->count_all_results();
		$data = array();
		if($cek>0){
			$data['delete'] = 'NO';
		} else {
			$data['delete'] = 'YES';
			$this->db->delete('ma_jenisasset', array('kode_jenisasset' => $kode));  
			$data['msg'] = FALSE;
			if ($this->db->affected_rows()>0)
			{  
				$data['msg'] = TRUE;
			} 
		}
		
		return $data;
	}
	//end menu master -> jenis penyedia ==============================================================
	
	
	//start menu master -> sumber anggaran ===========================================================
	private function _kode_sbr_anggaran()
	{
		$select		= "SELECT (MAX(SUBSTRING(kode_sumberanggaran,4))+1) AS maxkode FROM ma_sumberanggaran";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode;
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= 'SA-'.$maxkode;
		return $sequence;  
	}
	
	public function get_sbr_anggaran()
	{
		$query = $this->db->get('ma_sumberanggaran'); 
		return $query->result();
	} 
	
	public function tambah_sbranggaran()
	{
		$kodeSbrAgrn 	= $this->_kode_sbr_anggaran(); 
		$sbrAnggaran	= $this->input->post('sbrAnggaran'); 
		$add = array(
			'kode_sumberanggaran' => $kodeSbrAgrn,
			'nama_sumberanggaran' => $sbrAnggaran
		);

		$insert = $this->db->insert('ma_sumberanggaran', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{
		// if($this->db->affected_rows()){
			$data['msg'] = TRUE;
		}
		$data['kode'] = $kodeSbrAgrn;
		return $data;
	}  
	
	public function cek_sbranggaran($namaAnggaran)
	{		
		$namaAnggaran = trim($namaAnggaran);
		$this->db->where('nama_sumberanggaran', $namaAnggaran);
		$this->db->from('ma_sumberanggaran');
		return $this->db->count_all_results(); // Produces an integer, like 17
	}	
	
	public function update_sbranggaran()
	{
		$kode		= $this->input->post('kode');
		$sbrAnggaran	= $this->input->post('sbrAnggaran');
		$data = array(
			'nama_sumberanggaran' => $sbrAnggaran
		); 
		
		$this->db->trans_start();
		$this->db->where('kode_sumberanggaran',$kode);
		$this->db->update('ma_sumberanggaran', $data);
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
		
	public function delete_sbranggaran(){
		$kode = $this->input->post('kode');
		$this->db->where('sumber_anggaran',$kode);
		$this->db->from('ta_pengajuanasset');
		$cek = $this->db->count_all_results();
		$data = array();
		if($cek>0){
			$data['delete'] = 'NO';
		} else {
			$data['delete'] = 'YES';
			$this->db->delete('ma_sumberanggaran', array('kode_sumberanggaran' => $kode));  
			$data['msg'] = FALSE;
			if ($this->db->affected_rows()>0)
			{  
				$data['msg'] = TRUE;
			} 
		}
		
		return $data;
	}	
	//end menu master -> sumber anggaran =================================================================
	
	//start menu master -> jenis perlakuan ===============================================================
	private function _kode_jns_perlakuan()
	{
		$select		= "SELECT (MAX(SUBSTRING(kode_jnsperlakuan,4))+1) AS maxkode FROM ma_jenisperlakuan";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode;
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= 'JP-'.$maxkode;
		return $sequence;   
	}
	
	public function get_jns_perlakuan()
	{
		$query = $this->db->get('ma_jenisperlakuan'); 
		return $query->result();
	} 
	
	public function jns_perlakuan_bykode($kode)
	{
		$query = $this->db->get_where('ma_jenisperlakuan',array('kode_jnsperlakuan'=>$kode)); 
		return $query->row();
	} 	
	
	public function cek_jnsperlakuan($jnsPerlakuan)
	{		
		$jnsPerlakuan = trim($jnsPerlakuan);
		$this->db->where('nama_jnsperlakuan', $jnsPerlakuan);
		$this->db->from('ma_jenisperlakuan');
		return $this->db->count_all_results(); 
	}		
	
	public function tambah_jnsperlakuan()
	{
		$kodeJnsPerlakuan = $this->_kode_jns_perlakuan(); 
		$jnsPerlakuan	= $this->input->post('jnsPerlakuan'); 
		$add = array(
			'kode_jnsperlakuan' => $kodeJnsPerlakuan,
			'nama_jnsperlakuan' => $jnsPerlakuan
		);

		$insert = $this->db->insert('ma_jenisperlakuan', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{
		// if($this->db->affected_rows()){
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	 
	public function update_jnsperlakuan()
	{
		$kode			= $this->input->post('kode');
		$jnsPerlakuan	= $this->input->post('jnsPerlakuan');
		$data = array(
			'nama_jnsperlakuan' => $jnsPerlakuan
		); 
		
		$this->db->trans_start();
		$this->db->where('kode_jnsperlakuan',$kode);
		$this->db->update('ma_jenisperlakuan', $data);
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
	
	public function delete_jnsperlakuan(){
		$kode = $this->input->post('kode');
		$this->db->where('jenis_perlakuan',$kode);
		$this->db->from('ta_perlakuanasset');
		$cek = $this->db->count_all_results();
		$data = array();
		if($cek>0){
			$data['delete'] = 'NO';
		} else {
			$data['delete'] = 'YES';
			$this->db->delete('ma_jenisperlakuan', array('kode_jnsperlakuan' => $kode));  
			$data['msg'] = FALSE;
			if ($this->db->affected_rows()>0)
			{  
				$data['msg'] = TRUE;
			} 
		}
		
		return $data;
	}	
	//end menu master -> jenis perlakuan ===================================================================
	
	//start menu master -> jenis pajak =====================================================================
	private function _kode_jns_pajak()
	{
		$select		= "SELECT (MAX(SUBSTRING(kode_jnspajak,5))+1) AS maxkode FROM ma_jenispajak";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode;
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= 'JPJ-'.$maxkode;
		return $sequence;   
	} 
	
	public function get_jnspajak()
	{
		$query = $this->db->get('ma_jenispajak'); 
		return $query->result();
	} 
	
	public function cek_jnspajak($jnsPajak)
	{		
		$jnsPajak = trim($jnsPajak);
		$this->db->where('nama_jnspajak', $jnsPajak);
		$this->db->from('ma_jenispajak');
		return $this->db->count_all_results(); 
	}

	public function tambah_jnsPajak()
	{
		$kodeJnsPjk = $this->_kode_jns_pajak(); 
		$jnsPajak	= $this->input->post('jnsPajak'); 
		$add = array(
			'kode_jnspajak' => $kodeJnsPjk,
			'nama_jnspajak' => $jnsPajak
		);

		$insert = $this->db->insert('ma_jenispajak', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{
		// if($this->db->affected_rows()){
			$data['msg'] = TRUE;
		} 
		return $data;
	}	
	
	public function update_jnspajak()
	{
		$kode			= $this->input->post('kode');
		$jnsPajak	= $this->input->post('jnsPajak');
		$data = array(
			'nama_jnspajak' => $jnsPajak
		); 
		
		$this->db->trans_start();
		$this->db->where('kode_jnspajak',$kode);
		$this->db->update('ma_jenispajak', $data);
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
		
	public function delete_jnspajak(){
		$kode = $this->input->post('kode');
		
		$this->db->where('kode_jnspajak',$kode);
		$this->db->from('ta_pajakkendaraan');
		$cek1 = $this->db->count_all_results();
		
		$this->db->where('kode_jnspajak',$kode);
		$this->db->from('ta_pajaktnhbgn');
		$cek2 = $this->db->count_all_results();
		
		$data = array();
		if($cek1>0 || $cek2>0){
			$data['delete'] = 'NO';
		} else {
			$data['delete'] = 'YES';
			$this->db->delete('ma_jenispajak', array('kode_jnspajak' => $kode));  
			$data['msg'] = FALSE;
			if ($this->db->affected_rows()>0)
			{  
				$data['msg'] = TRUE;
			} 
		}
		
		return $data;
	}
	//end menu master -> jenis pajak ====================================================================
	
	//start menu master -> kondisi asset ================================================================
	private function _kode_kondisiasset()
	{		
		$select		= "SELECT (MAX(SUBSTRING(kode_kondisiasset,4))+1) AS maxkode FROM ma_kondisiasset";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode;
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= 'KA-'.$maxkode;
		return $sequence;    
	}   
	
	public function get_kondisi_asset()
	{
		$query = $this->db->get('ma_kondisiasset'); 
		return $query->result();
	}
	
	public function cek_kondisi_sset($kondisiAsset)
	{		
		$kondisiAsset = trim($kondisiAsset);
		$this->db->where('nama_kondisiasset', $kondisiAsset);
		$this->db->from('ma_kondisiasset');
		return $this->db->count_all_results(); 
	}	
	
	public function tambah_kondisi_asset()
	{
		$kodeStatus 	= $this->_kode_kondisiasset();
		$kondisiAsset	= $this->input->post('kondisiAsset'); 
		$add = array(
			'kode_kondisiasset' => $kodeStatus,
			'nama_kondisiasset' => $kondisiAsset
		);

		$insert = $this->db->insert('ma_kondisiasset', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{
			$data['msg'] = TRUE;
		}
		$data['kode'] = $kodeStatus;
		return $data;
	}
	
	public function update_kondisi_asset()
	{
		$kode		= $this->input->post('kode');
		$kondisiAsset= $this->input->post('kondisiAsset');
		$data = array(
			'nama_kondisiasset' => $kondisiAsset
		); 
		
		$this->db->trans_start();
		$this->db->where('kode_kondisiasset',$kode);
		$this->db->update('ma_kondisiasset', $data);
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
	
	public function delete_kondisi_asset(){
		$kode = $this->input->post('kode');
		$query = $this->db->get_where('ma_kondisiasset', array('kode_kondisiasset' => $kode))->row();
		
		$this->db->where('kondisi_asset',$query->nama_kondisiasset);
		$this->db->from('ta_stokopname');
		$cek = $this->db->count_all_results();
		$data = array();
		
		if($cek>0){
			$data['delete'] = 'NO';
		} else {
			$data['delete'] = 'YES';
			$this->db->delete('ma_kondisiasset', array('kode_kondisiasset' => $kode));  
			$data['msg'] = FALSE;
			if ($this->db->affected_rows()>0)
			{  
				$data['msg'] = TRUE;
			} 
		}
		
		return $data;
	}
	//end menu master -> kondisi asset =======================================================================
	  
	//start menu master -> tanggal closing ===================================================================
	public function tambah_tgl_closing(){
		$tanggal	= $this->Libasset_model->tanggal_tosql($this->input->post('tglStokOpname'));
		 
		$status		= $this->input->post('status');
		$jnsStok	= $this->input->post('jnsStok'); 
		$tglInput	= date("Y-m-d");
		$userInput	= 66; //$this->session->userdata('userid');
		
		$add = array(
				'tgl_stok_opname' => $tanggal,
				'jns_stok_opname' => $jnsStok,
				'status' => $status,
				'tgl_input' => $tglInput,
				'user_input' => $userInput
				);
		
		$insert = $this->db->insert('ta_tglstokopname', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		} 
		return $data;
	}
	
	public function get_tgl_stokopname()
	{		
		// $this->db->where('jns_stok_opname','STOKBHP');
		$this->db->order_by('tgl_stok_opname','desc');
		$query = $this->db->get('ta_tglstokopname');
		return $query->result();
	}
	
	public function cek_tgl_opname($tglStokOpname,$jnsStok)
	{		
		$tanggal	= $this->Libasset_model->tanggal_tosql($tglStokOpname); 
		$this->db->where('tgl_stok_opname', $tanggal);
		$this->db->where('jns_stok_opname', $jnsStok);
		$this->db->from('ta_tglstokopname');
		return $this->db->count_all_results(); // Produces an integer, like 17
	}
	
	public function update_status_closing()
	{
		$id		= $this->input->post('id'); 
		$status = $this->input->post('status'); 
		
		$update = array( 
			'status' => $status
		);
		// print_r($update); exit();
		$this->db->where('id',$id);
		$this->db->update('ta_tglstokopname', $update);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{  
			$data['msg'] = TRUE;
		}
		$data['status'] = $status; 
		return $data;
	}
	//end menu master -> tanggal closing ===========================================================
	
	
	
	//start bhp satuan barang=======================================================================
	private function _kode_satuanbrg(){
		$select		= "SELECT (MAX(SUBSTRING(kode_satuan,4))+1) AS maxkode FROM bhp_satuanbarang";
		$query		= $this->db->query($select)->row();
		$maxkode	= $query->maxkode;
		if($maxkode==null){
			$maxkode = 1;
		}
		$sequence	= 'SB-'.$maxkode;
		return $sequence;   
	}
	
	public function tambah_satuan_barang(){
		$kode 	= $this->_kode_satuanbrg();
		$namaSatuan	= $this->input->post('namaSatuan');
		$add	= array(
				'kode_satuan' => $kode,
				'nama_satuan' => $namaSatuan
				);
		$insert = $this->db->insert('bhp_satuanbarang', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		}
		$data['kode'] = $kode;
		return $data;
	}	  
	//end bhp satuan barang =========================================================================
	
	private function _kode_groupbhp()
	{
		$select = "SELECT MAX(kode_group) AS maxgroup, COUNT(kode_group) AS countgroup FROM bhp_kodemanual"; 
		$query 	= $this->db->query($select);
		$result	= $query->row();
		$count	= $result->countgroup;
		if($count>0){ $kode = ($result->maxgroup)+1; } else { $kode="101"; }
		return $kode;
	}
		
	private function _kode_jenisbhp($kodeGroup)
	{
		$select = "SELECT MAX(kode_jenis) AS maxjenis, COUNT(kode_jenis) AS countjenis FROM bhp_kodemanual WHERE kode_group='".$kodeGroup."'"; 
		$query 	= $this->db->query($select);
		$result	= $query->row();
		$count	= $result->countjenis;
		
		
		if($count>0){ 
			$seq 	= ((int)$result->maxjenis)+1;
			$kode 	=  str_pad($seq, 3, "0", STR_PAD_LEFT); 
			$kodeQuery 	= "insert";
		} else {  
			$kodeQuery 	= "update";
			$kode 		= "001";
		}
		$data['query'] 	= $kodeQuery;
		$data['kode'] 	= $kode;
		return $data;
	}
	
	private function _kode_merkbhp($kodeGroup,$kodeJns)
	{
		$select = "SELECT MAX(kode_merk) AS maxmerk, COUNT(kode_merk) AS countmerk FROM bhp_kodemanual WHERE kode_group='".$kodeGroup."' AND kode_jenis='".$kodeJns."'"; 
		$query 	= $this->db->query($select);
		$result	= $query->row();
		$count	= $result->countmerk;
		
		
		if($count>0){ 
			$seq 	= ((int)$result->maxmerk)+1;
			$kode 	=  str_pad($seq, 3, "0", STR_PAD_LEFT); 
			$kodeQuery 	= "insert";
		} else {  
			$kodeQuery 	= "update";
			$kode 		= "001";
		}
		$data['query'] 	= $kodeQuery;
		$data['kode'] 	= $kode;
		return $data;
	} 	  
	
	public function barang_bykategori($kategori)
	{
		$query = $this->db->get_where('ma_namabarang', array('kode_kategori' => $kategori));
		return $query->result_array();
	}  
	 	
	public function get_satuan_barang()
	{
		$query = $this->db->get('bhp_satuanbarang'); 
		return $query->result();
	} 
	
	public function get_user(){
		$this->db->order_by('user_name', 'ASC');
		$query = $this->db->get('users'); 
		return $query->result();
	}
	
	public function get_user_byid($id)
	{ 
		$query = $this->db->get_where('users', array('user_id'=>$id)); 
		return $query->row();
	}	 
	
	public function get_kode_manual(){
		$this->db->select('kode_group,nama_group');
		$this->db->from('bhp_kodemanual');
		$this->db->group_by('kode_group,nama_group');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}  
	
	public function tambah_group()
	{ 
		$kode 	= $this->_kode_groupbhp();
		$namaGroup		= $this->input->post('namaGroup');  
		$add = array(
			'kode_group' => $kode,
			'nama_group' => $namaGroup, 
		);

		$insert = $this->db->insert('bhp_kodemanual', $add);
		$data['msg'] = FALSE;
		if ($this->db->affected_rows()>0)
		{ 
			$data['msg'] = TRUE;
		}
		$data['kode'] = $kode;
		return $data;
	}
	
	public function tambah_jenisbrg()
	{ 
		$kodeGroup	= $this->input->post('groupBrg');  
		$namaJnsBrg	= $this->input->post('namaJnsBrg');  
		$kode 		= $this->_kode_jenisbhp($kodeGroup);
		$dtKdManual = $this->get_bhpmanual_bygroup($kodeGroup);		 
		
		if($kode['query']=="update")
		{
			$update = array(
				'kode_jenis' => $kode['kode'],
				'nama_jenis' => $namaJnsBrg, 
			);
			$this->db->trans_start();
			$this->db->where('kode_group',$kodeGroup);
			$this->db->update('bhp_kodemanual', $update);
			$this->db->trans_complete();
			
			if($this->db->trans_status() === FALSE)
			{
				$data['msg'] = FALSE;
			} 
			else 
			{
				$data['msg'] = TRUE;
			}  
		} else {
			
			$add = array(
				'kode_group' => $dtKdManual->kode_group,
				'nama_group' => $dtKdManual->nama_group,
				'kode_jenis' => $kode['kode'],
				'nama_jenis' => $namaJnsBrg, 
			);
			$this->db->trans_start(); 
			$this->db->insert('bhp_kodemanual', $add);
			$this->db->trans_complete();
			
			if($this->db->trans_status() === FALSE)
			{
				$data['msg'] = FALSE;
			} 
			else 
			{
				$data['msg'] = TRUE;
			}  
		}  
		$data['kode'] = $kode['kode'];
		return $data;
	} 
	
	public function tambah_merk()
	{ 
		$kodeGroup	= $this->input->post('groupBrg');  
		$kodeJns	= $this->input->post('jnsBrg');  
		$namaMerk	= $this->input->post('namaMerk');  
		$kode 		= $this->_kode_merkbhp($kodeGroup,$kodeJns);
		$dtKdManual = $this->get_bhpmanual_bygroup($kodeGroup);		 
		
		if($kode['query']=="update")
		{
			$update = array(
				'kode_merk' => $kode['kode'],
				'nama_merk' => $namaMerk, 
			);
			$this->db->trans_start();
			$this->db->where('kode_group',$kodeGroup);
			$this->db->where('kode_jenis',$kodeJns);
			$this->db->update('bhp_kodemanual', $update);
			$this->db->trans_complete();
			
			if($this->db->trans_status() === FALSE)
			{
				$data['msg'] = FALSE;
			} 
			else 
			{
				$data['msg'] = TRUE;
			}  
		} else {
			
			$add = array(
				'kode_group' => $dtKdManual->kode_group,
				'nama_group' => $dtKdManual->nama_group,
				'kode_jenis' => $dtKdManual->kode_jenis,
				'nama_jenis' => $dtKdManual->nama_jenis, 
				'kode_merk' => $kode['kode'], 
				'nama_merk' => $namaMerk
			);
			$this->db->trans_start(); 
			$this->db->insert('bhp_kodemanual', $add);
			$this->db->trans_complete();
			
			if($this->db->trans_status() === FALSE)
			{
				$data['msg'] = FALSE;
			} 
			else 
			{
				$data['msg'] = TRUE;
			}  
		}  
		$data['kode'] = $kode['kode'];
		return $data;
	} 
	
	public function get_bhpmanual_bygroup($kodeGroup)
	{
		$this->db->limit(1);
		$query = $this->db->get_where('bhp_kodemanual',array('kode_group'=>$kodeGroup));
		$result = $query->row();
		return $result;
		
	}  	

	public function get_divisi()
	{
		$this->db->where('aktif','aktif');
		$query = $this->db->get('struktur'); 
		return $query->result();
	}	

	public function get_namakaryawan_byid($divisi)
	{
		$this->db->where('kode_struktur',$divisi);
		$query = $this->db->get('users'); 
		return $query->result();
	}
}
?>