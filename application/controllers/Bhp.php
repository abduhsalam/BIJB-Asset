<?php
class Bhp extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();  
		date_default_timezone_set('Asia/Jakarta');
		
		$this->load->model(array('Bhp_model','Libasset_model', 'Masterasset_model')); 
		
	}
	
	public function master()
	{  
		$data['selectMenu']	= array('mn-bhp-admin','sm-master');
		$data['kodeManual'] = $this->Masterasset_model->get_kode_manual();
		$data['satuanBrg']	= $this->Masterasset_model->get_satuan_barang();
		$data['dtMaster']	= $this->Bhp_model->get_data_master();
		$data['view']		= "page/bhp/master";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function pengajuan_bhp()
	{  
		$data['selectMenu']	= array('mn-bhp-user','sm-pengajuan');
		$data['kodePengajuan'] = $this->Bhp_model->kode_pengajuan_bhp();
		$data['view']		= "page/bhp/pengajuan_bhp";
		$this->load->view('page/asset/templates/template',$data);
	} 
	
	public function data_pengajuan_user()
	{  
		$data['selectMenu']	= array('mn-bhp-user','sm-bhp-user'); 
		$data['dtPengajuan']= $this->Bhp_model->get_pengajuan_user(); 
		$data['view']		= "page/bhp/data_pengajuan_user";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function data_pengajuan_bhp()
	{  
		$data['selectMenu']	= array('mn-bhp-admin','sm-pengajuan-bhp'); 
		$data['dtPengajuan']= $this->Bhp_model->get_pengajuan_bhp();
		$data['view']		= "page/bhp/data_pengajuan_bhp";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function proses_bhp()
	{
		$data['selectMenu']	= array('mn-bhp-admin','sm-pengajuan-bhp');
		$noBhp	= $this->input->post('noBhp');
		$data['dtBhp'] 		= $this->Bhp_model->get_bhp_byno($noBhp);
		$data['dtDetailBhp']= $this->Bhp_model->get_datadetail_bhp($noBhp);
		$data['view']		= "page/bhp/proses_bhp";
		$this->load->view('page/asset/templates/template',$data);
	} 
	
	public function tambah_barang()
	{  
		$data['selectMenu']	= array('mn-bhp-admin','sm-penambahan'); 
		$data['satuanBrg']	= $this->Masterasset_model->get_satuan_barang();
		$data['dtMaster']	= $this->Bhp_model->get_data_master();
		$data['view']		= "page/bhp/tambah_barang";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function data_tambah_barang()
	{  
		$data['selectMenu']	= array('mn-bhp-admin','sm-stok');  
		$data['dtTbhBrg']	= $this->Bhp_model->data_tambah_barang();
		$data['view']		= "page/bhp/data_tambah_barang";
		$this->load->view('page/asset/templates/template',$data);
	}	
	
	public function data_distribusi_barang()
	{  
		$data['selectMenu']	= array('mn-bhp-admin','sm-distribusi-brg');  
		$data['dtTbhBrg']	= $this->Bhp_model->data_distribusi_barang();
		$data['view']		= "page/bhp/data_distribusi_barang";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function view_distribusi()
	{
		$data['selectMenu']	= array('mn-bhp-admin','sm-pengajuan-bhp');
		$noBhp	= $this->input->post('kodePeng');
		$data['dtBhp'] 		= $this->Bhp_model->get_bhp_byno($noBhp);
		$data['dtDetailBhp']= $this->Bhp_model->get_datadetail_bhp($noBhp);
		$data['view']		= "page/bhp/view_distribusi";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function stok_bhp()
	{  
		$data['selectMenu']	= array('mn-bhp-admin','sm-stok');  
		$data['dtStok']		= $this->Bhp_model->get_data_stok();
		$data['view']		= "page/bhp/stok_bhp";
		$this->load->view('page/asset/templates/template',$data);
	}	
	
	public function input_stok_awal()
	{  
		$data['selectMenu']	= array('mn-bhp-admin','sm-input-stokawal');  
		$data['view']		= "page/bhp/input_stok_awal";
		$this->load->view('page/asset/templates/template',$data);
	}

	public function ver_stok_awal()
	{  
		$data['selectMenu']	= array('mn-bhp-admin','sm-ver-stokawal');  
		$dtVerifikasi		= $this->Bhp_model->ver_stok_awal();
		$data['dtVerifikasi']= $dtVerifikasi;
		$data['totStokAwal']= $this->Bhp_model->tot_stok_awal($dtVerifikasi);
		$data['view']		= "page/bhp/ver_stok_awal";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function stok_opname()
	{  
		$data['selectMenu']	= array('mn-bhp-admin','sm-stokopname'); 
		$data['cekTglOpn']	= $this->Bhp_model->cek_tgl_opname();
		$data['satuanBrg']	= $this->Masterasset_model->get_satuan_barang();
		$data['dtMaster']	= $this->Bhp_model->get_data_master();
		
		$data['view']		= "page/bhp/stok_opname";
		$this->load->view('page/asset/templates/template',$data);
	} 
	
	public function ver_stok_opname()
	{  
		$data['selectMenu']	= array('mn-bhp-admin','sm-ver-stokopname');  
		$dtVerifikasi		= $this->Bhp_model->ver_stok_opname(); 
		$data['dtVerifikasi']= $dtVerifikasi;
		$data['total']		= $this->Bhp_model->tot_stok_opname($dtVerifikasi);
		$data['view']		= "page/bhp/ver_stok_opname";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function data_stok_opname()
	{  
		$data['selectMenu']	= array('mn-bhp-admin','sm-dtstok-opname'); 
		$dtStokOpn 	= array();
		$dtTglOpn 	= $this->Bhp_model->get_search_tglopn(); 
		$search 	= $this->input->post('search');
		if($search!=""){
			$dtStokOpn = $this->Bhp_model->get_data_stokopn(); 
		}
		$data['dtTglOpn']	= $dtTglOpn;	
		$data['dtStokOpn']	= $dtStokOpn;	
		$data['view']		= "page/bhp/data_stok_opname";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function simpan_pengajuan()
	{
		$data = $this->Bhp_model->simpan_pengajuan(); 
        echo json_encode($data);
	}
	
	public function autocomplate_barang()
	{  
        $data = $this->Bhp_model->autocomplate_barang(); 
        echo json_encode($data);
	}
	
	public function simpan_master()
	{ 
		$data = $this->Bhp_model->simpan_master();  
		if($data['msg'])
		{
			$barcode = $this->input->post('kodeBarcode');
			$this->_generate_barcode($barcode);
		}
		echo json_encode($data);
	} 
	
	public function update_master()
	{ 
		$data = $this->Bhp_model->update_master();   
		echo json_encode($data);
	}
	
	public function cek_delete_master()
	{   
		$barcode = $this->input->post('barcode');
		$data = $this->Bhp_model->cek_delete_master($barcode); 
		echo json_encode($data);
	} 
	
	public function delete_master()
	{    
		$data = $this->Bhp_model->delete_master(); 
		echo json_encode($data);
	}
	
	public function tambah_satuan_barang(){
		$data = $this->Masterasset_model->tambah_satuan_barang();  
		echo json_encode($data);
	}
	
	public function simpan_status()
	{
		$data = $this->Bhp_model->simpan_status(); 
        echo json_encode($data); 
	}
	
	public function simpan_distribusi()
	{
		$data = $this->Bhp_model->simpan_distribusi(); 
        echo json_encode($data); 
	}
	
	public function scan_tambah_brg()
	{
		$data = $this->Bhp_model->scan_tambah_brg(); 
        echo json_encode($data); 
	} 
	
	public function simpan_tbhbrg()
	{
		$data = $this->Bhp_model->simpan_tbhbrg(); 
        echo json_encode($data); 
	}
	
	public function scan_barcode_barang()
	{
		$data = $this->Bhp_model->scan_barcode_barang(); 
        echo json_encode($data); 
	} 
	
	public function simpan_stok_awal()
	{
		$data = $this->Bhp_model->simpan_stok_awal(); 
        echo json_encode($data); 
	}	
	
	public function simpan_ver_stokawal()
	{
		$data = $this->Bhp_model->simpan_ver_stokawal(); 
        echo json_encode($data); 
	}	 
	
	public function update_stok_awal()
	{
		$data = $this->Bhp_model->update_stok_awal(); 
        echo json_encode($data); 
	}
	
	public function delete_stok_awal()
	{
		$data = $this->Bhp_model->delete_stok_awal(); 
        echo json_encode($data); 
	}
	
	public function scan_opname_brg()
	{
		$data = $this->Bhp_model->scan_opname_brg(); 
        echo json_encode($data); 
	} 
	
	public function cek_tgl_opname()
	{
		$data = $this->Bhp_model->cek_tgl_opname(); 
        echo json_encode($data); 
	} 
	
	public function simpan_stok_opname()
	{
		$data = $this->Bhp_model->simpan_stok_opname(); 
        echo json_encode($data); 
	}
	
	public function cek_stok_opnamebrg()
	{
		$barcode = $this->input->post('barcode');
		$data = $this->Bhp_model->cek_stok_opnamebrg($barcode); 
        echo json_encode($data); 
	}
	
	public function scan_opname_axist()
	{
		$data = $this->Bhp_model->scan_opname_axist(); 
        echo json_encode($data); 
	}
	
	public function update_stok_opname()
	{
		$data = $this->Bhp_model->update_stok_opname(); 
        echo json_encode($data); 
	}
	
	public function simpan_ver_stokopname()
	{
		$data = $this->Bhp_model->simpan_ver_stokopname(); 
        echo json_encode($data); 
	}
	
	public function get_jenis_barang()
	{
		$data = $this->Bhp_model->get_jenis_barang(); 
        echo json_encode($data); 
	}
	
	public function get_merk_barang()
	{
		$data = $this->Bhp_model->get_merk_barang(); 
        echo json_encode($data); 
	}
	
	public function get_maxbarcode_manual()
	{
		$data = $this->Bhp_model->get_maxbarcode_manual(); 
        echo json_encode($data); 
	}
	
	public function cek_barcode()
	{
		$barcode = $this->input->post('barcode');
		$data = $this->Bhp_model->cek_barcode($barcode); 
        echo json_encode($data); 
	}
	
	//====== input proses barang bhp 
	public function tambah_group()
	{   
		$data = $this->Masterasset_model->tambah_group(); 
		echo json_encode($data);
	}
	 
	public function tambah_jenisbrg()
	{   
		$data = $this->Masterasset_model->tambah_jenisbrg(); 
		echo json_encode($data);
	}
	
	public function tambah_merk()
	{   
		$data = $this->Masterasset_model->tambah_merk(); 
		echo json_encode($data);
	} 
	 
	public function update_tambah_barang()
	{ 
		$data = $this->Bhp_model->update_tambah_barang();   
		echo json_encode($data);
	}
	
	public function simpan_status_terima()
	{ 
		$data = $this->Bhp_model->simpan_status_terima();   
		echo json_encode($data);
	}
	
	//======= end input proses barang bhp
	
	public function get_detail_bhp(){
		$noPengajuan = $this->input->post('noPengajuan');
		$data = $this->Bhp_model->get_datadetail_bhp($noPengajuan);
		echo json_encode($data);
	}
	// END CODE AJAX ==================================================
	
	private function _generate_barcode($barcode) 
	{ 
		// $this->load->library('zend');
		// //load in folder Zend
		// $this->zend->load('Zend/Barcode');
		// //generate barcode
		// $file = Zend_Barcode::draw('code128', 'image', array('text' => $barcode), array());
		// // $code = time().$code;
		// // FCPATH."/assets/images/imgasset/qrcode/".$kode.'.png'; 
		// $folder = FCPATH ."assets/images/imgasset/barcode/";
		// $store_image = imagepng($file,$folder.$barcode.".png");
		// // return $code.'.png';
	}
}
?>