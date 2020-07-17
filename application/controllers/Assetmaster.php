<?php
class Assetmaster extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();  
		date_default_timezone_set('Asia/Jakarta');
		
		$this->load->model(array('Masterasset_model','Asset_model','Libasset_model','Bhp_model')); 
		
	}
	
	//start menu master -> jenis asset ======================================
	public function jenis_asset(){
		$data['selectMenu']	= array('mn-master','sm-jenis-asset'); 
		$data['dtJnsAsset'] = $this->Masterasset_model->get_jns_asset();
		$data['view']		= "page/assetmaster/jenis_asset";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function tambah_jnsasset()
	{   
		$data = $this->Masterasset_model->tambah_jnsasset(); 
		echo json_encode($data);
	}
	
	public function update_jnsasset()
	{
		$data = $this->Masterasset_model->update_jnsasset(); 		
		echo json_encode($data); 		
	}
	
	public function cek_jnsasset()
	{
		$namaJnsAsset = $this->input->post('namaJnsAsset');
		$data = $this->Masterasset_model->cek_jnsasset($namaJnsAsset); 
        echo json_encode($data);
	}

	public function cekkodejns()
	{
		$kodejns = $this->input->post('kodejns');
		$data = $this->Masterasset_model->cekkodejns($kodejns);		
		echo json_encode($data);		
	}
	
	public function delete_jnsasset()
	{ 
		$data = $this->Masterasset_model->delete_jnsasset(); 
        echo json_encode($data);
	} 	
	//end menu master -> jenis asset =================================================
	
	
	//start menu master -> kategori asset ============================================
	public function kategori_asset(){
		$data['selectMenu']	= array('mn-master','sm-kategori-asset'); 
		$data['dtjnsAsset']	= $this->Masterasset_model->get_jns_asset();
		$data['dtBrgAsset'] = $this->Masterasset_model->get_kategori_asset();
		$data['view']		= "page/assetmaster/kategori_asset";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function tambah_kategoriasset()
	{
		$data = $this->Masterasset_model->tambah_kategoriasset(); 
        echo json_encode($data);
	}
	 
	public function cek_kategori_asset()
	{
		$namaKategori = $this->input->post('namaKategori');
		$data = $this->Masterasset_model->cek_kategori_asset($namaKategori); 
        echo json_encode($data);
	} 

	public function cek_kodekategori_asset()
	{
		$kodeKategori = $this->input->post('kodekategori');
		$jns = $this->input->post('jns');		
		$data = $this->Masterasset_model->cek_kodekategori_asset($kodeKategori,$jns); 		
        echo json_encode($data);
	} 
	 	
	public function update_kategori_asset()
	{
		$data = $this->Masterasset_model->update_kategori_asset(); 
        echo json_encode($data); 
	}
	
	public function delete_kategori_asset()
	{
		$data = $this->Masterasset_model->delete_kategori_asset(); 
        echo json_encode($data); 
	}
	//end menu master -> kategori asset ===================================================
	
	//start menu master -> jenis barang asset =================================================	
	public function jenis_barang_asset(){
		$data['selectMenu']	= array('mn-master','sm-jenis-barang'); 
		$data['dtjnsAsset']	= $this->Masterasset_model->get_jns_asset();
		$data['dtBrgAsset'] = $this->Masterasset_model->get_jns_brgasset();
		$data['view']		= "page/assetmaster/jenis_barang_asset";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function kategori_byjnsasset(){
		$jenisAsset = $this->input->post('jenisAsset');
		$data = $this->Masterasset_model->kategori_byjnsasset($jenisAsset); 
        echo json_encode($data);
	}
	
	public function tambah_barangasset()
	{
		$data = $this->Masterasset_model->tambah_barangasset(); 
        echo json_encode($data);
	}
	
	public function cek_barang_asset()
	{
		$namaBarang = $this->input->post('namaBarang');
		$data = $this->Masterasset_model->cek_barang_asset($namaBarang); 
        echo json_encode($data);
	}

	public function cek_kodebarang_asset()
	{
		$kodebarang = $this->input->post('kodebarang');
		$kodekategori = $this->input->post('kodekategori');
		$data = $this->Masterasset_model->cek_kodebarang_asset($kodebarang,$kodekategori); 				
		$hasil = json_encode($data);		
        echo $hasil;
	}
	
	public function update_namabrg()
	{
		$data = $this->Masterasset_model->update_namabrg(); 
        echo json_encode($data); 
	}
	
	public function delete_brgasset()
	{
		$data = $this->Masterasset_model->delete_brgasset(); 
        echo json_encode($data); 
	}
	// end menu master -> jenis barang asset =================================================
	
	//start menu master -> data vendor =======================================================
	public function data_vendor()
	{  
		$data['selectMenu']	= array('mn-master','sm-dt-vendor');
		$data['dtVendor']	= $this->Masterasset_model->get_vendor();
		$data['jnsPenyedia']= $this->Masterasset_model->get_jns_penyedia();
		$data['view']		= "page/assetmaster/data_vendor";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function tambah_vendor_asset()
	{   
		$data = $this->Masterasset_model->tambah_vendor_asset(); 
		echo json_encode($data);
	}
	
	public function get_vendor_byid()
	{
		$id		= $this->input->post('idVendor');
		$data 	= $this->Masterasset_model->get_vendor_byid($id);
		echo json_encode($data);
	}
	
	public function update_vendor()
	{ 
		$data 	= $this->Masterasset_model->update_vendor();
		echo json_encode($data);
	}
	//end menu master -> data vendor ============================================================
	
	//start menu master -> jenis penyedia =======================================================
	public function jenis_penyedia(){
		$data['selectMenu']	= array('mn-master','sm-jns-penyedia'); 
		$data['dtJnsPenyedia'] = $this->Masterasset_model->get_jns_penyedia();
		$data['view']		= "page/assetmaster/jenis_penyedia";
		$this->load->view('page/asset/templates/template',$data);
	}
			
	public function tambah_jenis_penyedia()
	{
		$data = $this->Masterasset_model->tambah_jenis_penyedia(); 
        echo json_encode($data);
	}
		
	public function cek_jnspenyedia()
	{
		$jnsPenyedia = $this->input->post('jnsPenyedia');
		$data = $this->Masterasset_model->cek_jnspenyedia($jnsPenyedia); 
        echo json_encode($data);
	}
		
	public function update_jnspenyedia()
	{
		$data = $this->Masterasset_model->update_jnspenyedia(); 
        echo json_encode($data); 
	}	
	
	public function delete_jnspenyedia()
	{
		$data = $this->Masterasset_model->delete_jnspenyedia(); 
        echo json_encode($data); 
	}
	// end menu master -> jenis penyedia ===========================================================
	
	// start menu master -> sumber anggaran ========================================================
	public function sumber_anggaran(){
		$data['selectMenu']	= array('mn-master','sm-sbr-anggaran'); 
		$data['dtSbrAnggaran'] = $this->Masterasset_model->get_sbr_anggaran();
		$data['view']		= "page/assetmaster/sumber_anggaran";
		$this->load->view('page/asset/templates/template',$data);
	}
		
	public function cek_sbranggaran()
	{
		$namaAnggaran = $this->input->post('namaAnggaran');
		$data = $this->Masterasset_model->cek_sbranggaran($namaAnggaran); 
        echo json_encode($data);
	}
		
	public function tambah_sbranggaran()
	{
		$data = $this->Masterasset_model->tambah_sbranggaran(); 
        echo json_encode($data);
	}
		
	public function update_sbranggaran()
	{
		$data = $this->Masterasset_model->update_sbranggaran(); 
        echo json_encode($data); 
	}	
	
	public function delete_sbranggaran()
	{
		$data = $this->Masterasset_model->delete_sbranggaran(); 
        echo json_encode($data); 
	} 
	// end menu master -> sumber anggaran ================================================================
	
	// start menu master -> jenis perlakuan ==============================================================
	public function jenis_perlakuan(){
		$data['selectMenu']	= array('mn-master','sm-jns-perlakuan'); 
		$data['dtJnsPerlakuan'] = $this->Masterasset_model->get_jns_perlakuan();
		$data['view']		= "page/assetmaster/jenis_perlakuan";
		$this->load->view('page/asset/templates/template',$data);
	}
		
	public function cek_jnsperlakuan()
	{
		$jnsPerlakuan = $this->input->post('jnsPerlakuan');
		$data = $this->Masterasset_model->cek_jnsperlakuan($jnsPerlakuan); 
        echo json_encode($data);
	}
	
	public function tambah_jnsperlakuan()
	{
		$data = $this->Masterasset_model->tambah_jnsperlakuan(); 
        echo json_encode($data);
	}
	
	public function update_jnsperlakuan()
	{
		$data = $this->Masterasset_model->update_jnsperlakuan(); 
        echo json_encode($data); 
	}	
	
	public function delete_jnsperlakuan()
	{
		$data = $this->Masterasset_model->delete_jnsperlakuan(); 
        echo json_encode($data); 
	}
	// end menu master -> jenis perlakuan ===================================================================
	
	// start menu master -> jenis pajak =====================================================================
	public function jenis_pajak()
	{
		$data['selectMenu']	= array('mn-master','sm-jns-pajak'); 
		$data['dtJnsPajak'] = $this->Masterasset_model->get_jnspajak();
		$data['view']		= "page/assetmaster/jenis_pajak";
		$this->load->view('page/asset/templates/template',$data);
	}
			
	public function cek_jnspajak()
	{
		$jnsPajak = $this->input->post('jnsPajak');
		$data = $this->Masterasset_model->cek_jnspajak($jnsPajak); 
        echo json_encode($data);
	}
		
	public function tambah_jnsPajak()
	{
		$data = $this->Masterasset_model->tambah_jnsPajak(); 
        echo json_encode($data);
	}
	
	public function update_jnspajak()
	{
		$data = $this->Masterasset_model->update_jnspajak(); 
        echo json_encode($data); 
	}	
	 
	public function delete_jnspajak()
	{
		$data = $this->Masterasset_model->delete_jnspajak(); 
        echo json_encode($data); 
	}
	// end menu master -> jenis pajak ==========================================================================
	
	// start menu master -> kondisi asset ======================================================================
	public function kondisi_asset()
	{
		$data['selectMenu']	= array('mn-master','sm-kondisi-asset'); 
		$data['dtKondisiAsset'] = $this->Masterasset_model->get_kondisi_asset();
		$data['view']		= "page/assetmaster/kondisi_asset";
		$this->load->view('page/asset/templates/template',$data);
	}
		
	public function cek_kondisi_sset()
	{
		$kondisiAsset = $this->input->post('kondisiAsset');
		$data = $this->Masterasset_model->cek_kondisi_sset($kondisiAsset); 
        echo json_encode($data);
	}
	
	public function tambah_kondisi_asset()
	{
		$data = $this->Masterasset_model->tambah_kondisi_asset(); 
        echo json_encode($data);
	} 
	
	public function update_kondisi_asset()
	{
		$data = $this->Masterasset_model->update_kondisi_asset(); 
        echo json_encode($data); 
	}
	
	public function delete_kondisi_asset()
	{
		$data = $this->Masterasset_model->delete_kondisi_asset(); 
        echo json_encode($data); 
	} 
	// end menu master -> kondisi asset =========================================================================
	
	// start menu master -> tgl closing =========================================================================
	public function tanggal_stokopname(){
		$data['selectMenu']	= array('mn-master','sm-tglstok-opname'); 
		$data['dtStokOpname'] = $this->Masterasset_model->get_tgl_stokopname();
		$data['view']		= "page/assetmaster/tanggal_stokopname";
		$this->load->view('page/asset/templates/template',$data);
	}
		
	public function cek_tgl_opname()
	{
		$tglClosing = $this->input->post('tglClosing');
		$jnsStok = $this->input->post('jnsStok');
		$data = $this->Masterasset_model->cek_tgl_opname($tglClosing,$jnsStok); 
        echo json_encode($data);
	}
	 	
	public function tambah_tgl_closing()
	{
		$data = $this->Masterasset_model->tambah_tgl_closing(); 
        echo json_encode($data); 
	}
	
	public function update_status_closing()
	{
		$data = $this->Masterasset_model->update_status_closing(); 
        echo json_encode($data); 
	}    
	// end menu master -> tgl closing =============================================================================
}
?>