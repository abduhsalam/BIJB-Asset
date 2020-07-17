<?php
class Asset extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();  
		date_default_timezone_set('Asia/Jakarta');
		
		$this->load->model(array('Masterasset_model','Asset_model','Libasset_model')); 
		
	}
	
	public function dashboard()
	{ 
		$data['selectMenu']	= array('mn-asset-user','sm-pengajuan'); 
		$data['dtSumAsset'] = $this->Asset_model->dashboard_asset();	
		$data['dtInfoAsset']= $this->Asset_model->dashboard_info_asset();	
		$data['detSumAsset']= $this->Asset_model->detail_asset_dashboard();	
		$data['view']		= "page/asset/dashboard";
		$this->load->view('page/asset/templates/template',$data);
	} 
	
	public function pengajuan()
	{ 
		$data['selectMenu']	= array('mn-asset-user','sm-pengajuan');
		$data['jnsAsset']	= $this->Masterasset_model->get_jns_asset();
		$data['sbrAnggaran']= $this->Masterasset_model->get_sbr_anggaran();
		$data['view']		= "page/asset/pengajuan";
		$this->load->view('page/asset/templates/template',$data);
	} 
	
	public function data_pengajuan()
	{  
		$data['selectMenu']	= array('mn-asset-admin','sm-dt-pengajuan');
		$data['pengajuanAsset']	= $this->Asset_model->get_pengajuan_asset();
		$data['view']			= "page/asset/data_pengajuan";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function data_pengajuan_user()
	{  
		$data['selectMenu']	= array('mn-asset-user','sm-pengajuan-user');
		$data['pengajuanAsset']	= $this->Asset_model->data_pengajuan_user();
		$data['view']			= "page/asset/data_pengajuan_user";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function pembelian()
	{ 
		$data['selectMenu']	= array('mn-asset-admin','sm-pembelian');
		$data['dtPengajuan']= $this->Asset_model->get_search_pengajuan();
		$data['dtVendor']	= $this->Masterasset_model->get_vendor_byjnsvendor('perusahaan'); 
		$data['jnsPenyedia']= $this->Masterasset_model->get_jns_penyedia();
		$data['view']		= "page/asset/pembelian";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function pembelian_pengajuan()
	{ 
		$data['selectMenu']	= array('mn-asset-admin','sm-pembelian');
		$noPengajuan	= $this->input->post('noPeng'); 
		$data['dtPengajuan']= $this->Asset_model->get_pengajuan_byno($noPengajuan);  
		$data['dtVendor']	= $this->Masterasset_model->get_vendor_byjnsvendor('perusahaan'); 
		$data['jnsPenyedia']= $this->Masterasset_model->get_jns_penyedia();
		$data['view']		= "page/asset/pembelian_pengajuan";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function penyewaan_pengajuan()
	{  
		$data['selectMenu']	= array('mn-asset-admin','sm-pembelian');
		$noPengajuan	= $this->input->post('noPeng');  
		$data['dtPengajuan']= $this->Asset_model->get_pengajuan_byno($noPengajuan);  
		$data['dtVendor']	= $this->Masterasset_model->get_vendor_byjnsvendor('perusahaan'); 
		$data['jnsPenyedia']= $this->Masterasset_model->get_jns_penyedia();
		$data['view']		= "page/asset/penyewaan_pengajuan";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function tambah_data_asset()
	{ 
		$data['selectMenu']	= array('mn-asset-admin','sm-tbh-dtasset'); 
		$data['divisi']	= $this->Masterasset_model->get_divisi();
		$data['jnsAsset']	= $this->Masterasset_model->get_jns_asset();
		$data['sbrAnggaran']= $this->Masterasset_model->get_sbr_anggaran();
		$data['dtVendor']	= $this->Masterasset_model->get_vendor_byjnsvendor('perusahaan'); 
		$data['jnsPenyedia']= $this->Masterasset_model->get_jns_penyedia();
		$data['view']		= "page/asset/tambah_data_asset";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function simpan_pembelian_asset()
	{
		if ($this->input->post('st')!=""){
			$data = $this->Asset_master->update_asset(); 			
			echo json_encode($data); 
			if ($data['msg'] == FALSE) {
				$this->session->set_flashdata('status','successupdate');    
				redirect('Asset/tambah_data_asset');
			} else {
				$this->session->set_flashdata('status','error');    
				redirect('Asset/tambah_data_asset'); 
			}	
		} else {
		$idAsset 	= $this->Asset_model->get_sequence_asset();		
		$imgObj		= $idAsset."_obj";
		$klpObj		= $idAsset."_klp";
		$uploadObj 	= $this->upload_img_asset('objekAsset',$imgObj);
		$uploadKpl	= $this->upload_img_asset('kelengAsset',$klpObj);
		if($uploadObj['status']=='success' && $uploadKpl['status']=='success')
		{	
			$fileNameObj = $imgObj.".".$uploadObj['ext'];
			$fileNameKpl = $klpObj.".".$uploadKpl['ext'];
			$data = $this->Asset_model->simpan_pembelian_asset($idAsset,$fileNameObj,$fileNameKpl);
			if($data['msg'])
			{
				$redirect = $this->input->post('btnSave'); 
				$this->get_qrcode($data['kodeAsset']);
				if($redirect!="")
				{
					if($data['namaJnsAsset']=="TANAH DAN BANGUNAN")
					{
						redirect('Asset/tambah_asset_tanah/'.$idAsset);  
					}
					else
					{
						redirect('Asset/tambah_asset_kendaraan/'.$idAsset);
					}
				}
				else 
				{
					$this->session->set_flashdata('status','success');    
					redirect('Asset/data_pengajuan'); 
				}
				
			} 
			else 
			{
				$this->session->set_flashdata('status','error');  
				redirect('Asset/data_pengajuan'); 
			}
		} 
		else
		{
			$this->session->set_flashdata('status','error');    
			redirect('Asset/data_pengajuan'); 
		}
		}			
	}

	public function simpan_tambah_asset()
	{		
		if ($this->input->post('st') != ""){
			$idAsset 	= $this->Asset_model->get_sequence_asset();		
			$imgObj		= $idAsset."_obj";
			$klpObj		= $idAsset."_klp";	

			$uploadObj 	= $this->upload_img_asset('objekAsset',$imgObj);
			$uploadKpl	= $this->upload_img_asset('kelengAsset',$klpObj);						
			$fileNameObj = $imgObj.".".$uploadObj['ext'];
			$fileNameKpl = $klpObj.".".$uploadKpl['ext'];
			if($uploadObj['status']!='success'){
				$fileNameObj = "";
			} if ($uploadKpl['status']!='success') {
				$fileNameKpl = "";
			}

			$data = $this->Asset_model->update_asset($fileNameObj,$fileNameKpl); 			
			echo json_encode($data); 
			if ($data['msg'] == TRUE) {
				$this->session->set_flashdata('status','successupdate');    
				redirect('Asset/tambah_data_asset');
			} else {
				$this->session->set_flashdata('status','error');    
				redirect('Asset/tambah_data_asset'); 
			}			
		} else {
		$idAsset 	= $this->Asset_model->get_sequence_asset();		
		$imgObj		= $idAsset."_obj";
		$klpObj		= $idAsset."_klp";		
		$uploadObj 	= $this->upload_img_asset('objekAsset',$imgObj);
		$uploadKpl	= $this->upload_img_asset('kelengAsset',$klpObj);
		if($uploadObj['status']=='success')
		{	
			$fileNameObj = $imgObj.".".$uploadObj['ext'];
			$fileNameKpl = $klpObj.".".$uploadKpl['ext'];
			$data = $this->Asset_model->simpan_tambah_asset($idAsset,$fileNameObj,$fileNameKpl);
			if($data['msg'])
			{
				$redirect = $this->input->post('btnSave'); 
				$this->get_qrcode($data['kodeAsset']);
				if($redirect!="")
				{
					if($data['namaJnsAsset']=="TANAH DAN BANGUNAN")
					{
						redirect('Asset/tambah_asset_tanah/'.$idAsset); 
					}
					else
					{
						redirect('Asset/tambah_asset_kendaraan/'.$idAsset); 
					}
				}
				else 
				{
					$this->session->set_flashdata('status','success');    
					redirect('Asset/tambah_data_asset'); 
				}
			} 
			else 
			{
				$this->session->set_flashdata('status','error');  
				redirect('Asset/tambah_data_asset'); 
			}
		} 
		else
		{			
			$this->session->set_flashdata('status','error');    
			redirect('Asset/tambah_data_asset'); 
		}	
		}		
	}
	
	public function upload_img_asset($file,$fileName)
	{  
		if(!empty($_FILES[$file]['name'])){  
			$_FILES[$file]['name'];
			$_FILES[$file]['type'];
            $_FILES[$file]['tmp_name'];
            $_FILES[$file]['error'];
            $_FILES[$file]['size']; 
			$ext = explode(".",$_FILES[$file]['name']);
			
			$config['upload_path'] 		= './assets/images/imgasset/pembelian';
			$config['allowed_types'] 	= 'gif|png|jpg|jpeg';
			$config['file_name'] 		= $fileName;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$status = "error"; 
			
			$image_path = $this->upload->upload_path.$this->upload->file_name;  
			$cekFile = $image_path.".".$ext[1];
			 
			if(file_exists($cekFile)){
				unlink($cekFile); 				 
			} 
			
			if($this->upload->do_upload($file)){  
				$status = "success"; 
			} else {  
				$status = "error"; 
			}    

        }   
		$data['ext'] = $ext[1];
		$data['status'] = $status;
		return $data;
	}
	
	public function simpan_distribusi_asset()
	{ 
		$idDist 	= $this->Asset_model->get_sequence_distribusi();
		$imgDist	= $idDist."_dis"; 
		$upload 	= $this->upload_distribusi('buktiDistribusi',$imgDist); 
		if($upload['status']=='success')
		{	
			$fileName = $imgDist.".".$upload['ext']; 
			$data = $this->Asset_model->simpan_distribusi($idDist,$fileName);
			
		} 
		else
		{
			$data['msg'] = FALSE;
		} 
		return $data;
	} 
	
	public function upload_distribusi($file,$fileName)
	{  
		if(!empty($_FILES[$file]['name'])){  
			$_FILES[$file]['name'];
			$_FILES[$file]['type'];
            $_FILES[$file]['tmp_name'];
            $_FILES[$file]['error'];
            $_FILES[$file]['size']; 
			$ext = explode(".",$_FILES[$file]['name']);
			
			$config['upload_path'] 		= './assets/images/imgasset/distribusi';
			$config['allowed_types'] 	= 'gif|png|jpg|jpeg';
			$config['file_name'] 		= $fileName;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$status = "error"; 
			
			$image_path = $this->upload->upload_path.$this->upload->file_name;  
			$cekFile = $image_path.".".$ext[1];
			 
			if(file_exists($cekFile)){
				unlink($cekFile); 				 
			} 
			
			if($this->upload->do_upload($file)){  
				$status = "success"; 
			} else {  
				$status = "error"; 
			}    

        }   
		$data['ext'] = $ext[1];
		$data['status'] = $status;
		return $data;
	}
	
	public function simpan_penyewaan_asset()
	{
		$idAsset 	= $this->Asset_model->get_sequence_asset();
		$imgObj		= $idAsset."_obj";
		$klpObj		= $idAsset."_klp";
		$bktObj		= $idAsset."_bkt";
		$uploadObj 	= $this->upload_penyewaan('objekAsset',$imgObj);
		$uploadKpl	= $this->upload_penyewaan('kelengAsset',$klpObj);
		$uploadBkt	= $this->upload_penyewaan('buktiAsset',$bktObj);		
		if($uploadObj['status']=='success' && $uploadKpl['status']=='success' && $uploadBkt['status']=='success')
		{	
			$fileNameObj = $imgObj.".".$uploadObj['ext'];
			$fileNameKpl = $klpObj.".".$uploadKpl['ext'];
			$fileNameBkt = $bktObj.".".$uploadBkt['ext']; 
			
			
			$data = $this->Asset_model->simpan_penyewaan_asset($idAsset,$fileNameObj,$fileNameKpl,$fileNameBkt);
			
			if($data['msg']){
				$redirect = $this->input->post('btnSave'); 
				$this->get_qrcode($data['kodeAsset']);
				if($redirect!="")
				{
					if($data['kodeJnsAsset']=="JA-001")
					{
						redirect('Asset/tambah_asset_tanah/'.$idAsset); 
					}
					else
					{
						redirect('Asset/tambah_asset_kendaraan/'.$idAsset); 
					}
				}
				else 
				{
					$this->session->set_flashdata('status','success');    
					redirect('Asset/penyewaan_pengajuan'); 
				}				
				
			} else {
				$this->session->set_flashdata('status','error');  
				redirect('Asset/penyewaan_pengajuan'); 
			}
		} 
		else
		{
			$this->session->set_flashdata('status','error');    
			redirect('Asset/penyewaan_pengajuan'); 
		}		
	}
	
	public function penyewaan_asset_langsung()
	{
		if ($this->input->post('st') != ""){
			$idAsset	= $this->input->post('st');
			$imgObj		= $idAsset."_obj";
			$klpObj		= $idAsset."_klp";
			$bktObj		= $idAsset."_bkt";
			$uploadObj 	= $this->upload_penyewaan('objekAsset',$imgObj);
			$uploadKpl	= $this->upload_penyewaan('kelengAsset',$klpObj);
			$uploadBkt	= $this->upload_penyewaan('buktiAsset',$bktObj);					
			
			$fileNameObj = $imgObj.".".$uploadObj['ext'];
			$fileNameKpl = $klpObj.".".$uploadKpl['ext'];
			$fileNameBkt = $bktObj.".".$uploadBkt['ext']; 

			if($uploadObj['status']!='success'){
				$fileNameObj = "";
			} if ($uploadKpl['status']!='success') {
				$fileNameKpl = "";
			} if ($uploadBkt['status']!='success') {
				$fileNameBkt = "";
			}		
			$data = $this->Asset_model->update_assetsw($fileNameObj,$fileNameKpl,$fileNameBkt); 			
			echo json_encode($data); 
			if ($data['msg'] == TRUE) {
				$this->session->set_flashdata('status','successupdate');    
				redirect('Asset/tambah_data_asset');
			} else {
				$this->session->set_flashdata('status','error');    
				redirect('Asset/tambah_data_asset'); 
			}				
		} else {
		$idAsset 	= $this->Asset_model->get_sequence_asset();
		$imgObj		= $idAsset."_obj";
		$klpObj		= $idAsset."_klp";
		$bktObj		= $idAsset."_bkt";
		$uploadObj 	= $this->upload_penyewaan('objekAsset',$imgObj);
		$uploadKpl	= $this->upload_penyewaan('kelengAsset',$klpObj);
		$uploadBkt	= $this->upload_penyewaan('buktiAsset',$bktObj);		
		if($uploadObj['status']=='success' && $uploadKpl['status']=='success' && $uploadBkt['status']=='success')
		{	
			$fileNameObj = $imgObj.".".$uploadObj['ext'];
			$fileNameKpl = $klpObj.".".$uploadKpl['ext'];
			$fileNameBkt = $bktObj.".".$uploadBkt['ext']; 
			
			
			$data = $this->Asset_model->simpan_penyewaan_asset($idAsset,$fileNameObj,$fileNameKpl,$fileNameBkt);
			
			if($data['msg']){
				$redirect = $this->input->post('btnSave'); 
				$this->get_qrcode($data['kodeAsset']);
				if($redirect!="")
				{
					if($data['kodeJnsAsset']=="JA-001")
					{
						redirect('Asset/tambah_asset_tanah/'.$idAsset); 
					}
					else
					{
						redirect('Asset/tambah_asset_kendaraan/'.$idAsset); 
					}
				}
				else 
				{
					$this->session->set_flashdata('status','success');    
					redirect('Asset/tambah_data_asset'); 
				}				
				
			} else {
				$this->session->set_flashdata('status','error');  
				redirect('Asset/tambah_data_asset'); 
			}
		} 
		else
		{
			$this->session->set_flashdata('status','error');    
			redirect('Asset/tambah_data_asset'); 
		}	
		}	
	}
	
	public function upload_penyewaan($file,$fileName)
	{  
		if(!empty($_FILES[$file]['name'])){  
			$_FILES[$file]['name'];
			$_FILES[$file]['type'];
            $_FILES[$file]['tmp_name'];
            $_FILES[$file]['error'];
            $_FILES[$file]['size']; 
			$ext = explode(".",$_FILES[$file]['name']);
			
			$config['upload_path'] 		= './assets/images/imgasset/sewaasset';
			$config['allowed_types'] 	= 'gif|png|jpg|jpeg';
			$config['file_name'] 		= $fileName;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$status = "error"; 
			
			$image_path = $this->upload->upload_path.$this->upload->file_name;  
			$cekFile = $image_path.".".$ext[1];
			 
			if(file_exists($cekFile)){
				unlink($cekFile); 				 
			} 
			
			if($this->upload->do_upload($file)){  
				$status = "success"; 
			} else {  
				$status = "error"; 
			}    

        }   
		$data['ext'] = $ext[1];
		$data['status'] = $status;
		return $data;
	} 
	
	public function data_asset()
	{  
		$data['selectMenu']	= array('mn-asset-admin','sm-dt-asset');
		$data['divisi']	= $this->Masterasset_model->get_divisi();
		$data['dtAsset']	= $this->Asset_model->get_data_asset(); 
		$data['dtUser']		= $this->Masterasset_model->get_user();
		$data['dtJnsPrlkn']	= $this->Masterasset_model->get_jns_perlakuan();
		$data['view']		= "page/asset/data_asset";

		$this->load->view('page/asset/templates/template',$data);
	}

	public function data_asset_user()
	{  
		$data['selectMenu']	= array('mn-asset-user','sm-asset-user');
		$data['dtAsset']	= $this->Asset_model->data_asset_user();
		$data['view']		= "page/asset/data_asset_user";
		$this->load->view('page/asset/templates/template',$data);
	}	
	
	public function data_asset_sewa()
	{  
		$data['selectMenu']	= array('mn-asset-admin','sm-dt-penyewaan');
		$data['divisi']	= $this->Masterasset_model->get_divisi();
		$data['dtUser']		= $this->Masterasset_model->get_user();
		$data['dtAsset']	= $this->Asset_model->get_asset_sewa(); 
		$data['view']		= "page/asset/data_asset_sewa";
		$this->load->view('page/asset/templates/template',$data);
	}
		
	public function tambah_asset_kendaraan($idAsset=null)
	{ 	
		$data['selectMenu']	= array('mn-asset-admin','');
		$data['dtAsset']	= $this->Asset_model->get_asset_byid($idAsset);    
		$data['view']		= "page/asset/tambah_asset_kendaraan";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function asset_kendaraan()
	{  
		$data['selectMenu']	= array('mn-asset-admin','sm-asset-kendaraan');
		if($this->input->post('kdAsset')!="")
		{ 
			$data['dtAsset']	= $this->Asset_model->asset_kendaraan_byidasset($this->input->post('kdAsset'));
		} 
		else 
		{ 
			$data['dtAsset']	= $this->Asset_model->get_asset_kendaraan();
		}
		
		$data['jnsPajak']	= $this->Masterasset_model->get_jnspajak();
		$data['jnsPenyedia']= $this->Masterasset_model->get_jns_penyedia();
		$data['vendorMainten']= $this->Masterasset_model->vendor_byjnsvendor_mainten('perusahaan'); 
		$data['dtSopir']	= $this->Asset_model->get_sopir();  
		$data['view']		= "page/asset/asset_kendaraan";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function simpan_detail_kedaraan()
	{
		$idAsset 	= $this->Asset_model->get_sequence_assetkend(); 
		$pathStnk	= "./assets/images/imgasset/assetkendaraan/stnk";
		$stnk		= $idAsset."_stnk"; 
		$pathBpkb	= "./assets/images/imgasset/assetkendaraan/bpkb";
		$bpkb		= $idAsset."_bpkb";  
		$uploadBpk 	= $this->upload_master('imgBpkb',$bpkb,$pathBpkb);
		$uploadStnk = $this->upload_master('imgStnk',$stnk,$pathStnk);
		
		$kodeAsset	= $this->input->post('kodeAsset');
		$cekKodePeng= $this->Asset_model->cek_nopeng_inasset($kodeAsset);
		
		if($uploadBpk['status']=='success' && $uploadStnk['status']=='success')
		{	
			$fileStnk = $stnk.".".$uploadStnk['ext']; 
			$fileBpkb = $bpkb.".".$uploadBpk['ext'];
			$msg = TRUE;
			$msg = $this->Asset_model->simpan_detail_kedaraan($idAsset,$fileStnk,$fileBpkb);
			if($msg){
				$this->session->set_flashdata('status','success');    
				if(!empty($cekKodePeng)){	
					redirect('Asset/tambah_data_asset'); 
				} else {
					redirect('Asset/tambah_data_asset'); 
				}
			} else {
				$this->session->set_flashdata('status','error');  
				redirect('Asset/tambah_asset_kendaraan/'.$kodeAsset); 
			}
		} 
		else
		{
			$this->session->set_flashdata('status','error');  
			redirect('Asset/tambah_asset_kendaraan/'.$kodeAsset); 
		}		
	}
	
	public function tambah_asset_tanah($idAsset=null)
	{ 	
		$data['selectMenu']	= array('mn-asset-admin','');
		$data['dtAsset']	= $this->Asset_model->get_asset_byid($idAsset);    
		$data['view']		= "page/asset/tambah_asset_tanah";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function asset_tanah_bangunan()
	{  
		$data['selectMenu']	= array('mn-asset-admin','sm-asset-tnhbgn');
		if($this->input->post('kdAsset')!="")
		{
			$data['dtAsset']	= $this->Asset_model->asset_tnhbgn_byidasset($this->input->post('kdAsset'));
		} 
		else 
		{
			$data['dtAsset']	= $this->Asset_model->get_asset_tnhbgn(); 
		} 
		$data['jnsPajak']	= $this->Masterasset_model->get_jnspajak();
		$data['view']		= "page/asset/asset_tanah_bangunan";
		$this->load->view('page/asset/templates/template',$data);
	} 
	 	
	public function simpan_detail_tanah()
	{
		$idAsset 	= $this->Asset_model->get_sequence_assettanah(); 
		$pathLokasi	= "./assets/images/imgasset/assettnhbgn/lokasi";
		$lokasi		= $idAsset."_lokasi";     
		$uploadLokasi = $this->upload_master('imgTnhBgn',$lokasi,$pathLokasi);
		
		$kodeAsset	= $this->input->post('kodeAsset');
		$cekKodePeng= $this->Asset_model->cek_nopeng_inasset($kodeAsset);
		
		if($uploadLokasi['status']=='success')
		{	
			$fileLokasi = $lokasi.".".$uploadLokasi['ext'];  
			$msg = TRUE;
			$msg = $this->Asset_model->simpan_detail_tanah($idAsset,$fileLokasi);
			if($msg){
				$this->session->set_flashdata('status','success');    
				if(!empty($cekKodePeng)){	
					redirect('Asset/tambah_data_asset'); 
				} else {
					redirect('Asset/tambah_data_asset'); 
				}
			} else {
				$this->session->set_flashdata('status','error');  
				redirect('Asset/tambah_asset_tanah/'.$kodeAsset); 
			}
		} 
		else
		{
			$this->session->set_flashdata('status','error');    
			redirect('Asset/tambah_asset_tanah/'.$kodeAsset); 
		}		
	}
	
	public function upload_master($file,$fileName,$path)
	{  
		if(!empty($_FILES[$file]['name'])){  
			$_FILES[$file]['name'];
			$_FILES[$file]['type'];
            $_FILES[$file]['tmp_name'];
            $_FILES[$file]['error'];
            $_FILES[$file]['size']; 
			$ext = explode(".",$_FILES[$file]['name']);
			
			// $config['upload_path'] 		= './assets/images/imgasset/sewaasset';
			$config['upload_path'] 		= $path;
			$config['allowed_types'] 	= 'gif|png|jpg|jpeg';
			$config['file_name'] 		= $fileName;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$status = "error"; 
			
			$image_path = $this->upload->upload_path.$this->upload->file_name;  
			$cekFile = $image_path.".".$ext[1];
			 
			if(file_exists($cekFile)){
				unlink($cekFile); 				 
			} 
			
			if($this->upload->do_upload($file)){  
				$status = "success"; 
			} else {  
				$status = "error"; 
			}    

        }   
		$data['ext'] = $ext[1];
		$data['status'] = $status;
		return $data;
	}
	
	public function simpan_mainten_kendaraan()
	{
		$idAsstMainten 	= $this->Asset_model->get_sequence_mainten(); 
		$pathMianten= "./assets/images/imgasset/assetkendaraan/maintenance";
		$mainten	= $idAsstMainten."_mainten";  
		$uploadMainten 	= $this->upload_master('buktiMainten',$mainten,$pathMianten);
		if($uploadMainten['status']=='success')
		{	
			$fileMainten = $mainten.".".$uploadMainten['ext'];   
			$data 	= $this->Asset_model->simpan_mainten_kendaraan($idAsstMainten,$fileMainten); 
		} 
		else
		{
			$data['msg'] = FALSE;
		}	
		return $data;
	}
	
	public function simpan_pajak_kendaraan()
	{
		$idAsstPjk 	= $this->Asset_model->get_sequence_pjkkend(); 
		$pathPjk	= "./assets/images/imgasset/assetkendaraan/buktipajak";
		$pajak		= $idAsstPjk."_pajak";  
		$uploadPjk 	= $this->upload_master('buktiPajak',$pajak,$pathPjk);
		if($uploadPjk['status']=='success')
		{	
			$filePjk = $pajak.".".$uploadPjk['ext'];   
			$data = $this->Asset_model->simpan_pajak_kendaraan($idAsstPjk,$filePjk); 
		} 
		else
		{
			$data['msg'] = FALSE;
		}	
		return $data;
	}
	
	public function simpan_ujikir_kendaraan()
	{
		$idAsstKir 	= $this->Asset_model->get_sequence_kir(); 
		$pathKir	= "./assets/images/imgasset/assetkendaraan/ujikir";
		$kir		= $idAsstKir."_ujikir";  
		$uploadKir 	= $this->upload_master('buktiUjikir',$kir,$pathKir);
		if($uploadKir['status']=='success')
		{	
			$fileKir 	= $kir.".".$uploadKir['ext'];   
			$data 		= $this->Asset_model->simpan_ujikir_kendaraan($idAsstKir,$fileKir); 
		} 
		else
		{
			$data['msg'] = FALSE;
		}	
		return $data;
	}
	
	public function frame_maps($id){
		$dtAsset = $this->Asset_model->get_tnhbgn_byid($id); 
		$data['latitude'] = $dtAsset->latitude;
		$data['longitude'] = $dtAsset->longitude;
		$this->load->view('page/asset/frame_maps',$data);
	}
	
	public function simpan_pajak_tnhbgn()
	{
		$idAsstPjk 	= $this->Asset_model->get_sequence_pjktnh(); 
		$pathPjk	= "./assets/images/imgasset/assettnhbgn/buktipajak";
		$pajak		= $idAsstPjk."_pajak";  
		$uploadPjk 	= $this->upload_master('buktiPajak',$pajak,$pathPjk);
		if($uploadPjk['status']=='success')
		{	
			$filePjk = $pajak.".".$uploadPjk['ext'];   
			$data = $this->Asset_model->simpan_pajak_tnhbgn($idAsstPjk,$filePjk); 
		} 
		else
		{
			$data['msg'] = FALSE;
		}	
		return $data;
	}
	
	public function data_kondisi_asset()
	{  
		$data['selectMenu']	= array('mn-asset-admin','sm-kondisi-asset');
		$data['dtUser']		= $this->Masterasset_model->get_user();
		$data['dtAsset']	= $this->Asset_model->get_dtkondisi_asset(); 
		$data['dtJnsPrlkn']	= $this->Masterasset_model->get_jns_perlakuan();
		$data['view']		= "page/asset/data_kondisi_asset";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function peminjaman_asset()
	{ 
		$data['selectMenu']	= array('mn-asset-admin','sm-asset-peminjaman');
		$data['jnsAsset']	= $this->Masterasset_model->get_jns_asset();
		$data['unitKerja']	= $this->Asset_model->get_unit_kerja(); 
		$data['view']		= "page/asset/peminjaman_asset";
		$this->load->view('page/asset/templates/template',$data);
	} 
	
	public function data_peminjaman()
	{  
		$data['selectMenu']	= array('mn-asset-admin','sm-asset-dtpeminjaman');
		$data['dtPeminjaman']	= $this->Asset_model->get_peminjaman_asset();
		$data['view']			= "page/asset/data_peminjaman";
		$this->load->view('page/asset/templates/template',$data);
	} 
	
	public function stok_opname()
	{  
		$data['selectMenu']	= array('mn-asset-admin','sm-asset-opname');  
		$data['cekTglOpn']	= $this->Asset_model->cek_tgl_opname(); 
		$data['dtKondAsset']= $this->Masterasset_model->get_kondisi_asset();
		$data['view']		= "page/asset/stok_opname";
		$this->load->view('page/asset/templates/template',$data);
	} 
	
	public function ver_stok_opname()
	{  
		$data['selectMenu']	= array('mn-asset-admin','sm-ver-stokopname');  
		$dtVerifikasi		= $this->Asset_model->ver_stok_opname(); 
		$data['dtVerifikasi']= $dtVerifikasi;
		$data['cekTglOpn']	= $this->Asset_model->cek_tgl_opname(); 
		$data['dtKondAsset']= $this->Masterasset_model->get_kondisi_asset(); 
		$data['view']		= "page/asset/ver_stok_opname";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	public function data_stok_opname()
	{  
		$data['selectMenu']	= array('mn-asset-admin','sm-dtstok-opname'); 
		$dtStokOpn 	= array();
		$dtTglOpn 	= $this->Asset_model->get_search_tglopn(); 
		$search 	= $this->input->post('search');
		if($search!=""){
			$dtStokOpn = $this->Asset_model->get_data_stokopn(); 
		}
		$data['dtTglOpn']	= $dtTglOpn;	
		$data['dtStokOpn']	= $dtStokOpn;	
		$data['view']		= "page/asset/data_stok_opname";
		$this->load->view('page/asset/templates/template',$data);
	}
	
	// STAR CODE AJAX  ================================================
	public function kategori_byjnsasset()
	{  
		$jnsAsset = $this->input->post("jnsAsset");
		$data = $this->Masterasset_model->kategori_byjnsasset($jnsAsset); 
		echo json_encode($data);
	} 
	
	public function barang_bykategori()
	{  
		$kategori = $this->input->post("kategori");
		$data = $this->Masterasset_model->barang_bykategori($kategori); 
		echo json_encode($data);
	} 
	
	public function tambah_namabrg()
	{   
		$data = $this->Masterasset_model->tambah_namabrg(); 
		echo json_encode($data);
	}
		
	public function tambah_sbranggaran()
	{   
		$data = $this->Masterasset_model->tambah_sbranggaran(); 
		echo json_encode($data);
	}
		
	public function simpan_pengajuan_asset()
	{   
		$data = $this->Asset_model->simpan_pengajuan_asset(); 
		echo json_encode($data);
	}
	
	public function tambah_jenis_penyedia()
	{   
		$data = $this->Masterasset_model->tambah_jenis_penyedia(); 
		echo json_encode($data);
	}
	
	public function tambah_vendor_asset()
	{   
		$data = $this->Masterasset_model->tambah_vendor_asset(); 
		echo json_encode($data);
	}
	
	public function tambah_vendor_mainten()
	{   
		$data = $this->Masterasset_model->tambah_vendor_mainten(); 
		echo json_encode($data);
	} 
	
	public function tambah_sopir()
	{   
		$data = $this->Masterasset_model->tambah_sopir(); 
		echo json_encode($data);
	}
	
	// vendor yang muncul di menu asset pembelian
	public function get_vendor_byjnsvendor()
	{   
		$jnsVendor	= $this->input->post('jnsVendor');
		$data = $this->Masterasset_model->get_vendor_byjnsvendor($jnsVendor); 
		echo json_encode($data);
	}
	
	public function vendor_byjnsvendor_mainten()
	{   
		$jnsVendor	= $this->input->post('jnsVendor');
		$data = $this->Masterasset_model->vendor_byjnsvendor_mainten($jnsVendor); 
		echo json_encode($data);
	}
	
	public function get_pengajuan_byno()
	{
		$noPeng	= $this->input->post('noPeng');
		$data = $this->Asset_model->get_pengajuan_byno($noPeng);  
		if($data->kode_jenisasset=="JA-001" || $data->kode_jenisasset=="JA-002")
		{
			$data->REDIRECT= TRUE;
		} 
		else 
		{
			$data->REDIRECT = FALSE;
		} 
		echo json_encode($data);
	}
	
	public function simpan_status()
	{ 
		$data = $this->Asset_model->simpan_status();  
		echo json_encode($data);
	}  
	
	public function simpan_status_terima()
	{ 
		$data = $this->Asset_model->simpan_status_terima();  
		echo json_encode($data);
	}  
	
	public function simpan_perlakuan_asset()
	{ 
		$data = $this->Asset_model->simpan_perlakuan_asset();  
		echo json_encode($data);
	} 
	
	public function get_asset_byid()
	{
		$id		= $this->input->post('idAsset');
		$data 	= $this->Asset_model->get_asset_byid($id);		
		echo json_encode($data);
	}	

	public function updateasset()
	{
		$id		= $this->input->post('idasset');		
		$data['dtAsset']	= $this->Asset_model->get_asset_byid($id);
		$data['selectMenu']	= array('mn-asset-admin','sm-tbh-dtasset'); 
		$data['divisi']	= $this->Masterasset_model->get_divisi();
		$data['jnsAsset']	= $this->Masterasset_model->get_jns_asset();
		$data['sbrAnggaran']= $this->Masterasset_model->get_sbr_anggaran();
		$data['dtVendor']	= $this->Masterasset_model->get_vendor_byjnsvendor('perusahaan'); 
		$data['jnsPenyedia']= $this->Masterasset_model->get_jns_penyedia();
		$data['view']		= "page/asset/tambah_data_asset";
		$this->load->view('page/asset/templates/template',$data);
	}

	public function updateassetsw()
	{
		$id		= $this->input->post('idasset');		
		$data['dtAsset']	= $this->Asset_model->get_sewaasset_byid($id);
		$data['selectMenu']	= array('mn-asset-admin','sm-tbh-dtasset'); 
		$data['divisi']	= $this->Masterasset_model->get_divisi();
		$data['jnsAsset']	= $this->Masterasset_model->get_jns_asset();
		$data['sbrAnggaran']= $this->Masterasset_model->get_sbr_anggaran();
		$data['dtVendor']	= $this->Masterasset_model->get_vendor_byjnsvendor('perusahaan'); 
		$data['jnsPenyedia']= $this->Masterasset_model->get_jns_penyedia();
		$data['view']		= "page/asset/tambah_data_asset";
		$this->load->view('page/asset/templates/template',$data);
	}	

	public function get_distribusi_bykdasset()
	{
		$kdAsset = $this->input->post('kdAsset');
		$data 	= $this->Asset_model->get_distribusi_bykdasset($kdAsset);
		echo json_encode($data);
	}
	
	public function get_perlakuan_bykdasset()
	{
		$kdAsset = $this->input->post('kdAsset');
		$data 	= $this->Asset_model->get_perlakuan_bykdasset($kdAsset);
		echo json_encode($data);
	}		

	public function get_sewaasset_byid()
	{
		$id		= $this->input->post('idAsset');
		$data 	= $this->Asset_model->get_sewaasset_byid($id);
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
	
	public function get_imgdis(){
		$data 	= $this->Asset_model->get_imgdis();
		echo json_encode($data);
	}
	
	public function simpan_pemakai_kendaraan()
	{ 
		$data = $this->Asset_model->simpan_pemakai_kendaraan();  
		echo json_encode($data);
	} 
	
	public function get_mainten_byassetkend()
	{ 
		$data = $this->Asset_model->get_mainten_byassetkend();  
		echo json_encode($data);
	} 
	
	public function get_img_maintenance()
	{
		$data = $this->Asset_model->get_img_maintenance();  
		echo json_encode($data);
	}
		
	public function get_ujikir_byassetkend()
	{ 
		$data = $this->Asset_model->get_ujikir_byassetkend();  
		echo json_encode($data);
	}	
	
	public function get_img_ujikir()
	{
		$data = $this->Asset_model->get_img_ujikir();  
		echo json_encode($data);
	}
	
	public function get_pajak_byassetkend()
	{
		$data = $this->Asset_model->get_pajak_byassetkend();  
		echo json_encode($data);
	}
	
	public function get_img_pajak()
	{
		$data = $this->Asset_model->get_img_pajak();  
		echo json_encode($data);
	}
	
	public function get_pemakaian_byassetkend()
	{
		$data = $this->Asset_model->get_pemakaian_byassetkend();  
		echo json_encode($data);
	}
	
	public function get_tnhbgn_byid()
	{
		$id   = $this->input->post('idAsset');
		$data = $this->Asset_model->get_tnhbgn_byid($id);  
		echo json_encode($data);
	}
	
	public function set_penerima_asset()
	{
		$kodePengajuan   = $this->input->post('kodePengajuan');
		$data = $this->Asset_model->set_penerima_asset($kodePengajuan);  
		echo json_encode($data);
	}
	
	public function delete_distribusi_asset()
	{
		$idDistribusi = $this->input->post('idDistribusi');
		$data = $this->Asset_model->delete_distribusi_asset($idDistribusi);  
		echo json_encode($data);
	} 
	
	public function scan_opname_asset()
	{
		$data = $this->Asset_model->scan_opname_asset();  
		echo json_encode($data); 
	}
	
	public function simpan_opname_asset()
	{ 
		$data = $this->Asset_model->simpan_opname_asset();  
		echo json_encode($data);
	} 
	
	public function cek_barcode()
	{
		$barcode = $this->input->post('barcode');
		$data = $this->Asset_model->cek_barcode($barcode);  
		echo json_encode($data); 
	}
	
	public function delete_stokopname()
	{
		$data = $this->Asset_model->delete_stokopname();  
		echo json_encode($data); 
	}
	
	public function get_veropname_data()
	{
		$data = $this->Asset_model->get_veropname_data();  
		echo json_encode($data); 
	}
	
	public function update_ver_opname()
	{
		$data = $this->Asset_model->update_ver_opname();  
		echo json_encode($data); 
	}
	
	public function simpan_verifikasi_opname()
	{ 
		$data = $this->Asset_model->simpan_verifikasi_opname();  
		echo json_encode($data);
	} 
	
	public function simpan_verall_stokopname()
	{
		$data = $this->Asset_model->simpan_verall_stokopname(); 
        echo json_encode($data); 
	}
	
	public function get_pengguna_byunitkerja()
	{  
		$unitKerja = $this->input->post("unitKerja");
		$data = $this->Asset_model->get_pengguna_byunitkerja($unitKerja); 
		echo json_encode($data);
	} 
	
	public function get_namabrg_bypengguna()
	{  
		$pengguna = $this->input->post("pengguna");
		$data = $this->Asset_model->get_namabrg_bypengguna($pengguna); 
		echo json_encode($data);
	} 
	
	public function get_asset_bykdasset()
	{
		$kodeAsset = $this->input->post("kodeAsset");
		$data = $this->Asset_model->get_asset_bykdasset($kodeAsset); 
		echo json_encode($data);
	}
			
	public function simpan_peminjaman_asset()
	{   
		$data = $this->Asset_model->simpan_peminjaman_asset(); 
		echo json_encode($data);
	}
	
	public function update_status_peminjaman()
	{
		$data = $this->Asset_model->update_status_peminjaman(); 
		echo json_encode($data);
	}
	// END CODE AJAX ==================================================
	
	public function get_qrcode($kode){
		// $this->load->library('Generateqrcode');

		// $params['data'] = $kode;
		// $params['level'] = 'H';
		// $params['size'] = 6;
		// $params['savename'] = FCPATH."/assets/images/imgasset/qrcode/".$kode.'.png'; 
		// $this->generateqrcode->generate($params); 
	}

	
	
	//GENERATE BARCODE AND QRCODE TO PDF
	
	public function generate_barcode_pdf(){
		$kodeAsset = $this->input->post('kodeAsset');
		$this->generate_qrcode($kodeAsset);
		$this->generate_barcode($kodeAsset);
		$this->generate_pdf($kodeAsset); 
		$data = $this->Asset_model->insert_barcode($kodeAsset); 
		echo json_encode($data);
	}
	
	public function generate_qrcode($kodeAsset){
		$this->load->library('Generateqrcode');  
		$params['data'] = $kodeAsset;
		$params['level'] = 'H';
		$params['size'] = 3;
		$params['savename'] = FCPATH."/assets/images/imgasset/qrcode/".$kodeAsset.'.png'; 
		$this->generateqrcode->generate($params);  
	}
	
	public function generate_barcode($kodeAsset) 
	{   
		$this->load->library('zend'); 
		 
		$this->zend->load('Zend/Barcode');
		//generate barcode
		$file = Zend_Barcode::draw('code128', 'image', array('text' => $kodeAsset, 'barHeight'=> 20, 'barThinWidth' => 1, 'barThickWidth' => 1, 'drawText' => false, 'withQuietZones'=>false), array());
		  
		$folder = FCPATH ."assets/images/imgasset/barcode/";
		$store_image = imagepng($file,$folder.$kodeAsset.".png"); 
	} 
	
	function generate_pdf($kodeAsset){ 
		$qrcode = base_url()."assets/images/imgasset/qrcode/".$kodeAsset.'.png'; 
		$barcode = base_url()."assets/images/imgasset/barcode/".$kodeAsset.'.png'; 		
		$dtAsset = $this->Asset_model->get_asset_bykdasset($kodeAsset);
		$detAsset = $this->Asset_model->get_asset_byid($dtAsset->id_asset);

		$nama = $detAsset->nama_barang;
		$kategori = $detAsset->nama_kategori;

		if (strlen($nama) > 10) $nama = substr($nama, 0, 10);
		if (strlen($str) > 10) $kategori = substr($kategori, 0, 10);

		$html = '<html>
					<body>
						<style>
							th, td{
								padding: 0px;
							}
						</style>
						<div id="div">
							<table id="table" style="width: 100%;">
								<tr>
									<th colspan="4" style="font-size: 11px;">PT. BANDARA INTERNATIONAL JAWA BARAT</th>
									<td rowspan="4" id="b" class="tdb"><img style="width: 100%;" src="'.$qrcode.'" alt=""></td>
								</tr>
								<tr>
									<td id="c" class="tdb" style="font-size: 11px;">Kode</td> 
									<td class="tdb" style="font-size: 11px;">'.$kodeAsset.'</td>               
									<td id="c" class="tdb" style="font-size: 11px;">Kategori</td>
									<td class="tdb" style="font-size: 11px;">'.$kategori.'</td>
								</tr>    
								<tr>
									<td id="c" class="tdb" style="font-size: 11px;">Nama</td>
									<td class="tdb" style="font-size: 11px;">'.$nama.'</td>
									<td id="c" class="tdb" style="font-size: 11px;">Divisi</td>
									<td class="tdb" style="font-size: 11px;">'.$detAsset->divisi.'</td>						
								<tr>
									<td colspan="3" class="tdb"><center><img style="width: 70%;" src="'.$barcode.'"></center></td>        
									<td rowspan="1" class="tdb"><img style="width: 20%;" id="img" src="'.base_url().'assets/images/imgasset/BIJB Logo-New BLACK.png"></td>					
								</tr>
							</table>
						</div>
					</body>
				</html>';  
		// echo $html;
		$pdfFilePath = FCPATH."/assets/images/imgasset/pdfbarcode/".$kodeAsset.'.pdf';  
         	
		$mpdf = new \Mpdf\Mpdf([
						'mode' => '',
						'format' => [75, 25], 
						'default_font_size' => 0,
						'default_font' => '',
						'margin_left' => 1,
						'margin_right' => 0,
						'margin_top' => 3,
						'margin_bottom' => 0,
						'margin_header' => 0,
						'margin_footer' => 0,
						'orientation' => 'P',
					]); 
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'F'); // opens in browser
	} 	

	public function get_namakaryawan_byid()
	{
		$divisi = $this->input->post('divisi');
		$data 	= $this->Masterasset_model->get_namakaryawan_byid($divisi);
		echo json_encode($data);
	}
	
	public function get_divisi()
	{
		$divisi = $this->input->post('divisi');
		$data 	= $this->Masterasset_model->get_divisi();
		echo json_encode($data);
	}
}
?>